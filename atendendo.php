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
    <script src="js/preencherAtender.js"></script>


    <title>MediCare - Atendendo</title>
</head>

<body>
    <h1>MediCare</h1>
    <?php
        date_default_timezone_set('America/Sao_Paulo'); // Tempo de são paulo
        $date = date("Y/m/d"); // comando que obtém a data
        $time = date("H:i:s"); // Comando que obtém o tempo ao entrar
        session_start(); // inicia o 'localstorage'
        $_SESSION['data_iniciado'] = $date; // cria localstorage com nome 'data_iniciado'
        $_SESSION['hora_iniciado'] = $time; // cria localstorage com nome 'data_iniciado'

        echo "<h2 id='andar'></h2>";
        echo "<h3 id='quarto'></h3>";
        
    ?>
    <div class="bloco1">
        <div class="box">
            <h4>Você está em um atendimento agora</h4>
            <button class="btn" id="finalizar1">Finalizar Atendimentos</button>
        </div>
    </div>
</body>

</html>