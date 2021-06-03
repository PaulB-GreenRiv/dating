<?php

class PremMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($fname = "", $lname = "", $age = 0, $gender = "", $phone = "",
                         $email = "", $state = "", $seeking = "", $bio = "", $iInterests = array(), $oInterests = array())
    {
        parent::__construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio);
        $this->_inDoorInterests = $iInterests;
        $this->_outDoorInterests = $oInterests;
    }

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}