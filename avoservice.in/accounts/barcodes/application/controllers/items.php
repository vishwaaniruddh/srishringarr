<?php
require_once ("secure_area.php");
require_once ("interfaces/idata_controller.php");
class Items extends Secure_area implements iData_controller
{
	function __construct()
	{
		parent::__construct('items');
	}

	function index()
	{
		$data['controller_name']=strtolower($this->uri->segment(1));
		$data['form_width']=$this->get_form_width();
		$data['manage_table']=get_items_manage_table($this->Item->get_all(),$this);
		$this->load->view('items/manage',$data);
	}

	function find_item_info()
	{
		$item_number=$this->input->post('scan_item_number');
		echo json_encode($this->Item->find_item_info($item_number));
	}

	function search()
	{
		$search=$this->input->post('search');
		$data_rows=get_items_manage_table_data_rows($this->Item->search($search),$this);
		echo $data_rows;
	}

	/*
	Gives search suggestions based on what is being searched for
	*/
	function suggest()
	{
		$suggestions = $this->Item->get_search_suggestions($this->input->post('q'),$this->input->post('limit'));
		echo implode("\n",$suggestions);
	}

	/*
	Gives search suggestions based on what is being searched for
	*/
	function suggest_category()
	{
		$suggestions = $this->Item->get_category_suggestions($this->input->post('q'));
		echo implode("\n",$suggestions);
	}

	function get_row()
	{
		$item_id = $this->input->post('row_id');
		$data_row=get_item_data_row($this->Item->get_info($item_id),$this);
		echo $data_row;
	}

	function view($item_id=-1)
	{
		$data['item_info']=$this->Item->get_info($item_id);
		$data['item_tax_info']=$this->Item_taxes->get_info($item_id);
		$suppliers = array('' => $this->lang->line('items_none'));
		foreach($this->Supplier->get_all()->result_array() as $row)
		{
			$suppliers[$row['person_id']] = $row['company_name'] .' ('.$row['first_name'] .' '. $row['last_name'].')';
		}

		$data['suppliers']=$suppliers;
		$data['selected_supplier'] = $this->Item->get_info($item_id)->supplier_id;
		$data['default_tax_1_rate']=($item_id==-1) ? $this->Appconfig->get('default_tax_1_rate') : '';
		$data['default_tax_2_rate']=($item_id==-1) ? $this->Appconfig->get('default_tax_2_rate') : '';
		$this->load->view("items/form",$data);
	}

	function generate_barcodes($item_ids)
	{
		$result = array();

		$item_ids = explode(',', $item_ids);
		foreach ($item_ids as $item_id)
		{
			$item_info = $this->Item->get_info($item_id);

			$result[] = array('name' =>$item_info->name, 'id'=> $item_id);
		}

		$data['items'] = $result;
		$this->load->view("barcode_sheet", $data);
	}

	function bulk_edit()
	{
		$data = array();
		$suppliers = array('' => $this->lang->line('items_none'));
		foreach($this->Supplier->get_all()->result_array() as $row)
		{
			$suppliers[$row['person_id']] = $row['first_name'] .' '. $row['last_name'];
		}
		$data['suppliers'] = $suppliers;
		$this->load->view("items/form_bulk", $data);
	}

	function save($item_id=-1)
	{
		$item_data = array(
		'name'=>$this->input->post('name'),
		'description'=>$this->input->post('description'),
		'category'=>$this->input->post('category'),
		'supplier_id'=>$this->input->post('supplier_id')=='' ? null:$this->input->post('supplier_id'),
		'item_number'=>$this->input->post('item_number')=='' ? null:$this->input->post('item_number'),
		'cost_price'=>$this->input->post('cost_price'),
		'unit_price'=>$this->input->post('unit_price'),
		'quantity'=>$this->input->post('quantity'),
		'reorder_level'=>$this->input->post('reorder_level'),
		'allow_alt_description'=>$this->input->post('allow_alt_description'),
		'is_serialized'=>$this->input->post('is_serialized')
		);

		if($this->Item->save($item_data,$item_id))
		{
			//New item
			if($item_id==-1)
			{
				echo json_encode(array('success'=>true,'message'=>$this->lang->line('items_successful_adding').' '.
				$item_data['name'],'item_id'=>$item_data['item_id']));
				$item_id = $item_data['item_id'];
			}
			else //previous item
			{
				echo json_encode(array('success'=>true,'message'=>$this->lang->line('items_successful_updating').' '.
				$item_data['name'],'item_id'=>$item_id));
			}

			$items_taxes_data = array();
			$tax_names = $this->input->post('tax_names');
			$tax_percents = $this->input->post('tax_percents');
			for($k=0;$k<count($tax_percents);$k++)
			{
				if (is_numeric($tax_percents[$k]))
				{
					$items_taxes_data[] = array('name'=>$tax_names[$k], 'percent'=>$tax_percents[$k] );
				}
			}
			$this->Item_taxes->save($items_taxes_data, $item_id);
		}
		else//failure
		{
			echo json_encode(array('success'=>false,'message'=>$this->lang->line('items_error_adding_updating').' '.
			$item_data['name'],'item_id'=>-1));
		}

	}

