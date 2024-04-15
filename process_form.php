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


$pdo= new PDO ($dsn,$user,$pass,$options );

    $titolo=$_POST['titolo'];
    $autore=$_POST['autore'];
    $anno_pubblicazione=$_POST['anno_pubblicazione'];
    $genere=$_POST['genere'];
   
    $stmt=$pdo->prepare("INSERT INTO  libri (titolo,autore,anno_pubblicazione,genere) VALUE (:titolo, :autore, :anno_pubblicazione, :genere)");
$stmt->execute([
    'titolo'=>$titolo,
    'autore'=>$autore,
    'anno_pubblicazione'=>$anno_pubblicazione,
    'genere'=>$genere,
]);

header('Location:index.php')

?>