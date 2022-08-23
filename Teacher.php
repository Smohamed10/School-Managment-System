<?php
include_once 'User.php';
include_once "Ido.php";
include_once "Functions.php";
class teacher extends user implements Ido
{
    public function add($thing) 
    {
        pendinggrade($thing);

    }
    public function edit($thing) 
    {
     updateresult($thing);

    }
    public function veiw($thing)
    {
        
    }
    public function sendMessage($message)
    {
        $msg=$message;
        messageaparent($msg); 
    }
}
?>