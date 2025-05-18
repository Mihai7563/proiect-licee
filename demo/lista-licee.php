<?php
  include "assets/php/_config.php";
  include "assets/php/connect.php";
  include "assets/php/highschool.php";
  include "assets/php/transliteration.php";

  $highschoolsList = getHighschoolsList($conn);
  $profilesList = getProfilesList($conn, true);
  $clubCategories = getClubCategories($conn);
  $programsList = getProgramsList($conn);
  $sortOption = isset($_GET['sort']) ? $_GET['sort'] : null;
  echo "<pre>";
  print_r($highschoolsList);
  echo "</pre>";
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
    <script src="assets/js/search-options-btns.js" defer></script>
    <script src="assets/js/highschool-search-bar.js" defer></script>
    <script src="assets/js/apply-sort.js" defer></script>
    <script src="assets/js/apply-filter.js" defer></script>
    <script src="assets/js/add-to-wishlist.js" defer></script>

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
    <main class="school-list bg-cream py-5">
        <h3 class="heading-font text-center pb-2">Lista liceelor din București</h3>
        <!-- SEARCH BAR-->
        <div class="d-flex flex-column gap-3 align-items-lg-center mb-5 mx-2">
            <div class="d-lg-flex justify-content-center gap-2">
            <input type="text" class="form-control rounded-pill px-4 py-3 heading-font highschool-search-bar mb-2 mb-lg-0" placeholder="Caută liceu...">
            <div class="d-flex justify-content-center gap-2">
                <button class="btn bg-accent-3 text-white rounded-pill px-4 py-3 heading-font" id="sortToggleBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.5 2.5a.5.5 0 0 1 .5.5v10.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L3 13.793V3a.5.5 0 0 1 .5-.5zm9 11a.5.5 0 0 1-.5-.5V2.707l-2.146 2.147a.5.5 0 0 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L13 2.707V13a.5.5 0 0 1-.5.5z"/>
                </svg>
                </button>
                <button class="btn bg-accent-2 text-white rounded-pill px-4 py-3 heading-font" id="filterBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                    <path d="M1.5 1.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .39.812L10 7.293V13a1 1 0 0 1-1.447.894l-2-1A1 1 0 0 1 6 12V7.293L1.61 1.812A.5.5 0 0 1 1.5 1.5z"/>
                </svg>
                </button>
            </div>
        </div>
        <!-- SORT OPTIONS -->
        <div class="sort-menu card shadow-sm border-0 rounded-4" id="sortMenu">
            <div class="card-body">
                <h6 class="mb-3 text-accent-3 heading-font">Ordonează după</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" value="medie-admitere" id="sortByAdmissionAverage">
                    <label class="form-check-label text-grey-2" for="sortByAdmissionAverage">Medie Admitere</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" value="promovabilitate" id="sortByPassRate">
                    <label class="form-check-label text-grey-2" for="sortByPassRate">Promovabilitate</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" value="nume" id="sortByNameAZ">
                    <label class="form-check-label text-grey-2" for="sortByNameAZ">Nume (A-Z)</label>
                </div>
                <button class="btn bg-accent-3 text-white w-100 rounded-pill heading-font mt-3" onclick="applySort()">Aplică</button>
            </div>
        </div>
        <!-- FILTER OPTIONS -->
        <div class="filter-menu card shadow-sm border-0 rounded-4" id="filterMenu">
            <div class="card-body">
                <!-- PROFILES -->
                <h6 class="mb-3 text-accent-3 heading-font">Profiluri</h6>
                <div class="row">
                    <?php 
                        foreach ($profilesList as $profileName => $profileData) {
                        echo '<div class="col-md-6 mb-3">';
                        echo '  <h6 class="mb-3 text-grey-2 heading-font">' . $profileName . '</h6>';
                        foreach ($profileData as $profile) {
                            echo '  <div class="form-check">
                                <input class="form-check-input" type="checkbox" data-filter-type="profil" id="cb-profile-' . $profile['id'] . '" value="' . $profile['denumire'] . '">
                                <label class="form-check-label text-grey-2 text-capitalize" for="cb-profile-' . $profile['id'] . '">' . mb_strtolower($profile['denumire']) . '</label>
                                </div>';
                        }
                        echo '</div>';
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h6 class="mt-4 text-accent-3 heading-font">Cluburi</h6>
                        <?php 
                        foreach ($clubCategories as $category) {
                            echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" data-filter-type="club" id="cb-club-' . $category['id'] . '" value="' . $category['denumire'] . '">
                                <label class="form-check-label text-grey-2" for="cb-club-' . $category['id'] . '">' . $category['denumire'] . '</label>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mt-4 text-accent-3 heading-font">Program</h6>
                        <?php
                            foreach ($programsList as $program) {
                                echo '  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" data-filter-type="program" id="cb-program-' . $program['id'] . '" value="' . $program['denumire'] . '">
                                    <label class="form-check-label text-grey-2" for="cb-program-' . $program['id'] . '">' . $program['denumire'] . '</label>
                                    </div>';   
                            } 
                        ?>
                    </div>
                </div>
                <h6 class="mt-4 text-accent-3 heading-font">Medie Admitere</h6>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <input type="number" class="form-control border-0 border-bottom px-3 py-2" id="minAverage" placeholder="Minim" min="1" max="10" step="0.01">
                    <span>-</span>
                    <input type="number" class="form-control border-0 border-bottom px-3 py-2" id="maxAverage" placeholder="Maxim" min="1" max="10" step="0.01">
                </div>
                <h6 class="mt-4 text-accent-3 heading-font">Sector</h6>
                <div class="mb-3">
                    <select class="form-select text-grey-2 border-0 rounded-pill bg-grey-1" data-filter-type="sector" id="sectorSelect">
                        <option value="">Toate</option>
                        <option value="1">Sector 1</option>
                        <option value="2">Sector 2</option>
                        <option value="3">Sector 3</option>
                        <option value="4">Sector 4</option>
                        <option value="5">Sector 5</option>
                        <option value="6">Sector 6</option>
                    </select>
                </div>
                <button class="apply-filters-btn btn bg-accent-3 text-white w-100 rounded-pill heading-font">Aplică</button>
                <button class="reset-filters-btn btn bg-grey-2 text-white w-100 mt-2 rounded-pill heading-font">Resetează</button>
            </div>
        </div>
        <!--    MOBILE FULSCREEN FILTER -->
        <div class="filter-menu-mobile d-lg-none position-fixed top-0 start-0 w-100 h-100 bg-white overflow-auto" id="filterMenuMobile" style="display: none; z-index: 1050; padding: 20px;">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                <h5 class="text-accent-3 heading-font mb-0">Filtrează</h5>
                <button class="btn-close" id="closeFilterMenuMobile"></button>
            </div>
            <div class="accordion p-3" id="filterAccordion">
                <!-- PROFILES -->
                <div class="accordion-item border border-1 mb-4">
                        <h6 class="accordion-header heading-font fw-bold" id="headingProfiles">
                            <button class="accordion-button collapsed heading-font fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfiles" aria-expanded="false" aria-controls="collapseProfiles">
                            Profiluri
                            </button>
                        </h6>
                    <div id="collapseProfiles" class="accordion-collapse collapse" aria-labelledby="headingProfiles" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <?php 
                                foreach ($profilesList as $profileName => $profileData) {
                                    echo '<div class="col-12 mb-2">';
                                    echo '  <h6 class="mb-2 text-grey-2 heading-font">' . $profileName . '</h6>';
                                    foreach ($profileData as $profile) {
                                    echo '  <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" data-filter-type="profil" id="mobile-cb-profile-' . $profile['id'] . '" value="' . $profile['denumire'] . '">
                                            <label class="form-check-label text-grey-2 text-capitalize" for="mobile-cb-profile-' . $profile['id'] . '">' . mb_strtolower($profile['denumire']) . '</label>
                                        </div>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CLUBS -->
                <div class="accordion-item border border-1 mb-4">
                    <h6 class="accordion-header heading-font fw-bold" id="headingClubs">
                        <button class="accordion-button collapsed heading-font fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClubs" aria-expanded="false" aria-controls="collapseClubs">
                        Cluburi
                        </button>
                    </h6>
                    <div id="collapseClubs" class="accordion-collapse collapse" aria-labelledby="headingClubs" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <?php 
                                foreach ($clubCategories as $category) {
                                echo '<div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" data-filter-type="club" id="mobile-cb-club-' . $category['id'] . '" value="' . $category['denumire'] . '">
                                    <label class="form-check-label text-grey-2" for="mobile-cb-club-' . $category['id'] . '">' . $category['denumire'] . '</label>
                                </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- PROGRAM -->
                <div class="accordion-item border border-1 mb-4">
                    <h6 class="accordion-header heading-font fw-bold" id="headingProgram">
                        <button class="accordion-button collapsed heading-font fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProgram" aria-expanded="false" aria-controls="collapseProgram">
                        Program
                        </button>
                    </h6>
                    <div id="collapseProgram" class="accordion-collapse collapse" aria-labelledby="headingProgram" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <?php
                                foreach ($programsList as $program) {
                                echo '<div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" data-filter-type="program" id="mobile-cb-program-' . $program['id'] . '" value="' . $program['denumire'] . '">
                                    <label class="form-check-label text-grey-2" for="mobile-cb-program-' . $program['id'] . '">' . $program['denumire'] . '</label>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Medie Admitere -->
                <div class="accordion-item border border-1 mb-4">
                    <h6 class="accordion-header heading-font fw-bold" id="headingAdmissionAverage">
                        <button class="accordion-button collapsed heading-font fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdmissionAverage" aria-expanded="false" aria-controls="collapseAdmissionAverage">
                        Medie Admitere
                        </button>
                    </h6>
                    <div id="collapseAdmissionAverage" class="accordion-collapse collapse" aria-labelledby="headingAdmissionAverage" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <div class="d-flex align-items-center gap-2">
                                <input type="number" class="form-control rounded-pill px-3 py-2" id="minAverageMobile" placeholder="Minim" min="1" max="10" step="0.01">
                                <span>-</span>
                                <input type="number" class="form-control rounded-pill px-3 py-2" id="maxAverageMobile" placeholder="Maxim" min="1" max="10" step="0.01">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sector -->
                <div class="accordion-item border border-1 mb-4">
                    <h6 class="accordion-header heading-font fw-bold" id="headingSector">
                        <button class="accordion-button collapsed heading-font fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSector" aria-expanded="false" aria-controls="collapseSector">
                        Sector
                        </button>
                    </h6>
                    <div id="collapseSector" class="accordion-collapse collapse" aria-labelledby="headingSector" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <select class="form-select text-grey-2 border-0 rounded-pill bg-grey-1" data-filter-type="sector" id="sectorSelectMobile">
                                <option value="">Toate</option>
                                <option value="1">Sector 1</option>
                                <option value="2">Sector 2</option>
                                <option value="3">Sector 3</option>
                                <option value="4">Sector 4</option>
                                <option value="5">Sector 5</option>
                                <option value="6">Sector 6</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="apply-filters-btn-mobile btn bg-accent-3 text-white w-100 rounded-pill heading-font mt-3 py-3">Aplică Filtre</button>
            <button class="reset-filters-btn-mobile btn bg-grey-2 text-white w-100 mt-2 rounded-pill heading-font">Resetează</button>
        </div>
    </div>

        <!-- FILTERS -->
        <!-- <div class="collapse" id="filtersCollapse">
            <div class="d-flex flex-wrap justify-content-center gap-3 pb-4">
                <button class="btn bg-accent-2 text-white rounded-pill px-4 py-2 heading-font">Medie Admitere</button>
                <button class="btn bg-accent-2 text-white rounded-pill px-4 py-2 heading-font">Sector</button>
                <button class="btn bg-accent-2 text-white rounded-pill px-4 py-2 heading-font">Locație</button>
                <button class="btn bg-accent-2 text-white rounded-pill px-4 py-2 heading-font">Activități</button>
            </div>
        </div> -->

        <section>
            <div class="container">
                <div class="row g-4 mb-4" id="highschool-list">
                    <div class="no-results-message" style="display: none;">	
                        <h5 class="text-center text-grey-2">Ne pare rau, dar nu am găsit licee care să corespundă criteriilor tale de căutare.</h5>
                        <p class="text-center text-grey-2">Încercă să modifici filtrele sau să cauți din nou.</p>
                    </div>
                    <?php 
                    if($sortOption){
                        usort($highschoolsList, function($a, $b) use ($sortOption) {
                            switch ($sortOption) {
                                case 'medie_admitere':
                                    return $b['medie'] <=> $a['medie'];
                                case 'procent_promovabilitate':
                                    return $b['procent_promovabilitate'] <=> $a['procent_promovabilitate'];
                                case 'nume_az':
                                    return strcmp(normalizeString($a['nume']), normalizeString($b['nume']));
                                case 'nume_za':
                                    return strcmp(normalizeString($b['nume']), normalizeString($a['nume']));
                            }
                        });
                    }
                    
                    
                    foreach ($highschoolsList as $highschool){
                        // Calculează stelele pe baza ratingului liceului (ex: 4.5)
                        $rating = isset($highschool['rating']) ? floatval($highschool['rating']) : 0;
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) >= 0.25 && ($rating - $fullStars) < 0.75 ? 1 : 0;
                        if (($rating - $fullStars) >= 0.75) {
                            $fullStars++;
                            $halfStar = 0;
                        }
                        $emptyStars = 5 - $fullStars - $halfStar;

                        $starsHtml = '';
                        for ($i = 0; $i < $fullStars; $i++) {
                            $starsHtml .= '<i class="bi bi-star-fill text-warning"></i>';
                        }
                        if ($halfStar) {
                            $starsHtml .= '<i class="bi bi-star-half text-warning"></i>';
                        }
                        for ($i = 0; $i < $emptyStars; $i++) {
                            $starsHtml .= '<i class="bi bi-star text-warning"></i>';
                        }

                        echo '<div class="school-card col-12 col-lg-6" data-nume="' . $highschool['nume'] . '" data-profile="' . $highschool["profil"] . '" data-categorii-cluburi="' . $highschool["categorii_cluburi"] . '" data-program="' . $highschool["program"] . '" data-sector="' . $highschool["sector"] . '" data-medie-admitere="' . $highschool["medie"] . '" data-promovabilitate="' . $highschool["procent_promovabilitate"] . '">
                                <div class="card border-0 rounded-4 overflow-hidden bg-white h-100 d-flex flex-column">
                                    <div class="row g-0 h-100">
                                        <!-- Content -->
                                        <div class="col-md-7 p-3 d-flex flex-column justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center mb-2">
                                                    ' . $starsHtml . '
                                                    <span class="ms-2 small text-grey-2">' . number_format($rating, 1) . '</span>
                                                </div>
                                                <h5 class="heading-font text-color-heading-1">' . $highschool["nume"] . '</h5>
                                                <p class="text-color-heading-1 mb-1 border-bottom border-2"> Sector ' . $highschool["sector"] . ', București</p>
                                                <p class="mb-1 fs-5"><strong>Rata de Promovabilitate:</strong> ' . $highschool["procent_promovabilitate"] . '% (' . $highschool["an_procent_promovabilitate"] . ')</p>
                                                <p class="text-grey-2 mb-1"><strong>Medie Admitere:</strong> ' . $highschool["medie"] . ' (' . $highschool["an_medie_admitere"] . ')</p>
                                            </div>
                                            <div>
                                                <a class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font text-center text-lg-start mt-3" href="prezentare-liceu.php?liceu=' . $highschool["id"] . '">Vezi detalii</a>
                                                <button class="add-to-wishlist btn btn-outline-accent-3 rounded-pill px-4 py-2 heading-font text-center text-lg-start mt-3" id="favoriteBtn" 
                                                data-highschool-name="' . $highschool["nume"]. '" 
                                                data-highschool-sector="' . $highschool["sector"]. '" 
                                                data-highschool-promovabilitate="' . $highschool["procent_promovabilitate"]. '" 
                                                data-highschool-last-year="' . $highschool["an_procent_promovabilitate"]. '" 
                                                data-highschool-medie="' . $highschool["medie"]. '"
                                                data-highschool-id="' . $highschool["id"]. '"
                                                data-highschool-img="' . $highschool["imagine"]. '">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="col-md-5 d-flex align-items-stretch justify-content-center">
                                            <div class="w-100 h-100 d-flex align-items-stretch">
                                                <img src="' . $highschool['imagine'] . '" class="img-fluid rounded-end-4 object-fit-cover h-100 w-100" alt="Liceu" style="object-fit:cover; aspect-ratio:4/3;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }

                    ?>
                </div>
            </div>
        </section>
    </main>



    <?php
      include 'assets/php/footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
</body>
</html>
