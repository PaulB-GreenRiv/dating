<?php

class Validation
{
    static function validName($name)
    {
        return ctype_alpha($name);
    }

    static function validAge($age)
    {
        return ($age >= 18 and $age <= 118);
    }

    static function validPhone($phone)
    {
        return (strlen($phone) == 12);
    }

    static function validEmail($email)
    {
        return (strpos($email, ".") and strpos($email, "@"));
    }

    static function validOutdoor($outdoor)
    {
        $validOutdoor = $GLOBALS['dataLayer']->getOutInterests();

        foreach ($outdoor as $userChoice)
        {
            if (!in_array($userChoice, $validOutdoor))
            {
                return false;
            }
        }
        return true;
    }

    static function validIndoor($indoor)
    {
        $validIndoor = $GLOBALS['dataLayer']->getInInterests();

        foreach ($indoor as $userChoice)
        {
            if (!in_array($userChoice, $validIndoor))
            {
                return false;
            }
        }
        return true;
    }
}

