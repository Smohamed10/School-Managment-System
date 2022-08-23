<?php
include_once 'result.php';
include_once 'Manager.php';

$host = "localhost"; $user = "root"; $dbname = "sms_db";
$con = mysqli_connect($host, $user,"",$dbname);
$query1="SELECT* FROM pending_result";
$select=(mysqli_query($con, $query1));
$n=mysqli_num_rows($select);
$result=new result;
$manager=new manager;

if (isset($_POST['submit'])) {
   
      while ($row=mysqli_fetch_array($select)) 
        {
    foreach ($_POST['check'] as $key => $value) 
    { 
       
        
            if ($row['R_Id']==$_POST['check'][$key])
            {
                $result->comment=$row['Comment'];
                $result->courseid=$row['C_Id'];
                $result->teacherid=$row['T_Id'];
                $result->studentid=$row['S_Id'];
                $result->grade=$row['Mark'];
                $manager->approve($result);
            }
        }
    }
}        
    


           

?>