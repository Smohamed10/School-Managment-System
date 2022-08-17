<?php
include_once 'User.php';
include_once 'Student.php';
include_once 'Ido.php';
include_once'messages.php';
class parents extends user implements Ido
{
    public $Message;

    function __construct($Message)
    {
        $this->$Message=$Message;
        
    }

	public function add($thing) //parent add student
    {
        $NewUser=new student;
        $NewUser=$thing;
        $NewUser->register('Student');

    }
    public function edit($thing) //parent edit student info
    {
        $NewUser=new student;
        $NewUser=$thing;
        $NewUser->stdupdate($NewUser);

    }
}
?>