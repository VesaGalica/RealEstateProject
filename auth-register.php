<?php
    include('user.php');
    include('address.php');
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $add=new Address($_POST['str'],$_POST['city'],$_POST['country'],$_POST['zip']);
        $usr=new User($_POST['email'],$_POST['pass'],$_POST['fname'],$_POST['lname'],$add,$_POST['phone_num']);
        if($usr->validateRegister($_POST['cpass']))
        {
            if($usr->register())
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

                    header('Location: register.php');

            }
        }
        else{
                $_SESSION['errors']=$usr->getErrors();
                header('Location: register.php');
        }
    }
?>