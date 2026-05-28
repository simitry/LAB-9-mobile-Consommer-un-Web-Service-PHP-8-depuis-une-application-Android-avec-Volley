<?php

header('Content-Type: application/json; charset=utf-8');

include_once __DIR__ . '/../service/EtudiantService.php';

$es = new EtudiantService();
echo json_encode($es->findAllApi());
