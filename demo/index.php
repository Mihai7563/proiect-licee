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
        <div id="newsCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- First page -->
                <div class="carousel-item active">
                    <div class="row my-5">
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">19/5/2025</span>
                                <h4 class="news-title mt-2 heading-font">Aplicația „Micul Licean” se lansează oficial</h4>
                                <p class="news-desc">Platformă pentru elevi și părinți cu informații detaliate și actualizate despre licee, profiluri și facilități.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal1">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">15/5/2025</span>
                                <h4 class="news-title mt-2 heading-font">Evaluarea Națională 2025: calendar și noutăți</h4>
                                <p class="news-desc">Elevii clasei a VIII-a vor susține Evaluarea Națională din 10 iunie. Subiectele vor fi adaptate, iar rezultatele se afișează pe 24 iunie.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal7">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">14-16/5/2025</span>
                                <h4 class="news-title mt-2 heading-font">Încep înscrierile la testări și aptitudini</h4>
                                <p class="news-desc">Elevii se pot înscrie pentru testările de limbă străină și probele de aptitudini pentru licee speciale.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal3">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Second page -->
                <div class="carousel-item">
                    <div class="row my-5">
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">12/5/2025</span>
                                <h4 class="news-title mt-2 heading-font">Broșurile de admitere la liceu 2025 publicate</h4>
                                <p class="news-desc">Ministerul Educației a publicat broșurile cu profiluri, locuri și criterii de admitere pentru 2025.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal2">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">Până pe 9/5/2025</span>
                                <h4 class="news-title mt-2 heading-font">Concursul național 3DUTECH 2025: AI For Good</h4>
                                <p class="news-desc">Concurs pentru elevi și profesori: proiecte inovatoare cu AI, robotică și 3D. Înscrieri până pe 20 aprilie, proiecte până pe 9 mai.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal8">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="news-card bg-black p-3 d-flex flex-column mb-3 mb-lg-0">
                                <span class="news-date">17/4/2024</span>
                                <h4 class="news-title mt-2 heading-font">Scandal la un liceu renumit din București</h4>
                                <p class="news-desc">Profesorul de matematică a dat un test pe care nici el nu l-a putut rezolva. Inspectoratul Școlar a început verificări.</p>
                                <a href="#" class="news-link mt-auto text-white text-end" data-bs-toggle="modal" data-bs-target="#newsModal9">Citește mai mult <i class="bi bi-arrow-down-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center gap-2 mt-3">
                        <button class="carousel-btn bg-accent-1 text-white fs-3 border-0 btn btn-outline-light" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev" aria-label="Anterior">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="carousel-btn bg-accent-1 text-white fs-3 border-0 btn btn-outline-light" type="button" data-bs-target="#newsCarousel" data-bs-slide="next" aria-label="Următor">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modals for news details -->
    <!-- Modal 1 -->
    <div class="modal fade" id="newsModal1" tabindex="-1" aria-labelledby="newsModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal1Label">Aplicația „Micul Licean” se lansează oficial pe 19 mai 2025</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> 19 mai 2025</p>
            <p><b>Sursă:</b> MiculLicean.ro</p>
            <p>Aplicația Micul Licean se lansează oficial pe 19 mai 2025, oferind elevilor de clasa a VIII-a și părinților o platformă intuitivă pentru a explora liceele din România. Aceasta furnizează informații detaliate și actualizate despre fiecare liceu, inclusiv profiluri, medii de admitere, facilități și activități extracurriculare. Utilizatorii pot compara opțiunile și pot accesa date esențiale pentru a lua decizii informate privind alegerea liceului potrivit.</p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="newsModal2" tabindex="-1" aria-labelledby="newsModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal2Label">Broșurile de admitere la liceu pentru 2025 au fost publicate pe 12 mai</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> 12 mai 2025</p>
            <p><b>Sursă:</b> Edupedu.ro</p>
            <p>Ministerul Educației a publicat broșurile de admitere la liceu pentru anul 2025 pe 12 mai. Acestea conțin informații esențiale despre profilurile disponibile, numărul de locuri și criteriile de admitere. Repartizarea computerizată este programată pentru 23 iulie 2025.</p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal fade" id="newsModal3" tabindex="-1" aria-labelledby="newsModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal3Label">Încep înscrierile pentru testările de limbă străină și probele de aptitudini</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> 14-16 mai 2025</p>
            <p><b>Sursă:</b> Edupedu.ro</p>
            <p>Elevii de clasa a VIII-a se pot înscrie în perioada 14-16 mai pentru testările de limbă străină și pentru probele de aptitudini necesare admiterii în anumite licee. Aceste testări sunt esențiale pentru admiterea în clasele cu profiluri speciale, precum cele bilingve sau vocaționale.</p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal 7 -->
    <div class="modal fade" id="newsModal7" tabindex="-1" aria-labelledby="newsModal7Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal7Label">Evaluarea Națională 2025: calendar și noutăți</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> 15 mai 2025</p>
            <p><b>Sursă:</b> Ministerul Educației</p>
            <p>Elevii clasei a VIII-a vor susține Evaluarea Națională începând cu data de 10 iunie 2025. Prima probă este la Limba și Literatura Română, urmată de Matematică și o probă la alegere, în funcție de profilul liceului. Ministerul Educației a anunțat că subiectele vor fi adaptate pentru a reflecta competențele dobândite în școală, iar rezultatele vor fi publicate pe 24 iunie.</p>
            <p>Pentru pregătire, elevii pot consulta modele de teste oficiale disponibile pe site-ul ministerului.</p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal 8 -->
    <div class="modal fade" id="newsModal8" tabindex="-1" aria-labelledby="newsModal8Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal8Label">Concursul național 3DUTECH 2025: AI For Good</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> Până pe 9 mai 2025</p>
            <p><b>Sursă:</b> Edupedu.ro</p>
            <p>Concursul național 3DUTECH 2025 este dedicat elevilor și profesorilor din învățământul preuniversitar din România. Tema ediției din acest an este „AI For Good – noi tehnologii pentru un viitor mai bun”. Participanții sunt invitați să creeze proiecte inovatoare care combină inteligența artificială, robotica și modelarea 3D pentru a răspunde la probleme reale din domenii precum educație, dezvoltare durabilă sau situații de urgență. Înscrierea este gratuită și se poate face până pe 20 aprilie 2025, iar proiectele trebuie trimise până pe 9 mai 2025.</p>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal 9 -->
    <div class="modal fade" id="newsModal9" tabindex="-1" aria-labelledby="newsModal9Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-black text-white">
        <div class="modal-header">
            <h5 class="modal-title heading-font" id="newsModal9Label">Scandal la un liceu renumit din București</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Închide"></button>
        </div>
        <div class="modal-body">
            <p><b>Data:</b> 17 aprilie 2024</p>
            <p><b>Sursă:</b> Digi24, MyCTA.ro, Qbebe</p>
            <p>Un val de verificări a început la un liceu de prestigiu din Capitală, după ce părinții au semnalat o situație neobișnuită pe rețelele sociale. Profesorul de matematică a dat un test, care l-a depășit, însă, și pe el. Părinții spun și că întârzie și la ore, iar la unele nu vine deloc.</p>
            <p>Conducerea școlii a transmis că a făcut verificări și că va decide dacă notele de la test vor fi luate în calcul sau nu, după o analiză a rezultatelor. Situația a ajuns și la Inspectoratul Școlar al Municipiului București, care a trimis o echipă de control la liceu. Profesorului de matematică i s-au făcut mai multe recomandări și va fi monitorizat de școală, iar acesta va informa, în continuare, inspectoratul.</p>
        </div>
        </div>
    </div>
    </div>
    </div>
</aside>

<aside class="bg-accent-3 py-5">
    <div class="container text-white text-center">
        <h3 class="heading-font text-uppercase mb-4">Urmărește Video-ul</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="video-container">
                    <a href="https://www.youtube.com/watch?v=VIDEO_ID" target="_blank" class="btn btn-light rounded-pill px-4 py-2 heading-font">
                        Vezi video pe YouTube
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php
    include 'assets/php/footer.php';
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
