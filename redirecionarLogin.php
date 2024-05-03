

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

    session_start(); // inicia o 'localstorage'
    $_SESSION['coren_enfermeiro'] = $coren; // cria localstorage com nome 'coren_enfemeiro' e insere valor

    $sql = "SELECT * from tb_enfermeiro
    where id_coren_enfermeiro = '$coren' 
    and sg_estado_enfermeiro = '$estado'
    and senha_enfermeiro = '$senha';"; //$sql = SELECT from mysql

    $result = mysqli_query($conn, $sql); // utiliza no banco de dados

    echo "<script>"; // necesário pois utiliza JS no HTML
    if ($result->num_rows > 0) { // para cada coluna
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if ($senha && $senha == $row["senha_enfermeiro"]
          && $estado && $estado == $row["sg_estado_enfermeiro"]
          && $coren && $coren == $row["id_coren_enfermeiro"]){
            echo "window.location.href = 'qrcodeex.html';";
          }
        }
    }
    else{
      echo "history.back();"; // volta para página anterior
    }
    echo "</script>";
?>

</body>
</html>