<?php
include_once 'Teacher.php';
include_once 'messages.php';
include_once 'Parents.php';
$NewUser=new Parents;
$message=new messages;;
 $message->MessageId=NULL;
 $message->Parentid= $_POST['Parentid'];
 $message->TeacherId= $_POST['Teacherid'];
 $message->MessageDesc= $_POST['Message'];
 $NewUser->Address='';
 $NewUser->id='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->send($message);







?>