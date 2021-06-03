<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_hill;
    private $_seeking;
    private $_bio;

    /**
     * Member constructor.
     * @param string $fname User First Name
     * @param string $lname User Last Name
     * @param int $age User age
     * @param string $gender User gender
     * @param string $phone User phone number
     * @param string $email User email
     * @param int $hill User hill
     * @param string $seeking Gender to be searched
     * @param string $bio Bio of user
     */
    function __construct($fname = "", $lname = "", $age = 0, $gender = "", $phone = "",
    $email = "", $hill = 0, $seeking = "", $bio = "")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_hill = $hill;
        $this->_seeking = $seeking;
        $this->_bio = $bio;
    }

    /**
     * Gets first name
     * @return mixed|string First name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets First name
     * @param mixed|string $fname First name
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * Gets Last Name
     * @return mixed|string Last Name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets Last Name
     * @param mixed|string $lname Last Name
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * Gets age
     * @return int|mixed age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * Sets age
     * @param int|mixed $age age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * Gets gender
     * @return mixed|string gender
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * Sets gender
     * @param mixed|string $gender gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * Gets Phone Number
     * @return mixed|string Phone Number
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets Phone Number
     * @param mixed|string $phone Phone Number
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * Gets Email
     * @return mixed|string Email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Sets Email
     * @param mixed|string $email Email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Gets Hill
     * @return mixed|string Hill
     */
    public function getHill()
    {
        return $this->_hill;
    }

    /**
     * Sets Hill
     * @param mixed|int $hill Hill
     */
    public function setHill($hill)
    {
        $this->_hill = $hill;
    }

    /**
     * Gets Seeking Gender
     * @return mixed|string Seeking Gender
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * Sets Seeking Gender
     * @param mixed|string $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * Gets Bio
     * @return mixed|string Bio
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * Sets Bio
     * @param mixed|string $bio Bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

}