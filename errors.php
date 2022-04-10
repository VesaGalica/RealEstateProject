<?php 
    if(isset($_SESSION['errors']))
    {
        foreach ($_SESSION['errors'] as $error) {
            echo "<li class='danger-text'>$error</li>";
        }
        unset($_SESSION['errors']);
    }
?>