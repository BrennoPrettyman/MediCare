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
    
    <script src="js/preencherAtender.js" type="text/javascript"></script>

    <title>MediCare - Relatório Medico</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <div>
        <h1>MediCare</h1>
        <P>Relatório Médico | Chamado</P>
        <h2 id="andar">Andar 01</h2>
        <h3 id="quarto">Quarto 01 | Leito 01</h3>       
        <div class="bloco">
            <div class="mtvo" id="mtvo">Motivo do Chamado</div>
            <?php
            $motivo = $_POST['valorMotivo'];
            $espAtividade = $_POST['esp'];
            $hasMotivo = false;
            $tbMotivos = ["Fortes Dores","Higiêne Pessoal","Mudança de Decúbito","Parada Cardíaca","Queda","Reclamação"];

            for ($i=0; $i < count($tbMotivos); $i++) { 
                if ($motivo == $tbMotivos[$i]){
                    $hasMotivo = true;
                    echo '<div class="mtvo2 botao-adicional azul">'.$tbMotivos[$i].'</div>';
                }
                else{
                    echo '<div class="mtvo2 botao-adicional">'.$tbMotivos[$i].'</div>';
                }
            }
            if ($hasMotivo == false){
                echo '<script>
                document.querySelectorAll(".botao-adicional").forEach(function (botao) {
                    botao.remove();
                });
                </script>';
            }

            ?>
        </div>
        <div class="bloco1">
            <h4>Outro motivo</h4>
            <input placeholder="Digite aqui" maxlength="15" id="mtvTXT" type="text" class="text">
            <h5 id="restante">15 Caracteres Restantes</h5>
            <?php
            if ($hasMotivo == false){
                echo '<script>
                var mtvtxt = document.getElementById("mtvTXT")
                mtvtxt.value = "'.$motivo.'";
                document.getElementById("restante").textContent = 15-mtvtxt.value.length+" Caracteres Restantes";
                </script>';                
            }
            ?>
            <input class="btn" id="enviarBtn" type="submit" value="Enviar">
        </div>
        <div id="overlay" class="overlay"></div>        
        <div id="popup" class="popup">
            <img src="pics/enviado.png" id="send">
            <h6>Motivo Registrado</h6>
        </div>
        <?php
        include "conexao.php";

        session_start();

        $dataBegin = $_SESSION['data_iniciado'];
        $timeBegin = $_SESSION['hora_iniciado'];
        $timeFinal = $_SESSION['hora_fim'];
        $coren = $_SESSION['id_coren_enfermeiro'];
        $sql = "INSERT INTO tb_chamado VALUES (null, '$motivo', '$dataBegin', '$timeBegin', '$timeFinal', '$coren', $espAtividade)";
        mysqli_query($conn, $sql);

        $sql = "UPDATE tb_esp_atividade SET st_esp_atividade = 0 WHERE cd_esp_atividade = $espAtividade;";
        mysqli_query($conn, $sql);

        echo "<script>";
        echo '
        localStorage.setItem("quartoSelecionado",0);
        document.getElementById("overlay").classList.add("show");
        document.getElementById("popup").classList.add("show");
        setTimeout(function () {
            window.location.href = "homeC.php";
        }, 2000);';
        echo "</script>"
        ?>
    </div>
</body>
</html>