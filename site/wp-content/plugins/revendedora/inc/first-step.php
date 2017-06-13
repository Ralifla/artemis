<?php 
	$path = $_POST['path'];
	
	include_once $path . '/wp-config.php';
	include_once $path . '/wp-load.php';
	include_once $path . '/wp-includes/wp-db.php';
	include_once $path . '/wp-includes/pluggable.php';
	global $wpdb;$query;
	
	// insere dados principais e gera meta_id
	$query = $wpdb->insert(
			'r_vendedor',
			array(
					'cpf' 	 => trata($_POST['cpf']),
					'nome'   => trata($_POST['nome']),
					'email'  => trata($_POST['email'])
			)
	);

	// seleciona meta_id
	$request = $wpdb->get_row("SELECT id FROM r_vendedor WHERE cpf = ".trata($_POST['cpf']));
	$meta_id = $request->id;
	
	// insere todos os campos em vendedormeta
	foreach($_POST as $key => $value){
		if(!empty($value) && strcmp($key, "path")){
			$query = $wpdb->insert(
					'r_vendedormeta',
					array(
						'meta_id'	 => $meta_id,
						'meta_key' 	 => 'vendedor_'.$key,
						'meta_value' => trata($value)
					)
			);
			if(strcmp($query, "1")){
				$msg = array('error'=>'Ocorreu um erro ao realizar o cadastro, tente novamente');
				die(json_encode($msg));
			}
		}
	}
	$msg = array('error'=>null);
	
	session_start();
	$_SESSION["cpf"] = trata($_POST['cpf']);
	
	die(json_encode($msg));
	
	// Tratar as variáveis (str)
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