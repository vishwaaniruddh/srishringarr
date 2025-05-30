<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL, 
	as published by the Free Software Foundation, either version 3 
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
$page_security = 'SA_SALESPAYMNT';
$path_to_root = "..";
include_once($path_to_root . "/includes/ui/allocation_cart.inc");
include_once($path_to_root . "/includes/session.inc");
include_once($path_to_root . "/includes/date_functions.inc");
include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/includes/banking.inc");
include_once($path_to_root . "/includes/data_checks.inc");
include_once($path_to_root . "/sales/includes/sales_db.inc");
//include_once($path_to_root . "/sales/includes/ui/cust_alloc_ui.inc");
include_once($path_to_root . "/reporting/includes/reporting.inc");

$js = "";
if ($use_popup_windows) {
	$js .= get_js_open_window(900, 500);
}
if ($use_date_picker) {
	$js .= get_js_date_picker();
}
add_js_file('payalloc.js');

page(_($help_context = "Customer Payment Entry"), false, false, "", $js);

//----------------------------------------------------------------------------------------------

check_db_has_customers(_("There are no customers defined in the system."));

check_db_has_bank_accounts(_("There are no bank accounts defined in the system."));

//----------------------------------------------------------------------------------------
if (isset($_GET['customer_id']))
{
	$_POST['customer_id'] = $_GET['customer_id'];
}

if (!isset($_POST['bank_account']))
{ // first page call
	$_SESSION['alloc'] = new allocation(ST_CUSTPAYMENT,0);

	if (isset($_GET['SInvoice'])) {
		//  get date and supplier
		$inv = get_customer_trans($_GET['SInvoice'], ST_SALESINVOICE);
		if($inv) {
			$_POST['customer_id'] = $inv['debtor_no'];
			$_POST['DateBanked'] = sql2date($inv['tran_date']);
			foreach($_SESSION['alloc']->allocs as $line => $trans) {
				if ($trans->type == ST_SALESINVOICE && $trans->type_no == $_GET['SInvoice']) {
					$_POST['amount'] =
						$_SESSION['alloc']->amount = price_format($_SESSION['alloc']->allocs[$line]->amount);
					$_SESSION['alloc']->allocs[$line]->current_allocated =
						$_SESSION['alloc']->allocs[$line]->amount;
					break;
				}
			}
			unset($inv);
		} else
			display_error(_("Invalid sales invoice number."));
	}
}

if (list_updated('BranchID')) {
	// when branch is selected via external editor also customer can change
	$br = get_branch(get_post('BranchID'));
	$_POST['customer_id'] = $br['debtor_no'];
	$Ajax->activate('customer_id');
}

if (!isset($_POST['customer_id']))
	$_POST['customer_id'] = get_global_customer(false);
if (!isset($_POST['DateBanked'])) {
	$_POST['DateBanked'] = new_doc_date();
	if (!is_date_in_fiscalyear($_POST['DateBanked'])) {
		$_POST['DateBanked'] = end_fiscalyear();
	}
}


if (isset($_GET['AddedID'])) {
	$payment_no = $_GET['AddedID'];

	display_notification_centered(_("The customer payment has been successfully entered."));

	submenu_print(_("&Print This Receipt"), ST_CUSTPAYMENT, $payment_no."-".ST_CUSTPAYMENT, 'prtopt');

	display_note(get_gl_view_str(ST_CUSTPAYMENT, $payment_no, _("&View the GL Journal Entries for this Customer Payment")));

//	hyperlink_params($path_to_root . "/sales/allocations/customer_allocate.php", _("&Allocate this Customer Payment"), "trans_no=$payment_no&trans_type=12");

	hyperlink_no_params($path_to_root . "/sales/customer_payments.php", _("Enter Another &Customer Payment"));
	
	display_footer_exit();
}
elseif (isset($_GET['UpdatedID'])) {
	$payment_no = $_GET['UpdatedID'];

	display_notification_centered(_("The customer payment has been successfully updated."));

	submenu_print(_("&Print This Receipt"), ST_CUSTPAYMENT, $payment_no."-".ST_CUSTPAYMENT, 'prtopt');

	display_note(get_gl_view_str(ST_CUSTPAYMENT, $payment_no, _("&View the GL Journal Entries for this Customer Payment")));

//	hyperlink_params($path_to_root . "/sales/allocations/customer_allocate.php", _("&Allocate this Customer Payment"), "trans_no=$payment_no&trans_type=12");

	hyperlink_no_params($path_to_root . "/sales/customer_payments.php", _("Enter Another &Customer Payment"));
	
	display_footer_exit();
}

