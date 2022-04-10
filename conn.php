  
<?php 
    $conn=new mysqli('localhost','root','Vefl.=.090',"realestate2");


    if($conn->connect_error)
    {   
        die("Connection failed:".$conn->connect_error);
    }


?>