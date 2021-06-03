<?php

class Controller
{
    private $_f3; //router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalInfo()
    {

        //Reinitialize session array
        $_SESSION = array();

        //Initial variables
        $userfName = "";
        $userlName = "";
        $userAge = "";
        $userGend = "";
        $userPnum = "";

        //Store form data in session
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$_SESSION['x'] = $_POST['y'];

            //Saving elements to post
            $userfName = $_POST['fName'];
            $userlName = $_POST['lName'];
            $userAge = $_POST['age'];
            $userGend = $_POST['gender'];
            $userPnum = $_POST['pNum'];
            $isPremium = $_POST['isPrem'];

            // Validate First Name
            if (!Validation::validName($userfName)) {
                $this->_f3->set('errors["fName"]', 'Please enter a valid name 
            (no numbers / special characters)');
            }

            // Validate Last Name
            if (!Validation::validName($userlName)) {
                $this->_f3->set('errors["lName"]', 'Please enter a valid name 
            (no numbers / special characters)');
            }

            // Validate Age
            if (!Validation::validAge($userAge)) {
                $this->_f3->set('errors["age"]', 'Please enter a valid age 
            (18 - 118)');
            }

            // Validate Phone Number
            if (!Validation::validPhone($userPnum)) {
                $this->_f3->set('errors["pNum"]', 'Please enter a valid phone number 
            (###-###-####)');
            }

            // Continue if there are no errors
            if (empty($this->_f3->get('errors'))) {

                if ($isPremium != null)
                {
                    $_SESSION['newUser'] = new PremMember($userfName, $userlName, $userAge, $userGend, $userPnum);
                }
                else
                {
                    $_SESSION['newUser'] = new Member($userfName, $userlName, $userAge, $userGend, $userPnum);
                }

                header('location: profile');
            }
        }

        //Sets variables if fat-free
        $this->_f3->set('userfName', $userfName);
        $this->_f3->set('userlName', $userlName);
        $this->_f3->set('userAge', $userAge);
        $this->_f3->set('genders', $GLOBALS['dataLayer']->getGenderDetails());
        $this->_f3->set('userGend', $userGend);
        $this->_f3->set('userpNum', $userPnum);

        //Display page
        $view = new Template();
        echo $view->render('views/personalInfo.html');

    }

    function profile()
    {

        //Initial variables
        $userHill = "";
        $userEmail = "";
        $userlGender = "";
        $userBio = "";

        //Store form data in session
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //$_SESSION['x'] = $_POST['y'];

            //Saving elements to post
            $userHill = $_POST['hill'];
            $userEmail = $_POST['email'];
            $userlGender = $_POST['gender'];
            $userBio = $_POST['bio'];

            // Validate Email
            if (!Validation::validEmail($userEmail)) {
                $this->_f3->set('errors["email"]', 'Please enter a valid email 
            (With a . and a @)');
            }

            // Continue if there are no errors
            if (empty($this->_f3->get('errors'))) {

                $_SESSION['newUser']->setEmail($userEmail);
                $_SESSION['newUser']->setHill($userHill);
                $_SESSION['newUser']->setSeeking($userlGender);
                $_SESSION['newUser']->setBio($userBio);

                if ($_SESSION['newUser'] instanceof PremMember)
                {
                    header('location: interests');
                }
                else
                {
                    header('location: summary');
                }
            }
        }

        //Sets variables in fat-free
        $this->_f3->set('userHill', $userHill);
        $this->_f3->set('userEmail', $userEmail);
        $this->_f3->set('genders', $GLOBALS['dataLayer']->getGenderDetails());
        $this->_f3->set('userlGender', $userlGender);
        $this->_f3->set('userBio', $userBio);

        //Display page
        $view = new Template();
        echo $view->render('views/profile.html');

    }

    function interests()
    {

        //Initial variables
        $userIndoor = array();
        $userOutdoor = array();

        //Store form data in session
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //$_SESSION['x'] = $_POST['y'];

            //Verifies both checklists
            if (!empty($_POST['indoor']))
            {
                $userIndoor = $_POST['indoor'];
                //Validate Interests
                if (Validation::validIndoor($userIndoor)) {
                    $_SESSION['newUser']->setInDoorInterests($userIndoor);// = implode(", ", $userIndoor);
                }
                else {
                    $this->_f3->set('errors["indoor"]', 'Please select one of these');
                }
            }
            if (!empty($_POST['outdoor']))
            {
                $userOutdoor = $_POST['outdoor'];
                if (Validation::validOutdoor($userOutdoor)) {
                    $_SESSION['newUser']->setOutDoorInterests($userOutdoor);
                }
                else {
                    $this->_f3->set('errors["outdoor"]', 'Please select one of these');
                }
            }

            // Continue if there are no errors
            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //Sets variables in fat-free
        $this->_f3->set("iInterests", $GLOBALS['dataLayer']->getInInterests());
        $this->_f3->set("userIndoor", $userIndoor);
        $this->_f3->set("oInterests", $GLOBALS['dataLayer']->getOutInterests());
        $this->_f3->set("userOutdoor", $userOutdoor);

        //Display page
        $view = new Template();
        echo $view->render('views/interests.html');

    }

    function summary()
    {
        //Store form data in session
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}