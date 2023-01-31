<?php 
/**
 * Alat Page Controller
 * @category  Controller
 */
class AlatController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "alat";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id_alat", 
			"Ruang", 
			"jenis_sarana", 
			"nama", 
			"Spesifikasi", 
			"kepemilikan", 
			"peminjam_yang_meminjamkan", 
			"jumlah_total", 
			"jumlah_laik", 
			"jumlah_rusak");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				alat.id_alat LIKE ? OR 
				alat.Ruang LIKE ? OR 
				alat.jenis_sarana LIKE ? OR 
				alat.nama LIKE ? OR 
				alat.Spesifikasi LIKE ? OR 
				alat.kepemilikan LIKE ? OR 
				alat.peminjam_yang_meminjamkan LIKE ? OR 
				alat.jumlah_total LIKE ? OR 
				alat.jumlah_laik LIKE ? OR 
				alat.jumlah_rusak LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "alat/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("alat.id_alat", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Alat";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("alat/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id_alat", 
			"Ruang", 
			"jenis_sarana", 
			"nama", 
			"Spesifikasi", 
			"kepemilikan", 
			"peminjam_yang_meminjamkan", 
			"jumlah_total", 
			"jumlah_laik", 
			"jumlah_rusak");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("alat.id_alat", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$this->write_to_log("view", "true");
			$page_title = $this->view->page_title = "View  Alat";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("alat/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("Ruang","jenis_sarana","nama","Spesifikasi","kepemilikan","peminjam_yang_meminjamkan","jumlah_total","jumlah_laik","jumlah_rusak");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Ruang' => 'required',
				'jenis_sarana' => 'required',
				'nama' => 'required',
				'Spesifikasi' => 'required',
				'kepemilikan' => 'required',
				'peminjam_yang_meminjamkan' => 'required',
				'jumlah_total' => 'required',
				'jumlah_laik' => 'required',
				'jumlah_rusak' => 'required',
			);
			$this->sanitize_array = array(
				'Ruang' => 'sanitize_string',
				'jenis_sarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'Spesifikasi' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'peminjam_yang_meminjamkan' => 'sanitize_string',
				'jumlah_total' => 'sanitize_string',
				'jumlah_laik' => 'sanitize_string',
				'jumlah_rusak' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->write_to_log("add", "true");
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("alat");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Alat";
		$this->render_view("alat/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id_alat","Ruang","jenis_sarana","nama","Spesifikasi","kepemilikan","peminjam_yang_meminjamkan","jumlah_total","jumlah_laik","jumlah_rusak");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Ruang' => 'required',
				'jenis_sarana' => 'required',
				'nama' => 'required',
				'Spesifikasi' => 'required',
				'kepemilikan' => 'required',
				'peminjam_yang_meminjamkan' => 'required',
				'jumlah_total' => 'required',
				'jumlah_laik' => 'required',
				'jumlah_rusak' => 'required',
			);
			$this->sanitize_array = array(
				'Ruang' => 'sanitize_string',
				'jenis_sarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'Spesifikasi' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'peminjam_yang_meminjamkan' => 'sanitize_string',
				'jumlah_total' => 'sanitize_string',
				'jumlah_laik' => 'sanitize_string',
				'jumlah_rusak' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("alat.id_alat", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("alat");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("alat");
					}
				}
			}
		}
		$db->where("alat.id_alat", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Alat";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("alat/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id_alat","Ruang","jenis_sarana","nama","Spesifikasi","kepemilikan","peminjam_yang_meminjamkan","jumlah_total","jumlah_laik","jumlah_rusak");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Ruang' => 'required',
				'jenis_sarana' => 'required',
				'nama' => 'required',
				'Spesifikasi' => 'required',
				'kepemilikan' => 'required',
				'peminjam_yang_meminjamkan' => 'required',
				'jumlah_total' => 'required',
				'jumlah_laik' => 'required',
				'jumlah_rusak' => 'required',
			);
			$this->sanitize_array = array(
				'Ruang' => 'sanitize_string',
				'jenis_sarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'Spesifikasi' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'peminjam_yang_meminjamkan' => 'sanitize_string',
				'jumlah_total' => 'sanitize_string',
				'jumlah_laik' => 'sanitize_string',
				'jumlah_rusak' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("alat.id_alat", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("alat.id_alat", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->write_to_log("delete", "true");
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("alat");
	}
}
