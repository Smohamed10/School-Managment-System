<?php
include_once 'Course.php';
include_once 'Student.php';

$host = "localhost"; $user = "root"; $dbname = "sms_db";
$con = mysqli_connect($host, $user,"",$dbname);
$query1="SELECT* FROM course";
$select=(mysqli_query($con, $query1));
$n=mysqli_num_rows($select);
$NewCourse=new course;
$student=new student;
$row=mysqli_fetch_array($select);
$student->id=$_POST['studentid'];
$ct=0;
if (isset($_POST['submit'])) {
   
    while ($row=mysqli_fetch_array($select)) 
    {
        if($ct==5)
        {
            break;
        }
    foreach ($_POST['check'] as $key => $value) 
    {  
            if ($row['C_Id']==$_POST['check'][$key])
            {
                $NewCourse->Courseid=$row['C_Id'];
                $NewCourse->coursecode=$row['C_Code'];
                $NewCourse->coursename=$row['C_Name'];
                $NewCourse->description=$row['C_Describtion'];
                $NewCourse->grade=$row['C_Grade'];
                $student->enrollincourse($NewCourse,$student);
                
            }
        }
        $ct++;
        
    }
}        
    


           

?>