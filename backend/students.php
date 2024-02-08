<?php

/* 
    ALTERNATIVA 1: i dati li costruisco in PHP
*/

// Creo i dati
// $students = [
//     [
//         'name' => 'Mario',
//         'last_name' => 'Rossi'
//     ],
//     [
//         'name' => 'Giovanna',
//         'last_name' => 'Bianchi'
//     ],
// ];

// Dico al client che la risposta contiene un json
// header('Content-Type: application/json');

// Rispondo con il json (trasformando la struttura dati di PHP in una stringa JSON)
// echo json_encode($students);


/* -------------------------------------------------- */


/* 
    ALTERNATIVA 2: i dati li prendo da un file JSON
*/

// Recupero il contenuto del file contenente i dati
$stringaJSONPresaDalDB = file_get_contents('db/students.json');

// Trasformo la stringa in una struttura dati utilizzabile in PHP
$students = json_decode($stringaJSONPresaDalDB, true);

// Qui dentro metto tutti gli studenti "validi"
$allStudents = [];
foreach ($students as $index => $student) {
    if (
        isset($_GET['name']) == false
        ||
        $_GET['name'] == ''
        ||
        strtolower($student['name']) == strtolower($_GET['name'])
    ) {
        $allStudents[] = $student;
    }
}

// Dico al client che la risposta contiene un json
header('Content-Type: application/json');

// Rispondo con il json preso dal file
echo json_encode($allStudents);