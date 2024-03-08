<?php
require "config.php";
$conn = mysqli_connect("localhost", "root", "", "dutybase");

if(isset($_SESSION["user_id"])){
    $user_id = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
    $query = "SELECT * FROM duties WHERE id_user=$user_id ORDER BY id DESC";

    if(isset($_GET['fromAtoZ'])) {
        $query = "SELECT * FROM duties WHERE id_user=$user_id ORDER BY duty ASC";
    } elseif(isset($_GET['fromZtoA'])) {
        $query = "SELECT * FROM duties WHERE id_user=$user_id ORDER BY duty DESC";
    } elseif(isset($_GET['filtrByCheck'])) {
        $query = "SELECT * FROM duties WHERE id_user=$user_id ORDER BY checked DESC";
    } elseif(isset($_GET['filtrByPriority'])) {
        $query = "SELECT * FROM duties WHERE id_user=$user_id ORDER BY importance DESC";
    }

    $result = mysqli_query($conn, $query);
}else {
    header("Location: signin.php");
    exit();
}

if(isset($_POST["submit"])){
    $current_user_id = $_SESSION["id"];
    $dutyHolder = filter_var($_POST["dutyHolder"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $importance = isset($_POST["flexRadioDefault"]) ? $_POST["flexRadioDefault"] : null;
    if(strlen($dutyHolder) > 0 && strlen($dutyHolder) <= 50){
        if($importance !== null){
            $query = "INSERT INTO duties (id_user,importance,duty) VALUES ($current_user_id,'$importance','$dutyHolder')";
            if(mysqli_query($conn, $query)){
                header("Location: duties.php");
                exit();
            } else {
                echo "<script>alert('An error occurred while adding data to the database')</script>";
            }
        } else {
            echo "<script>alert('You must select one of the three importance buttons')</script>";
        }
    } else {
        echo "<script>alert('Task should contain a maximum of 85 characters')</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["checked"])) {
    $id = $_POST["id"];
    $isChecked = $_POST['checked'];
    $isChecked = $isChecked == '1' ? 1 : 0;
    $query = "UPDATE duties SET checked = ? WHERE id = ?";
    $result = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($result, "ii", $isChecked, $id);

    if (mysqli_stmt_execute($result)) {
        echo "Update successful";
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($result);
    exit();
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
        <title>Duties</title>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="script/duty.js?v=<?php echo time(); ?>"></script>
        <link rel="stylesheet" href="styles/common.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/duties.css?v=<?php echo time(); ?>">
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
                                                    <a class="dropdown-item flags" href="?lang=english" language="english">
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
                                                    <a class="dropdown-item flags" href="#" language="polish">
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
        <div class="custom-shape-divider-top-1704668404" id="header">
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
        <div class="container-fluid">
            <div class="row">
                <form method="POST" autocomplete="off" class="new-task col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1 mt-5 pt-5">
                    <h1 class="duty-header"><?= $duty_header ?></h1>  
                    <div class="row">
                        <div class="task-section form-floating col-10 offset-1 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-6 offset-xl-3" id="floating-form">
                            <input type="text" name="dutyHolder" class="form-control" id="floating-task" placeholder="text" maxlength="50" required oninput="accessSubmitButton()">
                            <label for="floating-task"><span class="floating-text"><?= $floating_text ?></span></label>
                        </div>
                        <div class="importance-button col-1">
                            <button class="btn border-0 btn-option" type="button" data-toggle="tooltip" title="More options" onclick="changeButton()"><i class="bi bi-three-dots dots" id="imp"></i></button>
                        </div>
                        <div>
                            <div class="row importance-section col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mt-2 mb-2" id='importance-section'>
                                <div class="importance mb-3">
                                    <h4 class="importance-text"><?= $importance_text ?></h4>
                                </div>
                                <div class="radio-low form-check col-4 d-flex justify-content-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1" onclick="accessSubmitButton()">
                                    <label class="form-check-label" for="flexRadioDefault1"></label>
                                </div>
                                <div class="radio-mid form-check col-4 d-flex justify-content-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="2" id="flexRadioDefault2" onclick="accessSubmitButton()">
                                    <label class="form-check-label" for="flexRadioDefault2"></label>
                                </div>
                                <div class="radio-high form-check col-4 d-flex justify-content-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="3" id="flexRadioDefault3" onclick="accessSubmitButton()">
                                    <label class="form-check-label" for="flexRadioDefault3"></label>
                                </div>
                                <div class="importance col-4">
                                    <h6 class="low"><?= $low ?></h6>
                                </div>
                                <div class="importance col-4">
                                    <h6 class="medium"><?= $medium ?></h6>
                                </div>
                                <div class="importance col-4">
                                    <h6 class="high"><?= $high ?></h6>
                                </div>
                        </div>
                            <div class="button col-6 offset-3">
                                <button type="submit" name="submit" class="btn btn-dark btn-submit mt-2 col-6 offset-3 col-sm-6 offset-sm-3 col-md-4 offset-md-4 col-lg-4 offset-lg-4 col-xl-2 offset-xl-5" id="buttonSubmit" disabled><?= $btn_submit ?></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="duty-main-text mt-5 pt-5">
                    <h2 class="manage-duty"><?= $manage_duty ?></h2>
                    <div class="col-2 offset-5 d-flex justify-content-center">
                    <button class="btn border-0 filter-button" id="filter-button0" name="fromAtoZ" data-toggle="tooltip" title="From A to Z">
                        <i class="bi bi-sort-alpha-down"></i>
                    </button>
                    <button class="btn border-0 filter-button" id="filter-button1" name="fromZtoA" data-toggle="tooltip" title="From Z to A">
                        <i class="bi bi-sort-alpha-down-alt"></i>
                    </button>
                    <button class="btn border-0" id="filter-button2" data-toggle="tooltip" title="Sort options" onclick="filterButton()">
                        <i class="bi bi-filter filter"></i>
                    </button>
                    <button class="btn border-0 filter-button" id="filter-button3" name="filtrByCheck" data-toggle="tooltip" title="By Check">
                        <i class="bi bi-check-lg"></i>
                    </button>
                    <button class="btn border-0 filter-button" id="filter-button4" name="filtrByPriority" data-toggle="tooltip" title="By Priority">
                        <i class="bi bi-exclamation-triangle"></i>
                    </button>
                    </div>
                </div>
                <?php if(mysqli_num_rows($result) > 0) : ?>
                <ul class="duties-list mt-2 col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <li class="duty mb-3 row">
                        <div class="accept form-check col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" 
                        <?php if($row['importance'] == 1) :?> style="background-color: #198754";>
                        <?php elseif($row['importance'] == 2) :?> style="background-color: #ffc107";>
                        <?php else :?> style="background-color: #dc3545";>
                        <?php endif; ?>
                            <input class="form-check-input" type="checkbox" id="checkbox" data-id="<?= $row['id'] ?>" name="checked" <?= $row['checked'] == 1 ? 'checked' : ''?> value="<?= $row['checked'] ?>">
                            <label class="form-check-label" for="checkbox"></label>
                        </div>
                        <div class="duty-date col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <div class="row all-date">
                                <i class="date-icon bi bi-calendar2-check"></i>
                                <p class="date"><?= $row['date'] ?><p>
                            </div>
                        </div>
                        <div class="duty-text col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-break" name="duty-text">
                            <?= $row['duty'] ?>
                        </div>
                        <div class="edit col-1">
                            <a class="duty-icon" href="changeDuty.php?id=<?= $row['id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>    
                        </div>
                        <div class="delete col-1">
                            <a class="duty-icon" href="deleteDuty.php?id=<?= $row['id'] ?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </li>    
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php if(mysqli_num_rows($result) == 0) : ?>
                    <div class="empty-place">
                        <div class="empty-text mt-5">
                            <h4><?= $empty_text ?></h4>
                        </div>
                        <div class="emoji d-flex justify-content-center ">
                            <img src="img/logo/sad-face.svg" width="150px" height="150px">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <script src="script/settings.js?v=<?php echo time(); ?>"></script>
    </body>
</html>