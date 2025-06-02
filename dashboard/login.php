<?php
session_start();

$valid_user = 'hamooda';
$valid_pass = '18102005';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#0078d7" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login dashboard</title>
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
</head>

<body class="login">
    <div class="title">Login dashboard</div>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>user name:</label>
        <input type="text" name="username" required><br>

        <label>password:</label>
        <input type="password" name="password" required>

        <div class="btn">
            <a class="button" href="../home.html"><span>exit</span></a>
            <button type="submit">registration</button>
        </div>
    </form>
</body>

</html>