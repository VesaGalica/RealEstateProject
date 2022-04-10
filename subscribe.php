<?php
    include('conn.php');
    $email=$_POST['email'];
    if(empty($email))
    {
        echo "Email cant be empty";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo "Use a valid email";
    }
    else if(subscriber_exists($email)){
        echo "Subscriber exists";
    }
    else{
        $query=$conn->prepare("INSERT INTO subscription(email) values (?)");
        $query->bind_param('s',$email);
        if($query->execute())
        {
            echo "Thanks for subscribing";
        }
        $query->close();
    }
    

    function subscriber_exists($email)
    {
        include('conn.php');
        $query=$conn->prepare("SELECT * FROM subscription where email = ? ");
        $query->bind_param('s',$email);
        $query->execute();
        $res=$query->get_result();
        if($res->num_rows >0)
        {
            return true;
        }
        return false;
    }
    
?>