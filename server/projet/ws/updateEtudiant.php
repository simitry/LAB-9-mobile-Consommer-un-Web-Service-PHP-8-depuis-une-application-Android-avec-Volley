<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST requis']);
    exit;
}

include_once __DIR__ . '/../service/EtudiantService.php';

foreach (['id', 'nom', 'prenom', 'ville', 'sexe'] as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Champ manquant : ' . $field]);
        exit;
    }
}

$es = new EtudiantService();
$es->update(new Etudiant($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['ville'], $_POST['sexe']));

echo json_encode($es->findAllApi());
