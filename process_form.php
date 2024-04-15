<?php
$host = 'localhost';
$db   = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['titolo']) && !empty($_POST['autore']) && !empty($_POST['anno_pubblicazione']) && !empty($_POST['genere'])) {
        $titolo = $_POST['titolo'];
        $autore = $_POST['autore'];
        $anno_pubblicazione = $_POST['anno_pubblicazione'];
        $genere = $_POST['genere'];

       
        if (!is_numeric($anno_pubblicazione) || $anno_pubblicazione <= 0) {
            $errors['anno_pubblicazione'] = "L'anno di pubblicazione deve essere un numero positivo.";
        } else {
            
            $stmt = $pdo->prepare("INSERT INTO  libri (titolo, autore, anno_pubblicazione, genere) VALUES (:titolo, :autore, :anno_pubblicazione, :genere)");
            $stmt->execute([
                'titolo' => $titolo,
                'autore' => $autore,
                'anno_pubblicazione' => $anno_pubblicazione,
                'genere' => $genere,
            ]);
          
            header('Location: index.php');
            exit;
        }
    } else {
        
        $errors['general'] = "Tutti i campi sono obbligatori.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
</head>
<body>


<div class="container mt-5">

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form class="text-center" action="process_form.php" method="post" novalidate>
        <h1>ADD BOOK</h1>
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Titolo</label>
            <input type="text" class="form-control <?php echo isset($errors['titolo']) ? 'is-invalid' : ''; ?>" id="exampleInputName1" name="titolo" aria-describedby="nameHelp">
            <?php if (isset($errors['titolo'])) : ?>
                <div class="invalid-feedback">
                    <?php echo $errors['titolo']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputSurname1" class="form-label">Autore</label>
            <input type="text" class="form-control <?php echo isset($errors['autore']) ? 'is-invalid' : ''; ?>" id="exampleInputSurname1" name="autore">
            <?php if (isset($errors['autore'])) : ?>
                <div class="invalid-feedback">
                    <?php echo $errors['autore']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label">Anno</label>
            <input type="number" class="form-control <?php echo isset($errors['anno_pubblicazione']) ? 'is-invalid' : ''; ?>" id="exampleInputAge1" name="anno_pubblicazione">
            <?php if (isset($errors['anno_pubblicazione'])) : ?>
                <div class="invalid-feedback">
                    <?php echo $errors['anno_pubblicazione']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label">Genere</label>
            <input type="text" class="form-control <?php echo isset($errors['genere']) ? 'is-invalid' : ''; ?>" id="exampleInputAge1" name="genere">
            <?php if (isset($errors['genere'])) : ?>
                <div class="invalid-feedback">
                    <?php echo $errors['genere']; ?>
                </div>
            <?php endif; ?>
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
