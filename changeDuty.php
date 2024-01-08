<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Duties</title>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/duties.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/duty.js"></script>
    </head>
    <body>
    <nav class="navbar border-bottom navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand navbar-logo p-0 me-0 me-lg-2 mb-0 h1" alt="Logo" href="index.php">
                    <img src="img/logo/logo-light.svg" class="logo-navbar d-inline-block" width="50" height="50">
                    Duty<span class="glow-hub">Hub</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"  aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="page" href="duties.php">
                                <img src="img/logo/clipboard-check-fill.svg" class="mb-1" width="20" height="20">
                                Duties
                            </a>
                        </li>
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                                Settings
                            </a>
                            <ul class="dropdown-menu col-sm-8 col-md-6 col-lg-12 col-xl-12">
                                <li class="sub-menu btn-group dropend col-sm-6 col-md-6 col-lg-12 col-xl-12">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-globe"></i>
                                        Language
                                    </a>
                                    <div class="languages">
                                    <ul class="dropdown-menu language-menu">
                                        <li>
                                            <a class="dropdown-item flags" href="#">
                                                <img class="img-flag" src="img/logo/united-kingdom-flag-icon.svg" width="25.5" height="25.5">
                                                English
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item flags" href="#">
                                                <img class="img-flag" src="img/logo/poland-flag-icon.svg" width="25.5" height="25.5">
                                                Polish
                                            </a>
                                        </li>
                                    </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                                        <div class="col-lg-10">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-moon-stars me-1"></i>
                                                Dark mode
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-end">
                                            <div class="form-check form-switch mt-1">
                                                <input class="dark-mode-type form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-lg-0">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="page" href="signin.php">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Sign In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="new-task mt-5">
                    <h2>Edit Duty</h2>  
                    <div class="col-8 offset-2 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-8">
                        <div class="task-section form-floating col-xl-6">
                            <input type="text" name="taskHolder" class="form-control" id="floating-task" placeholder="text" maxlength="50" required>
                            <span class="pull-right label label-default" id="count-newtask"></span>
                            <label for="floating-task">Change your task</label>
                        </div>
                        <button type="button" class="btn btn-dark mt-2 col-4 offset-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-4 offset-lg-4 col-xl-2 offset-xl-2">Save</button>
                        <div class="back-duties mt-2 col-4 offset-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-4 offset-lg-4 col-xl-2 offset-xl-2 text-center">
                            <a href="duties.php" class="back-duties-text me-2">
                            <i class="bi bi-chevron-left"></i>
                            Back 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>