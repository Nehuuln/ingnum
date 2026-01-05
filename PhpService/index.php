<?php
header('Content-Type: application/json');

$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Unknown';

$response = [
    'customer' => $name,
    'address' => '1 Rue de Paris, 75000 Paris',
];

echo json_encode($response);
?>