//----------------------------------------------------------------------------------------------

function can_process()
{
	global $Refs;

	if (!get_post('customer_id'))
	{
		display_error(_("There is no customer selected."));
		set_focus('customer_id');
		return false;
	} 
	
	if (!get_post('BranchID')) 
	{
		display_error(_("This customer has no branch defined."));
		set_focus('BranchID');
		return false;
	} 
	
	if (!isset($_POST['DateBanked']) || !is_date($_POST['DateBanked'])) {
		display_error(_("The entered date is invalid. Please enter a valid date for the payment."));
		set_focus('DateBanked');
		return false;
	} elseif (!is_date_in_fiscalyear($_POST['DateBanked'])) {
		display_error(_("The entered date is not in fiscal year."));
		set_focus('DateBanked');
		return false;
	}

	if (!$Refs->is_valid($_POST['ref'])) {
		display_error(_("You must enter a reference."));
		set_focus('ref');
		return false;
	}

	//Chaitanya : 13-OCT-2011 - To support Edit feature
	if (isset($_POST['trans_no']) && $_POST['trans_no'] == 0 && (!is_new_reference($_POST['ref'], ST_CUSTPAYMENT))) {
		display_error(_("The entered reference is already in use."));
		set_focus('ref');
		return false;
	}
	//Avoid duplicate reference while modifying
	elseif ($_POST['ref'] != $_POST['old_ref'] && !is_new_reference($_POST['ref'], ST_CUSTPAYMENT))
	{
		display_error( _("The entered reference is already in use."));
		set_focus('ref');
		return false;
	}

	if (!check_num('amount', 0)) {
		display_error(_("The entered amount is invalid or negative and cannot be processed."));
		set_focus('amount');
		return false;
	}

	if (isset($_POST['charge']) && !check_num('charge', 0)) {
		display_error(_("The entered amount is invalid or negative and cannot be processed."));
		set_focus('charge');
		return false;
	}
	if (isset($_POST['charge']) && input_num('charge') > 0) {
		$charge_acct = get_company_pref('bank_charge_act');
		if (get_gl_account($charge_acct) == false) {
			display_error(_("The Bank Charge Account has not been set in System and General GL Setup."));
			set_focus('charge');
			return false;
		}	
	}

	if (isset($_POST['_ex_rate']) && !check_num('_ex_rate', 0.000001))
	{
		display_error(_("The exchange rate must be numeric and greater than zero."));
		set_focus('_ex_rate');
		return false;
	}

	if ($_POST['discount'] == "") 
	{
		$_POST['discount'] = 0;
	}

	if (!check_num('discount')) {
		display_error(_("The entered discount is not a valid number."));
		set_focus('discount');
		return false;
	}

	//if ((input_num('amount') - input_num('discount') <= 0)) {
	if (input_num('amount') <= 0) {
		display_error(_("The balance of the amount and discout is zero or negative. Please enter valid amounts."));
		set_focus('discount');
		return false;
	}

	$_SESSION['alloc']->amount = input_num('amount');

	if (isset($_POST["TotalNumberOfAllocs"]))
		return check_allocations();
	else
		return true;
}

//----------------------------------------------------------------------------------------------

