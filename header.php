<?php
//show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Init global Constants
define('SITE_NAME', substr(dirname($_SERVER['SCRIPT_NAME']),1)); //--> php_mvc
define('ROOT_DIR', dirname(getcwd()) . '/' . SITE_NAME.'/'); //physical path on disk
//define('URL_DIR', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']
define('URL_DIR', 'http'.'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']. '/' . SITE_NAME.'/');
 ?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SanTour</title>
  <meta name="description" content="Hiking service">
  <meta name="author" content="Mikko Lerto">



  <link rel="stylesheet" href="assets/minified/css/main.min.css">
  <script src="assets/minified/vendor/jquery-3.3.1.min.js" ></script>
  <script src="assets/minified/vendor/jquery.lazy.min.js" ></script>


</head>

<body>

  <header>
    <nav>
      <div id="navigation">
        <ul id="nav-links">
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
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
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#"> <i class="social_facebook_circle facebook"></i> </a></li>
            <li><a href="#"> <i class="social_twitter_circle twitter"></i> </a></li>
          </ul>

      </div>
    </nav>
  </header>
