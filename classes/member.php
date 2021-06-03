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
     * @return mixed|string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed|string $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed|string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed|string $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return int|mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param int|mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed|string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed|string $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed|string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed|string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed|string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed|string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getHill()
    {
        return $this->_hill;
    }

    /**
     * @param mixed|int $hill
     */
    public function setHill($hill)
    {
        $this->_hill = $hill;
    }

    /**
     * @return mixed|string
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param mixed|string $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return mixed|string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed|string $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }

}