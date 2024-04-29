<?php
    include "conexao.php";

    $sql = "SELECT * from tb_enfermeiro where id_coren_enfermeiro = '123.123'";
    //coren, sg estado, senha
    $result = mysqli_query($conn, $sql);
    print_r($result);
    echo "<hr>";
    print_r($sql);
    echo "<hr>";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id_coren_enfermeiro"]. " - Name: " . $row["nm_enfermeiro"]. " Senha: " . $row["senha_enfermeiro"]. "<br>";
        }
    } 
?>