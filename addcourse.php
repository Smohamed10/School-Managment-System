<?php
include_once 'Course.php';
include_once 'Manager.php';
$NewCourse=new course;
$NewUser= new manager;
$NewCourse->coursecode=$_POST["Coursecode"];
$NewCourse->coursename=$_POST["CourseName"];
$NewCourse->description=$_POST["Description"];
$NewCourse->grade=$_POST["Grade"];


 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
$NewUser->add($NewCourse);
?>
