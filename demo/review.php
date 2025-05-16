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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" /> 
    <script src="assets/js/add-review.js" defer></script>
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
    
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                <form id="review-form">
                    <div class="form-outline mb-3">
                    <input type="text" id="reviewer-name" class="form-control" placeholder="Nume" required />
                    <label class="form-label" for="reviewer-name">Nume</label>
                    </div>

                    <div class="form-outline mb-3">
                    <select id="review-rating" class="form-select" required>

                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                    <label class="form-label" for="review-rating">Scor</label>
                    </div>

                    <div class="form-outline mb-4">
                    <select id="review-opinion" class="form-select" required>
                        <option value="">Alege o opțiune</option>
                        <option value="Very useful">Folositor!</option>
                        <option value="Needs improvements">Aș vrea mai multe licee</option>
                        <option value="Incomplete information">Nu am găsit suficiente informații</option>
                        <option value="Clear and informative">Ușor de folosit</option>
                        <option value="Clear and informative">M-a ajutat mult în alegerea liceului!</option>
                    </select>
                    <label class="form-label" for="review-opinion">Opțiuni</label>
                    </div>

                    <div class="mb-4">
                    <button type="submit" class="submit-btn" class="btn btn-primary w-100">Postează recenzia</button>
                    </div>
                </form>

                <div id="reviews" class="row"></div>

                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</body>
</html>
