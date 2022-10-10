<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form >
            nome: <input type="text" name="x"/>
            <input type="submit"/>
        </form>
            
        <?php
        include_once './funcoes/bancoDeDados.php';
        if (isset($_REQUEST["x"]) && ($_REQUEST["x"] != "") ){
            $sql = " where nome = '" . $_REQUEST["x"] . "'"; 
        }
        else
        {
            $sql = "";
        }
        $conexaoBD = conectar();
        $sqlConsulta = "SELECT table_name "
                     . "FROM information_schema.tables"
                     . " WHERE table_schema = 'escola'";
        $resultado = $conexaoBD->query($sqlConsulta);
        while ($registro = $resultado->fetch()){
            echo $registro["table_name"],"<br>";
        }
        echo "outra consulta<br>";
        $sqlConsulta = "select * from aluno " . $sql . " limit 20 ";
        $resultado = $conexaoBD->query($sqlConsulta);
        while ($registro = $resultado->fetch()){
            foreach ($registro as $key => $value) {
                echo $key, " => " , $value , "<br>";                
            }
        }
        /*
        echo "inserir um registro<br>";
        $tempoinicial = Time();
        echo "Tempo inicial " , $tempoinicial ," <br>";
        $linhas = 0;
        for ($contador = 1 ; $contador < 10000; $contador++){
            $ra = $contador;
            $nome = "Um nome $contador";
            $sqlInsercao = "insert into aluno (Ra,nome)"
                        . " value ($ra,'$nome')";
            $linhas += $conexaoBD->exec($sqlInsercao);
        }
        echo "linhas criadas => $linhas</br>";
        $tempofinal = Time();
        $diferenca = $tempofinal - $tempoinicial;
        echo "Tempo final ",$tempofinal, " => ", $diferenca,"<br>";
        
        
        
        
        
       
        
        $sqlPreparado = "insert into aluno (RA,nome)"
                       . " values (:ra,:nome)";
        $preparado = $conexaoBD->prepare($sqlPreparado);
        echo "inserir um registro com sql preparado <br>";
        $tempoinicial = Time();
        echo "Tempo inicial " , $tempoinicial ," <br>";
        $linhas = 0;
        for ($contador = 10001 ; $contador < 20000; $contador++){
            $ra = $contador;
            $nome = "Um nome $contador";
            $preparado->bindParam(":ra", $ra);
            $preparado->bindParam(":nome",$nome);
            $linhas += $preparado->execute();
        }
        echo "linhas criadas => $linhas</br>"; 
        $tempofinal = Time();
        $diferenca = $tempofinal - $tempoinicial;
        echo "Tempo final ",$tempofinal, " => ", $diferenca,"<br>";
        */
         ?>
        
    </body>
</html>
