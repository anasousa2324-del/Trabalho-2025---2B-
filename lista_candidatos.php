<?php
include('conexao.php');
include('menu_adm.php');

$ordenar = isset($_GET['ordenar']) ? $_GET['ordenar'] : '';

// Mapa de ordenação segura (evita SQL injection)
$ordenacao_permitida = [
    'nome' => 'nome',
    'data_nasc' => 'data_nasc',
    'bairro' => 'bairro',
    'curso' => 'curso'
];

// Se existe filtro e é permitido
if (array_key_exists($ordenar, $ordenacao_permitida)) {
    $sql = "SELECT * FROM form ORDER BY " . $ordenacao_permitida[$ordenar] . " ASC";
} else {
    $sql = "SELECT * FROM form ORDER BY id_aluno ASC"; // padrão
}

$result = mysqli_query($conexao, $sql);

$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2 class="mb-4">Lista de Todos os Candidatos</h2>

<!-- Filtro de ordenação -->
<form method="GET" class="mb-3">
    <div class="row g-2">
        <div class="col-md-4">
            <select name="ordenar" class="form-select">
                <option value="">Ordenar por...</option>
                <option value="nome">Nome (A–Z)</option>
                <option value="data_nasc">Idade</option>
                <option value="bairro">Bairro</option>
                <option value="curso">Curso</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="submit">Filtrar</button>
        </div>
    </div>
</form>

<!-- Lista de candidatos -->
<table class="table table-striped table-hover table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nasc.</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>Responsável</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id_aluno']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['data_nasc']; ?></td>
                    <td><?php echo $row['rua']; ?></td>
                    <td><?php echo $row['numero']; ?></td>
                    <td><?php echo $row['bairro']; ?></td>
                    <td><?php echo $row['cep']; ?></td>
                    <td><?php echo $row['nome_responsavel']; ?></td>
                    <td><?php echo $row['curso']; ?></td>
                    <td>
                <a href="editar.php?id=<?php echo $row['id_aluno']; ?>" class="btn btn-warning btn-sm">Editar</a>

                <a href="excluir.php?id=<?php echo $row['id_aluno']; ?>" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Tem certeza que deseja excluir este candidato?');">
                        Excluir
                </a>
            </td>
                </tr>
        <?php 
            }
        } else { ?>
            <tr>
                <td colspan="9" class="text-center">Nenhum candidato encontrado.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
