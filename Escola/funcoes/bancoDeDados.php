<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function conectar(){
    $dsn = "mysql:host=localhost;dbname=escola";
    $user = "root";
    $senha = "";
    // DIA A CONECAO COM O BANCO DE DADOS
    // PODE OCORRER ERRO NESTE COMANDO
    // VEREMOS POSTERIORMENTE COMO TRATAR O ERRO.
    $conn = new PDO($dsn,$user,$senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // A LINHA ABAIXO DEIXA CONFIGURADO O RETORNO DO OBJETO FETCH COMO UM VETOR
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE
                       ,PDO::FETCH_ASSOC);
    // RETORNA O OBJETO COM A CONEXAO COM O BANCO DE DADOS.
    return $conn;
}