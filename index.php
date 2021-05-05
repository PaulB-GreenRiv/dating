<?php

//This is the controller for the ant dating site

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personalInfo', function(){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);
        //$_SESSION['x'] = $_POST['y'];
        header('location: profile');
    }
    //Display page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

$f3->route('GET|POST /profile', function(){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);
        //$_SESSION['x'] = $_POST['y'];
        header('location: interests');
    }
    //Display page
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interests', function(){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);
        //$_SESSION['x'] = $_POST['y'];
        header('location: summary');
    }
    //Display page
    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('GET|POST /summary', function(){
    //Store form data in session
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();