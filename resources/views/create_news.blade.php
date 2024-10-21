<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="logo1.png">
    <title>Add News</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1><i class="material-icons text-danger bg-primary rounded me-2" style="font-size: 36px; color: white !important"></i>Add News</h1>
        </div>
        <hr style="background-color: #FF6900 !important;">

    <form action="{{ route('create_news') }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">News title:</label>
                <input type="text" class="form-control" placeholder="news title" name="titulo">
            </div>

            <div class="col-6">
                <label class="mb-2">Type:</label>
                <input type="text" class="form-control" placeholder="News, video, ..." name="tipo">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label class="mb-2">Description:</label>
                <input type="text" class="form-control" placeholder="about the news" name="descricao">
            </div>

            <div class="col-6">
                <label class="mb-2">Link:</label>
                <input type="text" class="form-control" placeholder="link" name="link">
            </div>
        </div>

        <div class="form-group row">
            <div id="tagContainer"></div>
        </div>
        <hr style="background-color: #cc0000 !important;">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <button type="submit" class="btn btn-primary w-100" style="background-color: #cc0000 !important; border:none !important;">Save</button>
            </div>
        </div>
    </form>

    </div>
</body>

</html>