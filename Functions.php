<?php
function Encrypt($Word,$Key)
{
	$Result="";
	for ($i=0;$i<strlen($Word);$i++)
	{
		$c=chr(ord($Word[$i])+$Key+$i);
		$Result.=$c;
	}
	return $Result;
}
function Decrypt($Word,$Key)
{
	$Result="";
	for ($i=0;$i<strlen($Word);$i++)
	{
		$c=chr(ord($Word[$i])-$Key-$i);
		$Result.=$c;
	}
	return $Result;
}

 function verifylogin($NewUser,$Role)
{
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $email=$NewUser->email;
    $pass=$NewUser->getpassword();

if ($Role=='Teacher') 
{
    $query1 = "SELECT* FROM teacher WHERE T_Email='$email' AND T_Password='$pass'";
   
    $select=(mysqli_query($con, $query1));
    $row = mysqli_fetch_array($select, MYSQLI_BOTH);
    if(mysqli_num_rows($select))
        {
            $NewUser->Address=$row["T_Address"];
            $NewUser->birthday=$row["T_DOB"];
            $NewUser->firstname=$row["T_FirstName"];
            $NewUser->lastname=$row["T_LastName"];
             echo "<script>
	        alert('Welcome (: ');
	        window.location.href='teacherveiw.html';
	        </script>";
            return $NewUser;
        }
        else
        {
            echo "<script>
	        alert('Incorrect Email , Password Or Role please try again  ): ');
	        window.location.href='login.html';
	        </script>";
        }
    
}
   
     /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    if ($Role=='Parent') 
    {
        $query1 = "SELECT* FROM parent WHERE P_Email='$email' AND P_Password='$pass'";
       
        $select=(mysqli_query($con, $query1));
        $row = mysqli_fetch_array($select, MYSQLI_BOTH);
        if(mysqli_num_rows($select))
            {
                $NewUser->Address=$row["P_Address"];
                $NewUser->birthday=$row["P_DOB"];
                $NewUser->firstname=$row["P_FirstName"];
                $NewUser->lastname=$row["P_LastName"];
                 echo "<script>
                alert('Welcome (: ');
                window.location.href='parentveiw.html';
                </script>";
                return $NewUser;
            }
            else
            {
                echo "<script>
                alert('Incorrect Email , Password Or Role please try again  ): ');
                window.location.href='login.html';
                </script>";
            }
        
    }
   
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    if ($Role=='Manager') 
    {
        $query1 = "SELECT* FROM manager WHERE M_Email='$email' AND M_Password='$pass'";
       
        $select=(mysqli_query($con, $query1));
        $row = mysqli_fetch_array($select, MYSQLI_BOTH);
        if(mysqli_num_rows($select))
            {
                $NewUser->Address=$row["M_Address"];
                $NewUser->birthday=$row["M_DOB"];
                $NewUser->firstname=$row["M_FirstName"];
                $NewUser->lastname=$row["M_LastName"];
                 echo "<script>
                alert('Welcome (: ');
                window.location.href='managerveiw.html';
                </script>";
                return $NewUser;
            }
            else
            {
                echo "<script>
                alert('Incorrect Email , Password Or Role please try again  ): ');
                window.location.href='login.html';
                </script>";
            }
        
    }
    if ($Role=='Student')
    {

    $query1 = "SELECT* FROM student WHERE S_Email='$email' AND S_Password='$pass'";
   
    $select=(mysqli_query($con, $query1));
    $row = mysqli_fetch_array($select, MYSQLI_BOTH);
    if(mysqli_num_rows($select))
        {
            $NewUser->address=$row["S_Address"];
            $NewUser->birthday=$row["S_DOB"];
            $NewUser->firstname=$row["S_FirstName"];
            $NewUser->lastname=$row["S_LastName"];
             echo "<script>
	        alert('Welcome (: ');
	        window.location.href='studentveiw.html';
	        </script>";
            return $NewUser;
        }
        else
        {
            echo "<script>
	        alert('Incorrect Email, Role Or Password  ): ');
	        window.location.href='login.html';
	        </script>";
        }
    
    }
    return $NewUser->id;
}

 function adduser($NewUser,$Role)
{
    
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $email=$NewUser->email;

    if ($Role=='Teacher')
    {
        $query1 = "SELECT* FROM teacher WHERE T_Email='$email'";
        $select=(mysqli_query($con, $query1));
        
        if(mysqli_num_rows($select)) 
        {
            echo "<script>
	        alert('This Email Has Already Been Registered ) :  !');
	        window.location.href='RegistrationForm.html';
	        </script>";
        }

        else
        {
            $pass=$NewUser->getpassword();
            $query = "INSERT INTO teacher  VALUES (NULL,'$NewUser->firstname','$NewUser->lastname','$NewUser->Address','$NewUser->email','$pass','$NewUser->birthday',NULL)";
            if(mysqli_query($con, $query))
            {
                $query2 = "SELECT T_Id  FROM teacher WHERE T_FirstName='$NewUser->firstname' AND T_LastName='$NewUser->lastname' AND T_Email='$NewUser->email'";
                $select=mysqli_query($con, $query2);
                $row = mysqli_fetch_array($select, MYSQLI_BOTH);
                $ID=$row['T_Id'];
                $query2 = "INSERT INTO teacher_phonenumber VALUES ('$NewUser->phonenumber','$ID')";
                mysqli_query($con, $query2);

                echo "<script>
                alert('User Has been Registered ( : ');
                window.location.href='login.html';
                </script>";
            }

    
        } 
    }
   
     /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

if ($Role=='Parent')
{   
        $query1 = "SELECT P_Id FROM parent WHERE P_Email='$email'";
        $select=(mysqli_query($con, $query1));
        
        if(mysqli_num_rows($select))
        {
             echo "<script>
	        alert('This Email Has Already Been Registered ) : !');
	        window.location.href='RegistrationForm.html';
	        </script>";
        }

        else
        {
            $pass=$NewUser->getpassword();
            $query = "INSERT INTO parent VALUES (NULL,'$NewUser->firstname','$NewUser->lastname','$NewUser->Address','$NewUser->email','$pass','$NewUser->birthday')";
            if(mysqli_query($con, $query))
            {
                $query2 = "SELECT P_Id FROM parent WHERE P_FirstName='$NewUser->firstname' AND P_LastName='$NewUser->lastname' AND P_Email='$NewUser->email'";
                $select=mysqli_query($con, $query2);
                $row = mysqli_fetch_array($select, MYSQLI_BOTH);
                $ID=$row['P_Id'];
                $query2 = "INSERT INTO parent_phonenumber  VALUES ('$NewUser->phonenumber','$ID')";
                mysqli_query($con, $query2);
                
                echo "<script>
                alert('User Has been Registered ( : ');
                window.location.href='login.html';
                </script>";
            }

    
        } 
    }
   
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    if ($Role=='Manager')
    {
        $query1 = "SELECT M_Id FROM manager WHERE M_Email='$email'";
        $select=(mysqli_query($con, $query1));
        
        if(mysqli_num_rows($select)) 
        {
            echo "<script>
	        alert('This Email Has Already Been Registered ) : !');
	        window.location.href='RegistrationForm.html';
	        </script>";
        }

        else
        {
            $pass=$NewUser->getpassword();
            $query = "INSERT INTO manager VALUES (NULL,'$NewUser->firstname','$NewUser->lastname','$NewUser->Address','$NewUser->email','$pass','$NewUser->birthday')";
            if(mysqli_query($con, $query))
            {
                $query2 = "SELECT M_Id FROM manager WHERE M_FirstName='$NewUser->firstname' AND M_LastName='$NewUser->lastname' AND M_Email='$NewUser->email'";
                $select=mysqli_query($con, $query2);
                $row = mysqli_fetch_array($select, MYSQLI_BOTH);
                $ID=$row['M_Id'];
                $query = "INSERT INTO manager_phonenumber  VALUES ('$NewUser->phonenumber','$ID')";
                mysqli_query($con, $query);
                
                echo "<script>
                alert('User Has been Registered ( : ');
                window.location.href='login.html';
                </script>";
            }

    
        } 
    }
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    if ($Role=='Student')
    {
        $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $email=$NewUser->email;
    $query1 = "SELECT* FROM student WHERE S_Email='$email'";
    $select=(mysqli_query($con, $query1));
    

    if (mysqli_num_rows($select))
     { 
        echo "<script>
	        alert('This Email Has Already Been Registered ) :  !');
	        window.location.href='RegistrationForm.html';
	        </script>";
    }
     else
     {
        $pass=$NewUser->getpassword();
        
        $query = "INSERT INTO student VALUES (NULL,'$NewUser->parentid','$NewUser->firstname','$NewUser->lastname','$NewUser->address','$NewUser->email','$pass','$NewUser->birthday','$NewUser->stdpic')";
        if (mysqli_query($con, $query)) {
            
            $query2 = "SELECT S_Id FROM student WHERE S_FirstName='$NewUser->firstname' AND S_LastName='$NewUser->lastname' AND S_Email='$NewUser->email'";
                $select=mysqli_query($con, $query2);
                $row = mysqli_fetch_array($select, MYSQLI_BOTH);
                $ID=$row['S_Id'];
            $query = "INSERT INTO student_phonenumber  VALUES ('$NewUser->phonenumber',' $ID')";
                mysqli_query($con, $query);
                
                echo "<script>
                alert('User Has been Registered ( : ');
                window.location.href='login.html';
                </script>";
        }
    }
    }
}

