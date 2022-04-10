<?php
    include('user.php');

 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $usr=new User($_POST['email'],$_POST['pass']);
            if($usr->validateLogin())
            {
                if($usr->authenticate())
                {
                    header("Location: dashboard.php");
    
                }
                else{
                    $_SESSION['errors']=$usr->getErrors();
                    header('Location: login.php');
                }
            }
            else{
                $_SESSION['errors']=$usr->getErrors();
                header('Location: login.php');
            }
        }
    
    
 
?>