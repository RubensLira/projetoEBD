<?php
    session_start();
    include_once('../config/config.php');
    if (isset($_POST['submit'])) {
        $senha = $_POST['senha'];
        $usuario = $_SESSION['usuario'];
        $sql_code = "UPDATE cadastro.usuarios SET senha='$senha' WHERE usuario='$usuario'";
        $sql_query = $mysqli->query($sql_code) or die("Erro na coneção");
        echo 'Senha alterada';
        //$resgistros = $sql_query->num_rows;
    } else {
        echo "Erro";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALteração de Dados</title>
</head>
<body>
    <h3><?=$_SESSION['usuario']?></h3>
    <form method="post">
        <label for="senha">Digite a nova senha</label>
        <input type="password" name="senha" id="senha">
        <label for="confSenha">Confirme a nova senha</label>
        <input type="password" name="confSenha" id="confSenha"> 
        <input type="submit" value="Enviar">
    </form>
</body>
</html>