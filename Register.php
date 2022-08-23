<?php
include_once 'Manager.php';
include_once 'Parents.php';
include_once 'Teacher.php';
include_once 'User.php';
$firstname=$_POST["Firstname"];
$Lastname=$_POST["Lastname"];
$Address=$_POST["Address"];
$Phonenumber=$_POST["Phonenumber"];
$Email=$_POST["Email"];
$Password=Encrypt($_REQUEST["Password"],2);
$Role=$_POST["Role"];
$Birthday=$_POST["Birthyear"].'-'.$_POST["Birthmonth"].'-'.$_POST["Birthday"];
if($Role=='Parent')
{
 $NewUser=new parents;
 $NewUser->Address=$Address;
 $NewUser->birthday=$Birthday;
 $NewUser->email=$Email;
 $NewUser->setpassword($Password);
 $NewUser->firstname=$firstname;
 $NewUser->lastname=$Lastname;
 $NewUser->phonenumber=$Phonenumber;
}
if($Role=='Teacher')
{
 $NewUser=new teacher;
 $NewUser->Address=$Address;
 $NewUser->birthday=$Birthday;
 $NewUser->email=$Email;
 $NewUser->setpassword($Password);
 $NewUser->firstname=$firstname;
 $NewUser->lastname=$Lastname;
 $NewUser->phonenumber=$Phonenumber;
}
if($Role=='Manager')
{
 $NewUser=new manager;
 $NewUser->Address=$Address;
 $NewUser->birthday=$Birthday;
 $NewUser->email=$Email;
 $NewUser->setpassword($Password);
 $NewUser->firstname=$firstname;
 $NewUser->lastname=$Lastname;
 $NewUser->phonenumber=$Phonenumber;
}
$NewUser->register($Role);
 
?>