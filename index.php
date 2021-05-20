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
require_once ('model/data-layer.php');
require_once ('model/validation.php');

//Start a session
session_start();

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

    //Reinitialize session array
    $_SESSION = array();

    $userfName = "";
    $userlName = "";
    $userAge = "";
    $userGend = "";
    $userPnum = "";

    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //$_SESSION['x'] = $_POST['y'];

        $userfName = $_POST['fName'];
        $userlName = $_POST['lName'];
        $userAge = $_POST['age'];
        $userGend = $_POST['gender'];
        $userPnum = $_POST['pNum'];

        // Validate First Name
        if (validName($userfName)) {
            $_SESSION['fName'] = $userfName;
        }
        else {
            $f3->set('errors["fName"]', 'Please enter a valid name 
            (no numbers / special characters)');
        }

        // Validate Last Name
        if (validName($userlName)) {
            $_SESSION['lName'] = $userlName;
        }
        else {
            $f3->set('errors["lName"]', 'Please enter a valid name 
            (no numbers / special characters)');
        }

        // Validate Age
        if (validAge($userAge)) {
            $_SESSION['age'] = $userAge;
        }
        else {
            $f3->set('errors["age"]', 'Please enter a valid age 
            (18 - 118)');
        }

        // Validate Phone Number
        if (validPhone($userPnum)) {
            $_SESSION['pNum'] = $userPnum;
        }
        else {
            $f3->set('errors["pNum"]', 'Please enter a valid phone number 
            (###-###-####)');
        }

        $_SESSION['gender'] = $userGend;

        // Continue if there are no errors
        if (empty($f3->get('errors'))) {
            header('location: profile');
        }
    }

    $f3->set('userfName', $userfName);
    $f3->set('userlName', $userlName);
    $f3->set('userAge', $userAge);
    $f3->set('genders', getGenderDetails());
    $f3->set('userGend', $userGend);
    $f3->set('userpNum', $userPnum);

    //Display page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

//Profile route
$f3->route('GET|POST /profile', function($f3){

    $userHill = "";
    $userEmail = "";
    $userlGender = "";
    $userBio = "";

    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$_SESSION['x'] = $_POST['y'];

        $userHill = $_POST['hill'];
        $userEmail = $_POST['email'];
        $userlGender = $_POST['gender'];
        $userBio = $_POST['bio'];

        // Validate Email
        if (validEmail($userEmail)) {
            $_SESSION['email'] = $userEmail;
        }
        else {
            $f3->set('errors["email"]', 'Please enter a valid email 
            (With a . and a @)');
        }

        $_SESSION['hill'] = $userHill;
        $_SESSION['lgender'] = $userlGender;
        $_SESSION['bio'] = $userBio;

        // Continue if there are no errors
        if (empty($f3->get('errors'))) {
            header('location: interests');
        }
    }

    $f3->set('userHill', $userHill);
    $f3->set('userEmail', $userEmail);
    $f3->set('genders', getGenderDetails());
    $f3->set('userlGender', $userlGender);
    $f3->set('userBio', $userBio);

    //Display page
    $view = new Template();
    echo $view->render('views/profile.html');
});

//Interests route
$f3->route('GET|POST /interests', function($f3){

    $userIndoor = array();
    $userOutdoor = array();

    //Store form data in session
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$_SESSION['x'] = $_POST['y'];

        if (!empty($_POST['indoor']))
        {
            $userIndoor = $_POST['indoor'];
            //Validate Interests
            if (validIndoor($userIndoor)) {
                $_SESSION['indoor'] = implode(", ", $userIndoor);
            }
            else {
                $f3->set('errors["indoor"]', 'Please select one of these');
            }
        }
        if (!empty($_POST['outdoor']))
        {
            $userOutdoor = $_POST['outdoor'];
            if (validOutdoor($userOutdoor)) {
                $_SESSION['outdoor'] = implode(", ", $userOutdoor);
            }
            else {
                $f3->set('errors["outdoor"]', 'Please select one of these');
            }
        }

        // Continue if there are no errors
        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }

    $f3->set("iInterests", getInInterests());
    $f3->set("userIndoor", $userIndoor);
    $f3->set("oInterests", getOutInterests());
    $f3->set("userOutdoor", $userOutdoor);

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