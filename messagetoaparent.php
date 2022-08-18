<?php
include_once 'Teacher.php';
include_once 'messages.php';
include_once 'Parents.php';
$NewUser=new teacher;
$message=new messages;;
 $message->MessageId=NULL;
 $message->Parentid=$_POST['ParentId'];
 $message->TeacherId=$_POST['TeacherId'];
 $message->MessageDesc=$_POST['Message'];
 $NewUser->Address='';
 $NewUser->id='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->sendMessage($message);







?>