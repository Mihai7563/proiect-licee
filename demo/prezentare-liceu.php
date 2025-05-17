<?php
  include "assets/php/_config.php";
  include "assets/php/connect.php";
  include "assets/php/highschool.php";
  include "assets/php/transliteration.php";

  $idLiceu = isset($_GET["liceu"]) ? $_GET["liceu"] : '0'; 
  $highschoolData = getHighschoolData($idLiceu, $conn);
  // echo "<pre>";
  // print_r($highschoolData);
  // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $highschoolData['nume'] ?> - prezentare liceu</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="assets/js/add-to-wishlist.js" defer></script>

  </head>
  <body class="body-font text-color-content-1">

     <!-- NAVBAR -->
     <div class="nav-container bg-accent-1">
      <?php 
          $containerClass = "backhground-accent-1";
          $borderClass = "border-grey-1";
          $textClass1 = "text-white";
          $textClass2 = "text-grey-1";
          include 'assets/php/navbar.php'; 
          echo $navbar;
        ?>
      </div>

    <header class="mb-3">
      <div class="container my-3">
        <div class="row mb-5">
          <div class="col-12 col-lg-6 text-lg-start heading-font">
            ⭐⭐⭐⭐⭐ <u>91 recenzii</u>
          </div>
          <div class="col-12 col-lg-6 text-lg-end heading-font">
            RATĂ DE PROMOVABILITATE: <?php echo number_format($highschoolData['rata_promovabilitate_curenta'], 2)?> %
          </div>
        </div>
        <h1 class="heading-font text-color-heading-1 text-center">
          <?php echo $highschoolData['nume'] ?>
        </h1>
        <!-- Profiluri -->
        <div class="d-none d-lg-flex justify-content-center">
          <?php
            foreach($highschoolData["profiluri"] as $index => $profil){
              $class = $index ? "px-2 border-start border-dark" : "px-2";
              echo "<div class='$class'>" . $profil['denumire'] . "</div>";
            }
          ?>
        </div>
      </div>
    </header>
    
    <!-- ACREDITARI -->

    <div class="container mb-2">
      <div class="d-flex flex-wrap justify-content-center">
        <?php
          foreach ($highschoolData["acreditari"] as $acreditare) {
            echo '<span class="badge bg-accent-3 text-white rounded-pill me-2 mb-2 px-4 py-3 fs-6">' . $acreditare['denumire'] . '</span>';
          }
        ?>
      </div>
    </div>

    <!-- PROGRAM -->
    <div class="container mb-4">
      <div class="row justify-content-center align-items-center">
      <?php
        $program = $highschoolData['program'];
        $icon = '';
        $denumireNormalizata = normalizeString($program[0]['denumire']);
        if (stripos($denumireNormalizata, 'mixt') !== false) {
        $icon = '<i class="bi bi-clock-history me-1 opacity-75"></i>';
        } elseif (stripos($denumireNormalizata, 'dimineata') !== false) {
        $icon = '<i class="bi bi-brightness-high me-1 opacity-75"></i>';
        } elseif (stripos($denumireNormalizata, 'dupa-amiaza') !== false) {
        $icon = '<i class="bi bi-moon me-1 opacity-75"></i>';
        }
      ?>
      <div class="col-auto mb-5">
        <span class="fs-6 d-flex align-items-center heading-font" style="border-radius: 8px; background: none; color: #444;">
        <?php echo $icon; ?>
        <span style="font-size: 0.97em;"><?php echo $program[0]['denumire']; ?></span>
        </span>
      </div>
      </div>
    </div>
    

    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-12 col-lg-6 mb-4 d-flex justify-content-center">
          <img src="<?php echo $highschoolData['imagine'] ?>" alt="Liceul <?php echo $highschoolData['nume'] ?>" class="img-fluid rounded-3 shadow-lg w-100" />
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center">
          <div class="p-4 rounded-3 w-100">
            <h2 class="heading-font text-color-heading-1 text-uppercase mb-3 text-center text-lg-start">Despre <?php echo $highschoolData['nume'] ?></h2>
            <p class="text-start text-b heading-font fs-6">
              <?php echo $highschoolData['descriere'] ?>
            </p>
            <div class="text-center text-lg-start">
                <button 
                  class="add-to-wishlist btn btn-favorite bg-accent-2 text-white rounded-pill px-4 py-2 mt-3 heading-font"
                  data-highschool-name="<?php echo $highschoolData['nume']; ?>"
                  data-highschool-sector="<?php echo $highschoolData['sector']; ?>"
                  data-highschool-promovabilitate="<?php echo $highschoolData['rata_promovabilitate_curenta']; ?>"
                  data-highschool-last-year="2024"
                  data-highschool-medie="<?php echo $highschoolData['medie_admitere_curenta']; ?>"
                  data-highschool-id="<?php echo $highschoolData['id']; ?>"
                  data-highschool-img="<?php echo $highschoolData['imagine']; ?>">
                  <i class="bi bi-heart"></i> Adaugă la favorite
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- STATS -->
      <section class="mb-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6 mb-4">
              <div class="p-4 stats rounded-3 h-100">
                <h2 class="fs-5 mb-4 text-center heading-font text-color-heading-1 text-uppercase">Medie admitere</h2>
                <ul class="ps-0 mb-0">
                  <?php
                    foreach($highschoolData["medie_admitere"] as $index => $medieAnuala){
                      $class = $index != sizeof($highschoolData["medie_admitere"]) - 1 ? "d-flex justify-content-between py-2 border-bottom heading-font" : "d-flex justify-content-between py-2 heading-font";
                      // var_dump($medieAnuala['an']);
                      echo "<li class='$class'> <span>".$medieAnuala['an']."</span> <span>".number_format($medieAnuala['medie'], 2)."</span></li>";
                    }
                  ?>
                  <!-- <li class="d-flex justify-content-between py-2 border-bottom heading-font">
                    <span>2024</span> <span>9.75</span>
                  </li>
                  <li class="d-flex justify-content-between py-2 border-bottom heading-font">
                    <span>2023</span> <span>9.60</span>
                  </li>
                  <li class="d-flex justify-content-between py-2 border-bottom heading-font">
                    <span>2022</span> <span>9.65</span>
                  </li>
                  <li class="d-flex justify-content-between py-2 border-bottom heading-font">
                    <span>2021</span> <span>9.58</span>
                  </li>
                  <li class="d-flex justify-content-between py-2 heading-font">
                    <span>2020</span> <span>9.61</span>
                  </li> -->
                </ul>
              </div>
            </div>
            <div class="col-12 col-lg-6 mb-4">
              <div class="p-4 stats rounded-3 h-100">
                <h2 class="fs-5 mb-4 text-center heading-font text-color-heading-1 text-uppercase">Rata promovabilitate</h2>
                <ul class="ps-0 mb-0">
                  <?php
                    foreach($highschoolData["rata_promovabilitate"] as $index => $promovabilitateAnuala){
                      $class = $index != sizeof($highschoolData["rata_promovabilitate"]) - 1 ? "d-flex justify-content-between py-2 border-bottom heading-font" : "d-flex justify-content-between py-2 heading-font";
                      // var_dump($medieAnuala['an']);
                      echo "<li class='$class'> <span>" . $promovabilitateAnuala['an'] . "</span> <span>" . number_format($promovabilitateAnuala['procent_promovabilitate'], 2) . " %</span></li>";
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      


      <!-- CLUBS AND ACTIVITIES -->
      <section class="mb-5">
        <div class="container">
            <h2 class="fs-3 mb-3 heading-font text-color-heading-1 text-uppercase">
            <i class="bi bi-people-fill me-2"></i> Cluburi & activități
            </h2>
            <div class="mb-4">
          </div>
          <div class="row">
            <?php
            foreach ($highschoolData["cluburi"] as $club) {
                echo '<div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="card p-3 h-100 d-flex flex-column justify-content-between border-2">';
                        
                // Details
                echo '    <!-- Details -->
                          <div class="details mb-2">
                          <div class="name heading-font text-start">
                              <div>
                                <span class="badge bg-accent-3 text-white rounded-pill">' . $club["categorie"] . '</span>
                              </div>
                              <h3 class = "fs-5 text-uppercase fw-bold mt-3">' . $club["nume_club"] . '</h3>	
                            </div>
                            <div class="description text-start mb-2 text-b">'. $club["descriere_club"] . '</div>
                          </div>';

                // Contact
                  echo '    <!-- Decoration -->
                    <div class="decoration text-center">
                      <hr class="border-accent-3 border-2">
                    </div>';

                // Button
                  echo '    <div class="social-media mt-2">
                              <a href="#" target="_blank" class="me-2">
                                <i class="bi bi-instagram fs-4 text-accent-2"></i>
                              </a>
                              <a href="#" target="_blank" class="me-2">
                                <i class="bi bi-facebook fs-4 text-accent-2"></i>
                              </a>
                              <a href="#" target="_blank" class="me-2">
                                <i class="bi bi-twitter fs-4 text-accent-2"></i>
                              </a>
                            </div>';

                echo '  </div>'; 
                echo '</div>';
            }
            ?>
          </div>
        </div>
      </section>
    </div>

    <!-- HIGHSCHOOL FOOTER -->
    <footer class="py-4">
      <div class="container border-top border-2 pt-3 border-dark">
        <div class="row align-items-center">
          <!-- Contact Information -->
          <div class="col-md-6">
            <p><i class="bi bi-envelope-fill me-2"></i><span class="heading-font">Email:</span> <?php echo $highschoolData['email'] ?></p>
            <p><i class="bi bi-telephone-fill me-2"></i><span class="heading-font">Telefon:</span> <?php echo $highschoolData['telefon'] ?></p>
            <p><i class="bi bi-geo-alt-fill me-2"></i><span class="heading-font">Locație:</span> <?php echo $highschoolData['locatie']; ?></p>
          </div>
          <!-- Google Maps Embed -->
          <div class="col-md-6">
            <iframe 
              src= "<?php echo $highschoolData['embed_harta'] ?>"
              width="100%" height="200" style="border-radius: 10px; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- FOOTER -->
    <?php
      include 'assets/php/footer.php';
    ?>
           

    <!-- EXTRA SCRIPTS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
  </body>
</html>
