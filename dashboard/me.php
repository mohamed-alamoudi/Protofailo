<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <title>Mohamed | Dashboard</title>
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

<body class="bg-[#1a1c1d] text-white px-10 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📊 Received messages</h1>
        <div class="flex justify-center items-center gap-4">
            <a href="dashBlog.php" class="text-blue-500 underline">blog</a>
            <a href="logout.php" class="text-red-600 underline">logout</a>
        </div>
    </div>

    <div class="bg-[#26292a] p-4 rounded shadow overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead>
                <tr class="bg-[#26292a]">
                    <th class="border p-2">name</th>
                    <th class="border p-2">number phone</th>
                    <th class="border p-2">email</th>
                    <th class="border p-2">massage</th>
                    <th class="border p-2">data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = fopen("../src/contact.csv", "r");
                $first = true;
                while (($row = fgetcsv($file)) !== false) {
                    if ($first) {
                        $first = false;
                        continue;
                    }
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td class='border p-2'>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                fclose($file);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>