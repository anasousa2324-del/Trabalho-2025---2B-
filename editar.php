<?php
include 'conexao.php';
include 'menu_adm.php';

$id = $_GET['id'];
$sql = "SELECT * FROM form WHERE id_aluno = $id";
$result = mysqli_query($conexao, $sql);
$dado = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Candidato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
		<div class="container mt-5">
			<div class="card shadow">
				<div class="card-header bg-dark text-white">
                    <h2>Editar Candidato</h2>
                </div>
					<div class="card-body">


<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $dado['id_aluno']; ?>">

    <label>Nome:</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $dado['nome']; ?>"><br>

    <label>Data de Nascimento:</label>
    <input type="date" class="form-control" name="data_nasc" value="<?php echo $dado['data_nasc']; ?>"><br>

    <label>Rua:</label>
    <input type="text" class="form-control" name="rua" value="<?php echo $dado['rua']; ?>"><br>

    <label>Número:</label>
    <input type="text" class="form-control" name="numero" value="<?php echo $dado['numero']; ?>"><br>

    <label>Bairro:</label>
    <input type="text" class="form-control" name="bairro" value="<?php echo $dado['bairro']; ?>"><br>

    <label>CEP:</label>
    <input type="text" class="form-control" name="cep" value="<?php echo $dado['cep']; ?>"><br>

    <label>Nome do Responsável:</label>
    <input type="text" class="form-control" name="nome_responsavel" value="<?php echo $dado['nome_responsavel']; ?>"><br>

    <label>Tipo do Responsável:</label>
    <input type="text" class="form-control" name="tipo_responsavel" value="<?php echo $dado['tipo_responsavel']; ?>"><br>

    <label>Curso:</label>
    <input type="text" class="form-control" name="curso" value="<?php echo $dado['curso']; ?>"><br>

    <button class="btn btn-primary">Salvar Alterações</button>

</form>

</div>
</div>
</div>
<br>
<br>
</body>
</html>
