<?php  
    include('auth-header.php');
    include('conn.php');

    $city=$conn->query("SELECT * FROM city");
    $country=$conn->query("SELECT * FROM country");
?>
<section class="register-section">
    <h2>Register</h2>
    <ul style="list-style:square;text-align: center;margin-top:20px;">
        <?php 
            include('errors.php');   
        ?>
    </ul>
    <form method="POST" action="auth-register.php"  class="register-form" enctype="multipart/form-data">
        <div class="form-row">
           <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-input" id="fname"  name="fname">
           </div>
           <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-input" id="lname" name="lname">
           </div>
           
        </div>   
        <div class="form-row">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-input" id="email" name="email">
           </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-input" id="pass" name="pass">
           </div>
           <div class="form-group">
                <label for="cpass">Confirm Password</label>
                <input type="password" class="form-input" id="cpass" name="cpass">
           </div>
        </div> 
        <div class="form-row">
            <div class="form-group">
                <label for="str">Address</label>
                <input type="text" id="str" class="form-input" name="str">
            </div>
            <div class="form-group">
                <label for="city">
                    City
                </label>
                <select name="city" id="city">
                    <?php while ($row = $city->fetch_assoc()): ?>
                        <?php $id = $row['id']; ?>
                        <?php $name = $row['name']; ?>
                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
        </div>    
        <div class="form-row">
            <div class="form-group">
                <label for="country">
                    Country
                </label>
                <select name="country" id="country">
                    <?php while ($row = $country->fetch_assoc()): ?>
                        <?php $id = $row['id']; ?>
                        <?php $name = $row['name']; ?>
                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="zip">Zip</label>
                <input type="text" class="form-input" id="zip" name="zip">
            </div>
           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="phone_num">
                    Tel.
                </label>
                <input type="text" name="phone_num" class="form-input" id="phone_num">
            </div>
        
        </div>
        <div class="form-row">
            <div class="form-group">
                    <input type="submit" class="submit-btn" name="register-btn" value="Register">
                
            </div>
        </div>
    </form>
</section>

<?php 
    include('footer.php');
?>