<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/icons.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    
    <script src="js/coren.js"></script>
    <script src="js/senha.js"></script>
    <script src="js/cadastro.js"></script>
    <script src="js/seta.js"></script>

    <title>MediCare - Cadastro</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <div class="box2">
        <img src="css/media/setablue.png" id="volta">
        <div class="content">
            <h1>MediCare</h1>
            <span>Cadastro</span>
        </div>
        <div style="width: 35px;"></div>
    </div>

    <form method="post" action="redirecionarCadastro.php" class="container form">
        <p>Nome</p>
        <input id="nome" type="text" name="nm_enfermeiro" class="validate" maxlength="45" required>
        <p>E-Mail</p>
        <input id="email" type="email" name="email_enfermeiro" class="validate" maxlength="45" required>
        <p>Cargo</p>
        <select id="cargo" name="sg_cargo" class="validate" required>
            <option value="" selected disabled hidden>Selecione um cargo</option>
            <option value="TEnf">Técnico de Enfermagem</option>
            <option value="CEnf">Coordenação de Enfermagem</option>
        </select>
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
        <p>Crie uma senha</p>
        <div class="formRow">
            <input id="senha" type="password" name="senha_enfermeiro" maxlength="45" class="validate" required>
            <div class="eyeVisible aberto" id="visibleEye"></div>
        </div>
        <snaN id="passwordVerify">
        <char id="char">• 7 Caracteres</char>
        <num id="num">• Número</num>
        <special id="special">• Caractere Especial</special>
        </snaN>
        <p>Repita sua senha</p>
        <div class="formRow">
            <input id="senhaConfirm" type="password" maxlength="45" class="validate" required>
            <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
        </div>
        <snaF id="wrongPassword"></snaF>
        <div class="button">
            <input type="submit" class="meuBotao" id="cdsrt" value="Cadastre-se">
            <p>Já possui um cadastro? <a href="login.php">Entre!</a></p>

            <div id="overlay-cadastro" class="black"></div>

            <div id="popup-cadastro" class="pop">
                <img src="css/media/arroba.png" id="apop">
                <h2>Um link de confirmação foi enviado para seu email</h2>
            </div>
        </div>
    <?php
    include "conexao.php";
    $sqlVerify = "SELECT id_coren_enfermeiro from tb_enfermeiro;"; //$sql = SELECT id from tb_enfermeiro
    $sqlVerify2 = "SELECT id_coren_coordenador from tb_coordenador;"; //$sql = SELECT id from tb_coordenador
    $id_Found = [];
    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    $result2 = mysqli_query($conn, $sqlVerify2); // verifica no banco de dados

    if ($result->num_rows > 0 || $result2->num_rows > 0) { // para cada coluna

        while($row = $result->fetch_assoc()) {
            array_push($id_Found,$row["id_coren_enfermeiro"]);
        }
        while($row2 = $result2->fetch_assoc()) {
            array_push($id_Found,$row2["id_coren_coordenador"]);
        }
    }
    echo '<script>'; // começa o script js
    echo 'let tb_coren = '. json_encode($id_Found) .';
        let coren = document.getElementById("coren");
        var verify = function() {
            coren.setAttribute("style", noShadow);
            document.getElementById("corenVerify").textContent = "";
            if (coren.value.length == 7){
                for (let i = 0; i < tb_coren.length;i++){ // verifica todos os valores da tabela
                    if (tb_coren[i] == coren.value){ // compara com os registros e o valor colocado
                        coren.setAttribute("style", shadowColor);
                        document.getElementById("corenVerify").textContent = "Coren já cadastrado";
                    }
                }
            }
        };
        coren.addEventListener("keyup", verify);
        coren.addEventListener("change", verify);
    </script>'; // finaliza o script js
    ?>
</body>

</html>