// validate inputs
if (isset($_POST['AddPaymentItem'])) {

	if (!can_process()) {
		unset($_POST['AddPaymentItem']);
	}
}
if (isset($_POST['_customer_id_button'])) {
//	unset($_POST['branch_id']);
	$Ajax->activate('BranchID');
}
if (isset($_POST['_DateBanked_changed'])) {
  $Ajax->activate('_ex_rate');
}

//Chaitanya : 13-OCT-2011 - To support Edit feature
if (isset($_POST['ref']) && $_SESSION['alloc']->trans_no == 0) // added by Joe to fix the browser back button
{
	$tno = get_customer_trans_from_ref(ST_CUSTPAYMENT, $_POST['ref']);
	if ($tno != false)
	{
		display_error( _("The entered reference is already in use."));
		display_footer_exit();
	}
}		
$new = $_SESSION['alloc']->trans_no == 0;

if (list_updated('customer_id') || ($new && list_updated('bank_account'))) {
  $_SESSION['alloc']->read();
  $_POST['memo_'] = $_POST['amount'] = $_POST['discount'] = '';
  $Ajax->activate('alloc_tbl');
}
//----------------------------------------------------------------------------------------------

if (isset($_POST['AddPaymentItem'])) {
	
	$cust_currency = get_customer_currency($_POST['customer_id']);
	$bank_currency = get_bank_account_currency($_POST['bank_account']);
	$comp_currency = get_company_currency();
	if ($comp_currency != $bank_currency && $bank_currency != $cust_currency)
		$rate = 0;
	else
		$rate = input_num('_ex_rate');

	new_doc_date($_POST['DateBanked']);

	//Chaitanya : 13-OCT-2011 - To support Edit feature
	$payment_no = write_customer_payment($_SESSION['alloc']->trans_no, $_POST['customer_id'], $_POST['BranchID'],
		$_POST['bank_account'], $_POST['DateBanked'], $_POST['ref'],
		input_num('amount'), input_num('discount'), $_POST['memo_'], $rate, input_num('charge'));

	$_SESSION['alloc']->trans_no = $payment_no;
	$_SESSION['alloc']->write();
	
	unset($_POST);
	unset($_SESSION);

	//Chaitanya : 13-OCT-2011 - To support Edit feature
	//meta_forward($_SERVER['PHP_SELF'], "AddedID=$payment_no");
	meta_forward($_SERVER['PHP_SELF'], $new ? "AddedID=$payment_no" : "UpdatedID=$payment_no");
}

//----------------------------------------------------------------------------------------------

function read_customer_data()
{
	global $Refs, $new;

	$myrow = get_customer_habit($_POST['customer_id']);

	$_POST['HoldAccount'] = $myrow["dissallow_invoices"];
	$_POST['pymt_discount'] = $myrow["pymt_discount"];
	//Chaitanya : 13-OCT-2011 - To support Edit feature
	//If page is called first time and New entry fetch the nex reference number
	if ($new && !isset($_POST['charge'])) 
		$_POST['ref'] = $Refs->get_next(ST_CUSTPAYMENT);
}

//----------------------------------------------------------------------------------------------
$new = 1;
$old_ref = 0;

//Chaitanya : 13-OCT-2011 - To support Edit feature
if (isset($_GET['trans_no']) && $_GET['trans_no'] > 0 )
	$_POST['trans_no'] = $_GET['trans_no'];
//Read data
if (isset($_POST['trans_no']) && $_POST['trans_no'] > 0 )
{	
	$new = 0;
	$myrow = get_customer_trans($_POST['trans_no'], ST_CUSTPAYMENT);
	$_POST['customer_id'] = $myrow["debtor_no"];
	$_POST['customer_name'] = $myrow["DebtorName"];
	$_POST['BranchID'] = $myrow["branch_code"];
	$_POST['bank_account'] = $myrow["bank_act"];
	$_POST['ref'] =  $myrow["reference"];
	$old_ref = $myrow["reference"];
	//$_POST['charge'] =  $myrow[""];
	$_POST['DateBanked'] =  sql2date($myrow['tran_date']);
	$_POST["amount"] = price_format($myrow['Total'] - $myrow['ov_discount']);
	$_POST["discount"] = price_format($myrow['ov_discount']);
	$_POST["memo_"] = get_comments_string(ST_CUSTPAYMENT,$_POST['trans_no']);
}
else
	$_POST['trans_no'] = 0;

