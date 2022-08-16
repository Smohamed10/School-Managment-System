<?php

include_once "Functions.php";
class student 
{
    public $parentid;
    public $stdid;
    public $stdemail;
    public $stdfirstname;
    public $stdlastname;
    public $stdaddress; 
    public $stdphonenumber;
    public $stdbirthday;
    public $stdpic;
    private $stdpassword;

    public function setstdpassword($password)
    {
        $this->password=$password;
    }
    public function getstdpassword()
    {
         return $this->password;
    }

    public function stdlogin($user,$role)
    {
        stdverifylogin($user,$role);
        $currentuser= stdverifylogin($user,$role);
     

    }
    public function stdregistration($user)
    {
        addstudent($user);
       
    }
}
?>