

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
  
        $sql = "SELECT * from tb_enfermeiro where id_coren_enfermeiro = '$coren' and sg_estado_enfermeiro = '$estado';";
        //coren, sg estado, senha
        $result = mysqli_query($conn, $sql);
        echo "<h1>";
        print_r($result);
        echo "</h1><hr><h1>";
        print_r($sql);
        echo "</h1><hr>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if ($senha && $senha == $row["senha_enfermeiro"]){
                echo "id: " . $row["id_coren_enfermeiro"]. " - Name: " . $row["nm_enfermeiro"]. " Senha: " . $row["senha_enfermeiro"]. "<br>";
              }
              else{
                echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
              }
            }
        }
      ?>

</body>
</html>