//----------------------------------------------------------------------------------------------

start_form();

	hidden('trans_no', $_POST['trans_no']);
	hidden('old_ref', $old_ref);

	start_outer_table(TABLESTYLE2, "width=60%", 5);
	table_section(1);

	if ($new)
		customer_list_row(_("From Customer:"), 'customer_id', null, false, true);
	else {
		label_cells(_("From Customer:"), $_POST['customer_name'], "class='label'");
		hidden('customer_id', $_POST['customer_id']);
	}

	if (!isset($_POST['charge'])) // first page call
	{
		//Prepare allocation cart 
		if (isset($_POST['trans_no']) && $_POST['trans_no'] > 0 )
			$_SESSION['alloc'] = new allocation(ST_CUSTPAYMENT,$_POST['trans_no']);
		else
		{
			$_SESSION['alloc'] = new allocation(ST_CUSTPAYMENT,0);
			$Ajax->activate('alloc_tbl');
		}
	}
	
	if (db_customer_has_branches($_POST['customer_id'])) {
		customer_branches_list_row(_("Branch:"), $_POST['customer_id'], 'BranchID', null, false, true, true);
	} else {
		hidden('BranchID', ANY_NUMERIC);
	}

	read_customer_data();

	set_global_customer($_POST['customer_id']);
	if (isset($_POST['HoldAccount']) && $_POST['HoldAccount'] != 0)	{
		end_outer_table();
		display_error(_("This customer account is on hold."));
	} else {
		$display_discount_percent = percent_format($_POST['pymt_discount']*100) . "%";

		table_section(2);
		if (!list_updated('bank_account'))
			$_POST['bank_account'] = get_default_customer_bank_account($_POST['customer_id']);	
			
		//Chaitanya : 13-OCT-2011 - Is AJAX call really needed ???
		//bank_accounts_list_row(_("Into Bank Account:"), 'bank_account', null, true);
		bank_accounts_list_row(_("Into Bank Account:"), 'bank_account', null, false);

		text_row(_("Reference:"), 'ref', null, 20, 40);

		table_section(3);

		date_row(_("Date of Deposit:"), 'DateBanked', '', true, 0, 0, 0, null, true);

		$comp_currency = get_company_currency();
		$cust_currency = get_customer_currency($_POST['customer_id']);
		$bank_currency = get_bank_account_currency($_POST['bank_account']);

		if ($cust_currency != $bank_currency) {
			exchange_rate_display($bank_currency, $cust_currency, $_POST['DateBanked'], ($bank_currency == $comp_currency));
		}

		amount_row(_("Bank Charge:"), 'charge');

		end_outer_table(1);

		if ($cust_currency == $bank_currency) {
	  		div_start('alloc_tbl');
			show_allocatable(false);
			div_end();
		}

		start_table(TABLESTYLE, "width=60%");

		label_row(_("Customer prompt payment discount :"), $display_discount_percent);
		amount_row(_("Amount of Discount:"), 'discount');

		amount_row(_("Amount:"), 'amount');

		textarea_row(_("Memo:"), 'memo_', null, 22, 4);
		end_table(1);

		if ($cust_currency != $bank_currency)
			display_note(_("Amount and discount are in customer's currency."));

		br();

		if (isset($_POST['trans_no']) && $_POST['trans_no'] > 0 )
			submit_center('AddPaymentItem', _("Update Payment"), true, '', 'default');
		else
			submit_center('AddPaymentItem', _("Add Payment"), true, '', 'default');
	}

	br();

end_form();
end_page();
?>
