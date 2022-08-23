
<html>
    <h2>Pending Grades Approval</h2>
    <form action="aprroveresult.php" method="post">
<!-- -----------------PHP Part------------- -->

<?php

            $host = "localhost"; $user = "root"; $dbname = "sms_db";
            $con = mysqli_connect($host, $user,"",$dbname);
            $query1="SELECT* FROM pending_result";
            $select=(mysqli_query($con, $query1));
            $n=mysqli_num_rows($select);
           
            if (mysqli_num_rows($select))
            {
                echo "<div class='table-wrapper'>
                <table class='fl-table'>
                    <thead>
                    <tr>
                        <th> Student Id</th>
                        <th>Teacher Id</th>
                        <th>Course Id</th>
                        <th>Student Mark</th>
                        <th>Teacher Comment</th>
                        <th> Manager Approval</th>
            
                    </tr>
                    </thead>";
                while ($row=mysqli_fetch_array($select))
                {
                    echo "<div class='table-wrapper'>
                   
                    <tbody>
                    <tr>
                        <td>$row[S_Id]</td>
                        <td>$row[T_Id]</td>
                        <td>$row[C_Id]</td>
                        <td>$row[Mark]</td>
                        <td>$row[Comment]</td>
                        <td> <input type='checkbox' name='check[]' value =$row[R_Id]> </td>
                    </tr>";

                } 
                

            }
        



?>
<button type="submit" name="submit">Approve</button>
    </form>
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
button {
  padding: 1.3em 3em;
        float: right;
        overflow-x: auto;
        overflow-y: auto;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
}

button:hover {
  background-color: #23c483;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}

button:active {
  transform: translateY(-1px);
}
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
</style>
</html>