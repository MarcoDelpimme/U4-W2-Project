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



if(isset($_GET['search_query'])) {
    $search_query = '%' . $_GET['search_query'] . '%';

    $stmt = $pdo->prepare("SELECT * FROM libri WHERE titolo LIKE :search_query_titolo OR autore LIKE :search_query_autore");
   
    $stmt->execute([ 'search_query_titolo' => $search_query,
    'search_query_autore' => $search_query]);

    $i=1;
    echo "<div class='container'>";
    echo "<h1>SEARCH RESULTS </h1>";
echo "<table class='table'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th scope='col'>#</th>";
echo "<th scope='col'>Titolo</th>";
echo "<th scope='col'>Autore</th>";
echo "<th scope='col'>Anno Pubblicazione</th>";
echo "<th scope='col'>genere</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($stmt as $row) {
    echo "<tr>";
    echo "<th scope='row'>$i</th>";
    echo "<td>{$row['titolo']}</td>";
    echo "<td>{$row['autore']}</td>";
    echo "<td>{$row['anno_pubblicazione']}</td>"; 
    echo "<td>{$row['genere']}</td>"; 
    echo "<td id='btn-td'>";
    echo "<a href='http://localhost/U4-W2-Project/delete.php?id={$row['id']}' class='btn btn-danger'>delete</a> ";
    echo "<a href='http://localhost/U4-W2-Project/details.php?id={$row['id']}' class='btn btn-info'>details</a> ";
    echo "<a href='http://localhost/U4-W2-Project/modify.php' class='btn btn-warning'>modify</a>";
    echo "</td>";
    echo "</tr>";
    $i++;
}

echo "</tbody>";
echo "</table>";
echo "<a href='http://localhost/U4-W2-Project/' class='btn btn-info'>Form/Home</a> ";
echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>