<?php 
include('user.php');
include('conn.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // collect value of input field
    $id=$_SESSION['user']->getId();
    $fname = $_REQUEST['fname'];
    $lname=$_REQUEST['lname'];

    $emaili=$_REQUEST['email'];
    $telefoni=$_REQUEST['phone_num'];
  
        $sqlquery = "UPDATE user SET first_name='$fname', last_name='$lname', email='$emaili', phone_number='$telefoni' WHERE id='$id'";
        $conn->query($sqlquery);
        $_SESSION['user']->setFname($fname);
        $_SESSION['user']->setEmail($emaili);
        $_SESSION['user']->setLname($lname);
        $_SESSION['user']->setPhone_num($telefoni);
        
        header("Location: dashboard.php");
    }

?>