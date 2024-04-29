<?php
include "conexao.php"

$name = $_POST['nm_enfermeiro'];

$email = $_POST['email_enfermeiro'];

$coren = $_POST['nr_coren_enfermeiro'];

$estado = $_POST['sg_estado_enfermeiro'];

$senha = $_POST['senha_enfermeiro'];

echo "Nome: $name Email: $email Coren: $coren Sigla Etsado: $estado Senha: $senha";

?>