function addcourse($course)
{
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $code=$course->coursecode;
    $name=$course->coursename;
    $desc=$course->description;
    $grade=$course->grade;
    $query1 = "SELECT* FROM course WHERE C_Code='$code'";
    $select=(mysqli_query($con, $query1));
    

    if (mysqli_num_rows($select))
     { 
        echo "<script>
	        alert('This Course Has Already Been Registered ) :  !');
	        window.location.href='courseaddform.html';
	        </script>";
    }
     else
     {
        
        $query = "INSERT INTO course VALUES (NULL,'$code','$name','$grade','$desc')";
        if (mysqli_query($con, $query)) {
            
            echo "<script>
                alert('Course Has been Registered ( : ');
                window.location.href='managerveiw.html';
                </script>";
        }
    }
}

 function editcourse($course)
{
   
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $id=$course->Courseid;
    $code=$course->coursecode;
    $name=$course->coursename;
    $desc=$course->description;
    $grade=$course->grade;
   
    $query1 = "SELECT* FROM course WHERE C_Id='$id'";
    $select=(mysqli_query($con, $query1));
    

    if (mysqli_num_rows($select))
     { 
        $query = "UPDATE course set C_Code='$code' , C_Name='$name' , C_Describtion='$desc' , C_Grade='$grade' WHERE C_Id='$id' ";
        if (mysqli_query($con, $query)) 
            {  
                
                echo "<script>
	        alert('This Course Information Has Successfully Updated ( :  !');
	        window.location.href='managerveiw.html.html';
	        </script>";

            }
       
    }
     else
     {
            echo "<script>
                alert('Course Not Registered ) : ');
                window.location.href='courseupdateform.html';
                </script>";
    }
}
 function deletecourse($course)
 {
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $id=$course->Courseid;
    $query1 = "SELECT* FROM course WHERE C_Id='$id'";
    $select=(mysqli_query($con, $query1));
    if (mysqli_num_rows($select))
    {
        $query = "DELETE FROM course WHERE C_Id='$id'";
        if (mysqli_query($con, $query)) 
            {  
                
                echo "<script>
	        alert('This Course Information Has Successfully Deleted ( :  !');
	        window.location.href='coursedeleteform.html';
	        </script>";

            }
       
    }
     else
     {
            echo "<script>
                alert('Course Not Registered ) : ');
                window.location.href='managerveiw.html';
                </script>";
    }
    }

    function stdupdate($student)
    {
        $host = "localhost"; $user = "root"; $dbname = "sms_db";
        $con = mysqli_connect($host, $user,"",$dbname);
        $id=$student->id;
        $query1 = "SELECT* FROM student WHERE S_Id='$id'";
        $select=(mysqli_query($con, $query1));
        if (mysqli_num_rows($select))
        {
           $pass= $student->getpassword();
            $query =  $query = "UPDATE student set S_FirstName='$student->firstname' , S_LastName='$student->lastname' , S_Address='$student->address' , S_Email='$student->email' , S_Password='$pass', S_DOB='$student->birthday', S_Image='$student->stdpic' WHERE S_Id='$id' ";
            if (mysqli_query($con, $query)) 
                {  
                    
                    echo "<script>
                alert('The Student Information Has Successfully Updated ( :  !');
                window.location.href='parentveiw.html';
                </script>";
    
                }
           
        }
         else
         {
                echo "<script>
                    alert('Student Not Registered ) : ');
                    window.location.href='childupdateform.html';
                    </script>";
        }

    }

