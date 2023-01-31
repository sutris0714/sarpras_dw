<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * elektronik_yg_mengajukan_option_list Model Action
     * @return array
     */
	function elektronik_yg_mengajukan_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT yg_mengajukan AS value,yg_mengajukan AS label FROM pengajuan_barang ORDER BY yg_mengajukan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_tipe_barang_option_list Model Action
     * @return array
     */
	function elektronik_tipe_barang_option_list($lookup_yg_mengajukan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipe_barang AS value,tipe_barang AS label FROM pengajuan_barang WHERE yg_mengajukan= ? ORDER BY tipe_barang ASC" ;
		$queryparams = array($lookup_yg_mengajukan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_nama_barang_option_list Model Action
     * @return array
     */
	function elektronik_nama_barang_option_list($lookup_tipe_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama_barang AS value,nama_barang AS label FROM pengajuan_barang WHERE tipe_barang= ? ORDER BY nama_barang ASC" ;
		$queryparams = array($lookup_tipe_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_merk_option_list Model Action
     * @return array
     */
	function elektronik_merk_option_list($lookup_nama_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT merk AS value,merk AS label FROM pengajuan_barang WHERE nama_barang= ? ORDER BY merk ASC" ;
		$queryparams = array($lookup_nama_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_spesifikasi_option_list Model Action
     * @return array
     */
	function elektronik_spesifikasi_option_list($lookup_merk){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT spesifikasi AS value,spesifikasi AS label FROM pengajuan_barang WHERE merk= ? ORDER BY spesifikasi ASC" ;
		$queryparams = array($lookup_merk);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_jumlah_barang_option_list Model Action
     * @return array
     */
	function elektronik_jumlah_barang_option_list($lookup_spesifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT jumlah_barang AS value,jumlah_barang AS label FROM pengajuan_barang WHERE spesifikasi= ? ORDER BY jumlah_barang ASC" ;
		$queryparams = array($lookup_spesifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_harga_satuan_option_list Model Action
     * @return array
     */
	function elektronik_harga_satuan_option_list($lookup_jumlah_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT harga_satuan AS value,harga_satuan AS label FROM pengajuan_barang WHERE jumlah_barang= ? ORDER BY harga_satuan ASC" ;
		$queryparams = array($lookup_jumlah_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * elektronik_penempatan_option_list Model Action
     * @return array
     */
	function elektronik_penempatan_option_list($lookup_harga_satuan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT penempatan AS value,penempatan AS label FROM pengajuan_barang WHERE harga_satuan= ? ORDER BY penempatan ASC" ;
		$queryparams = array($lookup_harga_satuan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_yg_mengajukan_option_list Model Action
     * @return array
     */
	function habis_pakai_yg_mengajukan_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT yg_mengajukan AS value,yg_mengajukan AS label FROM pengajuan_barang ORDER BY yg_mengajukan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_tipe_barang_option_list Model Action
     * @return array
     */
	function habis_pakai_tipe_barang_option_list($lookup_yg_mengajukan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipe_barang AS value,tipe_barang AS label FROM pengajuan_barang WHERE yg_mengajukan= ? ORDER BY tipe_barang ASC" ;
		$queryparams = array($lookup_yg_mengajukan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_nama_barang_option_list Model Action
     * @return array
     */
	function habis_pakai_nama_barang_option_list($lookup_tipe_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama_barang AS value,nama_barang AS label FROM pengajuan_barang WHERE tipe_barang= ? ORDER BY nama_barang ASC" ;
		$queryparams = array($lookup_tipe_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_merk_option_list Model Action
     * @return array
     */
	function habis_pakai_merk_option_list($lookup_nama_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT merk AS value,merk AS label FROM pengajuan_barang WHERE nama_barang= ? ORDER BY merk ASC" ;
		$queryparams = array($lookup_nama_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_spesifikasi_option_list Model Action
     * @return array
     */
	function habis_pakai_spesifikasi_option_list($lookup_merk){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT spesifikasi AS value,spesifikasi AS label FROM pengajuan_barang WHERE merk= ? ORDER BY spesifikasi ASC" ;
		$queryparams = array($lookup_merk);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_jumlah_barang_option_list Model Action
     * @return array
     */
	function habis_pakai_jumlah_barang_option_list($lookup_spesifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT jumlah_barang AS value,jumlah_barang AS label FROM pengajuan_barang WHERE spesifikasi= ? ORDER BY jumlah_barang ASC" ;
		$queryparams = array($lookup_spesifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_harga_satuan_option_list Model Action
     * @return array
     */
	function habis_pakai_harga_satuan_option_list($lookup_jumlah_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT harga_satuan AS value,harga_satuan AS label FROM pengajuan_barang WHERE jumlah_barang= ? ORDER BY harga_satuan ASC" ;
		$queryparams = array($lookup_jumlah_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * habis_pakai_penempatan_option_list Model Action
     * @return array
     */
	function habis_pakai_penempatan_option_list($lookup_harga_satuan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT penempatan AS value,penempatan AS label FROM pengajuan_barang WHERE harga_satuan= ? ORDER BY penempatan ASC" ;
		$queryparams = array($lookup_harga_satuan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_yg_mengajukan_option_list Model Action
     * @return array
     */
	function lab_ipa_yg_mengajukan_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT yg_mengajukan AS value,yg_mengajukan AS label FROM pengajuan_barang ORDER BY yg_mengajukan";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_nama_barang_option_list Model Action
     * @return array
     */
	function lab_ipa_nama_barang_option_list($lookup_tipe_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama_barang AS value,nama_barang AS label FROM pengajuan_barang WHERE tipe_barang= ? ORDER BY nama_barang ASC" ;
		$queryparams = array($lookup_tipe_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_merk_option_list Model Action
     * @return array
     */
	function lab_ipa_merk_option_list($lookup_nama_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT merk AS value,merk AS label FROM pengajuan_barang WHERE nama_barang= ? ORDER BY merk ASC" ;
		$queryparams = array($lookup_nama_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_spesifikasi_option_list Model Action
     * @return array
     */
	function lab_ipa_spesifikasi_option_list($lookup_merk){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT spesifikasi AS value,spesifikasi AS label FROM pengajuan_barang WHERE merk= ? ORDER BY spesifikasi ASC" ;
		$queryparams = array($lookup_merk);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_jumlah_barang_option_list Model Action
     * @return array
     */
	function lab_ipa_jumlah_barang_option_list($lookup_spesifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT jumlah_barang AS value,jumlah_barang AS label FROM pengajuan_barang WHERE spesifikasi= ? ORDER BY jumlah_barang ASC" ;
		$queryparams = array($lookup_spesifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_harga_satuan_option_list Model Action
     * @return array
     */
	function lab_ipa_harga_satuan_option_list($lookup_jumlah_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT harga_satuan AS value,harga_satuan AS label FROM pengajuan_barang WHERE jumlah_barang= ? ORDER BY harga_satuan ASC" ;
		$queryparams = array($lookup_jumlah_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_penempatan_option_list Model Action
     * @return array
     */
	function lab_ipa_penempatan_option_list($lookup_harga_satuan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT penempatan AS value,penempatan AS label FROM pengajuan_barang WHERE harga_satuan= ? ORDER BY penempatan ASC" ;
		$queryparams = array($lookup_harga_satuan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * lab_ipa_tipe_barang_option_list Model Action
     * @return array
     */
	function lab_ipa_tipe_barang_option_list($lookup_yg_mengajukan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipe_barang AS value,tipe_barang AS label FROM pengajuan_barang WHERE yg_mengajukan= ? ORDER BY tipe_barang ASC" ;
		$queryparams = array($lookup_yg_mengajukan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_yg_mengajukan_option_list Model Action
     * @return array
     */
	function barang_atk_yg_mengajukan_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT yg_mengajukan AS value,yg_mengajukan AS label FROM pengajuan_barang ORDER BY yg_mengajukan";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_tipe_barang_option_list Model Action
     * @return array
     */
	function barang_atk_tipe_barang_option_list($lookup_yg_mengajukan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipe_barang AS value,tipe_barang AS label FROM pengajuan_barang WHERE yg_mengajukan= ? ORDER BY tipe_barang ASC" ;
		$queryparams = array($lookup_yg_mengajukan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_nama_barang_option_list Model Action
     * @return array
     */
	function barang_atk_nama_barang_option_list($lookup_tipe_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama_barang AS value,nama_barang AS label FROM pengajuan_barang WHERE tipe_barang= ? ORDER BY nama_barang ASC" ;
		$queryparams = array($lookup_tipe_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_merk_option_list Model Action
     * @return array
     */
	function barang_atk_merk_option_list($lookup_nama_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT merk AS value,merk AS label FROM pengajuan_barang WHERE nama_barang= ? ORDER BY merk ASC" ;
		$queryparams = array($lookup_nama_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_spesifikasi_option_list Model Action
     * @return array
     */
	function barang_atk_spesifikasi_option_list($lookup_merk){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT spesifikasi AS value,spesifikasi AS label FROM pengajuan_barang WHERE merk= ? ORDER BY spesifikasi ASC" ;
		$queryparams = array($lookup_merk);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_jumlah_barang_option_list Model Action
     * @return array
     */
	function barang_atk_jumlah_barang_option_list($lookup_spesifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT jumlah_barang AS value,jumlah_barang AS label FROM pengajuan_barang WHERE spesifikasi= ? ORDER BY jumlah_barang ASC" ;
		$queryparams = array($lookup_spesifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_harga_satuan_option_list Model Action
     * @return array
     */
	function barang_atk_harga_satuan_option_list($lookup_jumlah_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT harga_satuan AS value,harga_satuan AS label FROM pengajuan_barang WHERE jumlah_barang= ? ORDER BY harga_satuan ASC" ;
		$queryparams = array($lookup_jumlah_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_atk_penempatan_option_list Model Action
     * @return array
     */
	function barang_atk_penempatan_option_list($lookup_harga_satuan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT penempatan AS value,penempatan AS label FROM pengajuan_barang WHERE harga_satuan= ? ORDER BY penempatan ASC" ;
		$queryparams = array($lookup_harga_satuan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_yg_mengajukan_option_list Model Action
     * @return array
     */
	function barang_lainnya_yg_mengajukan_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT yg_mengajukan AS value,yg_mengajukan AS label FROM pengajuan_barang ORDER BY yg_mengajukan ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_tipe_barang_option_list Model Action
     * @return array
     */
	function barang_lainnya_tipe_barang_option_list($lookup_yg_mengajukan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT tipe_barang AS value,tipe_barang AS label FROM pengajuan_barang WHERE yg_mengajukan= ? ORDER BY tipe_barang ASC" ;
		$queryparams = array($lookup_yg_mengajukan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_nama_barang_option_list Model Action
     * @return array
     */
	function barang_lainnya_nama_barang_option_list($lookup_tipe_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama_barang AS value,nama_barang AS label FROM pengajuan_barang WHERE tipe_barang= ? ORDER BY nama_barang ASC" ;
		$queryparams = array($lookup_tipe_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_merk_option_list Model Action
     * @return array
     */
	function barang_lainnya_merk_option_list($lookup_nama_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT merk AS value,merk AS label FROM pengajuan_barang WHERE nama_barang= ? ORDER BY merk ASC" ;
		$queryparams = array($lookup_nama_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_spesifikasi_option_list Model Action
     * @return array
     */
	function barang_lainnya_spesifikasi_option_list($lookup_merk){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT spesifikasi AS value,spesifikasi AS label FROM pengajuan_barang WHERE merk= ? ORDER BY spesifikasi ASC" ;
		$queryparams = array($lookup_merk);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_jumlah_barang_option_list Model Action
     * @return array
     */
	function barang_lainnya_jumlah_barang_option_list($lookup_spesifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT jumlah_barang AS value,jumlah_barang AS label FROM pengajuan_barang WHERE spesifikasi= ? ORDER BY jumlah_barang ASC" ;
		$queryparams = array($lookup_spesifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_harga_satuan_option_list Model Action
     * @return array
     */
	function barang_lainnya_harga_satuan_option_list($lookup_jumlah_barang){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT harga_satuan AS value,harga_satuan AS label FROM pengajuan_barang WHERE jumlah_barang= ? ORDER BY harga_satuan ASC" ;
		$queryparams = array($lookup_jumlah_barang);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * barang_lainnya_penempatan_option_list Model Action
     * @return array
     */
	function barang_lainnya_penempatan_option_list($lookup_harga_satuan){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT penempatan AS value,penempatan AS label FROM pengajuan_barang WHERE harga_satuan= ? ORDER BY penempatan ASC" ;
		$queryparams = array($lookup_harga_satuan);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * getcount_barangatk Model Action
     * @return Value
     */
	function getcount_barangatk(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM barang_atk";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_elektronik Model Action
     * @return Value
     */
	function getcount_elektronik(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM elektronik";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_labipa Model Action
     * @return Value
     */
	function getcount_labipa(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM lab_ipa";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_habispakai Model Action
     * @return Value
     */
	function getcount_habispakai(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM habis_pakai";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_baranglainnya Model Action
     * @return Value
     */
	function getcount_baranglainnya(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM barang_lainnya";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pengajuanbarang Model Action
     * @return Value
     */
	function getcount_pengajuanbarang(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengajuan_barang";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
