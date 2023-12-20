<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Duties</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/duties.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/duty.js"></script>
    </head>
    <body>
        <nav class="navbar border-bottom navbar-expand-lg sticky-top">
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
                            <a class="nav-link" id="tasks" aria-current="page" href="duties.php">
                            <img src="img/logo/clipboard-check-fill.svg" class="mb-1" width="20" height="20">
                                Duties
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
        <div class="container-fluid">
            <div class="row">
                <div class="new-task mt-5">
                    <h2>Add new task</h2>  
                    <div class="col-8 offset-2 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-8">
                        <div class="task-section form-floating col-xl-6">
                            <input type="text" name="taskHolder" class="form-control" id="floating-task" placeholder="text" maxlength="50" required>
                            <span class="pull-right label label-default" id="count-newtask"></span>
                            <label for="floating-task">Insert your task</label>
                        </div>
                        <button type="button" class="btn btn-dark mt-2 col-4 offset-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-4 offset-lg-4 col-xl-2 offset-xl-2">Add Task</button>
                    </div>
                </div>
                <div class="duty-main-text mt-5">
                    <h2>All your duties</h2>
                </div>
                <ul class="duties-list mt-2 col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <li class="duty mb-3 row">
                        <div class="form-check col-1">
                            <input class="form-check-input" type="checkbox" id="checkbox" onclick="changeText()">
                            <label class="form-check-label" for="checkbox"></label>
                        </div>
                        <div class="duty-text col-9 text-break" id="duty-ready">
                            12345678901234567890123456789012345678901234567890
                        </div>
                        <div class="edit col-1">
                            <a href="">
                                <i class="bi bi-pencil-square"></i>
                            </a>    
                        </div>
                        <div class="delete col-1">
                            <a href="">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>