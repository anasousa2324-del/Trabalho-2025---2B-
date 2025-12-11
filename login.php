<?php
session_start();
include('conexao.php');
include('menu.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT user_id, user_email FROM users WHERE user_email = '$email' AND user_password = MD5('$senha')";
$queryAdmin = "SELECT admin_id, email_admin FROM users_adm WHERE email_admin = '$email' AND password_admin = MD5('$senha')";
$result = mysqli_query($conexao, $query);
$resultAdmin = mysqli_query($conexao, $queryAdmin);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

if (!$resultAdmin) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$row = mysqli_num_rows($result);
$rowAdmin = mysqli_num_rows($resultAdmin);

if ($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: painel.php');
    exit();
}
else if($rowAdmin == 1){
    $_SESSION['email'] = $email;
    header('Location: painel_admin.php');
    exit();
}
else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}



?>