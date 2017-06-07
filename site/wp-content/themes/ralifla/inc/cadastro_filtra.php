<?php
session_start();

# Tratar as variáveis (str)
function trata($value) {
 
    $value = preg_replace('/[áàãâä]/ui', 'a', $value);
    $value = preg_replace('/[éèêë]/ui', 'e', $value);
    $value = preg_replace('/[íìîï]/ui', 'i', $value);
    $value = preg_replace('/[óòõôö]/ui', 'o', $value);
    $value = preg_replace('/[úùûü]/ui', 'u', $value);
    $value = preg_replace('/[ç]/ui', 'c', $value);
   
    $value = strtoupper($value);
    $value = trim($value);
    $value = strip_tags($value);
    $value = addslashes($value);

    return $value;
}


if(isset($_POST['enviar']) || !empty($_POST['enviar'])){ 

    # Conecta banco de dados 
    require 'mysqli_connect.php';

    # Gerar variáveis pelo input name
    foreach($_POST as $key => $value) {
        $$key = trata($value);
        $_SESSION[$key] = trata($value);
    }





    /*$cpf = ereg_replace('[^0-9]', '', $cpf);
    
    # Verifica se tem um cpf para pesquisa
    $sql = mysqli_query($con, "SELECT cpf FROM tb_teste_ajax WHERE cpf = '{$cpf}'") or print mysql_error();
    $row = mysqli_num_rows($sql);

    # Verfica se já existe o cadastro 
    if($row > 0) {
        echo 'Ja existe um usuario cadastrado com este CPF'; 
        exit();
    } 
	*/
    # Verifica se é Mulher
    if($sexo == 'MASCULINO') {
       $erro = 1;
    }
    
    # Verifica se é maior de 21 anos
    $partes = explode("-", $data_nasc);
    $ano = $partes[0];
    $idade = date('Y') - $ano;
            
    if($idade < 21) {
        $erro = 1;
    }

    # Verifica se cidade/uf é atendida
    #Estado restrito
    if($uf == 'AM' || $uf == 'RJ') { 
        $erro = 1;
    }


    if(empty($erro)){

        if(empty($_SESSION['tipo_cep']) || $_SESSION['tipo_cep'] == '2') {
            $_SESSION['warning'] = "<div class='alert alert-warning'>
                            <p><b>CEP Geral/Único</b> <br>Por gentileza preencha o restante das informações do seu endereço.</p>
                        </div>";
        }

        $nome = explode(" ", $_SESSION['nome']);
        $_SESSION['pnome'] = $nome[0];


		header("location: http://localhost/_ArthemisProject/site/seja-uma-revendedora-pt2/");
	
	} else {
		echo "Error" ;
        
	}
}


