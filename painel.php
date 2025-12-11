<?php
session_start();
include('verifica_login.php');
include('menu.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<h2>Olá, <?php echo $_SESSION['email'];?></h2>
<br>

<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card p-3" style="width: 18rem;">
    <h5 class="card-title">Inscrições</h5>
    <p class="card-text">Se candidate a entrar na EEEP Manoel Mano para a turma de 2026.</p>
    <a href="form.php" class="btn btn-primary">formulário</a>
    </div>
  </div>
</div>

