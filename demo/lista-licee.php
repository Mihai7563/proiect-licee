<?php
  include "assets/php/_config.php";
  include "assets/php/connect.php";
  include "assets/php/highschool.php";

  $highschoolsList = getHighschoolsList($conn);
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
    <script src="assets/js/filter-btn.js" defer></script>
</head>
<body class="body-font">
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
    <main class="school-list bg-cream py-5">
        <h3 class="heading-font text-center pb-2">Lista liceelor din București</h3>
        <!-- SEARCH BAR-->
        <div class="d-flex flex-column gap-3 align-items-lg-center mb-5 mx-2">
            <div class="d-lg-flex justify-content-center gap-2">
                <input type="text" class="form-control rounded-pill px-4 py-3 heading-font highschool-search-bar mb-2 mb-lg-0" placeholder="Caută liceu...">
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn bg-accent-3 text-white rounded-pill px-4 py-3 heading-font">Caută</button>
                    <button class="btn bg-accent-2 text-white rounded-pill px-4 py-3 heading-font" id="filterToggleBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                        <path d="M1.5 1.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .39.812L10 7.293V13a1 1 0 0 1-1.447.894l-2-1A1 1 0 0 1 6 12V7.293L1.61 1.812A.5.5 0 0 1 1.5 1.5z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- FILTER OPTIONS -->
            <div class="filter-menu card shadow-sm border-0 rounded-4" id="filterMenu">
                <div class="card-body">

                <!-- PROFILES -->
                    <h6 class="mb-3 text-accent-3 heading-font">Profiluri</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-3 text-grey-2 heading-font">Real</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="naturalSciences">
                                <label class="form-check-label text-grey-2" for="naturalSciences">Științele Naturii</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mathInfo">
                                <label class="form-check-label text-grey-2" for="mathInfo">Matematică-Informatică</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3 text-grey-2 heading-font">Uman</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="philology">
                                <label class="form-check-label text-grey-2" for="philology">Filologie</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="socialSciences">
                                <label class="form-check-label text-grey-2" for="socialSciences">Științe Sociale</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3 text-grey-2 heading-font">Vocațional</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="arts">
                                <label class="form-check-label text-grey-2" for="arts">Arte</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sports">
                                <label class="form-check-label text-grey-2" for="sports">Sport</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3 text-grey-2 heading-font">Tehnologic</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="technical">
                                <label class="form-check-label text-grey-2" for="technical">Tehnic</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="services">
                                <label class="form-check-label text-grey-2" for="services">Servicii</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h6 class="mt-4 text-accent-3 heading-font">Cluburi</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="techAndScience">
                                <label class="form-check-label text-grey-2" for="techAndScience">Tehnologie & Stiinte</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="art">
                                <label class="form-check-label text-grey-2" for="art">Arta</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="humanities">
                                <label class="form-check-label text-grey-2" for="humanities">Profil Uman</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sports">
                                <label class="form-check-label text-grey-2" for="sports">Sport</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mt-4 text-accent-3 heading-font">Program</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="morningProgram">
                                <label class="form-check-label text-grey-2" for="morningProgram">Dimineața</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="afternoonProgram">
                                <label class="form-check-label text-grey-2" for="afternoonProgram">După-amiaza</label>
                            </div>
                        </div>
                    </div>
                    

                    <h6 class="mt-4 text-accent-3 heading-font">Sector</h6>
                    <select class="form-select mb-3 text-grey-2 border-0 rounded-pill bg-grey-1">
                        <option>Sector 1</option>
                        <option>Sector 2</option>
                        <option>Sector 3</option>
                        <option>Sector 4</option>
                        <option>Sector 5</option>
                        <option>Sector 6</option>
                    </select>
                    <button class="btn bg-accent-3 text-white w-100 rounded-pill heading-font">Aplică</button>
                </div>
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
                <div class="row g-4 mb-4">
                    <?php foreach ($highschoolsList as $highschool){
                        echo '  <div class="col-12 col-lg-6">
                                    <div class="card school-card border-0 rounded-4 overflow-hidden bg-white">
                                        <div class="row ps-3">
                                            <!-- Content -->
                                            <div class="col-md-7 p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span>⭐⭐⭐⭐⭐</span>
                                                    </div>
                                                    <h5 class="heading-font text-color-heading-1">' . $highschool["nume"] . '</h5>
                                                    <p class="text-color-heading-1 mb-1 border-bottom border-2"> Sector ' . $highschool["sector"] . ', București</p>
                                                    <p class="mb-1 fs-5"><strong>Rata de Promovabilitate:</strong> ' . $highschool["procent_promovabilitate"] . '% (' . $highschool["an_procent_promovabilitate"] . ')</p>
                                                    <p class="text-grey-2 mb-1"><strong>Medie Admitere:</strong> ' . $highschool["medie"] . ' (' . $highschool["an_medie_admitere"] . ')</p>
                                                </div>
                                                <div>
                                                    <a class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font text-center text-lg-start mt-3" href="http://localhost/proiect-licee/demo/prezentare-liceu.php?liceu=' . $highschool["id"] . '">Vezi detalii</a>
                                                </div>
                                            </div>
                                            <!-- Image -->
                                            <div class="col-md-5">
                                                <img src=' .  $highschool['imagine'] . ' " class="img-fluid h-100 object-fit-cover" alt="Liceu">
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



    <footer class="bg-black text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Logo & Title -->
            <div class="col-md-3">
                <h4 class="fw-bold heading-font">SiteName</h4>
                <p class="small">Informații relevante și actualizate.</p>
            </div>

            <!-- Navigation Links -->
            <div class="col-md-3">
                <h5 class="text-uppercase heading-font">Navigație</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Acasă</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Despre</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Servicii</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-3">
                <h5 class="text-uppercase heading-font">Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> contact@email.com</li>
                    <li><i class="bi bi-telephone"></i> +40 123 456 789</li>
                    <li><i class="bi bi-geo-alt"></i> București, România</li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="col-md-3">
                <h5 class="text-uppercase heading-font">Urmărește-ne</h5>
                <a href="#" class="text-light me-2 mb-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light me-2 mb-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-light me-2 mb-2"><i class="bi bi-youtube"></i></a>
                <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <hr class="border-light">
            <p class="small mb-0">&copy; 2025 SiteName. Toate drepturile rezervate.</p>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
