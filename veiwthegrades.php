<?php
include_once 'Student.php';
$NewUser=new student;
$NewUser->id=$_POST["studentid"];
$NewUser->veiwgrades($NewUser);
?>
  
