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
            
            echo "<script>
                alert('Student Has been Registered ( : ');
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
        echo 'im here';
        $query = "UPDATE course set C_Code='$code' , C_Name='$name' , C_Describtion='$desc' , C_Grade='$grade' WHERE C_Id='$id' ";
        if (mysqli_query($con, $query)) 
            {  
                
                echo "<script>
	        alert('This Course Information Has Successfully Updated ( :  !');
	        window.location.href='courseupdateform.html';
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
?>
