<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['row'])) {
    $index = (int)$_POST['row'];
    $file = '../contact_data.csv';

    if (file_exists($file)) {
        $rows = array_map('str_getcsv', file($file));
        if (isset($rows[$index])) {
            unset($rows[$index]);
            $handle = fopen($file, 'w');
            foreach ($rows as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
    }
    header('Location: dashboard.php');
    exit;
}
