<?php
session_start();
include('conexao.php');

//verificar se os campos estão vazios
if(empty($_POST['nome']) || empty($_POST['data_nasc']) || empty($_POST['rua']) || empty($_POST['numero']) || empty($_POST['bairro']) || empty($_POST['cep']) || empty($_POST['nome_responsavel']) || empty($_POST['tipo_responsavel']) || empty($_POST['curso'])){
    $_SESSION['mensagem'] = "Preencha todos os campos!";
    header('Location: form.php');
    exit();
}

//sanitização
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$data_nasc = mysqli_real_escape_string($conexao, trim($_POST['data_nasc']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$nome_responsavel = mysqli_real_escape_string($conexao, trim($_POST['nome_responsavel']));
$tipo_responsavel = mysqli_real_escape_string($conexao, trim($_POST['tipo_responsavel']));
$curso = mysqli_real_escape_string($conexao, trim($_POST['curso']));


// inserir o novo aluno
$sqliInserir = "INSERT INTO form(nome, data_nasc, rua, numero, bairro, cep, nome_responsavel, tipo_responsavel, curso) VALUES ('$nome', '$data_nasc', '$rua', '$numero', '$bairro', '$cep', '$nome_responsavel', '$tipo_responsavel', '$curso')";

if(mysqli_query($conexao, $sqliInserir)){
    $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
    header('Location: form_concluido.php');
    exit();
}else{
    $_SESSION['mensagem'] = "Erro ao cadastrar" . mysqli_error($conexao);
    header('Location: form.php');
    exit();
}
?>