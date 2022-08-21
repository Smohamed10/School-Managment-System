<?php
include_once 'Teacher.php';
include_once 'messages.php';
include_once 'Parents.php';
include_once 'result.php';
$NewUser=new teacher;
$newresult=new result;
$newresult->studentid= $_POST['studentid'];
$newresult->courseid= $_POST['courseid'];
$newresult->grade= $_POST['grade'];
$newresult->comment=  $_POST['comment'];
$newresult->teacherid=  $_POST['teacherid'];
 $NewUser->Address='';
 $NewUser->id='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->add($newresult);







?>