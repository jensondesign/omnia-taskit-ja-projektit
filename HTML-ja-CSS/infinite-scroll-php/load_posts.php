<?php
// Simuloitu tietokannasta tuleva data
$data = [];
for ($i = 1; $i <= 20; $i++) {
    $data[] = "Post $i";
}

header('Content-Type: application/json');
echo json_encode($data);
