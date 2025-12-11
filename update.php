<?php 
include 'conexao.php';
include 'menu_adm.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$nome_responsavel = $_POST['nome_responsavel'];
$tipo_responsavel = $_POST['tipo_responsavel'];
$curso = $_POST['curso'];

$sql = "UPDATE form SET 
        nome='$nome',
        data_nasc='$data_nasc',
        rua='$rua',
        numero='$numero',
        bairro='$bairro',
        cep='$cep',
        nome_responsavel='$nome_responsavel',
        tipo_responsavel='$tipo_responsavel',
        curso='$curso'
        WHERE id_aluno=$id";

mysqli_query($conexao, $sql);

header("Location: lista_candidatos.php");
exit;
?>