<?php
include_once 'Course.php';
include_once 'Manager.php';
$NewCourse=new course;
$NewUser= new manager;
$NewCourse->Courseid=$_POST["Courseid"];
$NewCourse->coursecode='';
$NewCourse->coursename='';
$NewCourse->description='';
$NewCourse->grade='';


 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
$NewUser->delete($NewCourse);
?>
