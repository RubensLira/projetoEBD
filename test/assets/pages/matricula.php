<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula</title>
    <link rel="stylesheet" href="../css/homeStyle.css">
</head>
<body>
    <header>
        <section class="logo">
            <section class="logo-img"></section>
            <section class="logo-texto">
                <h1>Projeto EBD</h1>
            </section>
        </section>
        <section class="menu">
            <ul>
                <li><a href="../../">Home</a></li>
                <li><a href="chamada.php">Chamada</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="../config/logout.php">Sair</a></li>
            </ul>
        </section>
    </header>
    <main>
        <form method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="sala">Sala</label>
            <input type="text" name="sala" id="sala">
            <input type="submit" name="submit" value="Enviar">
        </form>
        <?php 
            include_once('../config/config.php');
            if(isset($_POST['submit'])) {
                $nome = $mysqli->real_escape_string($_POST['nome']);
                $sala = $mysqli->real_escape_string($_POST['sala']);
                $sql_code = "SELECT nome FROM cadastro.alunos WHERE nome = '$nome' AND sala = '$sala'";
                $sql_query = $mysqli->query($sql_code) or die('Falha na Conexão');
                $quantidade = $sql_query->num_rows;
                if ($quantidade == 1) {
                    echo "<p>Já exixte um aluno(a) chamado(a) $nome na sala $sala, recomendo colocar o sobrenome para diferenciá-los*</p>";
                } else {
                    $sql_code = "INSERT INTO cadastro.alunos(nome, data_entrada, sala) VALUES ('$nome', NOW(), '$sala'); INSERT INTO cadastro.frequencia_set_2023(id_aluno, nome) VALUES (LAST_INSERT_ID(), '$nome')";
                    $mysqli->multi_query($sql_code) or die('Falha na Conexão');
                    echo "<p>Aluno cadastrado*</p>";
                }
            }
        ?>
    </main>
</body>
</html>