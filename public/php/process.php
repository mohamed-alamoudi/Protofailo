<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone   = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $phone && $email && $message) {
        // CSV
        $csvFile = '../../src/contact.csv';

        $file = fopen($csvFile, 'a');

        if ($file) {
            if (filesize($csvFile) == 0) {
                fputcsv($file, ['name', 'phone number', 'email', 'message', 'date']);
            }

            fputcsv($file, [$name, $phone, $email, $message, date("Y-m-d H:i:s")]);

            fclose($file);
            echo "Data has been sent and stored in a CSV file.";
        } else {
            echo "Error opening CSV file.";
        }
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request.";
}
