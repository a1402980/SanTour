<?php
//show errors
 // ini_set('display_errors', 1);
 // ini_set('display_startup_errors', 1);
 // error_reporting(E_ALL);
 ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);
 error_reporting(0);

//Init global Constants
define('SITE_NAME', substr(dirname($_SERVER['SCRIPT_NAME']),1)); //--> php_mvc
define('ROOT_DIR', dirname(getcwd()) . '/' . SITE_NAME.'/'); //physical path on disk
//define('URL_DIR', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']
define('URL_DIR', 'http'.'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']. '/' . SITE_NAME.'/');


//multilanguage support
if(isSet($_GET['lang']))
{
    $lang = $_GET['lang'];
// register the session and set the cookie
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
    $lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
    $lang = $_COOKIE['lang'];
}
else
{
    $lang = 'en';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;
    case 'de':
        $lang_file = 'lang.de.php';
        break;
    case 'fr':
        $lang_file = 'lang.fr.php';
        break;
    default:
        $lang_file = 'lang.en.php';
}
include_once ROOT_DIR.'languages/'.$lang_file;

?>

<!doctype html>
<?php //set the html language to the page language ?>
<html lang="<?php echo strtolower($lang['LANGUAGE']); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //page cache set to 30 days ?>
    <meta http-equiv="Expires" content="30">

    <title>SanTour</title>
    <meta name="description" content="Hiking service">
    <meta name="author" content="Mikko Lerto">

    <link rel="stylesheet" href="assets/minified/css/main.min.css">
    <link rel="stylesheet" href="assets/minified/vendor/leaflet.min.css">
    <script src="assets/minified/vendor/jquery-3.3.1.min.js" ></script>


    <?php //use these if leaflet has issues ?>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/> -->
    <!-- <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script> -->


</head>

<body>

<header>
    <nav>
        <div id="navigation">
            <ul id="nav-links">
                <li><a href="<?php echo URL_DIR ?>"><?php echo $lang['NAV_START']; ?></a></li>
                <li><a href="<?php echo URL_DIR ?>about.php"><?php echo $lang['NAV_ABOUT']; ?></a></li>
                <li>
                    <div class="dropdown">
                        <a class="dd-trigger"><?php echo $lang['LANGUAGE']; ?> <i class="arrow_triangle-down toggle-icon"></i></a>
                        <ul hidden>
                            <?php $the_url = strtok($_SERVER["REQUEST_URI"],'?') ?>
                            <li><a href="<?php echo $the_url ?>?lang=en">En</a></li>
                            <li><a href="<?php echo $the_url ?>?lang=de">De</a></li>
                            <li><a href="<?php echo $the_url ?>?lang=fr">Fr</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul id="some">
                <li><a href="#"> <i class="social_facebook_circle facebook"></i> </a></li>
                <li><a href="#"> <i class="social_twitter_circle twitter"></i> </a></li>
            </ul>
        </div>

        <div id="logo">
            <a href='<?php echo URL_DIR ?>'>
                <div class="logo-container">
                    <span>SanTour</span>
                </div>
            </a>
        </div>

        <div id="mobile-navigation" hidden>
            <button class="nav-toggle"> <i class="icon_menu"></i> </button>
            <ul id="mobile-links">
                <button class="nav-toggle right"> <i class="icon_close"></i> </button>
                <li class="mobile-some"><a href="#"> <i class="social_facebook_circle facebook"></i> </a></li>
                <li class="mobile-some"><a href="#"> <i class="social_twitter_circle twitter"></i> </a></li>
                <li></li>
                <li><a href="<?php echo URL_DIR ?>"><?php echo $lang['NAV_START']; ?></a></li>
                <li><a href="<?php echo URL_DIR ?>about.php"><?php echo $lang['NAV_ABOUT']; ?></a></li>
                <li>
                    <div class="dropdown">
                        <a class="dd-trigger"><?php echo $lang['LANGUAGE']; ?> <i class="arrow_triangle-down toggle-icon"></i></a>
                        <ul hidden>
                            <?php $the_url = strtok($_SERVER["REQUEST_URI"],'?') ?>
                            <li><a href="<?php echo $the_url ?>?lang=en">En</a></li>
                            <li><a href="<?php echo $the_url ?>?lang=de">De</a></li>
                            <li><a href="<?php echo $the_url ?>?lang=fr">Fr</a></li>
                        </ul>
                    </div>
                </li>

            </ul>


        </div>
    </nav>
</header>
