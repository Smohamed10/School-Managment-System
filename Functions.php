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
}


function stdverifylogin($NewUser,$Role)
{
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $email=$NewUser->stdemail;
    $pass=$NewUser->getstdpassword();
    if ($Role=='Student')
    {

   

    $query1 = "SELECT* FROM student WHERE S_Email='$email' AND S_Password='$pass'";
   
    $select=(mysqli_query($con, $query1));
    $row = mysqli_fetch_array($select, MYSQLI_BOTH);
    if(mysqli_num_rows($select))
        {
            $NewUser->stdaddress=$row["S_Address"];
            $NewUser->stdbirthday=$row["S_DOB"];
            $NewUser->stdfirstname=$row["S_FirstName"];
            $NewUser->stdlastname=$row["S_LastName"];
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
function addstudent($NewUser)
{
    $host = "localhost"; $user = "root"; $dbname = "sms_db";
    $con = mysqli_connect($host, $user,"",$dbname);
    $email=$NewUser->stdemail;
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
        $pass=$NewUser->getstdpassword();
        
        $query = "INSERT INTO student VALUES (NULL,'$NewUser->parentid','$NewUser->stdfirstname','$NewUser->stdlastname','$NewUser->stdaddress','$NewUser->stdemail','$pass','$NewUser->stdbirthday','$NewUser->stdpic')";
        if (mysqli_query($con, $query)) {
            
            echo "<script>
                alert('Student Has been Registered ( : ');
                window.location.href='login.html';
                </script>";
        }
    }
}

?>
