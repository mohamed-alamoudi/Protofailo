<?php
header("Content-Type: application/json");

ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';
$message = $data['message'] ?? '';


$file = __DIR__ . '/../contact_data.csv';
$file_exists = file_exists($file);
$fp = fopen($file, 'a');

if ($fp === false) {
    echo json_encode(['success' => false, 'error' => 'Failed to open file']);
    exit;
}

if (!$file_exists) {
    fputcsv($fp, ['name', 'email', 'phone number', 'message']);
}

fputcsv($fp, [$name, $email, $phone, $message]);
fclose($fp);

echo json_encode(['success' => true]);
