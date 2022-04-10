<?php
   $servername = "localhost";
   $username = "root";
   $password = "Vefl.=.090";
   $dbname = "realestate2";
   
   
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
   
   $sql = "SELECT * FROM tbl_property_details";
   $result = mysqli_query($conn, $sql);
    
      
   		
   		
   		?>
		
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   <style>
   .col-sm-6{text-align:Center}
   .col-sm-12{text-align:Center}
   </style>