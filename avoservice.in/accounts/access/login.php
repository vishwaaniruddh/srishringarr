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
	if (!isset($path_to_root) || isset($_GET['path_to_root']) || isset($_POST['path_to_root']))
		die(_("Restricted access"));
	include_once($path_to_root . "/includes/ui.inc");
	include_once($path_to_root . "/includes/page/header.inc");

	$js = "<script language='JavaScript' type='text/javascript'>
function defaultCompany()
{
	document.forms[0].company_login_name.options[".$_SESSION["wa_current_user"]->company."].selected = true;
}
</script>";
	add_js_file('login.js');
	// Display demo user name and password within login form if "$allow_demo_mode" is true
	if ($allow_demo_mode == true)
	{
	    $demo_text = _("Login as user: demouser and password: password");
	}
	else
	{
		$demo_text = _("Please login here");
	}
	if (!isset($def_coy))
		$def_coy = 0;
	$def_theme = "default";

	$login_timeout = $_SESSION["wa_current_user"]->last_act;

	$title = $login_timeout ? _('Authorization timeout') : $app_title." ".$version." - "._("Login");
	$encoding = isset($_SESSION['language']->encoding) ? $_SESSION['language']->encoding : "iso-8859-1";
	$rtl = isset($_SESSION['language']->dir) ? $_SESSION['language']->dir : "ltr";
	$onload = !$login_timeout ? "onload='defaultCompany()'" : "";

	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n";
	echo "<html dir='$rtl' >\n";
	echo "<head><title>$title</title>\n";
   	echo "<meta http-equiv='Content-type' content='text/html; charset=$encoding' />\n";
	echo "<link href='$path_to_root/themes/$def_theme/default.css' rel='stylesheet' type='text/css'> \n";
	send_scripts();
	if (!$login_timeout)
	{
		echo $js;
	}
	echo "</head>\n";

	echo "<body id='loginscreen' $onload>\n";

	echo "<table class='titletext'><tr><td>$title</td></tr></table>\n";
	
	div_start('_page_body');
	br();br();
	start_form(false, false, $_SESSION['timeout']['uri'], "loginform");
	start_table(false, "class='login'");
	start_row();
	echo "<td align='center' colspan=2>";
	if (!$login_timeout) { // FA logo
    	echo "<a target='_blank' href='$power_url'><!--<img src='$path_to_root/themes/$def_theme/images/logo_frontaccounting1.png' alt='MyAccounting' height='50' onload='fixPNG(this)' border='0' />--></a>";
	} else { 
		echo "<font size=5>"._('Authorization timeout')."</font>";
	} 
	echo "</td>\n";
	end_row();

	echo "<input type='hidden' id=ui_mode name='ui_mode' value='".$_SESSION["wa_current_user"]->ui_mode."' />\n";
	if (!$login_timeout)
		table_section_title(_("Version")." $version   Build $build_version - "._("Login"));
	$value = $login_timeout ? $_SESSION['wa_current_user']->loginname : ($allow_demo_mode ? "demouser":"");

	text_row(_("User name"), "user_name_entry_field", $value, 20, 30);

	$password = $allow_demo_mode ? "password":"";

	password_row(_("Password:"), 'password', $password);

	if ($login_timeout) {
		hidden('company_login_name', $_SESSION["wa_current_user"]->company);
	} else {
		if (isset($_SESSION['wa_current_user']->company))
			$coy =  $_SESSION['wa_current_user']->company;
		else
			$coy = $def_coy;
		echo "<tr><td>"._("Company")."</td><td><select name='company_login_name'>\n";
		for ($i = 0; $i < count($db_connections); $i++)
			echo "<option value=$i ".($i==$coy ? 'selected':'') .">" . $db_connections[$i]["name"] . "</option>";
		echo "</select>\n";
		start_row();
		label_cell($demo_text, "colspan=2 align='center'");
		end_row();
	}; 
	end_table(1);
	echo "<center><input type='submit' value='&nbsp;&nbsp;"._("Login -->")."&nbsp;&nbsp;' name='SubmitUser'"
		.($login_timeout ? '':" onclick='set_fullmode();'")." /></center>\n";

	foreach($_SESSION['timeout']['post'] as $p => $val) {
		// add all request variables to be resend together with login data
		if (!in_array($p, array('ui_mode', 'user_name_entry_field', 
			'password', 'SubmitUser', 'company_login_name'))) 
			echo "<input type='hidden' name='$p' value='$val'>";
	}
	end_form(1);
	$Ajax->addScript(true, "document.forms[0].password.focus();");

    echo "<script language='JavaScript' type='text/javascript'>
    //<![CDATA[
            <!--
            document.forms[0].user_name_entry_field.select();
            document.forms[0].user_name_entry_field.focus();
            //-->
    //]]>
    </script>";
    div_end();
	echo "<table class='bottomBar'>\n";
	echo "<tr>";
	if (isset($_SESSION['wa_current_user'])) 
		$date = Today() . " | " . Now();
	else	
		$date = date("m/d/Y") . " | " . date("h.i am");
	echo "<td class='bottomBarCell'>$date</td>\n";
	echo "</tr></table>\n";
	echo "<table class='footer'>\n";
	echo "<tr>\n";
	echo "<td><a target='_blank' href='' tabindex='-1'></a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td><a target='_blank' href='' tabindex='-1'></a></td>\n";
	echo "</tr>\n";
	echo "</table><br><br>\n";
	echo "</body></html>\n";

?>