<?php
session_start();
?>

<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="/">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>

                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Documents</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Articles</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Rapports</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Prototypes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Compte-Rendus</a>

                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">News</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Nouvelles</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Séminaires</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Réunions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Evénements</a>

                        </div>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Vidéos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Demos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Capture</a>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Membres</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-item-custom">
                <a href="../../login.php">Connexion</a> | <a href="#">null</a>
            </div>
        </div>
    </nav>
</header>