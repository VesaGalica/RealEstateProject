<?php 
      include_once('header.php');
      include_once('conn.php');
      $city=$conn->query("SELECT * FROM city");
      $country=$conn->query("SELECT * FROM country");
?>

<section class="register-section">
    <h2>Shtoni Pronë</h2>
    <ul style="list-style:square;text-align: center;margin-top:20px;">
        <?php 
            include('errors.php');
        ?>
    </ul>
    <form method="POST" action="propertySubmit.php"  class="register-form"  enctype="multipart/form-data" >
        <div class="form-row">
           <div class="form-group">
                <label for="fname">Title</label>
                <input type="text" class="form-input" id="fname"  name="title">
           </div>
        </div>   
        <div class="form-row">
            <div class="form-group">
                <label for="email">Description</label>
                <input type="text" class="form-input" id="email" name="descp">
           </div>
           
        </div> 
        <div class="form-row">
            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-input" id="bathrooms"  name="baths">
            </div>
            <div class="form-group">
                <label for="bedrooms">Bedrooms</label>
                <input type="number" class="form-input" id="bedrooms"  name="beds">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="number" class="form-input" id="area"  name="area">
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
                <label for="price">
                    Price
                </label>
                <input type="number" class="form-input"  name="price" id="price"  >
            </div>
        
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="image">
                    Photo
                </label>
                <input type="file" name="image[]" id="image" multiple >
                <small>First photo is choosen as thumbnail</small>
            </div>
        
        </div>

        <div class="form-row">
            <div class="form-group">
                    <input type="submit" class="submit-btn" name="register-btn" value="Submit">
                
            </div>
        </div>

    </form>
</section>

<?php 
    include_once('footer.php');
?>