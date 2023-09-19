<?php session_start()?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="assets/css/homeStyle.css">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="assets/js/ajax.js"></script>
</head>
<body>
    <?php
        include('assets/config/config.php');
        if (!isset($_SESSION['usuario'])) {
            include('assets/pages/login.php');
        } else {
            include('assets/home/home.php');
        }
    ?>
</body>
</html>