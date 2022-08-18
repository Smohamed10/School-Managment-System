<?php
include_once 'Student.php';
include_once 'Parents.php';
$NewUser=new student;
$NewUser->parentid=$_POST["ParentId"];
$NewUser->id=$_POST["Studentid"];
$NewUser->firstname=$_POST["Firstname"];
$NewUser->lastname=$_POST["Lastname"];
$NewUser->address=$_POST["Address"];
$NewUser->phonenumber=$_POST["Phonenumber"];
$NewUser->email=$_POST["Email"];
$Password=Encrypt($_REQUEST["Password"],2);
$NewUser->setpassword($Password);
$NewUser->birthday=$_POST["Birthyear"].'-'.$_POST["Birthmonth"].'-'.$_POST["Birthday"];
$NewUser->stdpic=addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
$parent=new parents;
$parent->Address='';
$parent->birthday='';
$parent->email='';
$parent->setpassword('');
$parent->firstname='';
$parent->lastname='';
$parent->edit($NewUser);


?>