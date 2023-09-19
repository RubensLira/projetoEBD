<?php 
    include_once('../config/config.php');
    $pesquisa = $_POST['pesquisa'];
    $pesquisa = '%' . $mysqli->real_escape_string($_POST['pesquisa']) . '%';
    $sql_code = "SELECT * FROM alunos WHERE nome LIKE '$pesquisa'";
    $sql_query = $mysqli->query($sql_code);
?>
<table id="tabela">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Entrada</th>
            <th scope="col">Sala</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $numero = 1;
            while ($user_data = $sql_query->fetch_assoc()) {
                $data = date('d/m/Y', strtotime($user_data['data_entrada']));
                echo "<tr>";
                    echo "<td>" . $numero . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td>" . $user_data['sala'] . "</td>";
                echo "</tr>";
                $numero++;
            }
        ?>
    </tbody>
</table>