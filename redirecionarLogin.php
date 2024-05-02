

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
  
      $coren = $_POST['id_coren'];
      $estado = $_POST['sg_estado'];
      $senha = $_POST['senha'];
  
        $sql = "SELECT * from tb_enfermeiro where id_coren_enfermeiro = '$coren' and sg_estado_enfermeiro = '$estado' and senha_enfermeiro = '$senha';";
        //coren, sg estado, senha
        $result = mysqli_query($conn, $sql);
        echo "<script>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if ($senha && $senha == $row["senha_enfermeiro"] && $estado && $estado == $row["sg_estado_enfermeiro"]){
                echo "window.location.href = 'qrcodeex.html';localStorage.setItem('id_coren', '$coren');localStorage.setItem('estado_enfermeiro', '$estado');";
              }
            }
        }
        else{
          echo "history.back();";
        }
        echo "</script>";
      ?>

</body>
</html>