	function bulk_update()
	{
		$items_to_update=$this->input->post('item_ids');
		$item_data = array();

		foreach($_POST as $key=>$value)
		{
			//This field is nullable, so treat it differently
			if ($key == 'supplier_id')
			{
				$item_data["$key"]=$value == '' ? null : $value;
			}
			elseif($value!='' and !(in_array($key, array('item_ids', 'tax_names', 'tax_percents'))))
			{
				$item_data["$key"]=$value;
			}
		}

		//Item data could be empty if tax information is being updated
		if(empty($item_data) || $this->Item->update_multiple($item_data,$items_to_update))
		{
			$items_taxes_data = array();
			$tax_names = $this->input->post('tax_names');
			$tax_percents = $this->input->post('tax_percents');
			for($k=0;$k<count($tax_percents);$k++)
			{
				if (is_numeric($tax_percents[$k]))
				{
					$items_taxes_data[] = array('name'=>$tax_names[$k], 'percent'=>$tax_percents[$k] );
				}
			}
			$this->Item_taxes->save_multiple($items_taxes_data, $items_to_update);

			echo json_encode(array('success'=>true,'message'=>$this->lang->line('items_successful_bulk_edit')));
		}
		else
		{
			echo json_encode(array('success'=>false,'message'=>$this->lang->line('items_error_updating_multiple')));
		}
	}

	function delete()
	{
		$items_to_delete=$this->input->post('ids');

		if($this->Item->delete_list($items_to_delete))
		{
			echo json_encode(array('success'=>true,'message'=>$this->lang->line('items_successful_deleted').' '.
			count($items_to_delete).' '.$this->lang->line('items_one_or_multiple')));
		}
		else
		{
			echo json_encode(array('success'=>false,'message'=>$this->lang->line('items_cannot_be_deleted')));
		}
	}

	/**
	 * Display form: Import data from an excel file
	 * @author: Nguyen OJB
	 * @since: 10.1
	 */
	function excel_import()
	{
		$this->load->view("items/excel_import", null);
	}

	/**
	 * Read data from excel file -> save it to databse
	 * @author: Nguyen OJB
	 * @since: 10.1
	 */
	function do_excel_import()
	{
		$msg = "do_excel_import";
		$failCodes = null;
		$successCode = null;
		if ($_FILES['file_path']['error']!=UPLOAD_ERR_OK)
		{
			$msg = $this->lang->line('items_excel_import_failed');
			echo json_encode( array('success'=>false,'message'=>$msg) );
			return ;
		}
		else
		{
			$this->load->library('spreadsheetexcelreader');
			$this->spreadsheetexcelreader->store_extended_info = false;
			$success = $this->spreadsheetexcelreader->read($_FILES['file_path']['tmp_name']);

			$rowCount = $this->spreadsheetexcelreader->rowcount(0);
			if($rowCount > 2){
				for($i = 3; $i<=$rowCount; $i++){
					$item_code = $this->spreadsheetexcelreader->val($i, 'A');
					$item_id = $this->Item->get_item_id($item_code);
					$item_data = array(
					'name'			=>	$this->spreadsheetexcelreader->val($i, 'B'),
					'description'	=>	$this->spreadsheetexcelreader->val($i, 'K'),
					'category'		=>	$this->spreadsheetexcelreader->val($i, 'C'),
					//'supplier_id'	=>	null,
					'item_number'	=>	$this->spreadsheetexcelreader->val($i, 'A'),
					'cost_price'	=>	$this->spreadsheetexcelreader->val($i, 'E'),
					'unit_price'	=>	$this->spreadsheetexcelreader->val($i, 'F'),
					'quantity'		=>	$this->spreadsheetexcelreader->val($i, 'I'),
					'reorder_level'	=>	$this->spreadsheetexcelreader->val($i, 'J')
					);

					if($this->Item->save($item_data,$item_id)) {
						$items_taxes_data = null;
						//tax 1
						if( is_numeric($this->spreadsheetexcelreader->val($i, 'G')) ){
							$items_taxes_data[] = array('name'=>'Sales Tax 1', 'percent'=>$this->spreadsheetexcelreader->val($i, 'G') );
						}

						//taxt 2
						if( is_numeric($this->spreadsheetexcelreader->val($i, 'H')) ){
							$items_taxes_data[] = array('name'=>'Sales Tax 2', 'percent'=>$this->spreadsheetexcelreader->val($i, 'H') );
						}

						// save tax values
						if(count($items_taxes_data) > 0){
							$this->Item_taxes->save($items_taxes_data, $item_id);
						}
						$successCode[] = $item_code;
					}
					else//insert or update item failure
					{
						$failCodes[] = $item_code ;
					}
				}

			} else {
				// rowCount < 2
				echo json_encode( array('success'=>true,'message'=>'Your upload file has no data or not in supported format.') );
				return;
			}
		}

		$success = true;
		if(count($failCodes) > 1){
			$msg = "Most items imported. But some were not, here is list of their CODE (" .count($failCodes) ."): ".implode(", ", $failCodes);
			$success = false;
		}else{
			$msg = "Import items successful";
		}

		echo json_encode( array('success'=>$success,'message'=>$msg) );
	}

	/*
	get the width for the add/edit form
	*/
	function get_form_width()
	{
		return 360;
	}
}
?>