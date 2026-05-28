<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST requis']);
    exit;
}

include_once __DIR__ . '/../service/EtudiantService.php';

if (!isset($_POST['id']) || trim($_POST['id']) === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Champ manquant : id']);
    exit;
}

$es = new EtudiantService();
$es->delete(new Etudiant($_POST['id'], '', '', '', ''));

echo json_encode($es->findAllApi());
