<?php
include 'auth.php';

$csvFile = '../src/posts.csv';

if (!file_exists($csvFile)) {
  $fp = fopen($csvFile, 'w');
  fputcsv($fp, ['id', 'image', 'name', 'role', 'text', 'whatsapp', 'instagram', 'linkedin']);
  fclose($fp);
}

if (isset($_GET['delete'])) {
  $idToDelete = $_GET['delete'];

  $rows = array_map('str_getcsv', file($csvFile));
  $headers = array_shift($rows);
  $newRows = [];

  foreach ($rows as $row) {
    if ($row[0] !== $idToDelete) {
      $newRows[] = $row;
    }
  }

  $fp = fopen($csvFile, 'w');
  fputcsv($fp, $headers);
  foreach ($newRows as $row) {
    fputcsv($fp, $row);
  }
  fclose($fp);

  header('Location: dashBlog.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $isNew = empty($_POST['id']);
  $id = $isNew ? uniqid() : $_POST['id'];
  $name = $_POST['name'] ?? '';
  $role = $_POST['role'] ?? '';
  $text = $_POST['text'] ?? '';
  $whatsapp = $_POST['whatsapp'] ?? '';
  $instagram = $_POST['instagram'] ?? '';
  $linkedin = $_POST['linkedin'] ?? '';
  $imagePath = trim($_POST['image_url'] ?? ($_POST['current_image'] ?? ''));

  $rows = array_map('str_getcsv', file($csvFile));
  $headers = array_shift($rows);
  $newRows = [];

  $found = false;
  foreach ($rows as $row) {
    if ($row[0] === $id) {
      $newRows[] = [$id, $imagePath, $name, $role, $text, $whatsapp, $instagram, $linkedin];
      $found = true;
    } else {
      $newRows[] = $row;
    }
  }

  if (!$found) {
    $newRows[] = [$id, $imagePath, $name, $role, $text, $whatsapp, $instagram, $linkedin];
  }

  $fp = fopen($csvFile, 'w');
  fputcsv($fp, $headers);
  foreach ($newRows as $row) {
    fputcsv($fp, $row);
  }
  fclose($fp);

  header('Location: dashBlog.php');
  exit;
}

$posts = [];
if (file_exists($csvFile)) {
  $rows = array_map('str_getcsv', file($csvFile));
  array_shift($rows);
  $posts = $rows;
}
?>



<!DOCTYPE html>
<html lang="en">

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

  <!-- link font Lobster -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />

  <!-- link favicon -->
  <link rel="shortcut icon" href="../public/favicon.ico" type="image/x-icon" />

  <!-- link tailwindcss css -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <!-- link style css -->
  <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="text-white px-30 py-10 max-lg:px-30 max-md:px-15 max-sm:px-7" style="background-color: #1a1c1d; font-family: Poppins;">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">📊 Publications management</h1>
    <div class="flex justify-center items-center gap-4">
      <a href="me.php" class="text-blue-500 underline">contact</a>
      <a href="logout.php" class="text-red-600 underline">logout</a>
    </div>
  </div>

  <form class="bg-[#26292a] p-6 rounded shadow mb-10" method="POST">
    <!-- <form class="bg-[#26292a] p-6 rounded shadow mb-10" method="POST" enctype="multipart/form-data"> -->
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="current_image" id="current_image">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <input name="name" id="name" placeholder="name" required class="p-2 border rounded">
      <input name="role" id="role" placeholder="job" required class="p-2 border rounded">
      <input name="whatsapp" id="whatsapp" placeholder="whatsapp" class="p-2 border rounded">
      <input name="instagram" id="instagram" placeholder="instagram" class="p-2 border rounded">
      <input name="linkedin" id="linkedin" placeholder="linkedin" class="p-2 border rounded">
      <!-- <input type="file" name="image" class="p-2 border rounded"> -->
      <input name="image_url" id="image_url" placeholder="image URL" class="p-2 border rounded">
    </div>
    <textarea name="text" id="text" placeholder="mass" required class="w-full mt-4 p-2 border rounded"></textarea>
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded cursor-pointer">save</button>
  </form>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php foreach ($posts as $post): ?>
      <div class="bg-[#26292a] rounded-lg shadow px-5 py-10">
        <img src="<?= $post[1] ?>" class="w-50 h-50 mb-8 mx-auto object-cover rounded-full" alt="">
        <h2 class="text-xl font-bold mt-2"><?= $post[2] ?></h2>
        <p class="text-sm ml-2 text-gray-300"><?= $post[3] ?></p>
        <p class="mt-3 break-words"><?= $post[4] ?></p>
        <div class="my-5 flex justify-between items-center">
          <?php if ($post[5]): ?><a href="<?= $post[5] ?>" class="flex justify-start items-center gap-2 text-green-500">
              <span>whatsapp</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                </path>
              </svg>
            </a><?php endif; ?>
          <?php if ($post[6]): ?><a href="<?= $post[6] ?>" class="flex justify-start items-center gap-2 text-pink-500">
              <span>instagram</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334">
                </path>
              </svg>
            </a><?php endif; ?>
          <?php if ($post[7]): ?><a href="<?= $post[7] ?>" class="flex justify-start items-center gap-2 text-blue-500">
              <span>linkedin</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z">
                </path>
              </svg>
            </a><?php endif; ?>
        </div>
        <div class="mt-4 flex gap-2">
          <button onclick='editPost(<?= json_encode($post) ?>)' class="bg-yellow-500 text-white px-3 py-1 rounded cursor-pointer">amendment</button>
          <a href="?delete=<?= $post[0] ?>" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-3 py-1 rounded">delete</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  </div>

  <script src="../public/js/blog.js"></script>
</body>

</html>