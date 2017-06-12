<?php 
	$path = $_POST['path'];
	
	include_once $path . '/wp-config.php';
	include_once $path . '/wp-load.php';
	include_once $path . '/wp-includes/wp-db.php';
	include_once $path . '/wp-includes/pluggable.php';
	global $wpdb;
	
	$query;
	foreach($_POST as $key => $value){
		if(!empty($value) && strcmp($key, "path")){
			$query = $wpdb->insert(
					'r_vendedormeta',
					array(
						'meta_key' 	 => 'vendedor_'.$key,
						'meta_value' => trata($value)
					)
			);
			if(strcmp($query, "1")){
				$msg = array('error'=>'Ocorreu um erro ao realizar o cadastro');
				die(json_encode($msg));
			}
		}
	}
	$msg = array('error'=>null);
	die(json_encode($msg));
	
	# Tratar as variáveis (str)
	function trata($value) {
		$value = preg_replace('/[áàãâä]/ui', 'a', $value);
		$value = preg_replace('/[éèêë]/ui', 'e', $value);
		$value = preg_replace('/[íìîï]/ui', 'i', $value);
		$value = preg_replace('/[óòõôö]/ui', 'o', $value);
		$value = preg_replace('/[úùûü]/ui', 'u', $value);
		$value = preg_replace('/[ç]/ui', 'c', $value);
		$value = str_replace('-', '', $value);;
		
		$value = strtoupper($value);
		$value = strip_tags($value);
		$value = addslashes($value);
		
		return $value;
	}
?>