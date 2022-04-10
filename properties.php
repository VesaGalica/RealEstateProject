<?php
    include('header.php');
    include('conn.php');

    if(isset($_GET['pageno']))
    {
        $pageno=$_GET['pageno'];
    }
    else{
        $pageno=1;
    }

    $propsPerPage=9;
    $offset=($pageno-1)*$propsPerPage;


    $numRows=$conn->query("SELECT COUNT(*) FROM property")->fetch_array()[0];
    $numPages=ceil($numRows/$propsPerPage);

    $properties=$conn->query("SELECT * FROM property INNER JOIN photo_property ON photo_property.property_id= property.id INNER JOIN photo ON photo.id = photo_property.photo_id WHERE photo.thumbnail = true LIMIT $offset,$propsPerPage");
    $count=0;
    $propertyCount=0;

?>


    <div id="heroBackground">
        <div class="heroText">
            <h1>REAL ESTATE PROS</h1>
            <p>Your home is our mission</p><br>
            <button> <a href="register.php">Sign up</a> </button>
        </div>
    </div>

    <div class="content">
        <?php if(!empty($properties)): ?>
            <?php while ($row = $properties->fetch_assoc()): ?>
                <?php if($propertyCount % 3 == 0 ): ?>
                    <div class="property-row">
                <?php endif; ?>
                <div class="property">
                    <div class="property-image">
                        <a href="#"><img src="<?php echo $row['photo'] ?>" alt=""></a>
                    </div>
                    <div class="property-text">
                       
                        <div class="property-title">
                            <a href="#"><?php echo $row['title'] ?></a> 
                        </div>
                        <div class="property-price">€ <?php echo $row['price'] ?></div>
                        <div class="contact-owner">
                            <button>Contact the owner</button>
                            <small >Posted on <?php echo $row['created_at'] ?></small>
                        </div>
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

            <?php endif; ?>
          
       
    </div> 

    <div class="content">
        <div class="pagination-row">
                    <div class="pagination "><a href="?pageno=1"><<</a></div>
                    <div class="pagination"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a></div>
                    <div class="pagination"> <a href="<?php if($pageno >= $numPages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></div>
                    <div class="pagination"><a href="?pageno=<?php echo $numPages; ?>">>></a></div>
        </div>
    </div>



    <div id="newsletter">
        <div class="newsletter-content">
            <h1>Sign Up For The Best Offers</h1>
            <p style="margin:5px 0;">After signing up, your e-mail stays <mark>forever</mark> </p>
            <form  method="post" id="subscribeForm">
                <input type="email" id="newsletterEmail" name="email" class="newsletter-email" placeholder="Your e-mail address"><br>
                <button type="submit" class="newsletter-submit" >Sign up</button>

            </form>
        </div>
    </div>
    
<?php
include('footer.php');
?>