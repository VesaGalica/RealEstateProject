<?php 
    include('header.php');
    include('conn.php');

    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
    }

    $city=$conn->query("SELECT * FROM city");
    $country=$conn->query("SELECT * FROM country");
    $address=$conn->query("SELECT * FROM 'address'");
    $user=$conn->query("SELECT * FROM 'user'");
    ?>
    <?php
   
?>

  <!--<h4><?php echo $_SESSION['user']->getFname()." ".$_SESSION['user']->getAddress(); ?></h4>-->
  <!--<img src="<?php echo $_SESSION['user']->getProfile_pic(); ?>" alt="asdf">-->

   <section class="register-section">
    <h2>Update Your Informations</h2>
    <ul style="list-style:square;text-align: center;margin-top:20px;">
        <?php 
            include('errors.php');   
        ?>
    </ul>
    
    <form method="POST" action="handleDashboard.php"  class="register-form" enctype="multipart/form-data">
        <div class="form-row">
           <div class="form-group">
                <label for="fname">First Name</label>
                <?php   $firstname =$_SESSION['user']->getFname() ?>
                <input type="text" class="form-input" id="fname"  name="fname" value="<?php echo $firstname; ?>">
           </div>
           <div class="form-group">
                <label for="lname">Last Name</label>
                <?php   $lastname =$_SESSION['user']->getLname() ?>
                <input type="text" class="form-input" id="lname" name="lname" value="<?php echo $lastname; ?>">
           </div>
           
        </div>   
        <div class="form-row">
            <div class="form-group">
                <label for="email">Email</label>
                <?php   $email =$_SESSION['user']->getEmail() ?>
                <input type="email" class="form-input" id="email" name="email" value="<?php echo $email; ?>">
           </div>
         
        </div> 
    
        <div class="form-row">
            <div class="form-group">
                <label for="phone_num">
                    Tel.
                </label>
                <?php   $phone =$_SESSION['user']->getPhone_num() ?>
                <input type="text" name="phone_num" class="form-input" id="phone_num" value="<?php echo $phone; ?>">
            </div>
        
        </div>
        <div class="form-row">
            <div class="form-group">
                    <input type="submit" class="submit-btn" name="register-btn" value="Update">
                
            </div>
        </div>
    </form>
</section>

<?php
include_once('footer.php');
?>