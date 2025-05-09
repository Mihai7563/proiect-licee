<?php
    $containerClass = isset($containerClass) ? $containerClass : "";
    $textClass1 = isset($textClass1) ? $textClass1 : "";
    $borderClass = isset($borderClass) ? $borderClass : "";
    $textClass2 = isset($textClass2) ? $textClass2 : "";
    $navbar = '
    <div class="nav-container' . $containerClass . '">
        <nav class="container navbar navbar-expand-lg heading-font py-3">
        <div class="container-fluid">
            <!-- Logo Placeholder (Rectangular Box) -->
            <div class="border border-5 border-black px-5 py-1 fs-5 fw-bold heading-font ' . $textClass1 .  ' ">SIMP CITY</div>

            <!-- Navbar Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link '. $textClass2. ' " href="home.html">Acasă</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ' . $textClass2 . ' " href="#" data-bs-toggle="dropdown">Licee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ' . $textClass2 . ' " href="#">Vezi Harta</a>
                    </li>
                    <!-- Contact mobile -->
                    <li class="nav-item d-lg-none ' . $textClass1 . '">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Right-side Items -->
            <div class="d-none d-lg-flex align-items-center">
                <a class="nav-link mx-2 ' . $textClass1 . '" href="#">Login</a>
                <a class="nav-link mx-2 d-none d-lg-block ' . $textClass1 . '" href="#">Contact</a>
                <a class="nav-link mx-2 ' . $textClass1 . '" href="#"><i class="bi bi-search"></i></a>
            </div>
        </div>
        </nav>
    </div>';
?>