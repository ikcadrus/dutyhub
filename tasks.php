<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tasks</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/tasks.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>
    <body>
        <nav class="navbar bg-body-tertiary navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand p-0 me-0 me-lg-2 mb-0 h1" alt="Logo" href="index.php">
                    <img src="img/logo/logo-light.svg" class="logo-navbar d-inline-block" width="50" height="50">
                    Duty<span class="glow-hub">Hub</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll1, #navbarScroll2 , #navbarScroll3"  aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll1">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a class="nav-link" id="tasks" aria-current="page" href="tasks.php">
                            <img src="img/logo/clipboard-check-fill.svg" class="mb-1" width="20" height="20">
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="page" href="settings.php">
                                <i class="bi bi-gear"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right mb-2 mb-lg-0">
                        <li class="nav-item me-2 ">
                            <a class="nav-link" aria-current="page" href="signin.php">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Sign In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>