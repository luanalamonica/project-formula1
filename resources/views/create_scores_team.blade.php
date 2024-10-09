<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Score Drivers</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1><i class="material-icons text-danger bg-primary rounded me-2" style="font-size: 36px; color: white !important"></i>Add Score Drives</h1>
        </div>
        <hr style="background-color: #FF6900 !important;">

        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">Temporada da equipe:</label>
                <input type="text" class="form-control" placeholder="Ano da Equipe">
            </div>

            <div class="col-6">
                <label class="mb-2">Posição da equipe:</label>
                <input type="text" class="form-control" placeholder="Posição">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">Nome da equipe:</label>
                <input type="text" class="form-control" placeholder="Nome">
            </div>

            <div class="col-6">
                <label class="mb-2">Pontuação da equipe:</label>
                <input type="text" class="form-control" placeholder="Pontuação">
            </div>
        </div>

        <div class="form-group row">
            <div id="tagContainer"></div>
        </div>
        <hr style="background-color: #cc0000 !important;">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <button class="btn btn-primary w-100" style="background-color: #cc0000 !important; border:none !important;">Salvar Equipe</button>
            </div>
        </div>

    </div>
</body>

</html>