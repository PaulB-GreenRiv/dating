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

//Require autoload file
require_once ('vendor/autoload.php');
//require_once ('model/data-layer.php');
//require_once ('model/validation.php');

//Start a session
session_start();

//Instantiate Fat-Free
$f3 = Base::instance();
$con = new Controller($f3);

//Define default route
$f3->route('GET /', function(){
    $GLOBALS['con']->home();
});

//Home route
$f3->route('GET /home', function(){
    $GLOBALS['con']->home();
});

//Personal Info route
$f3->route('GET|POST /personalInfo', function($f3){
    $GLOBALS['con']->personalInfo();
});

//Profile route
$f3->route('GET|POST /profile', function($f3){
    $GLOBALS['con']->profile();
});

//Interests route
$f3->route('GET|POST /interests', function($f3){
    $GLOBALS['con']->interests();
});

//Summary route
$f3->route('GET|POST /summary', function(){
    $GLOBALS['con']->summary();
});

//Run Fat-Free
$f3->run();