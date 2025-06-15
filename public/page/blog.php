<?php
$posts = [];
if (file_exists('../../src/posts.csv')) {
    $rows = array_map('str_getcsv', file('../../src/posts.csv'));
    array_shift($rows);
    $posts = array_reverse($rows);
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <title>Mohamed | Blog</title>
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
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

    <!-- link tailwindcss css -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- link style css -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="text-white" style="background-color: #1a1c1d; font-family: Poppins;">
    <header style="background-color: #26292a;" class="relative z-50 nav-bar w-full py-5">
        <nav class="flex justify-center items-center max-md:justify-end px-40 max-lg:px-30 max-md:px-15 max-sm:px-7">
            <div id="btnav" class="hidden max-md:block cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </div>
            <ul id="navlist"
                class="index-20 max-md:hidden max-md:pb-10 max-md:pt-5 max-md:px-15 max-md:absolute max-md:w-full max-md:bg-[#26292a] max-md:top-16.25 max-md:left-0 max-sm:px-7">
                <li class="inline-block mx-5 hover:text-blue-500 max-md:block max-md:my-6"><a href="../../index.html">Home</a>
                </li>
                <li class="inline-block mx-5 hover:text-blue-500 max-md:block max-md:my-6"><a href="about.html">About Us</a>
                </li>
                <li class="inline-block mx-5 hover:text-blue-500 max-md:block max-md:my-6"><a
                        href="protofailo.html">Protofailo</a></li>
                <li class="inline-block mx-5 text-blue-500 max-md:block max-md:my-6"><a href="blog.html"
                        target="_blank">Blog</a></li>
                <li class="inline-block mx-5 hover:text-blue-500 max-md:block max-md:my-6"><a href="contact.html">Contact</a>
                </li>

            </ul>
        </nav>
    </header>
    <section class="px-40 py-10 max-lg:px-30 max-md:px-15 max-sm:px-7">
        <div>
            <h1
                class="titel text-2xl w-fit m-auto relative after:content-[''] after:block after:w-1/2 after:absolute after:h-0.5 after:bg-gray-50 after:left-0 after:-bottom-1.5 before:content-[''] before:block before:w-1/2 before:absolute before:h-0.5 before:bg-[#5e5e5e] before:-right-0 before:-bottom-1.5">
                Blog</h1>
        </div>
        <div class="mt-10">
            <?php foreach ($posts as $post): ?>
                <div class="card mb-10 bg-[#26292a] px-5 py-5 rounded-xl">
                    <div class="flex items-center justify-between mb-5 max-sm:flex-col max-sm:items-start gap-5">
                        <div class="flex items-center justify-start">
                            <img class="w-10 h-10 rounded-full object-cover" src="<?= $post[1] ?>" alt="error">
                            <p class="text-blue-500 ml-3">
                                <?= $post[2] ?>
                                <span class="block text-gray-400 -mt-1"><?= $post[3] ?></span>
                            </p>
                        </div>
                        <div class="mr-10 flex items-center gap-4 max-sm:mx-auto">
                            <?php if ($post[5]): ?>
                                <a class="hover:text-green-500" href="<?= $post[5] ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-whatsapp"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                                        </path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($post[6]): ?>
                                <a class="hover:text-pink-500" href="<?= $post[6] ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-instagram"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334">
                                        </path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($post[7]): ?>
                                <a class="hover:text-blue-500" href="<?= $post[7] ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" fill="currentColor" class="bi bi-linkedin"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z">
                                        </path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="break-words"><?= $post[4] ?></p>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
    <!-- index js -->
    <script src="../js/index.js"></script>
</body>

</html>