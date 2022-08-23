<?php
include_once 'messages.php';
include_once 'Manager.php';

$msg=new messages;
$NewUser=new manager;
$msg->Parentid=$_POST['Parentid'];
$msg->TeacherId=$_POST['Teacherid'];
$msg->MessageId='';
$msg->MessageDesc='';

$NewUser->Address='';
 $NewUser->birthday='';
 $NewUser->email='';
 $NewUser->setpassword('');
 $NewUser->firstname='';
 $NewUser->lastname='';
 $NewUser->veiw($msg);





?>