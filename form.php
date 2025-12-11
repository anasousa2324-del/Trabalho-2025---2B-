
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <br><br><br>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Formulário</h1>
                                <form action="formcadasto.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                    <div class="mb-3">
                                        <label for="validationDefault01" class="form-label" >Nome Completo</label>
                                        <input type="text" class="form-control" name="nome" id="validationDefault01" required>
                                    </div>
                                    <div class="mb-3">
									    <label class="mb-2 text-muted" for="email">Data nascimento</label>
									    <input id="data" type="date" class="form-control" name="data_nasc" value="" required>
									    <div class="invalid-feedback">
										    data
									    </div>
								    </div>
                                    <div class="mb-3">
                                        <label for="validationDefault02" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="validationDefault02" placeholder="Rua" name="rua" required>
                                        <input type="number" class="form-control" id="validationDefault02" placeholder="Número" name="numero" required>
                                        <input type="text" class="form-control" id="validationDefault02" placeholder="Bairro" name="bairro" required>
                                        <input type="number" class="form-control" id="validationDefault02" placeholder="CEP" name="cep" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationDefault03" class="form-label" >Nome Responsável</label>
                                        <input type="text" class="form-control" id="validationDefault03" name="nome_responsavel" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationDefault04" class="form-label">Tipo</label>
                                        <select class="form-select" id="validationDefault04" name="tipo_responsavel" required>
                                        <option value="1">Mãe</option>
                                        <option value="2">Pai</option>
                                        <option value="3">Avó/Avô</option>
                                        <option value="4">Tio/Tia</option>
                                        <option value="5">Irmão/Irmã</option>
                                        <option value="6">outro</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationDefault04" class="form-label">Curso</label>
                                        <select class="form-select" id="validationDefault04" name="curso" required>
                                        <option value="a">Enfermagem</option>
                                        <option value="b">Informática</option>
                                        <option value="d">Administração</option>
                                        <option value="e">Desenvolvimento de Sistemas</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                         <button class="btn btn-primary" type="submit">Enviar</button>
                                     </div>
                                </form>
                            </div>
                        </div>
                        <br><br><br>
                    </div>
            </div>
        </div>
    </section>
</body>
</html>