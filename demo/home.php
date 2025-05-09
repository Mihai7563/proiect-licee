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
</head>
<body class="body-font">
  <!-- NAVBAR -->

    <?php include 'assets/php/navbar.php'; 
        echo $navbar;
    ?>

<!-- HERO SECTION -->
 <section>
    <div class="hero container-fluid bg-accent-1 text-white">
        <div class="container">
            <div class="row mb-3 py-5">
                <div class="col-12 col-lg-3">
                    <!-- DESCRIPTION -->
                    <div class="description mb-2 text-grey-1">
                        <h3 class="fs-4 heading-font mb-3">
                            Informaţii despre admitere, promovabilitate, activități și păreri ale elevilor pentru a face alegerea potrivită.
                        </h3>
                        <a type="button" class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font">Vezi detalii</a>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <!-- MAIN TITLE LARGE-->
                    <h1 class="big-title z-1 heading-font text-end mt-4">Alege liceul potrivit pentru tine!</h1>
                    <!-- MAIN TITLE SMALL-->
                    <!-- <h1 class="big-title-sm fs-1 z-1 heading-font text-end d-lg-none">Alege <br> liceul potrivit pentru tine!</h1> -->
                </div>
            </div>
        </div>
    </div>
 </section>

 <!-- CARD SECTION LARGE -->
 <section id="header-card-section">
    <div class="container header-card-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="card custom-card text-white rounded-0 border-0 mb-3 mb-lg-0">
                    <div class="rounded-0 image-1"></div>
                    <div class="card-body">
                        <h3 class="card-title heading-font fs-3">Lista liceelor după media de admitere</h5>
                        <a href="lista-licee.php" class="card-text text-decoration-underline text-white">Vezi licee</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card custom-card text-white rounded-0 border-0 mb-3 mb-lg-0">
                    <div class="rounded-0 image-2"></div>
                    <div class="card-body">
                        <h5 class="card-title heading-font fs-3">Lista liceelor după promovabilitatea la BAC</h5>
                        <a href="lista-licee.php" class="card-text text-decoration-underline text-white">Vezi licee</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
            <div class="card custom-card text-white rounded-0 border-0 mb-3 mb-lg-0">
                <div class="rounded-0 image-3">
                    <img src="" alt="">
                </div>
                    <div class="card-body">
                        <h5 class="card-title heading-font fs-3">Lista liceelor după cluburi și activități</h5>
                        <p class="card-text text-decoration-underline">Vezi licee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

 <main>
    <div class="container">
        <h2 class="heading-font text-center my-5 my-lg-3 fs-1 text-accent-1">SIMP CITY</h2>
        <div class="row mb-5">
            <div class="col-12 col-lg-6 order-lg-last text-center text-lg-start">
                <div class="text-accent-1 h-100 d-flex flex-column justify-content-between gap-3">
                    <div>
                        <div class="heading-font text-uppercase mb-0">Număr total de licee acoperite</div>
                        <div>50+ licee din Bucureşti</div>
                    </div>
                    <div>
                        <div class="heading-font text-uppercase">Anul de lansare al paltformei</div>
                        <div>2025</div>
                    </div>
                    <div>
                        <div class="heading-font text-uppercase">Timp mediu pentru găsirea unui liceu potrivit</div>
                        <div>3 minute</div>
                    </div>
                    <div>
                        <div class="heading-font text-uppercase">Rată de satisfacţie</div>
                        <div>95% dintre utilizatori consideră platforma utilă</div>
                    </div>
                    <div class="d-lg-none my-5">
                        <a type="button" class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font">Vezi licee</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-start text-lg-end">
                <div class="text-accent-1 h-100 d-flex flex-column justify-content-between gap-3">
                    <div><b>Alegerea liceului potrivit n-ar trebui să fie ceva complicat.</b></div>
                    <div><b>Am adunat tot ce trebuie să ştii într-un singur loc. </b><br>Vrei să afli media de admitere? Avem. Echipele sportive? Bifat. Cluburi care ți se potrivesc? Da, şi pe acelea.</div>
                    <div><b>Nu suntem despre liste plictisitoare şi scroll fără sfârşit. </b><br>Îți oferim esențialul - ce face fiecare liceu special, ce oportunităţi ai și de ce s-ar putea să fie locul perfect pentru tine.</div>
                    <div><b>Pe scurt: viitorul e al tău. </b> <br>Noi doar te ajutăm să găseşti locul unde vei străluci. Aşa că explorează, compară şi alege liceul care ţi se potriveşte!</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a type="button" class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font">Vezi licee</a>
            </div>
        </div>
    </div>
 </main>

 <aside class="bg-accent-1 mt-5">
    <div class="container py-5 text-white">
        <h3 class="heading-font text-uppercase text-center">Actualitati</h3>
        <div class="row my-5">
            <div class="col-12 col-lg-4">
                <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                    <span class="news-date">24/2/2025</span>
                    <h4 class="news-title mt-2 heading-font">Lansarea unui nou proiect educațional</h4>
                    <p class="news-desc">Un nou program pentru elevi a fost implementat...</p>
                    <a href="#" class="news-link mt-auto text-white text-end">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                    <span class="news-date">22/2/2025</span>
                    <h4 class="news-title mt-2 heading-font">Competiția națională de robotică</h4>
                    <p class="news-desc">Elevii s-au întrecut în cadrul concursului de robotică...</p>
                    <a href="#" class="news-link mt-auto text-white text-end">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                    <span class="news-date">21/2/2025</span>
                    <h4 class="news-title mt-2 heading-font">Modernizarea liceelor din București</h4>
                    <p class="news-desc">Liceele din capitală vor beneficia de echipamente noi...</p>
                    <a href="#" class="news-link mt-auto text-white text-end">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                </div>
            </div>
        </div>
        
        <div>
            <a type="button" class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font text-center text-lg-start">Vezi tot</a>
        </div>
    </div>
</aside>

<aside class="bg-accent-3 py-5">
    <div class="container text-white text-center">
        <h3 class="heading-font text-uppercase mb-4">Urmărește Video-ul</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="video-container">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/VIDEO_ID" 
                        title="Video" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</aside>

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
