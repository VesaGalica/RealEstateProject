<?php 
    include('conn.php');
    include('header.php');
    $city=$conn->query("SELECT * FROM city");
    $country=$conn->query("SELECT * FROM country");
    $propertyId=$_GET['id'];
    $query=$conn->prepare("SELECT property.*,address.*,photo.photo,photo.thumbnail,photo.id as photo_id FROM property inner join address on property.address=address.id inner join photo_property on photo_property.property_id=property.id inner join photo on photo.id= photo_property.photo_id where property.id = ?");
    $query->bind_param("i",$propertyId);
    $query->execute();
    $res=$query->get_result();
    $property=$res->fetch_assoc();
    if($res->num_rows ==0 || $property['publisher'] != $_SESSION['user']->getId())
    {
        exit("Oops something went wrong");
    }
    $res->data_seek(0);

?>
<section class="register-section">
    <h2>Perditsoni  pronën <?php echo $property['title'];    ?></h2>
    <ul style="list-style:square;text-align: center;margin-top:20px;">
        <?php 
            include('errors.php');
        ?>
    </ul>
    <form method="POST" action="formUpdateHandler.php?id=<?php echo $_GET['id'] ?>&address_id=<?php echo $property['address'] ?>"  class="register-form"  enctype="multipart/form-data" >
        <div class="form-row">
           <div class="form-group">
                <label for="fname">Title</label>
                <input type="text" class="form-input" id="fname"  name="title" value="<?php echo $property['title'] ?>">
           </div>
        </div>   
        <div class="form-row">
            <div class="form-group">
                <label for="email">Description</label>
                <input type="text" class="form-input" id="email" name="descp" value="<?php echo $property['description'] ?>" >
           </div>
           
        </div> 
        <div class="form-row">
            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-input" id="bathrooms"  name="baths" value="<?php echo $property['bathrooms'] ?>" >
            </div>
            <div class="form-group">
                <label for="bedrooms">Bedrooms</label>
                <input type="number" class="form-input" id="bedrooms"  name="beds" value="<?php echo $property['bedrooms'] ?>" >
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="number" class="form-input" id="area"  name="area"  value="<?php echo $property['area'] ?>" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="str">Address</label>
                <input type="text" id="str" class="form-input" name="str" value="<?php  echo $property['street'] ?>">
            </div>
            <div class="form-group">
                <label for="city">
                    City
                </label>
                <select name="city" id="city">
                    <?php while ($row = $city->fetch_assoc()): ?>
                        <?php $id = $row['id']; ?>
                        <?php $name = $row['name']; ?>
                        <?php if($id == $property['city']): ?>
                        <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>
                        <?php endif; ?>
                        <?php if($id != $property['city']): ?>
                        <option value="<?php echo $id; ?>" ><?php echo $name; ?></option>
                        <?php endif; ?>

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
                        <?php if($id == $property['country']): ?>
                        <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>
                        <?php endif; ?>
                        <?php if($id != $property['country']): ?>
                        <option value="<?php echo $id; ?>" ><?php echo $name; ?></option>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="zip">Zip</label>
                <input type="text" class="form-input" id="zip" name="zip" value="<?php echo $property['zip_code']; ?>">
            </div>
           
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="price">
                    Price
                </label>
                <input type="number" class="form-input"  name="price" id="price" value="<?php echo $property['price'] ?>">
            </div>
        
        </div>
        <?php  while($row =$res->fetch_assoc()):?>
        <div class="form-row">
            <div class="form-group">
                <img src="<?php echo $row['photo']; ?>" alt="<?php echo $property['title']; ?>">
                <input type="file" class="form-input photoUpload" data-photo="<?php echo $row['photo_id']; ?>">
                <div class="photo-error" data-photo="<?php echo $row['photo_id']; ?>">
                    
                </div>
                <div class="photo-succ" data-photo="<?php echo $row['photo_id']; ?>">
                    
                </div>
            </div>
        
        </div>
        <?php endwhile; ?>
        <div class="form-row">
            <div class="form-group">
                    <input type="submit" class="submit-btn" name="register-btn" value="Submit">
                
            </div>
        </div>

    </form>
</section>


<?php 
    include('footer.php');
?>
