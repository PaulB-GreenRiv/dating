<?php

class PremMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * PremMember constructor.
     * @param string $fname User First Name
     * @param string $lname User Last Name
     * @param int $age User Age
     * @param string $gender User Gender
     * @param string $phone User Phone Number
     * @param string $email User Email
     * @param string $hill User Hill
     * @param string $seeking Seeking Gender
     * @param string $bio User Bio
     * @param array $iInterests User Inside Interests
     * @param array $oInterests User Outside Interests
     */
    function __construct($fname = "", $lname = "", $age = 0, $gender = "", $phone = "",
                         $email = "", $hill = 0, $seeking = "", $bio = "", $iInterests = array(), $oInterests = array())
    {
        parent::__construct($fname, $lname, $age, $gender, $phone, $email, $hill, $seeking, $bio);
        $this->_inDoorInterests = $iInterests;
        $this->_outDoorInterests = $oInterests;
    }

    /**
     * Gets Indoor Interests
     * @return mixed Indoor Interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * Sets Indoor Interests
     * @param mixed $inDoorInterests Indoor Interests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * Gets Outdoor Interests
     * @return mixed Outdoor Interests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * Sets Outdoor Interests
     * @param mixed $outDoorInterests Outdoor Interests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}