function enroll($course, $student)
{
    $host = "localhost";
    $user = "root";
    $dbname = "sms_db";
    $con = mysqli_connect($host, $user, "", $dbname);
    $query1 = "SELECT* FROM enrollment WHERE S_Id='$student->id' AND C_Id='$course->Courseid'";
    $select=(mysqli_query($con, $query1));    
    if (mysqli_num_rows($select)) 
    {
        

            echo "<script>
            alert('The Student Is Already Registred To One Of THis Courses  ) :  !');
            window.location.href='studentveiw.html';
            </script>";
    }
    else
    {
        
            
            $query = "INSERT INTO enrollment  VALUES (NULL,'$student->id' , '$course->Courseid' , '$course->coursecode' , '$course->coursename')";
            if (mysqli_query($con, $query)) 
            {  
                
                echo "<script>
            alert('The Student Succesfully Enrolled In This Courses ( :  !');
            window.location.href='studentveiw.html';
            </script>";

            }

    }

}
    



    function messageaparent($msg)
    {
        $host = "localhost"; $user = "root"; $dbname = "sms_db";
        $con = mysqli_connect($host, $user,"",$dbname);
        $message=$msg->MessageDesc;
        $parentid=$msg->Parentid;
        $teacherid=$msg->TeacherId;
        $query1 = "SELECT* FROM messages ";
        $select=(mysqli_query($con, $query1));
        
        if (mysqli_num_rows($select))
        {
           
            $query = "INSERT into messages VALUES (NULL , '$parentid' , '$teacherid' , '$message' )";
                if (mysqli_query($con, $query)) 
                {  
                    
                    echo "<script>
                alert('The message Succesfully sent ( :  !');
                window.location.href='teacherveiw.html';
                </script>";
    
                }
           
        }
        }

        function messageateacher($msg)
        {
            $host = "localhost"; $user = "root"; $dbname = "sms_db";
            $con = mysqli_connect($host, $user,"",$dbname);
            $message=$msg->MessageDesc;
            $parentid=$msg->Parentid;
            $teacherid=$msg->TeacherId;
            $query1 = "SELECT* FROM messages ";
            $select=(mysqli_query($con, $query1));
            
            if (mysqli_num_rows($select))
            {
               
                $query = "INSERT into messages VALUES (NULL , '$parentid' , '$teacherid' , '$message' )";
                    if (mysqli_query($con, $query)) 
                    {  
                        
                        echo "<script>
                    alert('The message Succesfully sent ( :  !');
                    window.location.href='parentveiw.html';
                    </script>";
        
                    }
               
            }
        }

        function pendinggrade($grade)
        {
            $host = "localhost"; $user = "root"; $dbname = "sms_db";
            $con = mysqli_connect($host, $user,"",$dbname);
            $studentid=$grade->studentid;
            $teacherid=$grade->teacherid;
            $result=$grade->grade;
            $comment=$grade->comment;
            $courseid=$grade->courseid;
        
             $query = "INSERT INTO pending_result  VALUES (NULL,'$result' , '$comment' , '$studentid' , '$teacherid' , '$courseid')";
             if (mysqli_query($con, $query))
    
                  {


                    echo "<script>
                    alert('The result has been added Succesfully  ( :  !');
                    window.location.href='teacherveiw.html';
                    </script>";
                  } 
                  
               else

                   { 
                        echo "<script>
                        alert('Result Not Added Check the inputs !  ( :  !');
                        window.location.href='teacherveiw.html';
                        </script>";
                   }
                                
    }
    function assignforteacher($teacher,$course)
    {
        $host = "localhost"; $user = "root"; $dbname = "sms_db";
            $con = mysqli_connect($host, $user,"",$dbname);
            $teacherid=$teacher->id;
            $courseid=$course->Courseid;

            $query = "UPDATE teacher set C_Id='$courseid' WHERE T_Id='$teacherid'";
            if (mysqli_query($con, $query)) {
                echo "<script>
                alert('The Course has been Assigned Succesfully  ( :  !');
                window.location.href='managerveiw.html';
                </script>";
            }
         else
            {
             echo "<script>
                   alert('Teacher Not Found  ( :  !');
                 window.location.href='managerveiw.html';
                 </script>";
            }

    }
