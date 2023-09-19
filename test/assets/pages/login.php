<form method="post">
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario" id="usuario">
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha">
    <input type="submit" name="submit" value="Enviar">
</form>
<?php
    include_once('assets/config/config.php');
    // include('assets/html/login.html');
    if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $usuario = $mysqli->real_escape_string($usuario);
        $senha = $_POST['senha'];   
        $senha = $mysqli->real_escape_string($senha);
        $sql_code = "SELECT usuario FROM cadastro.usuarios WHERE usuario='$usuario' AND senha='$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Erro na coneção");
        $resgistros = $sql_query->num_rows;
        if ($resgistros == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['usuario'] = $usuario['usuario'];
            header('location: index.php');
        } else {
            echo "<span>Usuário ou senha incorretos</span>";
        }}
?>
<span>Não pussui conta? <a href="assets/php/sign_up.php">Clique aqui</a></span>
