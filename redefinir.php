<!DOCTYPE html>
<html lang="pt-BR<!DOCTYPE html>
<html lang=" pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/redefinir.css">
    <link rel="stylesheet" href="css/icons.css">
    <script src="js/senha.js"></script>
    <script src="js/redefinir.js"></script>
    <script src="js/darkmode.js"></script>
   
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Recuperação</title>
</head>

<body>
<div class="mode">
        <h1>MediCare</h1>
        <img src="css/media/sol.png" id="MIcon" onclick="switchMode()">
</div>

    <?php
        $coren = $_POST['nr_coren_enfermeiro'];
        $estado = $_POST['sg_estado_enfermeiro'];

        session_start(); // inicia o 'localstorage'
        $_SESSION['coren_redefinir'] = $coren; // cria localstorage com nome 'coren_redefinir' e insere valor
        $_SESSION['estado_redefinir'] = $estado; // cria localstorage com nome 'estado_redefinir' e insere valor
        echo '<script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("overlay-recuperar").classList.add("show");
            document.getElementById("popup-recuperar").classList.add("show");
            document.getElementById("block2").setAttribute("hidden","true");
            setTimeout(function () {
                document.getElementById("overlay-redefinir").classList.remove("show");
                document.getElementById("popup-redefinir").classList.remove("show");
                document.getElementById("block1").setAttribute("hidden","true");
                document.getElementById("block2").attributes.removeNamedItem("hidden");
            }, 2000);
        });
        </script>';
    ?>
    <div class="Bloco01" id="block1">
        <h2>Recuperação</h2>
        <p>Insira o coren cadastrado no MediCare, enviaremos um link via email para que você possa redefinir sua senha</p>

        <div class="container form">
            <p>Coren</p>
            <input id="coren" type="text" name="nr_coren_enfermeiro" class="validate" placeholder="___.___" maxlength="7">
            <snaF id="corenVerify"></snaF>
            <p>Estado</p>
            <select id="estado" name="sg_estado_enfermeiro" class="validate">
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
    </div>

    </div>

    <div class="Bloco02" id="block2">
        <form method="post" action="senhaAlterada.php" class="container form">
            <h2>Redefina sua senha</h2>
            <p>Crie uma nova senha forte de no minímo seis caracteres, contendo números, letras e um caracter especial</p>
            
            <p>Crie uma senha</p>
            
            <div class="formRow">
                <input id="senha" type="password" class="validate" name="passnha" required>
                <div class="eyeVisible aberto" id="visibleEye"></div>
            </div>
            <snaN id="passwordVerify">
                <char id="char">• 7 Caracteres</char>
                <num id="num">ﾠ• Número</num>
                <special id="special">ﾠ• Caracter Especial</special>
            </snaN>

        
            <p>Repita sua senha</p>
            <div class="formRow">
                <input id="senhaConfirm" type="password" class="validate" required>
                <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
            </div>
            <snaF id="wrongPassword"></snaF>
        
            
            <div class="button">
                <input type="submit" class="meuBotao" id="redefinir" value="Redefinir Senha">
                
                <div id="overlay-redefinir" class="black"></div>
            
                <div id="popup-redefinir" class="pop">
                    <img src="css/media/password.png" id="apop">
                    <h3>Senha redefinida com sucesso</h3>
                </div> 
            </div>
        </form>
    </div>
    <a href="recuperar.php"><img src="css/media/setabranca.png" class="seta"></a>
</body>

</html>
