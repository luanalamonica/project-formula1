<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Score Team</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1><i class="material-icons text-danger bg-primary rounded me-2" style="font-size: 36px; color: white !important"></i>Add Score Team</h1>
        </div>
        <hr style="background-color: #FF6900 !important;">

    <form action="{{ route('create_scores_team') }}" method="POST">
    @csrf   
        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">Team season:</label>
                <input type="text" class="form-control" placeholder="team year" name="temporada">
            </div>

            <div class="col-6">
                <label class="mb-2">Team position:</label>
                <input type="text" class="form-control" placeholder="position" name="posicao">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">Team name:</label>
                <input type="text" class="form-control" placeholder="name" name="nome">
            </div>

            <div class="col-6">
                <label class="mb-2">Team score:</label>
                <input type="text" class="form-control" placeholder="Score" name="pontuacao">
            </div>
        </div>

        <div class="form-group row">
            <div id="tagContainer"></div>
        </div>
        <hr style="background-color: #cc0000 !important;">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <button class="btn btn-primary w-100" style="background-color: #cc0000 !important; border:none !important;">Save</button>
            </div>
        </div>

        </form>

    </div>
</body>

</html>