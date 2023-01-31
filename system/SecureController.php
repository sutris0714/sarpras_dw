<?php
/**
* Extends to Application Base Controller.
* Page Controllers which need page authentication and authorization can extend to this class 
*/
class SecureController extends BaseController{
	function __construct(){
		parent::__construct();
		// Page actions which do not require authentication.
		$exclude_pages = array('tanah_bangunan/list', 'tanah_bangunan/add', 'ruang_kepsek_guru/list', 'ruang_kepsek_guru/add', 'ruang_kamar_mandi_wc/list', 'ruang_kamar_mandi_wc/add', 'ruang_lab/list', 'ruang_lab/add', 'ruang_penunjang/list', 'ruang_penunjang/add', 'ruang_perpustakaan/list', 'ruang_perpustakaan/add', 'alat/list', 'alat/add', 'angkutan/list', 'angkutan/add', 'buku/list', 'buku/add', 'ruang_kls/list', 'ruang_kls/add', 'barang/list', 'barang/add', 'user/list', 'user/add', 'role_permissions/list', 'role_permissions/add', 'tanah_bangunan/view', 'tanah_bangunan/edit', 'tanah_bangunan/delete', 'ruang_kepsek_guru/view', 'ruang_kepsek_guru/edit', 'ruang_kepsek_guru/delete', 'ruang_kamar_mandi_wc/view', 'ruang_kamar_mandi_wc/edit', 'ruang_kamar_mandi_wc/delete', 'ruang_lab/view', 'ruang_lab/edit', 'ruang_lab/delete', 'ruang_penunjang/view', 'ruang_penunjang/edit', 'ruang_penunjang/delete', 'ruang_perpustakaan/view', 'ruang_perpustakaan/edit', 'ruang_perpustakaan/delete', 'alat/view', 'alat/edit', 'alat/delete', 'angkutan/view', 'angkutan/delete', 'buku/view', 'buku/edit', 'buku/delete', 'ruang_kls/view', 'ruang_kls/edit', 'ruang_kls/delete', 'barang/view', 'barang/edit', 'barang/delete', 'pengajuan_barang/list', 'pengajuan_barang/view', 'pengajuan_barang/add', 'pengajuan_barang/edit', 'pengajuan_barang/delete', 'elektronik/list', 'elektronik/view', 'elektronik/add', 'elektronik/edit', 'elektronik/delete', 'habis_pakai/list', 'habis_pakai/view', 'habis_pakai/add', 'habis_pakai/edit', 'habis_pakai/delete', 'lab_ipa/list', 'lab_ipa/view', 'lab_ipa/add', 'lab_ipa/edit', 'lab_ipa/delete', 'barang_atk/list', 'barang_atk/view', 'barang_atk/add', 'barang_atk/edit', 'barang_atk/delete', 'barang_lainnya/list', 'barang_lainnya/view', 'barang_lainnya/add', 'barang_lainnya/edit', 'barang_lainnya/delete', 'user/view');
		$url = Router :: $page_url;
		$url = str_ireplace("/index", "/list", $url);
		$acl = new ACL;
		if(!empty($url)){
			$url_segment =$url_segment = explode("/" , rtrim($url , "/")) ;
			$controller = strtolower(!empty($url_segment[0]) ? $url_segment[0] : null);
			$action = strtolower((!empty($url_segment[1]) ? $url_segment[1] : "list"));
			$page = "$controller/$action";
			if(!in_array($page , $exclude_pages)){
				if($this->authenticate_user()){
					
					$page = Router::$page_url; //current page path
					$this->status = ACL::GetPageAccess($page); 

				}
				else{
					$this->status = UNAUTHORIZED;
				}
			}
		}
	}

	/**
	 * Authenticate And Check User Page Access Eligibility
	 * @return  Redirect to Login Page Or Displays Error Message When user access control authorization Fails
	 */
	private function authenticate_user()
	{
		if (user_login_status() == false) {
			//check if user has a login cookie
			$session_key = get_cookie("login_session_key");
			if (!empty($session_key)) {
				$db = $this->GetModel();
				$db->where("login_session_key", hash_value($session_key));
				$user = $db->getOne("__tablename");
				if (!empty($user)) {
					set_session("user_data", $user);
				}
			}
		}
		return user_login_status();
	}
}