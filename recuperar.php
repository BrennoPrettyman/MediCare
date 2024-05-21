<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recuperar.css">
    <link rel="stylesheet" href="css/icons.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/coren.js"></script>

        <title>MediCare - Recuperação</title>
</head>

<body>

    <h1>MediCare</h1>

    <div class="Bloco01">
        <h2>Recuperação</h2>
        <p>Insira o coren cadastrado no MediCare, enviaremos um link via email para que você possa redefinir sua senha</p>

        <form method="post" action="redefinir.php" class="container form">
            <p>Coren</p>
            <input id="coren" type="text" name="nr_coren_enfermeiro" class="validate" placeholder="___.___" maxlength="7" required>
            <snaF id="corenVerify"></snaF>
            <p>Estado</p>
            <select id="estado" name="sg_estado_enfermeiro" class="validate" required>
                <option value="" selected disabled hidden>Selecione um estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
    
            <div class="button">
                <input type="submit" class="meuBotao" id="recuperar" value="Enviar Link">

                <div id="overlay-recuperar" class="black"></div>

                <div id="popup-recuperar" class="pop">
                    <img src="css/media/arroba.png" id="apop">
                    <h3>Um link de recuperação foi enviado para seu email</h3>
                </div>
            </div>
        </form>

    </div>
    <a href="login.php"><img src="css/media/setabranca.png" class="seta"></a>
</body>

</html>