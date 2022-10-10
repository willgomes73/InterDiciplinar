<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
include_once '../funcoes/bancoDeDados.php';
$conn = conectar();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
$sql = "select * from professores where Cod_prof = '$id'";
$resultado = $conn->query($sql);

$linhas = $resultado->fetchAll();
if (count( $linhas ) > 0){
    $registro = $linhas[0];
}
else{
    echo "Erro. nenhum registro encontrado."; 
    $registro["Cod_prof"] = "";
    $registro["Nome"] = "";
    $registro["Sexo"] = "";
    $registro["RG"] = "";
    $registro["Nascimento"] = "";
    $registro["Salario"] = "";
    $registro["CPF"] = "";
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Edição de Professor</h1>
        <form action="atualizar.php">
            Código:<input type="text" 
                          name="cod_prof"
                          readonly
                          value="<?= $registro['Cod_prof']?>" /><br>
            Nome:<input type="text" name="nome" 
                        value="<?= $registro['Nome']?>" /><br>
            CPF:<input type="text" name="cpf" 
                       value="<?= $registro['CPF']?>" /><br>
            RG:<input type="text" name="rg" 
                      value="<?= $registro['RG']?>" /><br>
            Salário:<input type="text" name="salario" 
                           value="<?= $registro['Salario']?>" /><br>
            Data de Nacimento:<input type="date" name="nascimento" 
                          value="<?= $registro['Nascimento']?>" /><br>
            Sexo: <select name="sexo">
                <option value = "M"
                        <?= $registro["Sexo"] == "M" ? "selected" : "" ?>
                        >Masculino</option>
                <option value = "F" 
                        <?= $registro["Sexo"] == "F" ? "selected" : "" ?>
                        >Feminino</option>
            </select><br>
            <input type="submit" value="Salvar" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
