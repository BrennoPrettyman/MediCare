<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/motivo.css">
    <link rel="stylesheet" href="css/icons.css">


    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    
    <script src="js/motivo.js" type="text/javascript"></script>
    <script src="js/preencherAtender.js" type="text/javascript"></script>

    <title>MediCare - Relatório Medico</title>
</head>

<body>
    <form action="chamadoEnviar.php" method="post">
        <h1>MediCare</h1>
        <P>Relatório Médico | Chamado</P>
        <h2 id="andar">Andar 01</h2>
        <h3 id="quarto">Quarto 01 | Leito 10</h3>       
        <div class="bloco">
            <div class="mtvo" id="mtvo" >Motivo do Chamado</div>
        </div>
        <div class="bloco1">
            <h4>Outro motivo</h4>
            <input placeholder="Digite aqui" maxlength="15" id="mtvTXT" type="text" class="text" required>
            <input type="text" id="valorMotivo" name="valorMotivo" hidden>
            <h5 id="restante">15 Caracteres Restantes</h5>
            <input class="btn" id="enviarBtn" type="submit" value="Enviar">
        </div>
        <div id="overlay" class="overlay"></div>        
        <div id="popup" class="popup">
            <img src="pics/enviado.png" id="send">
            <h6>Motivo Registrado</h6>
        </div>
    </form>      
</body>
</html>