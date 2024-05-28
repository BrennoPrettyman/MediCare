<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/filtro.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/funcoes.js"></script>
    <script src="js/navBar.js"></script>

    <title>MediCare - Filtro</title>
</head>

<body>
    <h1>MediCare</h1>
    <P>Histórico | Filtro</P>

    <h2>Filtrar Por:</h2>
    <button class="btn" id="cmdA">Chamados Antecedentes     
        <div id="info" class="info">
        Filtra pelos seus atendimentos antigos, mostrando-os primeiro no histórico
        </div>
    </button>

    <div class="bloco1">
        <button class='btn' onclick="quartos()">Quartos</button>
        <?php
            include "conexao.php";
            $sqlVerify = "SELECT * from tb_chamado as c,
                tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q 
            where e.cd_esp_atividade = c.fk_cd_esp_atividade
            and l.id_leito = e.fk_id_leito_leito
            and q.cd_quarto = l.fk_cd_quarto_quarto;"; //$sql = SELECT from mysql
            
            $nr_quartos = [];
            $btnHTML = '';
            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    $existe = false;
                    for ($i=0; $i < count($nr_quartos); $i++) { 
                        if ($nr_quartos[$i] == $row["nr_quarto"]){
                            $existe = true;
                        }
                    }
                    if ($existe == false){
                        array_push($nr_quartos,$row["nr_quarto"]);
                        $btnHTML = '<button id="'.$row["nr_quarto"].'" class="btn3 botao-adicional" onclick="selecionado(id)">Quarto '.str_pad($row["nr_quarto"],2,"0",STR_PAD_LEFT).'</button>'.$btnHTML;        
                    }
               }
            }
            if (count($nr_quartos) < 1){
                $btnHTML = '<button class="btn3 botao-adicional">Não há quartos</button>';
            }
            echo '
            <script>
            // TELA FILTROS - BOTÃO QUARTOS
            localStorage.setItem("quartoSelecionado",0);
            function quartos() {
                var botoesContainer = document.querySelector(".bloco1");
                var botoesAdicionados = document.querySelectorAll(".botao-adicional");
            
                if (botoesAdicionados.length === 0) {
                        var botoesHTML = `
                        '.$btnHTML.'
                    `;
                    botoesContainer.insertAdjacentHTML("beforeend", botoesHTML);
                }
                else {
                    botoesAdicionados.forEach(function (botao) {
                        botao.remove();
                    });
                }
            }
            function selecionado(id){
                localStorage.setItem("quartoSelecionado",id);
            }
            </script>
            ';
        ?>

    </div>

    <div class="navbar">
        <a href="historico.php"><img src="pics/seta.png" class="icon" id="HomeIcon"></a>
        <a href="home.php"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
        <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
    </div>
</body>

</html>
