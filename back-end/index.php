<?php 

header('Content-Type: application/json'); // Funzione che specifica il formato in  cui sono scritti i dati

$tasks = [
    [
        'name' => 'Spippolare nei menu di Obsidian',
        'state' => 'completed'
    ],
    [
        'name' => 'Coding Challenge',
        'state' => 'todo'
    ],
];

echo json_encode($tasks); // Restituisce la stringa del contenuto dell'array sotto forma di json


?>