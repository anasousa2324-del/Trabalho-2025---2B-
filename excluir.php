<?php
include 'conexao.php';
include 'menu_adm.php';

$id = $_GET['id'];

$sql = "DELETE FROM form WHERE id_aluno = $id";
mysqli_query($conexao, $sql);

header("Location: lista_candidatos.php");
exit;
?>
