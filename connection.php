<?php
$host = "localhost"; $user = "id19472332_root"; $dbname = "id19472332_sms_db"; $Password="Ihf_21072002";
$con=mysqli_connect($host, $user,$Password,$dbname);
if($con)
{
    echo 'connected';
}
else
{
    echo "couldn't connect";
}
?>