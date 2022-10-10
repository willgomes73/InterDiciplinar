<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include_once '../funcoes/bancoDeDados.php';
$conn = conectar();

$cod_prof = filter_input(INPUT_GET, "cod_prof", FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_GET, "sexo", FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_GET, "rg", FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_GET, "nascimento", FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
$salario =filter_input(INPUT_GET, "salario");

$sql = "Insert into professores "
        . "(Cod_prof, Nome, Sexo, RG,"
        . "Nascimento,CPF, Salario) values "
        . "('$cod_prof','$nome','$sexo','$rg',"
        . "'$nascimento','$cpf',$salario)";
$retorno = $conn->exec($sql);

if ($retorno == 1){
    header("location:listar.php");
}
else{
    echo "Erro no processamento de inclusão";
   
}

