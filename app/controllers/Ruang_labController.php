<?php 
/**
 * Ruang_lab Page Controller
 * @category  Controller
 */
class Ruang_labController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "ruang_lab";
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
		$fields = array("id_lab", 
			"jenis_prasarana", 
			"kode_ruang", 
			"nama_ruang", 
			"registrasi_ruang", 
			"Lantai_ke", 
			"panjang", 
			"lebar", 
			"luas", 
			"kapasitas", 
			"luas_plester", 
			"luas_plafon", 
			"luas_dinding", 
			"luas_daun_jendela", 
			"luas_daun_pintu", 
			"panjang_kusen", 
			"luas_tutup_lantai", 
			"luas_instalasi_listrik", 
			"jml_instalasi_listrik", 
			"panjang_instalasi_air", 
			"jml_instalasi_air", 
			"panjang_drainase", 
			"luas_finish_struktur", 
			"luas_finish_plafon", 
			"luas_finish_dinding");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				ruang_lab.id_lab LIKE ? OR 
				ruang_lab.jenis_prasarana LIKE ? OR 
				ruang_lab.kode_ruang LIKE ? OR 
				ruang_lab.nama_ruang LIKE ? OR 
				ruang_lab.registrasi_ruang LIKE ? OR 
				ruang_lab.Lantai_ke LIKE ? OR 
				ruang_lab.panjang LIKE ? OR 
				ruang_lab.lebar LIKE ? OR 
				ruang_lab.luas LIKE ? OR 
				ruang_lab.kapasitas LIKE ? OR 
				ruang_lab.luas_plester LIKE ? OR 
				ruang_lab.luas_plafon LIKE ? OR 
				ruang_lab.luas_dinding LIKE ? OR 
				ruang_lab.luas_daun_jendela LIKE ? OR 
				ruang_lab.luas_daun_pintu LIKE ? OR 
				ruang_lab.panjang_kusen LIKE ? OR 
				ruang_lab.luas_tutup_lantai LIKE ? OR 
				ruang_lab.luas_instalasi_listrik LIKE ? OR 
				ruang_lab.jml_instalasi_listrik LIKE ? OR 
				ruang_lab.panjang_instalasi_air LIKE ? OR 
				ruang_lab.jml_instalasi_air LIKE ? OR 
				ruang_lab.panjang_drainase LIKE ? OR 
				ruang_lab.luas_finish_struktur LIKE ? OR 
				ruang_lab.luas_finish_plafon LIKE ? OR 
				ruang_lab.luas_finish_dinding LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "ruang_lab/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("ruang_lab.id_lab", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Ruang Lab";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("ruang_lab/list.php", $data); //render the full page
	}
	/**
     * Load csv data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv'))){
				$this->set_flash_msg("File format not supported", "danger");
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
					$data = $db->loadCsvData( $file_path , $options , false );
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg("Data imported successfully", "success");
					}
				}
				else{
					$this->set_flash_msg("Error uploading file", "danger");
				}
			}
		}
		else{
			$this->set_flash_msg("No file selected for upload", "warning");
		}
		$this->redirect("ruang_lab");
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
		$fields = array("id_lab", 
			"jenis_prasarana", 
			"kode_ruang", 
			"nama_ruang", 
			"registrasi_ruang", 
			"Lantai_ke", 
			"panjang", 
			"lebar", 
			"luas", 
			"kapasitas", 
			"luas_plester", 
			"luas_plafon", 
			"luas_dinding", 
			"luas_daun_jendela", 
			"luas_daun_pintu", 
			"panjang_kusen", 
			"luas_tutup_lantai", 
			"luas_instalasi_listrik", 
			"jml_instalasi_listrik", 
			"panjang_instalasi_air", 
			"jml_instalasi_air", 
			"panjang_drainase", 
			"luas_finish_struktur", 
			"luas_finish_plafon", 
			"luas_finish_dinding");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("ruang_lab.id_lab", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$this->write_to_log("view", "true");
			$page_title = $this->view->page_title = "View  Ruang Lab";
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
		return $this->render_view("ruang_lab/view.php", $record);
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
			$fields = $this->fields = array("jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","panjang","lebar","luas","kapasitas","luas_plester","luas_plafon","luas_dinding","luas_daun_jendela","luas_daun_pintu","panjang_kusen","luas_tutup_lantai","luas_instalasi_listrik","jml_instalasi_listrik","panjang_instalasi_air","jml_instalasi_air","panjang_drainase","luas_finish_struktur","luas_finish_plafon","luas_finish_dinding");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'kode_ruang' => 'required',
				'nama_ruang' => 'required',
				'Lantai_ke' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'luas_plester' => 'sanitize_string',
				'luas_plafon' => 'sanitize_string',
				'luas_dinding' => 'sanitize_string',
				'luas_daun_jendela' => 'sanitize_string',
				'luas_daun_pintu' => 'sanitize_string',
				'panjang_kusen' => 'sanitize_string',
				'luas_tutup_lantai' => 'sanitize_string',
				'luas_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'panjang_instalasi_air' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_drainase' => 'sanitize_string',
				'luas_finish_struktur' => 'sanitize_string',
				'luas_finish_plafon' => 'sanitize_string',
				'luas_finish_dinding' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->write_to_log("add", "true");
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("ruang_lab");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Ruang Lab";
		$this->render_view("ruang_lab/add.php");
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
		$fields = $this->fields = array("id_lab","jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","panjang","lebar","luas","kapasitas","luas_plester","luas_plafon","luas_dinding","luas_daun_jendela","luas_daun_pintu","panjang_kusen","luas_tutup_lantai","luas_instalasi_listrik","jml_instalasi_listrik","panjang_instalasi_air","jml_instalasi_air","panjang_drainase","luas_finish_struktur","luas_finish_plafon","luas_finish_dinding");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'kode_ruang' => 'required',
				'nama_ruang' => 'required',
				'Lantai_ke' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'luas_plester' => 'sanitize_string',
				'luas_plafon' => 'sanitize_string',
				'luas_dinding' => 'sanitize_string',
				'luas_daun_jendela' => 'sanitize_string',
				'luas_daun_pintu' => 'sanitize_string',
				'panjang_kusen' => 'sanitize_string',
				'luas_tutup_lantai' => 'sanitize_string',
				'luas_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'panjang_instalasi_air' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_drainase' => 'sanitize_string',
				'luas_finish_struktur' => 'sanitize_string',
				'luas_finish_plafon' => 'sanitize_string',
				'luas_finish_dinding' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("ruang_lab.id_lab", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("ruang_lab");
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
						return	$this->redirect("ruang_lab");
					}
				}
			}
		}
		$db->where("ruang_lab.id_lab", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Ruang Lab";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("ruang_lab/edit.php", $data);
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
		$fields = $this->fields = array("id_lab","jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","panjang","lebar","luas","kapasitas","luas_plester","luas_plafon","luas_dinding","luas_daun_jendela","luas_daun_pintu","panjang_kusen","luas_tutup_lantai","luas_instalasi_listrik","jml_instalasi_listrik","panjang_instalasi_air","jml_instalasi_air","panjang_drainase","luas_finish_struktur","luas_finish_plafon","luas_finish_dinding");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'kode_ruang' => 'required',
				'nama_ruang' => 'required',
				'Lantai_ke' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'luas_plester' => 'sanitize_string',
				'luas_plafon' => 'sanitize_string',
				'luas_dinding' => 'sanitize_string',
				'luas_daun_jendela' => 'sanitize_string',
				'luas_daun_pintu' => 'sanitize_string',
				'panjang_kusen' => 'sanitize_string',
				'luas_tutup_lantai' => 'sanitize_string',
				'luas_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'panjang_instalasi_air' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_drainase' => 'sanitize_string',
				'luas_finish_struktur' => 'sanitize_string',
				'luas_finish_plafon' => 'sanitize_string',
				'luas_finish_dinding' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("ruang_lab.id_lab", $rec_id);;
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
		$db->where("ruang_lab.id_lab", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->write_to_log("delete", "true");
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("ruang_lab");
	}
}
