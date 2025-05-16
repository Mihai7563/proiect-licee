<?php
  include "assets/php/_config.php";
  include "assets/php/connect.php";
  include "assets/php/highschool.php";

  $highschoolsList = getHighschoolsList($conn);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licee București</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="assets/js/add-to-wishlist.js" defer></script>
    <script src="assets/js/wishlist.js" defer></script>

</head>
<body class="body-font">
    <!-- NAVBAR -->
    <div class="nav-container bg-accent-1">
    <?php 
        $containerClass = "background-accent-1";
        $borderClass = "border-grey-1";
        $textClass1 = "text-white";
        $textClass2 = "text-grey-1";
        include 'assets/php/navbar.php'; 
        echo $navbar;
    ?>
    </div>

    <main class="bg-cream fav-highschool-list py-5">
            <h1 class="text-center heading-font mb-2">Favorite</h1>
            <p class="text-center">Aici poti vizualiza liceele tale favorite.</p>

            <div class="container">
                <div id="wishlistContainer" class="row g-3 mb-3">

                </div>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</body>
</html>
