<?php
include_once "Functions.php";
 class user
{
    public $id;
    public $email;
    public $firstname;
    public $lastname;
    public $address; 
    public $phonenumber;
    public $birthday;
    private $password;

    public function setpassword($password)
    {
        $this->password=$password;
    }
    public function getpassword()
    {
         return $this->password;
    }

    public function login($user,$role)
    {
        verifylogin($user,$role);
        $currentuser= verifylogin($user,$role);
        echo $currentuser->password;
        echo $currentuser->email;

    }
    
    public function register($Role)
    {
        adduser($this,$Role);

    }

}
?>