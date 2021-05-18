<?php
/*
 * Paul B.
 * SDEV 328 - Dating II
 * 5/7/21
 */
//This is the controller for the ant dating site

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Home route
$f3->route('GET /home', function(){
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Personal Info route
$f3->route('GET|POST /personalInfo', function($f3){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['x'] = $_POST['y'];
        $_SESSION['fName'] = $_POST['fName'];
        $_SESSION['lName'] = $_POST['lName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['pNum'] = $_POST['pNum'];
        header('location: profile');
    }

    $f3->set('genders', getGenderDetails());

    //Display page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

//Profile route
$f3->route('GET|POST /profile', function($f3){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$_SESSION['x'] = $_POST['y'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['hill'] = $_POST['hill'];
        $_SESSION['lgender'] = $_POST['lgender'];
        $_SESSION['bio'] = $_POST['bio'];
        header('location: interests');
    }

    $f3->set('genders', getGenderDetails());

    //Display page
    $view = new Template();
    echo $view->render('views/profile.html');
});

//Interests route
$f3->route('GET|POST /interests', function($f3){
    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$_SESSION['x'] = $_POST['y'];
        $_SESSION['indoor'] = implode(", ", $_POST['indoor']);
        $_SESSION['outdoor'] = implode(", ", $_POST['outdoor']);
        header('location: summary');
    }

    $f3->set("iInterests", getInInterests());
    $f3->set("oInterests", getOutInterests());

    //Display page
    $view = new Template();
    echo $view->render('views/interests.html');
});

//Summary route
$f3->route('GET|POST /summary', function(){
    //Store form data in session
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();