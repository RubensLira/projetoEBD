<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
    <form method="post">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
        <input type="submit" name="submit" value="Enviar">
    </form>  
        <?php 
            include_once('../config/config.php');
            if (isset($_POST['submit'])) {
                $usuario = $_POST['usuario'];
                $usuario = $mysqli->real_escape_string($usuario);
                $sql_code = "SELECT usuario FROM cadastro.usuarios WHERE usuario='$usuario'";
                $sql_query = $mysqli->query($sql_code) or die("Erro na coneção");
                $resgistros = $sql_query->num_rows;
                    if ($resgistros == 1) {
                        echo "<p>Esse usuário já foi cadastrado!</p>";
                    } else {
                        $senha = $_POST['senha'];   
                        $senha = $mysqli->real_escape_string($senha);
                        $sql_code = "INSERT INTO cadastro.usuarios(usuario, senha) VALUES ('$usuario', '$senha')";
                        $sql_query = $mysqli->query($sql_code) or die("Erro na conexão");
                        header('location: ../../index.php');
                    }  
            }
        ?>
    </main>
</body>
</html>