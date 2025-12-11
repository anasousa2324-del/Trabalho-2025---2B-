<?php
session_start();
include 'conexao.php';
include 'menu_adm.php';

// --- CONSULTA 1: Candidatos por curso ---
$sqlCursos = "SELECT curso, COUNT(*) AS total FROM form GROUP BY curso ORDER BY total DESC";
$resultCursos = mysqli_query($conexao, $sqlCursos);

$cursosNomes = [
  'a' => "Enfermagem",
  'b' => "Informática",
  'd' => "Administração",
  'e' => "Desenvolvimento de Sistemas"
];

$cursoLabels = [];
$cursoValores = [];

while ($row = mysqli_fetch_assoc($resultCursos)) {
    $cursoLabels[] = $cursosNomes[$row['curso']];
    $cursoValores[] = $row['total'];
}

// --- CONSULTA 2: Bairros com mais pessoas ---
$sqlBairros = "SELECT bairro, COUNT(*) AS total FROM form GROUP BY bairro ORDER BY total DESC";
$resultBairros = mysqli_query($conexao, $sqlBairros);

$bairroLabels = [];
$bairroValores = [];

while ($row = mysqli_fetch_assoc($resultBairros)) {
    $bairroLabels[] = $row['bairro'];
    $bairroValores[] = $row['total'];
}

// --- CONSULTA 4: porcentagem por curso ---
$sqlPorcentagem = "SELECT 
    curso,
    (COUNT(*) * 100.0 / (SELECT COUNT(*) FROM form)) AS percentual
FROM form
GROUP BY curso
ORDER BY percentual DESC;
";
$resultPorcentagem = mysqli_query($conexao, $sqlPorcentagem);

$porcentagemLabels = [];
$porcentagemValores = [];

while ($row = mysqli_fetch_assoc($resultPorcentagem)) {
    $porcentagemLabels[] = $cursosNomes[$row['curso']];
    $porcentagemValores[] = round($row['percentual'], 2);
}


// --- Destacar maior curso ---
$maxIndex = array_keys($cursoValores, max($cursoValores))[0];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gráficos</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-light">
<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
<div class="container my-5">

    <div class="row text-center mb-4">
        <h2 class="fw-bold">Relatórios dos Candidatos</h2>
    </div>

    <div class="row">

        <!-- GRÁFICO 1 - PIZZA: Candidatos por curso -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header text-center fw-bold">
                    Candidatos por Curso
                </div>
                <div class="card-body">
                    <canvas id="graficoCurso"></canvas>
                </div>
            </div>
        </div>

        <!-- GRÁFICO 2 - BARRA: Bairros -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header text-center fw-bold">
                    Bairros com mais candidatos
                </div>
                <div class="card-body">
                    <canvas id="graficoBairro"></canvas>
                </div>
            </div>
        </div>

        <!-- GRÁFICO 3 - TOTAL: Curso -->
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
            
					</div>
					<div class="card shadow-lg">
          <!-- Título -->
          <div class="card-header text-center fw-bold">
                    Número total de candidatos
                </div>
			
		    <?php 
			//consulta 7
		    $sqlTOTAL = "SELECT COUNT(id_aluno) AS total FROM form";
			$resultTOTAL = mysqli_query($conexao, $sqlTOTAL);
			$rowTOTAL = mysqli_fetch_assoc($resultTOTAL);
			?>
			<div class="card-body p-5 text-center">
    		<h1><?php echo $rowTOTAL['total']; ?></h1>
			</div>


					<div class="card-body p-5">
			

				</div>
			</div>
		</div>

    <!-- GRÁFICO 4 - BARRA: Porcentagem por curso -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-header text-center fw-bold">
                    Porcentagem por Curso (%)
                </div>
                <div class="card-body">
                    <canvas id="graficoPorcentagem"></canvas>
                </div>

    </div>
</div>
 </div>
</div>
<script>
// Dados do PHP → JS
const cursoLabels = <?= json_encode($cursoLabels); ?>;
const cursoValores = <?= json_encode($cursoValores); ?>;

const bairroLabels = <?= json_encode($bairroLabels); ?>;
const bairroValores = <?= json_encode($bairroValores); ?>;

const porcentagemLabels = <?= json_encode($porcentagemLabels); ?>;
const porcentagemValores = <?= json_encode($porcentagemValores); ?>;

const maiorCursoIndex = <?= $maxIndex ?>;

// Paleta padrão
const cores = [
  '#39c915ff', '#bb30f1ff', '#0720fcff', '#f11414ff',
  '#2ed6189c', '#da49edd8', '#0e2acacb', '#ff0040b4'
];

// Copia e destaca o maior curso

// GRÁFICO 1 - Pizza destacando o maior
new Chart(document.getElementById('graficoCurso'), {
    type: 'bar',
    data: {
        labels: cursoLabels,
        datasets: [{
            label: 'Candidatos por Curso',
            data: cursoValores,
            backgroundColor: cores
        }]
    }
});

// GRÁFICO 2 - Barra (bairros)
new Chart(document.getElementById('graficoBairro'), {
    type: 'pie',
    data: {
        labels: bairroLabels,
        datasets: [{
            data: bairroValores,
            backgroundColor: cores
        }]
    },
    options: {
        scales: { y: { beginAtZero: true } }
    }
});

// GRÁFICO 4 - Porcentagem por curso
new Chart(document.getElementById('graficoPorcentagem'), {
    type: 'bar',
    data: {
        labels: porcentagemLabels,
        datasets: [{
            label: 'Porcentagem por Curso (%)',
            data: porcentagemValores,
            backgroundColor: cores
        }]
    },
    options: {
        scales: { y: { beginAtZero: true } }
    }
});

</script>

</body>
</html>
