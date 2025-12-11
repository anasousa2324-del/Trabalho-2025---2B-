<?php 
include('menu_adm.php');
session_start(); 
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="container mt-4">

    <h2 class="text-center mb-4">Olá administrador!</h2>

    <div class="row justify-content-center gap-4">

        <!-- CARD 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Relatórios</h5>
                    <p class="card-text">Abra o relatório com gráficos sobre as inscrições de novos alunos</p>
                    <a href="relatorio.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Lista de Candidatos</h5>
                    <p class="card-text">Veja a lista completa dos candidatos a ser aluno da EEEP.</p>
                    <a href="lista_candidatos.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
        </div>

    </div>
</section>
