<?php 
	$cpf  = $_POST['cpf'];
	$path = $_POST['path'];
	include_once $path . '/wp-config.php';
	include_once $path . '/wp-load.php';
	include_once $path . '/wp-includes/wp-db.php';
	include_once $path . '/wp-includes/pluggable.php';
	
	global $wpdb;
	$query = "SELECT meta_id FROM r_vendedormeta
			  WHERE meta_key = 'vendedor_cpf' AND meta_value = ".$cpf;
	$request = $wpdb->get_results($query);
	$request = $request[0];
	
	$msg = array('erro'=>null);
	if($request != null)
		$msg = array('error'=>'cadastrado');
	die(json_encode($msg));
?>