function updateresult($grade)
{
    $host = "localhost";
    $user = "root";
    $dbname = "sms_db";
    $con = mysqli_connect($host, $user, "", $dbname);
    $studentid=$grade->studentid;
    $result=$grade->grade;
    $comment=$grade->comment;
    $courseid=$grade->courseid;
    $query1 = "SELECT* FROM pending_result WHERE S_Id='$studentid' AND C_Id='$courseid'";
    $select=(mysqli_query($con, $query1));
    if (mysqli_num_rows($select)) {
        $query = "UPDATE pending_result set Mark='$result' , Comment='$comment' WHERE S_Id='$studentid' AND C_Id='$courseid'";
        if (mysqli_query($con, $query)) {
            echo "<script>
            alert('The result has been Modified Succesfully and Sent to Pending list  ( :  !');
            window.location.href='teacherveiw.html';
            </script>";
        }
       
    }
     else
        {
         echo "<script>
               alert('This Result Is Not Found  ( :  !');
             window.location.href='teacherveiw.html';
             </script>";
        }
}

    function approvegrade($grade)
        {
            $host = "localhost"; $user = "root"; $dbname = "sms_db";
            $con = mysqli_connect($host, $user,"",$dbname);
            $studentid=$grade->studentid;
            $teacherid=$grade->teacherid;
            $result=$grade->grade;
            $comment=$grade->comment;
            $courseid=$grade->courseid;
        
             $query = "INSERT INTO result  VALUES ('$result' , '$comment' , '$studentid' , '$teacherid' , '$courseid')";
             if (mysqli_query($con, $query))
    
                  {


                    echo "<script>
                    alert('The result has been Approved Succesfully and Removed from Pending list  ( :  !');
                    window.location.href='managerveiw.html';
                    </script>";
                  } 
                  $query = "DELETE FROM pending_result WHERE S_Id='$studentid' AND C_Id='$courseid'";
                  (mysqli_query($con, $query));
               
                                
    }
