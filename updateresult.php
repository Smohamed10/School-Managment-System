<?php
include_once 'result.php';
include_once 'Teacher.php';
$newresult=new result;
$NewUser= new teacher;
$newresult->studentid= $_POST['StudentId'];
$newresult->courseid= $_POST['CourseId'];
$newresult->grade= $_POST['Grade'];
$newresult->comment=  $_POST['Comment'];
$newresult->teacherid='';


 $NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
$NewUser->edit($newresult);
?>
