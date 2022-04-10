<?php 
    include('user.php');
    if(isset($_SESSION['user']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" manifest="cache.appcache">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Home</title>
   
</head>
<body>
   
    <header class="header" id="nxtheader">
        <div class="contain">
        <div class="contain-row">
        <div class="contain-col">
        <div class="header_content">
        <div class="logo"> <img class="logo" src="img/logo.png" alt=""></div>
        <nav class="main_nav">
        <ul>
        <li class="active"><a href="index.php"> Home </a></li>
        <li><a href="about.php">About us </a></li>
        <li><a href="properties.php">Properties </a></li>
        <li><a href="services.php">Services </a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php if(isset($_SESSION['user'])) : ?>
            <a href="">Shto pronë</a>
        <li class="dropdown">
        </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['user'])) : ?>
                <li class="dropdown">
                        <a  href="#" class="dropbtn"><span> <i class="fa fa-user"></i> <?php echo $_SESSION['user']->getFname()." ".$_SESSION['user']->getLname() ?>  </span> </a> 
                        <div class="dropdown-content">
                            <a href="myProperty.php">Pronat e mia</a>
                            <a href="dashboard.php">Profili</a>
                            <a href="logout.php" class="logout">Çkyqu</a>
                        </div>
                </li>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user'])) : ?>
               <li> <a  href="login.php" ><span> <i class="fa fa-lock"></i> Kyqu</a></li>
        <?php endif; ?>
        </ul>
        </nav>
        
        </div>
        </div>
        </div>
        </div>
        </header>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("nxtheader");
var stick = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > stick) {
    header.classList.add("stick");
  } else {
    header.classList.remove("stick");
  }
}
</script>
        <style>
        .header.stick{
            background:rgba(63,111,206,0.85);
        }
        .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #3f6fce;
        z-index: 200;
        border-bottom: solid 1px transparent;
        border-image: linear-gradient(to right, #487fee, #32fa95);
        border-image-slice: 1;
        transition: all 200ms ease;
        }
        .header_content{
            height: 101px;
            transition: all 200ms ease;
            align-items: center;
            justify-content: flex-start;
            flex-direction: row;
            display: flex;
        }
        .logo {
            width: 110px;
            position: absolute;
            top:25%;
        }
        .main_nav {
            margin-left: 170px;
        }
        ul {
            list-style: none;
            margin-bottom: 15px;
        }
        .main_nav ul li {
            display: inline-block;
        }
        .main_nav ul li a {
            font-size: 16px;
            font-weight: 500;
            color: #FFFFFF;
            transition: all 200ms ease;
        }
        .main_nav ul li:not(:last-child) {
            margin-right: 60px;
        }
        a, a:hover, a:visited, a:active, a:link {
            text-decoration: none;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }
        .main_nav ul li.active a, .main_nav ul li a:hover {
            color: #2cd983;
        }
        .phone_num {
            height: 43px;
            border-radius: 22px;
            background: linear-gradient(to right, #487fee, #32fa95);
            padding: 2px;
            overflow: hidden;
            color: #FFFFFF;
        }
        .ml-auto, .mx-auto {
            margin-left: 38px;
        }
        .phone_num_inner
        {
            width: 100%;
            height: 100%;
            padding-left: 10px;
            padding-right: 18px;
            background: #3f6fce;
            border-radius: 20px;
        }
        .phone_num span
        {
            font-size: 16px;
            font-weight: 500;
            color: #FFFFFF;
            margin-left: 11px;
            line-height: 39px;
        }
        @media only screen and (max-width: 991px){
        .main_nav {
            display: none;
        }
        .phone_num{
            display: none;
        }}
       
        </style>