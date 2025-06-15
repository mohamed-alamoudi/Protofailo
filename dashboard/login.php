<?php
session_start();

$USERNAME = "m7-hamooda";
$PASSWORD = "m7-18102005";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $USERNAME && $pass === $PASSWORD) {
        $_SESSION['logged_in'] = true;
        header("Location: me.php");
        exit;
    } else {
        $error = "The username or password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <title>Mohamed | Login</title>
    <meta name="theme-color" content="#0078d7" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- link font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- link favicon -->
    <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon" />

    <!-- link tailwindcss css -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex items-center justify-center h-screen bg-[#1a1c1d]">
    <form method="POST" class="bg-[#26292a] p-6 rounded shadow-md w-full text-white max-w-sm">
        <h2 class="text-xl font-semibold mb-4 text-center">Login</h2>
        <?php if (!empty($error)): ?>
            <p class="text-red-600 mb-3"><?= $error ?></p>
        <?php endif; ?>
        <input type="text" name="username" placeholder="User name" class="w-full mb-3 p-2 border rounded" required>
        <input type="password" name="password" placeholder="password " class="w-full mb-3 p-2 border rounded" required>
        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">entrance</button>
    </form>
</body>

</html>