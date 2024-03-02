<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_SESSION["user_id"])){
    $user_id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
    $query = "SELECT * FROM users where id=$user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if(isset($user_id)) {
    $query_choice = "SELECT * FROM preferences WHERE id_user = $user_id";
    $result_choice = mysqli_query($conn, $query_choice); 
    if($result_choice && mysqli_num_rows($result_choice) > 0) {
        $choice = mysqli_fetch_assoc($result_choice); 
        $color_mode = $choice['color_mode'];
        $language = $choice['languages'];
    }
}

$duties_nav = 'Duties';
$calendar_nav = 'Calendar';
$weather_nav = 'Weather';
$settings_nav = 'Settings';
$dark_mode_nav = 'Dark mode';
$language_nav = 'Language';
$english_nav = 'English';
$polish_nav = 'Polish';
$sign_in_nav = 'Sign In';
$sign_out_nav = 'Sign Out';
$edit_header = 'Edit Duty';
$duty_header = 'Face Your Duty';
$floating_duty = 'Change your duty';
$floating_text = 'Insert your duty';
$floating_weather = 'Insert your city';
$importance_text = 'Choose the importance of duty';
$low = 'Low importance';
$medium = 'Medium importance';
$high = 'High importance';
$btn_submit = 'Submit';
$manage_duty = 'Manage duties';
$empty_text = 'You dont have any added duties yet';
$btn_save = 'Save';
$btn_back = 'Back';
$about_text = 'Easy-to-use application that will help you organize your daily tasks';
$contact = 'Contact Us';
$contact_text = 'We are available on the following social media';
$calendar_name = 'Basic Calendar';
$mon = 'Mon';
$tue = 'Tue';
$wed = 'Wed';
$thu = 'Thu';
$fri = 'Fri';
$sat = 'Sat';
$sun = 'Sun';
$weather_name = 'Weather API';
$information_name = 'You must first search for the place';
$error_name = 'Invalid city name';

$bodyThemeClass = '';
$darkLine = '';
$logoTheme =  'img/logo/logo-light.svg';
$btnText = '<i class="bi bi-moon-stars me-1"></i> Dark mode';


