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

$sqlDisciplinas = "select * from disciplinas "
                . "where Cod_prof = '$id'";
$resultadoDisciplinas = $conn->query($sqlDisciplinas);
$linhasProf = $resultado->fetchAll();

$linhasDisc = $resultadoDisciplinas->fetchAll();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="excluir_r.php">
            <?php
            
            if ( count($linhasProf) == 1){
                echo "<input type='hidden'"
               . " name='id' value ='" 
               . $linhasProf[0]["Cod_prof"] 
               . "'/>";
                foreach ($linhasProf as $registro){
                    foreach($registro as $campo=>$valor){
                        echo "$campo = $valor <br>";
                    }
                }
                echo "<hr>";
                echo "<table>";
                foreach($linhasDisc as $registro){
                    echo "<tr>";
                    foreach($registro as $campo=>$valor){
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "Erro na execução.";
                die();
            }
            ?>
            <input type="submit" value="Excluir"/>
        </form>
        <a href="listar.php">Voltar</a>
    </body>
</html>
