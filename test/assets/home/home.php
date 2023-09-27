<header>
    <section class="logo">
        <section class="logo-img"></section>
        <section class="logo-texto">
            <h1>Projeto EBD</h1>
        </section>
    </section>
    <section class="menu">
        <ul>
            <li><a href="assets/pages/chamada.php">Chamada</a></li>
            <li><a href="assets/pages/matricula.php">Matrícula</a></li>
            <li><a href="">Sobre</a></li>
            <li><a href="assets/php/logout.php">Sair</a></li>
        </ul>
    </section>
</header>
<main>
    <section id="titulo">
        <?php
            include_once('assets/php/protect.php');
            echo "<h1>Seja Bem-Vindo " . $_SESSION['usuario'] . "</h1>";
            $sql_code = "SELECT * FROM alunos ORDER BY nome";
            $sql_query = $mysqli->query($sql_code);
        ?>
    </section>
    <section>
        <form id="form">
            <label for="pesquisa">Pesquisar:</label>
            <input type="text" name="pesquisa" id="pesquisa">
        </form>
        <section id="resultado">
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
        </section>
    </section>
    <!-- <a href="assets/php/alter.php">Alterar senha</a> -->
</main>