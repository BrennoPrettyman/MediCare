<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/atendendo.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <!-- JAVASCRIPT -->
    <script src="js/finalizar.js"></script>


    <title>MediCare - Atendendo</title>
</head>

<body>
    <h1>MediCare</h1>
    <?php
        /*date_default_timezone_set('America/Sao_Paulo'); // Tempo de são paulo
        $date = date("d/m/Y"); // comando que obtém a data
        $time = date("H:i:s"); // Comando que obtém o tempo ao entrar
        session_start(); // inicia o 'localstorage'
        $_SESSION['data_iniciado'] = $date; // cria localstorage com nome 'data_iniciado'
        $_SESSION['hora_iniciado'] = $time; // cria localstorage com nome 'data_iniciado'
        print_r($_SESSION['data_iniciado']);
        print_r($_SESSION['hora_iniciado']);

        echo "<h2 id='andar'>Andar 01</h2>";
        echo "<h3 id='quarto'>Quarto 01 | Leito 10</h3>";*/
    ?>
    <h2 id='andar'>Andar 01</h2>
    <h3 id='quarto'>Quarto 01 | Leito 10</h3>
    <div class="bloco1">
        <div class="box">
            <h4>Você está em um atendimento agora</h4>
            <button class="btn" id="finalizar1">Finalizar Atendimentos</button>
        </div>
    </div>
</body>

</html>