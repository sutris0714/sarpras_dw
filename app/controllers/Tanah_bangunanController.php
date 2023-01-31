<?php 
/**
 * Tanah_bangunan Page Controller
 * @category  Controller
 */
class Tanah_bangunanController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "tanah_bangunan";
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
		$fields = array("id_tb", 
			"jenis_prasarana", 
			"nama", 
			"no_serti", 
			"panjang", 
			"lebar", 
			"luas", 
			"luas_lahan_tersedia", 
			"kepemilikan", 
			"ket_tanah", 
			"alamat_jln", 
			"rt", 
			"rw", 
			"nama_dusun", 
			"kelurahan", 
			"kode_pos");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				tanah_bangunan.id_tb LIKE ? OR 
				tanah_bangunan.jenis_prasarana LIKE ? OR 
				tanah_bangunan.nama LIKE ? OR 
				tanah_bangunan.no_serti LIKE ? OR 
				tanah_bangunan.panjang LIKE ? OR 
				tanah_bangunan.lebar LIKE ? OR 
				tanah_bangunan.luas LIKE ? OR 
				tanah_bangunan.luas_lahan_tersedia LIKE ? OR 
				tanah_bangunan.kepemilikan LIKE ? OR 
				tanah_bangunan.ket_tanah LIKE ? OR 
				tanah_bangunan.alamat_jln LIKE ? OR 
				tanah_bangunan.rt LIKE ? OR 
				tanah_bangunan.rw LIKE ? OR 
				tanah_bangunan.nama_dusun LIKE ? OR 
				tanah_bangunan.kelurahan LIKE ? OR 
				tanah_bangunan.kode_pos LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "tanah_bangunan/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("tanah_bangunan.id_tb", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Tanah Bangunan";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("tanah_bangunan/list.php", $data); //render the full page
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
		$fields = array("id_tb", 
			"jenis_prasarana", 
			"nama", 
			"no_serti", 
			"panjang", 
			"lebar", 
			"luas", 
			"luas_lahan_tersedia", 
			"kepemilikan", 
			"ket_tanah", 
			"alamat_jln", 
			"rt", 
			"rw", 
			"nama_dusun", 
			"kelurahan", 
			"kode_pos");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("tanah_bangunan.id_tb", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$this->write_to_log("view", "true");
			$page_title = $this->view->page_title = "View  Tanah Bangunan";
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
		return $this->render_view("tanah_bangunan/view.php", $record);
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
			$fields = $this->fields = array("jenis_prasarana","nama","no_serti","panjang","lebar","luas","luas_lahan_tersedia","kepemilikan","ket_tanah","alamat_jln","rt","rw","nama_dusun","kelurahan","kode_pos");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'nama' => 'required',
				'no_serti' => 'required',
				'luas' => 'required',
				'luas_lahan_tersedia' => 'required',
				'kepemilikan' => 'required',
				'alamat_jln' => 'required',
				'kelurahan' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'no_serti' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'luas_lahan_tersedia' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'ket_tanah' => 'sanitize_string',
				'alamat_jln' => 'sanitize_string',
				'rt' => 'sanitize_string',
				'rw' => 'sanitize_string',
				'nama_dusun' => 'sanitize_string',
				'kelurahan' => 'sanitize_string',
				'kode_pos' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->write_to_log("add", "true");
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("tanah_bangunan");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Tanah Bangunan";
		$this->render_view("tanah_bangunan/add.php");
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
		$fields = $this->fields = array("id_tb","jenis_prasarana","nama","no_serti","panjang","lebar","luas","luas_lahan_tersedia","kepemilikan","ket_tanah","alamat_jln","rt","rw","nama_dusun","kelurahan","kode_pos");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'nama' => 'required',
				'no_serti' => 'required',
				'luas' => 'required',
				'luas_lahan_tersedia' => 'required',
				'kepemilikan' => 'required',
				'alamat_jln' => 'required',
				'kelurahan' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'no_serti' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'luas_lahan_tersedia' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'ket_tanah' => 'sanitize_string',
				'alamat_jln' => 'sanitize_string',
				'rt' => 'sanitize_string',
				'rw' => 'sanitize_string',
				'nama_dusun' => 'sanitize_string',
				'kelurahan' => 'sanitize_string',
				'kode_pos' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("tanah_bangunan.id_tb", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("tanah_bangunan");
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
						return	$this->redirect("tanah_bangunan");
					}
				}
			}
		}
		$db->where("tanah_bangunan.id_tb", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Tanah Bangunan";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("tanah_bangunan/edit.php", $data);
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
		$fields = $this->fields = array("id_tb","jenis_prasarana","nama","no_serti","panjang","lebar","luas","luas_lahan_tersedia","kepemilikan","ket_tanah","alamat_jln","rt","rw","nama_dusun","kelurahan","kode_pos");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'jenis_prasarana' => 'required',
				'nama' => 'required',
				'no_serti' => 'required',
				'luas' => 'required',
				'luas_lahan_tersedia' => 'required',
				'kepemilikan' => 'required',
				'alamat_jln' => 'required',
				'kelurahan' => 'required',
			);
			$this->sanitize_array = array(
				'jenis_prasarana' => 'sanitize_string',
				'nama' => 'sanitize_string',
				'no_serti' => 'sanitize_string',
				'panjang' => 'sanitize_string',
				'lebar' => 'sanitize_string',
				'luas' => 'sanitize_string',
				'luas_lahan_tersedia' => 'sanitize_string',
				'kepemilikan' => 'sanitize_string',
				'ket_tanah' => 'sanitize_string',
				'alamat_jln' => 'sanitize_string',
				'rt' => 'sanitize_string',
				'rw' => 'sanitize_string',
				'nama_dusun' => 'sanitize_string',
				'kelurahan' => 'sanitize_string',
				'kode_pos' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("tanah_bangunan.id_tb", $rec_id);;
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
		$db->where("tanah_bangunan.id_tb", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->write_to_log("delete", "true");
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("tanah_bangunan");
	}
}
