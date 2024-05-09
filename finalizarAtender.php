<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/atendendo.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <title>MediCare - Atendendo</title>
</head>
<body>
<?php
    date_default_timezone_set('America/Sao_Paulo'); // Tempo de são paulo
    $time = date("H:i:s"); // Comando que obtém o tempo ao entrar
    session_start(); // inicia o 'localstorage'
    $_SESSION['hora_fim'] = $time; // cria localstorage com nome 'data_iniciado'

    echo "<script>window.location.href = 'motivo.php';</script>";
?>
</body>
</html>
