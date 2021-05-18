<?php

function validName($name)
{
    return ctype_alpha($name);
}

function validAge($age)
{
    return (is_int($age) and ($age >= 18 and $age <= 118));
}

function validPhone($phone)
{
    return (strlen($phone) == 12);
}

function validEmail($email)
{
    return (strpos($email, ".") and strpos($email, "@"));
}

function validOutdoor($outdoor)
{
    $validOutdoor = getOutInterests();

    foreach ($outdoor as $userChoice)
    {
        if (!in_array($userChoice, $validOutdoor))
        {
            return false;
        }
    }
    return true;
}

function validIndoor($indoor)
{
    $validIndoor = getInInterests();

    foreach ($indoor as $userChoice)
    {
        if (!in_array($userChoice, $validIndoor))
        {
            return false;
        }
    }
    return true;
}