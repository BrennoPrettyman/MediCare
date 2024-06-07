<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/icons.css">

    <script src="js/coren.js"></script>
    <script src="js/senha.js"></script>
    <script src="js/seta.js"></script>

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <title>MediCare - Login</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <div class="box2">
        <img src="css/media/setablue.png" id="volta">
        <div class="content">
            <h1>MediCare</h1>
            <span>Login</span>
        </div>
        <div style="width: 30px;"></div>
    </div>
    <img src="css/media/MediCare.png" alt="" class="logo">
    <div class="Bloco">
        <form method="post" action="redirecionarLogin.php" class="container form">
        <p>Cargo</p>
        <select id="cargo" name="sg_cargo" class="validate" required>
            <option value="" selected disabled hidden>Selecione um cargo</option>
            <option value="TEnf">Técnico de Enfermagem</option>
            <option value="CEnf">Coordenação de Enfermagem</option>
        </select>
            <p>Coren</p>
            <input id="coren" type="text" name="id_coren" class="validate" placeholder="___.___" maxlength="7" required>
            <snaF id="corenVerify"></snaF>
            <p>Estado</p>
            <select id="estado" name="sg_estado" class="validate" required>
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
            <snaF id="estadoVerify"></snaF>
            <p>Insira sua senha</p>
            <div class="formRow">
                <input id="senha" name="senha" type="password" maxlength="45" class="validate" required>
                <div class="eyeVisible aberto" id="visibleEye"></div>
            </div>
            <snaF id="wrongPassword"></snaF>
            <input type="submit" class="meuBotao" value="Entrar" id="amogus">
            <p>Esqueceu sua senha? <a href="recuperar.php">Recupere!</a></p>
        </form>
    </div>
    <?php
    include "conexao.php";
    $sqlVerify = "SELECT id_coren_enfermeiro, sg_estado_enfermeiro, senha_enfermeiro from tb_enfermeiro;"; //$sql = SELECT id from tb_enfermeiro
    $sqlVerify2 = "SELECT id_coren_coordenador, sg_estado_coordenador, senha_coordenador from tb_coordenador;"; //$sql = SELECT id from tb_coordenador
    $id_Found = [];
    $sg_found = [];
    $senha_Found = [];

    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    $result2 = mysqli_query($conn, $sqlVerify2); // verifica no banco de dados

    if ($result->num_rows > 0 || $result2->num_rows > 0) { // para cada coluna
        while($row = $result->fetch_assoc()) {
          if ($row["id_coren_enfermeiro"]){
            array_push($id_Found,$row["id_coren_enfermeiro"]);
          }
          if ($row["sg_estado_enfermeiro"]){
            array_push($sg_found,$row["sg_estado_enfermeiro"]);
          }
          if ($row["senha_enfermeiro"]){
            array_push($senha_Found,$row["senha_enfermeiro"]);
          }
        }
        while($row2 = $result2->fetch_assoc()) {
            if ($row2["id_coren_coordenador"]){
              array_push($id_Found,$row2["id_coren_coordenador"]);
            }
            if ($row2["sg_estado_coordenador"]){
              array_push($sg_found,$row2["sg_estado_coordenador"]);
            }
            if ($row2["senha_coordenador"]){
              array_push($senha_Found,$row2["senha_coordenador"]);
            }
          }
    }
    echo '<script>'; // começa o script js
    echo "let tb_coren = ". json_encode($id_Found) .";"; // transforma o array php para js
    echo "let tb_estado = ". json_encode($sg_found) .";"; 
    echo "let tb_senha = ". json_encode($senha_Found) .";";
    echo 'let coren = document.getElementById("coren");
        let estado = document.getElementById("estado");
        let senha = document.getElementById("senha");

        let shadowColor ="box-shadow: red 0px 0px 6px 0.5px;";
        let noShadow ="transparent 0px 0px 0px 0px;";

        let allowed = false;
        let senhaVerified = false;
        let estadoVerified = false;


        var verify = function() {
            allowed = false;

            let corenVerified = false;
            senhaVerified = false;
            estadoVerified = false;

            // se caso o usuário utilizar o backspace
            if (coren.value.length > 0){
                coren.setAttribute("style", noShadow);
                document.getElementById("corenVerify").textContent = "";
            }
            if (estado.options[estado.selectedIndex].value.length > 0){
                estado.setAttribute("style", noShadow);
                document.getElementById("estadoVerify").textContent = "";
            }
            if (senha.value.length > 0){
                senha.setAttribute("style", noShadow);
                document.getElementById("wrongPassword").textContent = "";
            }

            if (coren.value.length == 7){
                for (let i = 0; i < tb_coren.length;i++){ // verifica todos os valores da tabela
                    if (tb_coren[i] == coren.value){ // compara com os registros e o valor colocado
                        corenVerified = true;
                        if (tb_estado[i] == estado.options[estado.selectedIndex].value){
                            estadoVerified = true;
                        }
                        if (tb_senha[i] == senha.value){
                            senhaVerified = true;
                        }
                    }
                    
                
                }
                if (corenVerified == false){
                    coren.setAttribute("style", shadowColor);
                    document.getElementById("corenVerify").textContent = "Coren não cadastrado";
                }
                if (corenVerified == true && estadoVerified == true && senhaVerified == true){
                    allowed = true;
                }
            }
        };
        coren.addEventListener("keyup", verify);
        estado.addEventListener("change", verify);
        senha.addEventListener("keyup", verify);

        senha.addEventListener("keyup", () => {
            allowed = true;
            const isContainsSymbol = /^(?=.*[~`!@#$%^*--+={}\[\]|\\:<>,.?/_₹]).*$/;
            const notAllowed = /^(?=.*[=)("\';]).*$/;
            if (!isContainsSymbol.test(senha.value) || notAllowed.test(senha.value) == true){
                    allowed = false;
            }
        })


        document.addEventListener("submit", (event) => {
            if (allowed == false){
                event.preventDefault();
                let firstRequired = true;
                if (coren.value.length < 7){
                    coren.setAttribute("style", shadowColor);
                    document.getElementById("corenVerify").textContent = "Coren não cadastrado";
                    firstRequired = false;
                }
                else if (estadoVerified == false && coren.value.length == 7){
                    estado.setAttribute("style", shadowColor);
                    document.getElementById("estadoVerify").textContent = "Estado não cadastrado";
                }
                else if (senhaVerified == false && coren.value.length == 7 && estado.options[estado.selectedIndex].value.length == 2 && firstRequired == true){
                    senha.setAttribute("style", shadowColor);
                    document.getElementById("wrongPassword").textContent = "Senha Incorreta";
                }
            }
            });
    </script>'; // finaliza o script js
    ?>
</body>
