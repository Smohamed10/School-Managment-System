<?php
include_once 'User.php';
include_once 'Student.php';
include_once 'Ido.php';
class parents extends user implements Ido
{

	public function add($thing) //parent add student
    {
        $NewUser=new student;
        $NewUser=$thing;
        $NewUser->stdregistration($NewUser);

    }
}
?>