<?php
include_once 'Manager.php';
include_once 'Parents.php';
include_once 'Teacher.php';
include_once 'Student.php';
include_once 'User.php';
include_once 'Functions.php';
$pass=Encrypt($_REQUEST["Password"],2);
$role=$_POST["Role"];
$email=$_POST["Email"];
if($role=='Parent')
{
 $NewUser=new parents;
 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email=$email;
 $NewUser->setpassword($pass);
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->login($NewUser,$role);
}
if($role=='Teacher')
{
 $NewUser=new teacher;
 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email=$email;
 $NewUser->setpassword($pass);
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->login($NewUser,$role);
}
if($role=='Manager')
{
 $NewUser=new manager;
 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email=$email;
 $NewUser->setpassword($pass);
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->login($NewUser,$role);
}
if($role=='Student')
{
 $NewUser=new student;
 $NewUser->parentid='';
 $NewUser->address='';
 $NewUser->birthday='';
 $NewUser->email=$email;
 $NewUser->setpassword($pass);
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->login($NewUser,$role);
}

?>