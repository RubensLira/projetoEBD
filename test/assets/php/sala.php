<?php 
    include_once('../config/config.php');
    $sala = $mysqli->real_escape_string($_POST['sala']);
    if ($sala === "NOT NULL") {
        $sql_code = "SELECT alunos.id, alunos.nome, alunos.sala, frequencia_set_2023.primeira, frequencia_set_2023.segunda, frequencia_set_2023.terceira, frequencia_set_2023.quarta FROM alunos INNER JOIN frequencia_set_2023 ON alunos.id = frequencia_set_2023.id_aluno WHERE alunos.sala IS NOT NULL";
    } else {
        $sql_code = "SELECT alunos.id, alunos.nome, alunos.sala, frequencia_set_2023.primeira, frequencia_set_2023.segunda, frequencia_set_2023.terceira, frequencia_set_2023.quarta FROM alunos INNER JOIN frequencia_set_2023 ON alunos.id = frequencia_set_2023.id_aluno WHERE alunos.sala = '$sala'";
    }
    $sql_query = $mysqli->query($sql_code);
?>
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