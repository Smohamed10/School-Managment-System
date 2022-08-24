<?php
include_once 'Teacher.php';
include_once 'Course.php';
include_once 'Manager.php';

$teacher=new teacher;
$NewCourse=new course;
$manager=new manager;
$teacher->id=$_POST['Teacherid'];
$NewCourse->Courseid=$_POST['Courseid'];
$manager->assign($teacher,$NewCourse);
?>