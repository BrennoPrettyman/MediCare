<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Perfil</title>
</head>

<body>


    <?php
        include "conexao.php";
    // wtf is happening here?!?
        echo "<script>";
        echo "const xhr = new XMLHttpRequest();";
        echo "xhr.open('POST', perfil.php, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify({
            coren: localStorage.getItem('id_coren'),
            estado: localStorage.getItem('estado_enfermeiro')
        }));";
        echo "</script>";

        $coren = $_POST['coren'];
        $estado = $_POST['estado'];


        echo "<hr>socorro<hr>";

        $sql = "SELECT * from tb_enfermeiro where id_coren_enfermeiro = '$coren' and sg_estado_enfermeiro = '$estado';";
        print_r($sql);
        echo "<hr>$coren<hr>";

        //coren, sg estado, senha
        $result = mysqli_query($conn, $sql);
        echo "<hr>socorro3";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                print_r($row['senha_enfermeiro']);
            }
        }
        echo "<hr>";
    ?>

    <h1>MediCare</h1>
    <P>Perfil</P>

    <div class="bloco1">
        <img src="pics/perfilblue.png" id="ppic">
        <h2>Nicolas Butera</h2>
    </div>

    <div id="infos">
        <div class="bloco2">
            <img src="pics/arroba.png" id="iinfo">
            <h3>nicolas@enf.gov.br</h3>
        </div>
        <div class="bloco3">
            <img src="pics/listpeople.png" id="iinfo">
            <h3>Coren</h3>
        </div>
        <div class="bloco3">
            <img src="pics/predio.png" id="iinfo">
            <h3>Andar 01</h3>
        </div>
    </div>

    <div id="acao">
        <div class="buttons">
            <a href=""><img src="pics/lapis.png" id="aicon"></a>
            <h4>Editar Perfil</h4>
        </div>
        <div class="buttons">
            <a href="https://nibutera.github.io/MediCareQuemSomos"><img src="pics/quem somos.png" id="aicon"></a>
            <h4>Quem somos</h4>
        </div>
        <div class="buttons">
            <a href="index.html"><img src="pics/sair.png" id="aicon"></a>
            <h4>Encerrar Turno</h4>
        </div>
    </div>
    <div class="navbar">
        <a href="homeC.html"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
        <a href="relatorio.html"><img src="pics/relatorios.png" class="icon" id="PaperIcon"></a>
        <a href="historico.html"><img src="pics/history.png" class="icon" id="ClockIcon"></a>
        <a href="perfil.html"><img src="pics/INperfil.png" class="icon" id="PeopleIcon"> </a>
    </div>

</body>

</html>