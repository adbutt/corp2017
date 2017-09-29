<?php
/*****************
File Name: KV Front-end Post Submission
File Author : Kvvaradha
Author Site: : http://kvcodes.com
Author URI: http://profiles.wordpress.org/kvvaradha
*****************/

define('KV_COMMON_URL', get_stylesheet_directory( __FILE__ ));

################################################################################
// Common File scanner funciton to organize all the required files.
################################################################################
function kv_load_include_files($kv_folder_path) {
	$kvc_files = scandir($kv_folder_path);
	//$kv_require = '';
	foreach($kvc_files as $kvc_file) 	{
		if($kvc_file === '.' || $kvc_file === '..') {continue;}

		if (preg_match('/.php/',$kvc_file)) {
			$kv_require[]=$kvc_file ;
		} else { continue; }
	}
	return $kv_require ;
}


################################################################################
//Include the file on the wordpress front end
################################################################################
function kv_scan_include_fold_front() {

	$kv_front_flod_path = KV_COMMON_URL.'/includes/front/' ;
	$kv_files =  kv_load_include_files($kv_front_flod_path);
	if($kv_files != null || $kv_files != '') {
		foreach($kv_files as $kv_file) 	{
			if($kv_file === '.' || $kv_file === '..') {continue;}
			require_once($kv_front_flod_path.$kv_file);
		}
	}
}
if(!is_admin()) {
	add_action('init', 'kv_scan_include_fold_front');
}

################################################################################
//Include the file on the wordpress admin end
################################################################################
function kv_scan_include_fold_admin() {

	$kv_admin_flod_path = KV_COMMON_URL.'/includes/admin/' ;
	$kv_files =  kv_load_include_files($kv_admin_flod_path);
	if($kv_files != null || $kv_files != '') {
		foreach($kv_files as $kv_file) 	{
			if($kv_file === '.' || $kv_file === '..') {continue;}
			require_once($kv_admin_flod_path.$kv_file);
		}
	}
}
if(is_admin()) {
	add_action('init', 'kv_scan_include_fold_admin');
}
?>