function veiwmessages($msg)
{
    $host = "localhost";
    $user = "root";
    $dbname = "sms_db";
    $con = mysqli_connect($host, $user, "", $dbname);
    $query1="SELECT* FROM messages WHERE P_Id='$msg->Parentid' AND T_Id='$msg->TeacherId'";
    $select=(mysqli_query($con, $query1));
    if (mysqli_num_rows($select)) {
        echo "<div class='table-wrapper'>
                <table class='fl-table'>
                    <thead>
                    <tr>
                        <th>Parent Id</th>
                        <th>Teacher Id</th>
                        <th>Message</th>
                    </tr>
                    </thead>";
        while ($row=mysqli_fetch_array($select)) {
            echo "<div class='table-wrapper'>
                   
                    <tbody>
                    <tr>
                        <td>$row[P_Id]</td>
                        <td>$row[T_Id]</td>
                        <td>$row[Msg_Describtion]</td>
                    </tr>";
        }
    }
}
function veiwgrade($student)
{
    
$host = "localhost"; $user = "root"; $dbname = "sms_db";
$con = mysqli_connect($host, $user,"",$dbname);
$query1="SELECT Mark, Comment, S_Id, C_Id FROM result WHERE S_Id=$student->id";
$select=(mysqli_query($con, $query1));
if (mysqli_num_rows($select))
{
    echo "<div class='table-wrapper'>
    <table class='fl-table'>
        <thead>
        <tr>
            <th> Student Id</th>
            <th>Course Id</th>
            <th>Student Mark</th>
            <th>Teacher Comment</th>
        </tr>
        </thead>";
    while ($row=mysqli_fetch_array($select))
    {
        echo "<div class='table-wrapper'>
       
        <tbody>
        <tr>
            <td>$row[S_Id]</td>
            <td>$row[C_Id]</td>
            <td>$row[Mark]</td>
            <td>$row[Comment]</td>
        </tr>";

    } 
    

}
else
{
    echo "<script>
                    alert('Result Not Found ) : ');
                    window.location.href='veiwgrades.html';
                    </script>";
}

}
                   
                
?>

