<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="theme-color" content="#0078d7" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>contact dashboard</title>
    <!-- link font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- link favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <!-- all.css -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- dashboard.css -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="title">Dashboard</div>

    <h2>Data received</h2>

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>phone number</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $file = '../contact_data.csv';
            if (file_exists($file)) {
                $handle = fopen($file, 'r');
                $isFirstRow = true;
                while (($row = fgetcsv($handle)) !== false) {
                    if ($isFirstRow) {
                        $isFirstRow = false;
                        continue;
                    }
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }
                fclose($handle);
            } else {
                echo '<tr><td colspan="4">No data yet.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <a href="logout.php">Log out</a>
</body>

</html>