<?php 
    include('conn.php');
    include('header.php');
    $userId=$_SESSION['user']->getId();
    $properties=$conn->prepare("SELECT property.*,photo.photo,photo_property.* FROM property INNER JOIN photo_property ON photo_property.property_id= property.id INNER JOIN photo ON photo.id = photo_property.photo_id WHERE photo.thumbnail = true and property.publisher =? LIMIT 9");
    $properties->bind_param("i",$userId);
    $properties->execute();
    $result=$properties->get_result();
    $propertyCount=0;

?>
<div class="content">
            <h1 class="myPropertyHeader">Pronat e mia</h1>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php if($propertyCount % 3 == 0 ): ?>
                    <div class="property-row">
                <?php endif; ?>
                <div class="property">
                    <div class="property-image">
                        <a href="propertyUpdate.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['photo'] ?>" alt=""></a>
                    </div>
                    <div class="property-text">
                       
                        <div class="property-title">
                            <a href="propertyUpdate.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a> 
                        </div>
                        <div class="property-price">€ <?php echo $row['price'] ?></div>
                      
                    </div>
                    
                    <div class="property-specs">
                        <div>
                            <div class="spec-icon">
                                    <img src="img/icons/icon_area.png" alt="">
                                </div>
                                <span><?php echo $row['area'] ?>m2</span>
                        </div>
                        <div>
                            <div class="spec-icon">
                                <img src="img/icons/icon_parking.png" alt="">
                        </div>
                        <span><?php echo $row['bathrooms'] ?></span>
                        </div>
                        <div>
                            <div class="spec-icon">
                                <img src="img/icons/icon_shower.png" alt="">
                        </div>
                        <span><?php echo $row['bedrooms'] ?></span>
                        </div>
                    </div>
                </div>
                <?php $propertyCount++; ?>

                <?php if($propertyCount % 3 == 0): ?>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
       
    </div> 


<?php 
    include('footer.php');
?>