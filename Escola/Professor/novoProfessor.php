<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Professor - cadastro</title>
    </head>
    <body>
        <h1>Cadastro de Professor</h1>
        <form action="incluir.php">
            Código:<input type="text" name="cod_prof" value="" /><br>
            Nome:<input type="text" name="nome" value="" /><br>
            CPF:<input type="text" name="cpf" value="" /><br>
            RG:<input type="text" name="rg" value="" /><br>
            Salário:<input type="text" name="salario" value="" /><br>
            Data de Nacimento:<input type="date" name="nascimento" value="" /><br>
            Sexo: <select name="sexo">
                <option value = "M">Masculino</option>
                <option value = "F">Feminino</option>
            </select><br>
            <input type="submit" value="Salvar" />
        </form>
    </body>
</html>
