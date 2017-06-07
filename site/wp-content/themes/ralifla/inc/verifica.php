<?php
$fone1 = $_POST['vendedor_telefone'];
$fone2 = $_POST['referencia_telefone'];
$fone3 = $_POST['conjuge_telefone'];

function verificaIgual(){
    if($fone1 === $fone2 || $fone1 === $fone3){
        return true;
    }
}