<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Professores</title>
    </head>
    <body>
        <a href='novoProfessor.php'>Novo Professor</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                

        <?php
        include_once '../funcoes/bancoDeDados.php';
        // conectar ao BD
        $conn = conectar();
        // listar todos todos os professores
        $sql="select * from professores";
        // ordena a execucao do comando sql acima
        $resultado = $conn->query($sql);
        // convertendo o resultado em um vetor
        $linhas = $resultado->fetchAll();
        // percorrer cada posicao do vetor
        foreach ($linhas as $registro) {
           // formato 1
           // echo "<tr>";
           //     echo "<td>"; 
           //         echo $registro["Cod_prof"]; 
           //    echo "</td>";
           //     echo "<td>";
           //         echo $registro["Nome"];
           //     echo "</td>";
           //     echo "<td>"; 
           //         echo $registro["CPF"];
           //     echo "</td>";
           // echo "</tr>";
            
           //format 2 
           // echo "<tr>";
           //     echo "<td>",$registro["Cod_prof"],"</td>";
           //     echo "<td>",$registro["Nome"],"</td>";
           //     echo "<td>",$registro["CPF"],"</td>";
           // echo "</tr>";
            
            //formato 3
            ?>
                <tr>
                    <td><?= $registro['Cod_prof']?></td>
                    <td><?= $registro['Nome']?></td>
                    <td><?= $registro['CPF']?></td>
                    <td><a href="editar.php?id=<?= $registro['Cod_prof']?>">Editar</a></td>
                    <td><a href="detalhar.php?id=<?= $registro['Cod_prof']?>">Detalhe</a></td>
                    <td><a href="excluir.php?id=<?= $registro['Cod_prof']?>">Excluir</a></td>
                </tr>    
                
            <?php 
        }
        ?>
        
                
            </tbody>
        </table>
    </body>
</html>
