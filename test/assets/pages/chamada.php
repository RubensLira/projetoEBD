<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chamada</title>
        <link rel="stylesheet" href="../css/homeStyle.css">
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="../js/ajax.js"></script>
</head>
<body id="body">
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
                <li><a href="matricula.php">Matrícula</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="../config/logout.php">Sair</a></li>
            </ul>
        </section>
    </header>
    <?php 
        include_once('../config/config.php');
        if (isset($_POST['submit'])) {
            foreach ($_POST['primeira'] as $id => $resgistro1) {
                // Validar e limpar os dados, se necessário
                $resgistro1 = $mysqli->real_escape_string($resgistro1);
                $id = intval($id);
                
                // Atualize os dados no banco de dados
                $sql_update = "UPDATE frequencia_set_2023 SET primeira = '$resgistro1' WHERE id_aluno = $id";
                $mysqli->query($sql_update) or die('Error!');
            }
        }        
        $sql_select = "SELECT alunos.id, alunos.nome, alunos.sala, frequencia_set_2023.primeira, frequencia_set_2023.segunda, frequencia_set_2023.terceira, frequencia_set_2023.quarta FROM alunos INNER JOIN frequencia_set_2023 ON alunos.id = frequencia_set_2023.id_aluno WHERE alunos.sala IS NOT NULL";
        $sql_query = $mysqli->query($sql_select);
    ?>
    <main>
        <section>
            <form id="form">
                <label for="sala">Selecione uma sala:</label>
                <select name="sala" id="sala">
                    <option selected disabled value="">Selecione</option>
                    <option value="NOT NULL">Todos</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            </form>
        </section>
        <section id="resultado">
            <form method="post">
                <table id="tabela">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Semana 1</th>
                            <th scope="col">Semana 2</th>
                            <th scope="col">Semana 3</th>
                            <th scope="col">Semana 4</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $numero = 1;
                    while ($user_data = $sql_query->fetch_assoc()) {
                        $id = $user_data['id'];
                        echo "<tr>";
                            echo "<td>" . $user_data['id'] . "</td>";
                            echo "<td>" . $user_data['nome'] . "</td>";
                            echo "<td>" . $user_data['sala'] . "</td>";
                            echo "<td>
                            <select name='primeira[$id]' id='primeira'>";
                                $selectedP = ($user_data['primeira'] == 'P') ? 'selected' : '';
                                $selectedF = ($user_data['primeira'] == 'F') ? 'selected' : '';
                                echo "<option $selectedP value=''>---</option>";
                                echo "<option $selectedP value='P'>P</option>";
                                echo "<option $selectedF value='F'>F</option>";
                            echo "</select>
                            </td>";
                            echo "<td>
                            <select name='segunda[$id]' id='segunda'>";
                                $selectedP2 = ($user_data['segunda'] == 'P') ? 'selected' : '';
                                $selectedF2 = ($user_data['segunda'] == 'F') ? 'selected' : '';
                                echo "<option $selectedP value=''>---</option>";
                                echo "<option $selectedP2 value='P'>P</option>";
                                echo "<option $selectedF2 value='F'>F</option>";
                            echo "</select>
                            </td>";
                            echo "<td>
                            <select name='terceira[$id]' id='terceira'>";
                                $selectedP3 = ($user_data['terceira'] == 'P') ? 'selected' : '';
                                $selectedF3 = ($user_data['terceira'] == 'F') ? 'selected' : '';
                                echo "<option $selectedP value=''>---</option>";
                                echo "<option $selectedP3 value='P'>P</option>";
                                echo "<option $selectedF3 value='F'>F</option>";
                            echo "</select>
                            </td>";
                            echo "<td>
                            <select name='quarta[$id]' id='quarta'>";
                                $selectedP4 = ($user_data['quarta'] == 'P') ? 'selected' : '';
                                $selectedF4 = ($user_data['quarta'] == 'F') ? 'selected' : '';
                                echo "<option $selectedP value=''>---</option>";
                                echo "<option $selectedP4 value='P'>P</option>";
                                echo "<option $selectedF4 value='F'>F</option>";
                            echo "</select>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" value="Atualizar">
            </form>
        </section>
    </main>
</body>
</html>