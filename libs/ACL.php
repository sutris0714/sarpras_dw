<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'administrator' =>
						array(
							'tanah_bangunan' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_kepsek_guru' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_kamar_mandi_wc' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_lab' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_penunjang' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_perpustakaan' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'alat' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'angkutan' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'buku' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ruang_kls' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'barang' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'pengajuan_barang' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'elektronik' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'habis_pakai' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'lab_ipa' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'barang_atk' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'barang_lainnya' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'user' => array('list','view','userregister','accountedit','accountview','add','edit', 'editfield','delete','import_data'),
							'app_logs' => array('list','view')
						),
		
			'user' =>
						array(
							'tanah_bangunan' => array('list','add','import_data'),
							'ruang_kepsek_guru' => array('list','add','import_data'),
							'ruang_kamar_mandi_wc' => array('list','add','import_data'),
							'ruang_lab' => array('list','add','import_data'),
							'ruang_penunjang' => array('list','add','import_data'),
							'ruang_perpustakaan' => array('list','add','import_data'),
							'alat' => array('list','add','import_data'),
							'angkutan' => array('list','add','import_data'),
							'buku' => array('list','add','import_data'),
							'ruang_kls' => array('list','add','import_data'),
							'barang' => array('list','add','import_data'),
							'pengajuan_barang' => array('list','add','import_data'),
							'elektronik' => array('list','add','import_data'),
							'habis_pakai' => array('list','add','import_data'),
							'lab_ipa' => array('list','add','import_data'),
							'barang_atk' => array('list','add','import_data'),
							'barang_lainnya' => array('list','add','import_data')
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
