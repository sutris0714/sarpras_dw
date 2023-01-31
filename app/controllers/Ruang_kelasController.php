<?php 
/**
 * Ruang_kelas Page Controller
 * @category  Controller
 */
class Ruang_kelasController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "ruang_kelas";
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
		$fields = array("id_ruangan", 
			"jenis_prasarana", 
			"kode_ruang", 
			"nama_ruang", 
			"registrasi_ruang", 
			"Lantai_ke", 
			"kapasitas", 
			"jml_instalasi_listrik", 
			"jml_instalasi_air", 
			"panjang_m_", 
			"lebar_m_", 
			"luas_ruang_m2_", 
			"luas_plester_m2_", 
			"luas_plafon_m2_", 
			"luas_dinding_m2_", 
			"luas_daun_jendela_m2_", 
			"luas_daun_pintu_m2_", 
			"panjang_kusen_m_", 
			"luas_tutup_lantai_m2_", 
			"luas_instalasi_listrik_m_", 
			"panjang_instalasi_air_m_", 
			"panjang_drainase_m_", 
			"luas_finish_struktur_m2_", 
			"luas_finish_plafon_m2_", 
			"luas_finish_dinding_m2_", 
			"Luas_finish_KPJ_m2_");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				ruang_kelas.id_ruangan LIKE ? OR 
				ruang_kelas.jenis_prasarana LIKE ? OR 
				ruang_kelas.kode_ruang LIKE ? OR 
				ruang_kelas.nama_ruang LIKE ? OR 
				ruang_kelas.registrasi_ruang LIKE ? OR 
				ruang_kelas.Lantai_ke LIKE ? OR 
				ruang_kelas.kapasitas LIKE ? OR 
				ruang_kelas.jml_instalasi_listrik LIKE ? OR 
				ruang_kelas.jml_instalasi_air LIKE ? OR 
				ruang_kelas.panjang_m_ LIKE ? OR 
				ruang_kelas.lebar_m_ LIKE ? OR 
				ruang_kelas.luas_ruang_m2_ LIKE ? OR 
				ruang_kelas.luas_plester_m2_ LIKE ? OR 
				ruang_kelas.luas_plafon_m2_ LIKE ? OR 
				ruang_kelas.luas_dinding_m2_ LIKE ? OR 
				ruang_kelas.luas_daun_jendela_m2_ LIKE ? OR 
				ruang_kelas.luas_daun_pintu_m2_ LIKE ? OR 
				ruang_kelas.panjang_kusen_m_ LIKE ? OR 
				ruang_kelas.luas_tutup_lantai_m2_ LIKE ? OR 
				ruang_kelas.luas_instalasi_listrik_m_ LIKE ? OR 
				ruang_kelas.panjang_instalasi_air_m_ LIKE ? OR 
				ruang_kelas.panjang_drainase_m_ LIKE ? OR 
				ruang_kelas.luas_finish_struktur_m2_ LIKE ? OR 
				ruang_kelas.luas_finish_plafon_m2_ LIKE ? OR 
				ruang_kelas.luas_finish_dinding_m2_ LIKE ? OR 
				ruang_kelas.Luas_finish_KPJ_m2_ LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "ruang_kelas/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("ruang_kelas.id_ruangan", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Ruang Kelas";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("ruang_kelas/list.php", $data); //render the full page
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
		$fields = array("id_ruangan", 
			"jenis_prasarana", 
			"kode_ruang", 
			"nama_ruang", 
			"registrasi_ruang", 
			"Lantai_ke", 
			"kapasitas", 
			"jml_instalasi_listrik", 
			"jml_instalasi_air", 
			"panjang_m_", 
			"lebar_m_", 
			"luas_ruang_m2_", 
			"luas_plester_m2_", 
			"luas_plafon_m2_", 
			"luas_dinding_m2_", 
			"luas_daun_jendela_m2_", 
			"luas_daun_pintu_m2_", 
			"panjang_kusen_m_", 
			"luas_tutup_lantai_m2_", 
			"luas_instalasi_listrik_m_", 
			"panjang_instalasi_air_m_", 
			"panjang_drainase_m_", 
			"luas_finish_struktur_m2_", 
			"luas_finish_plafon_m2_", 
			"luas_finish_dinding_m2_", 
			"Luas_finish_KPJ_m2_");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("ruang_kelas.id_ruangan", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Ruang Kelas";
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
		return $this->render_view("ruang_kelas/view.php", $record);
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
			$fields = $this->fields = array("jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","kapasitas","jml_instalasi_listrik","jml_instalasi_air","panjang_m_","lebar_m_","luas_ruang_m2_","luas_plester_m2_","luas_plafon_m2_","luas_dinding_m2_","luas_daun_jendela_m2_","luas_daun_pintu_m2_","panjang_kusen_m_","luas_tutup_lantai_m2_","luas_instalasi_listrik_m_","panjang_instalasi_air_m_","panjang_drainase_m_","luas_finish_struktur_m2_","luas_finish_plafon_m2_","luas_finish_dinding_m2_","Luas_finish_KPJ_m2_");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'kode_ruang' => 'required',
				'nama_ruang' => 'required',
				'Lantai_ke' => 'required',
				'kapasitas' => 'required',
				'jml_instalasi_listrik' => 'required',
				'jml_instalasi_air' => 'required',
				'panjang_m_' => 'required',
				'lebar_m_' => 'required',
				'luas_ruang_m2_' => 'required',
				'luas_plester_m2_' => 'required',
				'luas_plafon_m2_' => 'required',
				'luas_dinding_m2_' => 'required',
				'luas_daun_jendela_m2_' => 'required',
				'luas_daun_pintu_m2_' => 'required',
				'panjang_kusen_m_' => 'required',
				'luas_tutup_lantai_m2_' => 'required',
				'luas_instalasi_listrik_m_' => 'required',
				'panjang_instalasi_air_m_' => 'required',
				'panjang_drainase_m_' => 'required',
				'luas_finish_struktur_m2_' => 'required',
				'luas_finish_plafon_m2_' => 'required',
				'luas_finish_dinding_m2_' => 'required',
				'Luas_finish_KPJ_m2_' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_m_' => 'sanitize_string',
				'lebar_m_' => 'sanitize_string',
				'luas_ruang_m2_' => 'sanitize_string',
				'luas_plester_m2_' => 'sanitize_string',
				'luas_plafon_m2_' => 'sanitize_string',
				'luas_dinding_m2_' => 'sanitize_string',
				'luas_daun_jendela_m2_' => 'sanitize_string',
				'luas_daun_pintu_m2_' => 'sanitize_string',
				'panjang_kusen_m_' => 'sanitize_string',
				'luas_tutup_lantai_m2_' => 'sanitize_string',
				'luas_instalasi_listrik_m_' => 'sanitize_string',
				'panjang_instalasi_air_m_' => 'sanitize_string',
				'panjang_drainase_m_' => 'sanitize_string',
				'luas_finish_struktur_m2_' => 'sanitize_string',
				'luas_finish_plafon_m2_' => 'sanitize_string',
				'luas_finish_dinding_m2_' => 'sanitize_string',
				'Luas_finish_KPJ_m2_' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("ruang_kelas");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Ruang Kelas";
		$this->render_view("ruang_kelas/add.php");
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
		$fields = $this->fields = array("id_ruangan","jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","kapasitas","jml_instalasi_listrik","jml_instalasi_air","panjang_m_","lebar_m_","luas_ruang_m2_","luas_plester_m2_","luas_plafon_m2_","luas_dinding_m2_","luas_daun_jendela_m2_","luas_daun_pintu_m2_","panjang_kusen_m_","luas_tutup_lantai_m2_","luas_instalasi_listrik_m_","panjang_instalasi_air_m_","panjang_drainase_m_","luas_finish_struktur_m2_","luas_finish_plafon_m2_","luas_finish_dinding_m2_","Luas_finish_KPJ_m2_");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'kode_ruang' => 'required',
				'nama_ruang' => 'required',
				'Lantai_ke' => 'required',
				'kapasitas' => 'required',
				'jml_instalasi_listrik' => 'required',
				'jml_instalasi_air' => 'required',
				'panjang_m_' => 'required',
				'lebar_m_' => 'required',
				'luas_ruang_m2_' => 'required',
				'luas_plester_m2_' => 'required',
				'luas_plafon_m2_' => 'required',
				'luas_dinding_m2_' => 'required',
				'luas_daun_jendela_m2_' => 'required',
				'luas_daun_pintu_m2_' => 'required',
				'panjang_kusen_m_' => 'required',
				'luas_tutup_lantai_m2_' => 'required',
				'luas_instalasi_listrik_m_' => 'required',
				'panjang_instalasi_air_m_' => 'required',
				'panjang_drainase_m_' => 'required',
				'luas_finish_struktur_m2_' => 'required',
				'luas_finish_plafon_m2_' => 'required',
				'luas_finish_dinding_m2_' => 'required',
				'Luas_finish_KPJ_m2_' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_m_' => 'sanitize_string',
				'lebar_m_' => 'sanitize_string',
				'luas_ruang_m2_' => 'sanitize_string',
				'luas_plester_m2_' => 'sanitize_string',
				'luas_plafon_m2_' => 'sanitize_string',
				'luas_dinding_m2_' => 'sanitize_string',
				'luas_daun_jendela_m2_' => 'sanitize_string',
				'luas_daun_pintu_m2_' => 'sanitize_string',
				'panjang_kusen_m_' => 'sanitize_string',
				'luas_tutup_lantai_m2_' => 'sanitize_string',
				'luas_instalasi_listrik_m_' => 'sanitize_string',
				'panjang_instalasi_air_m_' => 'sanitize_string',
				'panjang_drainase_m_' => 'sanitize_string',
				'luas_finish_struktur_m2_' => 'sanitize_string',
				'luas_finish_plafon_m2_' => 'sanitize_string',
				'luas_finish_dinding_m2_' => 'sanitize_string',
				'Luas_finish_KPJ_m2_' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("ruang_kelas.id_ruangan", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("ruang_kelas");
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
						return	$this->redirect("ruang_kelas");
					}
				}
			}
		}
		$db->where("ruang_kelas.id_ruangan", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Ruang Kelas";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("ruang_kelas/edit.php", $data);
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
		$fields = $this->fields = array("id_ruangan","jenis_prasarana","kode_ruang","nama_ruang","registrasi_ruang","Lantai_ke","kapasitas","jml_instalasi_listrik","jml_instalasi_air","panjang_m_","lebar_m_","luas_ruang_m2_","luas_plester_m2_","luas_plafon_m2_","luas_dinding_m2_","luas_daun_jendela_m2_","luas_daun_pintu_m2_","panjang_kusen_m_","luas_tutup_lantai_m2_","luas_instalasi_listrik_m_","panjang_instalasi_air_m_","panjang_drainase_m_","luas_finish_struktur_m2_","luas_finish_plafon_m2_","luas_finish_dinding_m2_","Luas_finish_KPJ_m2_");
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
				'kapasitas' => 'required',
				'jml_instalasi_listrik' => 'required',
				'jml_instalasi_air' => 'required',
				'panjang_m_' => 'required',
				'lebar_m_' => 'required',
				'luas_ruang_m2_' => 'required',
				'luas_plester_m2_' => 'required',
				'luas_plafon_m2_' => 'required',
				'luas_dinding_m2_' => 'required',
				'luas_daun_jendela_m2_' => 'required',
				'luas_daun_pintu_m2_' => 'required',
				'panjang_kusen_m_' => 'required',
				'luas_tutup_lantai_m2_' => 'required',
				'luas_instalasi_listrik_m_' => 'required',
				'panjang_instalasi_air_m_' => 'required',
				'panjang_drainase_m_' => 'required',
				'luas_finish_struktur_m2_' => 'required',
				'luas_finish_plafon_m2_' => 'required',
				'luas_finish_dinding_m2_' => 'required',
				'Luas_finish_KPJ_m2_' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'kode_ruang' => 'sanitize_string',
				'nama_ruang' => 'sanitize_string',
				'registrasi_ruang' => 'sanitize_string',
				'Lantai_ke' => 'sanitize_string',
				'kapasitas' => 'sanitize_string',
				'jml_instalasi_listrik' => 'sanitize_string',
				'jml_instalasi_air' => 'sanitize_string',
				'panjang_m_' => 'sanitize_string',
				'lebar_m_' => 'sanitize_string',
				'luas_ruang_m2_' => 'sanitize_string',
				'luas_plester_m2_' => 'sanitize_string',
				'luas_plafon_m2_' => 'sanitize_string',
				'luas_dinding_m2_' => 'sanitize_string',
				'luas_daun_jendela_m2_' => 'sanitize_string',
				'luas_daun_pintu_m2_' => 'sanitize_string',
				'panjang_kusen_m_' => 'sanitize_string',
				'luas_tutup_lantai_m2_' => 'sanitize_string',
				'luas_instalasi_listrik_m_' => 'sanitize_string',
				'panjang_instalasi_air_m_' => 'sanitize_string',
				'panjang_drainase_m_' => 'sanitize_string',
				'luas_finish_struktur_m2_' => 'sanitize_string',
				'luas_finish_plafon_m2_' => 'sanitize_string',
				'luas_finish_dinding_m2_' => 'sanitize_string',
				'Luas_finish_KPJ_m2_' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("ruang_kelas.id_ruangan", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
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
		$db->where("ruang_kelas.id_ruangan", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("ruang_kelas");
	}
}
