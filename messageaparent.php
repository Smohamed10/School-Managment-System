<?php
include_once "Teacher.php";
include_once "messages.php";
include_once "Parents.php";
$parentid=$_POST=["Parentid"];
$teacherid=$_POST=["Teacherid"];
$message=$_POST=["Message"];
$NewUser=new teacher;
$message=new messages;
$message->MessageId=NULL;
 $message->Parentid=$parentid;
 $message->TeacherId=$teacherid;
 $message->MessageDesc=$_POST=["Message"];
 $NewUser->Address='';
 $NewUser->id=$teacherid;
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->sendMessage($message);







?>