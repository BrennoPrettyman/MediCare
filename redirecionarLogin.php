

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    include "conexao.php";

    $coren = $_POST['id_coren']; // $_Post obtém a variavel
    $estado = $_POST['sg_estado'];
    $senha = $_POST['senha'];
    $cargo = $_POST['sg_cargo'];

    $tbSelecionada = "";
    $valorSelecionado = [];

    if ($cargo == "TEnf"){
        $tbSelecionada = "tb_enfermeiro";
        array_push($valorSelecionado, 
        "id_coren_enfermeiro",
        "sg_estado_enfermeiro",
        "senha_enfermeiro"
        );
    }
    elseif ($cargo == "CEnf"){
        $tbSelecionada = "tb_coordenador";
        array_push($valorSelecionado, 
        "id_coren_coordenador",
        "sg_estado_coordenador",
        "senha_coordenador"
        );
    }

    if ($tbSelecionada != "" && count($valorSelecionado) > 0){
    session_start(); // inicia o 'localstorage'
    $_SESSION = [];
    $_SESSION[$valorSelecionado[0]] = $coren; // cria localstorage com nome 'coren_enfemeiro' e insere valor

    $sql = 'SELECT * from '.$tbSelecionada.'
    where '.$valorSelecionado[0].' = \''.$coren.'\'
    and '.$valorSelecionado[1].' = \''.$estado.'\'
    and '.$valorSelecionado[2].' = \''.$senha.'\';'; //$sql = SELECT from mysql

    $result = mysqli_query($conn, $sql); // utiliza no banco de dados

    $sqlQuarto = "SELECT * from tb_quarto;"; //$sql = SELECT from mysql
    $resultQuarto = mysqli_query($conn, $sqlQuarto); // verifica no banco de dados

    $sqlLeito = "SELECT * from tb_leito;"; //$sql = SELECT from mysql
    $resultLeito = mysqli_query($conn, $sqlLeito); // verifica no banco de dados

    $sqlESP = "SELECT * from tb_esp_atividade;"; //$sql = SELECT from mysql
    $resultESP = mysqli_query($conn, $sqlESP); // verifica no banco de dados

    echo "<script>"; // necesário pois utiliza JS no HTML
    if ($result->num_rows > 0) { // para cada coluna
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if ($senha && $senha == $row[$valorSelecionado[2]]
          && $estado && $estado == $row[$valorSelecionado[1]]
          && $coren && $coren == $row[$valorSelecionado[0]]){
            if ($resultQuarto->num_rows <= 0) {
                $sql1 = "INSERT INTO tb_quarto VALUES (null, 3, 2, 'Santana'), (null, 5, 6, 'Santana'), (null, 7, 4, 'Santana')";
                mysqli_query($conn, $sql1);
            }
            if ($resultLeito->num_rows <= 0) {
              $sql2 = "INSERT INTO tb_leito VALUES (null, 1), (null, 2), (null, 3)";
              mysqli_query($conn, $sql2);
            }
            if ($resultESP->num_rows <= 0) {
              $sql3 = "INSERT INTO tb_esp_atividade VALUES (null, true, 1), (null, false, 2), (null, false, 3)";
              mysqli_query($conn, $sql3);
            }
            if ($cargo == "TEnf"){
              echo "window.location.href = 'qrcodeex.html';";
            }
            else if ($cargo == "CEnf"){
              echo "window.location.href = 'gestao.php';";
            }
            else{
              echo "history.back();";
            }
          }
        }
    }
    else{
      echo "history.back();"; // volta para página anterior
    }
    echo "</script>";
    }
    else{
      echo "history.back();"; // volta para página anterior
    }
?>

</body>
</html>