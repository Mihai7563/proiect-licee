<?php
  include "assets/php/_config.php";
  include "assets/php/connect.php";
  include "assets/php/highschool.php";

  $idLiceu = isset($_GET["liceu"]) ? $_GET["liceu"] : '0'; 
  $highschoolData = getHighschoolData($idLiceu, $conn);
  echo "<pre>";
  print_r($highschoolData);
  echo "</pre>";
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
  </head>
  <body class="body-font text-color-content-1">

     <!-- NAVBAR -->
     <div class="nav-container bg-accent-1">
    <nav class="container navbar navbar-expand-lg heading-font py-3">
        <div class="container-fluid">
            <!-- Logo Placeholder (Rectangular Box) -->
            <div class="border border-5 border-black px-5 py-1 fs-5 fw-bold text-white heading-font">SIMP CITY</div>

            <!-- Navbar Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-grey-1" href="home.html">Acasă</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-grey-1" href="#" data-bs-toggle="dropdown">Licee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-grey-1" href="#">Recenzii</a>
                    </li>
                    <!-- Contact mobile -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Right-side Items -->
            <div class="d-none d-lg-flex align-items-center">
                <a class="nav-link mx-2 text-white" href="#">Login</a>
                <a class="nav-link mx-2 d-none d-lg-block text-white" href="#">Contact</a>
                <a class="nav-link mx-2 text-white" href="#"><i class="bi bi-search"></i></a>
            </div>
        </div>
    </nav>
    </div>

    <header class="mb-5">
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
    
    
    <div class="container">
      <!-- DESCRIPTION -->
      <section class="mb-5">
        <!-- <h2 class="fs-3 heading-font text-color-heading-1 text-uppercase">Despre liceu</h2> -->
        <p>
          Colegiul Național Spiru Haret este cunoscut pentru excelența sa academică, având o rată de promovabilitate ridicată și elevi cu rezultate remarcabile la concursuri și olimpiade. Oferă un mediu educațional modern, cu diverse activități extracurriculare.
        </p>
      </section>

      <!-- STATS -->
      <section class="mb-5">
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
        <div class="row">
          <div class="col-12 mb-3">
            <div class="p-4 stats rounded-3">
              <h2 class="fs-5 mb-4 text-center heading-font text-color-heading-1 text-uppercase">Rezultate olimpiade</h2>
              <div class="d-flex py-2 border-bottom fw-bold heading-font">
                <div class="col-2">An</div>
                <div class="col-4">Materie</div>
                <div class="col-3 text-center">Etapa</div>
                <div class="col-3 text-end">Elevi</div>
              </div>
        
              <div class="d-flex py-2 border-bottom">
                <div class="col-2">2024</div>
                <div class="col-4">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Matematică
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Informatică</a></li>
                      <li><a class="dropdown-item" href="#">Limba Română</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-center">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Județeană
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Națională</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-end">3</div>
              </div>
        
              <div class="d-flex py-2 border-bottom">
                <div class="col-2">2023</div>
                <div class="col-4">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Limba Română
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Matematică</a></li>
                      <li><a class="dropdown-item" href="#">Informatică</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-center">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Națională
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Județeană</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-end">5</div>
              </div>
        
              <div class="d-flex py-2">
                <div class="col-2">2022</div>
                <div class="col-4">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Informatică
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Matematică</a></li>
                      <li><a class="dropdown-item" href="#">Limba Română</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-center">
                  <div class="dropdown">
                    <button class="btn dropdown-toggle text-grey-1 p-0 border-0 bg-transparent shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Județeană
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Națională</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-3 text-end">15</div>
              </div>
        
            </div>
          </div>
        </div>
      </section>
      


      <!-- CLUBS AND ACTIVITIES -->
      <section class="mb-5">
        <h2 class="fs-3 mb-3 heading-font text-color-heading-1 text-uppercase">Cluburi & activități</h2>
        <div class="row">
          <?php
          foreach ($highschoolData["cluburi"] as $club) {
              echo '<div class="col-12 col-md-6 col-lg-4 mb-3">
                      <div class="card p-3 h-100 d-flex flex-column justify-content-between border-2">';
                      
              // Details
              echo '    <!-- Details -->
                        <div class="details mb-3">
                        <div class="name heading-font text-start">
                            <div>
                              <span class="badge bg-accent-3 text-white rounded-pill">' . $club["categorie"] . '</span>
                            </div>
                            <h3 class = "fs-5 text-uppercase fw-bold mt-3">' . $club["nume_club"] . '</h3>	
                          </div>
                          <div class="description text-start mb-2 text-b">'. $club["descriere_club"] . '</div>
                        </div>';

              // Contact
              echo '    <!-- Contact -->
                        <div class="contact text-start mb-3">
                          <div class="contact mb-2">
                            <div>
                              <span class="fw-bold">Contact:</span> 
                              '. $club["contact_nume"] . '
                            </div>
                            <div>
                              <span>' . $club["contact_mail"] . '</span>
                            </div>
                          </div>
                          <div class="time">
                            <span class="fw-bold">Program:</span> 
                            '. $club["program"] . '
                          </div>
                        </div>';

              // Button
              echo '    <a type="button" class="btn bg-accent-2 text-white rounded-pill px-4 py-2 my-2 heading-font">Vezi detalii</a>';

              echo '  </div>'; 
              echo '</div>';
          }
          ?>
        </div>
      </section>
      
      <!-- SPORTS -->
      <section class="mb-5">
        <h2 class="fs-3 mb-3 heading-font text-color-heading-1 text-uppercase">Echipe sportive</h2>
        <div class="row">
          <div class="col-12 col-lg-4 mb-3">
            <div class="card p-3 h-100 d-flex flex-col justify-content-between border-2">
              <div class="details mb-3">
                <h3 class="name fs-6 mb-2 heading-font text-start text-uppercase">Fotbal</h3>
                <div class="description text-start">Pregatim elevii pentru competitii scolare si regionale</div>
              </div>
              <div class="contact text-start">
                <div class="coach"><span class="fw-bold">Antrenor:</span> Mihai Georgescu</div>
                <div class="contact"><span class="fw-bold">Contact:</span> fotbal@cnshb.ro</div>
              </div>
              <a type="button" class="btn bg-accent-2 text-white rounded-pill px-4 py-2 my-2 heading-font">Vezi detalii</a>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-3">
            <div class="card p-3 h-100 d-flex flex-col justify-content-between border-2">
              <div class="details mb-3">
                <h3 class="name fs-6 mb-2 heading-font text-start text-uppercase">Baschet</h3>
                <div class="description text-start">Promovam spiritul de echipa si dezvoltam abilitati fizice</div>
              </div>
              <div class="contact">
                <div class="coach text-start"><span class="fw-bold">Antrenor:</span> Eustache Dumitrache</div>
                <div class="contact text-start"><span class="fw-bold">Contact:</span> baschet@cnshb.ro</div>
              </div>
              <a type="button" class="btn bg-accent-2 text-white rounded-pill px-4 py-2 my-2 heading-font">Vezi detalii</a>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-3">
            <div class="card p-3 h-100 d-flex flex-col justify-content-between border-2">
              <div class="details mb-3">
                <h3 class="name fs-6 mb-2 heading-font text-start text-uppercase">Baschet</h3>
                <div class="description text-start">Promovam spiritul de echipa si dezvoltam abilitati fizice</div>
              </div>
              <div class="contact">
                <div class="coach text-start"><span class="fw-bold">Antrenor:</span> Eustache Dumitrache</div>
                <div class="contact text-start"><span class="fw-bold">Contact:</span> baschet@cnshb.ro</div>
              </div>
              <a type="button" class="btn bg-accent-2 text-white rounded-pill px-4 py-2 my-2 heading-font">Vezi detalii</a>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- FOOTER -->
    <footer class="py-4">
      <div class="container border-top border-2 border-dark pt-3">
        <div class="row align-items-center">
          <!-- Contact Information -->
          <div class="col-md-6">
            <p>Email: haretiana2012@hotmail.com</p>
            <p>Telefon: 021 313 6462</p>
            <p>Locație: Strada Italiană 17, București</p>
          </div>
          <!-- Google Maps Embed -->
          <div class="col-md-6">
            <iframe 
              src=
              <?php echo $highschoolData['locatie'] ?> 
              width="100%" height="200" style="border-radius: 10px; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </footer>
    


    <!-- EXTRA SCRIPTS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
