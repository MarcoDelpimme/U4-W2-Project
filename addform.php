<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<div class="container mt-5">

    <form class="text-center" action="process_form.php" method="post" novalidate>
        <h1>ADD BOOK</h1>
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="exampleInputName1" name="titolo" aria-describedby="nameHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputSurname1" class="form-label">Autore</label>
            <input type="text" class="form-control" id="exampleInputSurname1" name="autore">
        </div>
        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label">Anno</label>
            <input type="number" class="form-control" id="exampleInputAge1" name="anno_pubblicazione">
        </div>
        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label">Genere</label>
            <input type="text" class="form-control" id="exampleInputAge1" name="genere">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <div class="mt-3">
        <a href="http://localhost/U4-W2-Project/index.php" class="btn btn-info">Show book LIST</a>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>