if(isset($_SESSION['user_id'])){
$query_choice = "SELECT * FROM preferences WHERE id_user = $user_id";
$result_choice = mysqli_query($conn, $query_choice); 
if($result_choice && mysqli_num_rows($result_choice) > 0) {
    $choice = mysqli_fetch_assoc($result_choice); 
    $color_mode = $choice['color_mode'];
    $language = $choice['languages'];
} else {
    $color_mode = 0;
    $language = 0;
}


$bodyThemeClass = ($color_mode == 0) ? '' : 'dark-theme';
$darkLine = ($color_mode == 0) ? '' : 'border-dark';
$logoTheme = ($color_mode == 0) ? 'img/logo/logo-light.svg' : 'img/logo/logo-dark.svg';
$btnText = ($color_mode == 0) ? '<i class="bi bi-moon-stars me-1"></i>' . (($language == 0) ? 'Dark mode' : 'Tryb ciemny') : '<i class="bi bi-sun me-1"></i>' . (($language == 0) ? 'Light mode' : 'Tryb jasny');

$duties_nav = ($language == 0) ? 'Duties' : 'Obowiązki';
$calendar_nav = ($language == 0) ? 'Calendar' : 'Kalendarz';
$weather_nav = ($language == 0) ? 'Weather' : 'Pogoda';
$settings_nav = ($language == 0) ? 'Settings' : 'Ustawienia';
$dark_mode_nav = ($language == 0) ? 'Dark mode' : 'Tryb ciemny';
$language_nav = ($language == 0) ? 'Language' : 'Język';
$english_nav = ($language == 0) ? 'English' : 'Angielski';
$polish_nav = ($language == 0) ? 'Polish' : 'Polski';
$sign_in_nav = ($language == 0) ? 'Sign In' : 'Zaloguj się';
$sign_out_nav = ($language == 0) ? 'Sign Out' : 'Wyloguj się';
$edit_header = ($language == 0) ? 'Edit Duty' : 'Edytuj zadanie';
$duty_header = ($language == 0) ? 'Face Your Duty' : 'Staw czoła obowiązkom';
$floating_duty = ($language == 0) ? 'Change your duty' : 'Zmień swoje zadanie';
$floating_text = ($language == 0) ? 'Insert your duty' : 'Podaj swoje zadanie';
$floating_weather = ($language == 0) ? 'Insert your city' : 'Podaj nazwę miejsca';
$importance_text = ($language == 0) ? 'Choose the importance of duty' : 'Wybierz ważność obowiązku';
$low = ($language == 0) ? 'Low importance' : 'Małe znaczenie';
$medium = ($language == 0) ? 'Medium importance' : 'Średnie znaczenie';
$high = ($language == 0) ? 'High importance' : 'Duże znaczenie';
$btn_submit = ($language == 0) ? 'Submit' : 'Dodaj';
$manage_duty = ($language == 0) ? 'Manage duties' : 'Zarządzanie obowiązkami';
$empty_text = ($language == 0) ? 'You dont have any added duties yet' : 'Nie posiadasz żadnego obowiązku';
$btn_save = ($language == 0) ? 'Save' : 'Zapisz';
$btn_back = ($language == 0) ? 'Back' : 'Cofnij';
$about_text = ($language == 0) ? 'Easy-to-use application that will help you organize your daily tasks' : 'Łatwa w użyciu aplikacja, która pomoże ci zorganizować codzienne zadania';
$contact = ($language == 0) ? 'Contact Us' : 'Skontaktuj się z nami';
$contact_text = ($language == 0) ? 'We are available on the following social media' : 'Jesteśmy dostępni w następujących mediach społecznościowych';
$calendar_name = ($language == 0) ? 'Basic Calendar' : 'Zwyczajny kalendarz';
$mon = ($language == 0) ? 'Mon' : 'Pon';
$tue = ($language == 0) ? 'Tue' : 'Wt';
$wed = ($language == 0) ? 'Wed' : 'Śr';
$thu = ($language == 0) ? 'Thu' : 'Czw';
$fri = ($language == 0) ? 'Fri' : 'Pt';
$sat = ($language == 0) ? 'Sat' : 'Sob';
$sun = ($language == 0) ? 'Sun' : 'Ndz';
$weather_name = ($language == 0) ? 'Weather API' : 'Prognoza pogody';
$information_name = ($language == 0) ? 'You must first search for the place' : 'Musisz najpierw wyszukać miejsce';
$error_name = ($language == 0) ? 'Invalid city name' : 'Nieprawidłowa nazwa miejsca';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calendar</title>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styles/common.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/calendar.css?v=<?php echo time(); ?>">
    </head>
    <body class="<?= $bodyThemeClass ?>">
        <nav class="navbar border-bottom navbar-expand-lg sticky-top <?= $darkLine ?>">
            <div class="container-fluid">
                <a class="navbar-brand navbar-logo p-0 me-0 me-lg-2 mb-0 h1" alt="Logo" href="index.php" id="logo_name">
                    <img src="<?= $logoTheme ?>" class="logo-navbar d-inline-block" id="logo_navbar" width="50" height="50">
                    Duty<span class="glow-hub">Hub</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"  aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item me-lg-2 me-xl-2">
                            <a class="nav-link" aria-current="page" href="duties.php">
                                <i class="bi bi-clipboard-check"></i>
                                <span class="duties-nav"><?= $duties_nav ?></span>
                            </a>
                        </li>
                        <li class="nav-item me-lg-2 me-xl-2">
                            <a class="nav-link" aria-current="page" href="calendar.php">
                                <i class="bi bi-calendar-week"></i>
                                <span class="calendar-nav"><?= $calendar_nav ?></span>
                            </a>
                        </li>
                        <li class="nav-item me-lg-2 me-xl-2">
                            <a class="nav-link" aria-current="page" href="weather.php">
                                <i class="bi bi-cloud-drizzle"></i>
                                <span class="weather-nav"><?= $weather_nav ?></span>
                            </a>
                        </li>
                        <?php if(isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item dropdown me-lg-2 me-xl-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                                <span class="settings-nav"><?= $settings_nav ?></span>
                            </a>
                            <ul class="dropdown-menu col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-12 col-xl-12">
                                <li class="sub-menu btn-group dropend col-sm-6 col-md-5 col-lg-12 col-xl-12">
                                    <a class="dropdown-item dropdown-toggle language-option d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-globe me-1"></i>
                                        <span class="language-nav"><?= $language_nav ?></span>
                                    </a>
                                    <div class="languages">
                                        <ul class="dropdown-menu language-menu">
                                            <li>
                                                <form method="POST" action="<?= URL ?>languages/english.php">
                                                    <a class="dropdown-item flags <?= ($language == 0) ? ' active' : '' ?>" href="?lang=english" language="english">
                                                        <button class="btn language-button" name="choice" type="submit" id="toogle-btn">
                                                            <img class="img-flag" src="img/logo/united-kingdom-flag-icon.svg" width="25.5" height="25.5">
                                                            <input type="hidden" name="current_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                                            <span class="english-nav ms-1"><?= $english_nav ?></span>
                                                        </button>
                                                    </a>
                                                </form>
                                            </li>
                                            <li>
                                                <form method="POST" action="<?= URL ?>languages/polish.php">
                                                    <a class="dropdown-item flags <?= ($language == 1) ? ' active' : '' ?>" href="#" language="polish">
                                                        <button class="btn language-button" name="choice" type="submit" id="toogle-btn">
                                                            <img class="img-flag" src="img/logo/poland-flag-icon.svg" width="25.5" height="25.5">
                                                            <input type="hidden" name="current_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                                            <span class="polish-nav ms-1"><?= $polish_nav ?></span>
                                                        </button>
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between mt-2 mt-sm-2 mt-md-2 mt-lg-0 mt-xl-0" href="#">
                                        <div class="col-lg-12">
                                            <form method="POST" action="<?= URL ?>colorMode.php">
                                                <div class="d-flex align-items-center">
                                                    <input type="hidden" name="current_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                                    <button class="btn dark-button" name="choice" type="submit" id="toogle-btn"><span class="dark-mode-nav"><?= $btnText ?></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php else : ?>
                            <input class="flags active" type="hidden">
                        <?php endif ?>
                    </ul>
                    <ul class="navbar-nav mb-lg-0 dropdown ">
                        <?php if(isset($_SESSION['user_id'])) : ?>
                            <li class="nav-item me-lg-2 me-xl-2">
                            <a class="nav-link" aria-current="page" href="<?=URL?>signout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span class="sign-out-nav"><?= $sign_out_nav ?></span>
                            </a>
                        </li>
                        <?php else : ?>
                    <ul class="navbar-nav mb-lg-0">
                        <li class="nav-item me-lg-2 me-xl-2">
                            <a class="nav-link" aria-current="page" href="signin.php">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span class="sign-in-nav"><?= $sign_in_nav ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="custom-shape-divider-top-1704668404">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <footer class="custom-shape-divider-bottom-1704670510" id="footer">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </footer>
        <div class="container-fluid mt-2 pt-4 mb-5">
            <div class="row">
                <div class="calendar-place col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 mt-5 pt-4">
                    <div>
                        <h1 class="calendar-name"><?= $calendar_name ?></h1>
                    </div>
                    <div class="calendar col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 pb-2">
                        <div class="calendar-head col-12 mt-5 pt-1 mb-1">
                            <div class="month">
                                <button class="btn border-2 prev mt-1 me-1"><i class="bi bi-chevron-left" id="prev-date"></i></button>
                                <div class="date">     
                                </div>
                                <button class="btn border-2 next mt-1 ms-1"><i class="bi bi-chevron-right" id="next-date"></i></button>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="week">
                                <div class="mon"><?= $mon ?></div>
                                <div class="tue"><?= $tue ?></div>
                                <div class="wed"><?= $wed ?></div>
                                <div class="thu"><?= $thu ?></div>
                                <div class="fri"><?= $fri ?></div>
                                <div class="sat"><?= $sat ?></div>
                                <div class="sun"><?= $sun ?></div>
                            </div>
                            <div class="days mt-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="script/calendar.js?v=<?php echo time(); ?>"></script>
    </body>
</html>