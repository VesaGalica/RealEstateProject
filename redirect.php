<?php 
      $need_log_in=array("/addProperty.php","/logout.php","/myProperty.php","/propertyUpdate.php");

      if(in_array($_SERVER['SCRIPT_NAME'],$need_log_in) && !isset($_SESSION['user']))
      {
        header("Location: login.php");
        exit;
      }

?>