<?php
include_once "User.php";
include_once "Functions.php";
class student extends user
{
    public $parentid;
    public $stdpic;

    public function enrollincourse($course,$student)
    {
        enroll($course,$student);
    }
    public function veiwgrades($student)
    {
        veiwgrade($student);
    }

}
?>