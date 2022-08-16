<?php

include_once 'Student.php';
include_once 'Parents.php';
$NewUser=new student;
$NewUser->parentid=$_POST["ParentId"];
$NewUser->stdfirstname=$_POST["Firstname"];
$NewUser->stdlastname=$_POST["Lastname"];
$NewUser->stdaddress=$_POST["Address"];
$NewUser->stdphonenumber=$_POST["Phonenumber"];
$NewUser->stdemail=$_POST["Email"];
$Password=Encrypt($_REQUEST["Password"],2);
$NewUser->setstdpassword($Password);
$NewUser->stdbirthday=$_POST["Birthyear"].'-'.$_POST["Birthmonth"].'-'.$_POST["Birthday"];
$NewUser->stdpic=addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
$parent=new parents;
$parent->Address='';
$parent->birthday='';
$parent->email='';
$parent->setpassword('');
$parent->firstname='';
$parent->lastname='';
$parent->add($NewUser);


?>