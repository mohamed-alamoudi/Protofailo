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
        .content {
            display: none;
        }
    </style>
</head>

<body class="dashboard">
    <header>
        <nav class="dash">
            <img src="../image/home.png" alt="erorr">
            <h3>Mohammed AL-Amoudi</h3>
            <div class="switch">
                <div class="btn_switch">
                    <button onclick="showContent('p')">Protofailo</button>
                    <button onclick="showContent('b')">blog</button>
                    <button onclick="showContent('c')">Contact</button>
                </div>
            </div>
            <div class="title">Dashboard</div>
            <div class="btn">
                <a href="./dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                    </svg></a>
                <a href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg></a>
            </div>
        </nav>
    </header>
    <div style="padding: 10px 30px;" id="homed" class="content" style="display: block;">
        <div class="top">Home Dashboard</div>
    </div>
    <div style="padding: 10px 30px;" id="contentp" class="content">
        <div class="top">Protofailo</div>
    </div>
    <div style="padding: 10px 30px;" id="contentb" class="content">
        <div class="top">blog</div>
    </div>
    <div style="padding: 10px 30px;" id="contentc" class="content">
        <div class="top">Contact</div>
        <div>
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
                        $rows = [];
                        while (($row = fgetcsv($handle)) !== false) {
                            $rows[] = $row;
                        }
                        fclose($handle);

                        if (count($rows) <= 1) {
                            echo '<tr><td colspan="6">No data yet.</td></tr>';
                        } else {
                            for ($i = 1; $i < count($rows); $i++) {
                                echo '<tr>';
                                foreach ($rows[$i] as $cell) {
                                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                                }
                                echo '<td>
                    <form method="POST" action="delete.php" style="display:inline">
                        <input type="hidden" name="row" value="' . $i . '">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                        </button>
                    </form>
                    <form method="POST" action="pin.php" style="display:inline">
                        <input type="hidden" name="row" value="' . $i . '">
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-pin" viewBox="0 0 16 16">
  <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A6 6 0 0 1 5 6.708V2.277a3 3 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354m1.58 1.408-.002-.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a5 5 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a5 5 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.8 1.8 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14q.091.15.214.271a1.8 1.8 0 0 0 .37.282"/>
</svg></button>
                    </form>
                  </td>';
                                echo '</tr>';
                            }
                        }
                    } else {
                        echo '<tr><td colspan="6">No data yet.</td></tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- dashboard.js -->
    <script src="../js/dashboard.js"></script>
</body>

</html>