<style>
   
   body{
       font-family: Helvetica;
       -webkit-font-smoothing: antialiased;
       background: rgba( 71, 147, 227, 1);
   }
   h2{
       text-align: center;
       font-size: 18px;
       text-transform: uppercase;
       letter-spacing: 1px;
       color: black;
       padding: 30px 0;
   }
   
   /* Table Styles */
   
   .table-wrapper{
       margin: 10px 70px 70px;
       box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
   }
   
   .fl-table {
       border-radius: 5px;
       font-size: 12px;
       font-weight: normal;
       border: none;
       border-collapse: collapse;
       width: 100%;
       max-width: 100%;
       white-space: nowrap;
       background-color: white;
   }
   
   .fl-table td, .fl-table th {
       text-align: center;
       padding: 8px;
   }
   
   .fl-table td {
       border-right: 1px solid #f8f8f8;
       font-size: 12px;
   }
   
   .fl-table thead th {
       color: #ffffff;
       background: #4FC3A1;
   }
   
   
   .fl-table thead th:nth-child(odd) {
       color: #ffffff;
       background: #324960;
   }
   
   .fl-table tr:nth-child(even) {
       background: #F8F8F8;
   }
   
   /* Responsive */
   
   @media (max-width: 767px) {
       .fl-table {
           display: block;
           width: 100%;
       }
       .table-wrapper:before{
           content: "Scroll horizontally >";
           display: block;
           text-align: right;
           font-size: 11px;
           color: white;
           padding: 0 0 10px;
       }
       .fl-table thead, .fl-table tbody, .fl-table thead th {
           display: block;
       }
       .fl-table thead th:last-child{
           border-bottom: none;
       }
       .fl-table thead {
           float: left;
       }
       .fl-table tbody {
           width: auto;
           position: relative;
           overflow-x: auto;
       }
       .fl-table td, .fl-table th {
           padding: 20px .625em .625em .625em;
           height: 60px;
           vertical-align: middle;
           box-sizing: border-box;
           overflow-x: hidden;
           overflow-y: auto;
           width: 120px;
           font-size: 13px;
           text-overflow: ellipsis;
       }
       .fl-table thead th {
           text-align: left;
           border-bottom: 1px solid #f7f7f9;
       }
       .fl-table tbody tr {
           display: table-cell;
       }
       .fl-table tbody tr:nth-child(odd) {
           background: none;
       }
       .fl-table tr:nth-child(even) {
           background: transparent;
       }
       .fl-table tr td:nth-child(odd) {
           background: #F8F8F8;
           border-right: 1px solid #E6E4E4;
       }
       .fl-table tr td:nth-child(even) {
           border-right: 1px solid #E6E4E4;
       }
       .fl-table tbody td {
           display: block;
           text-align: center;
       }
   }
   </style>