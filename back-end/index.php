<?php 
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json'); // Funzione che specifica il formato in  cui sono scritti i dati

$toDoStr = file_get_contents('data.json');
echo $toDoStr;


?>