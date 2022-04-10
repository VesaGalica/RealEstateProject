
    <div id="footer">
        <div id="logoText">
            <img src="img/logo.png" alt="" >
            <p>
                Donec in tempus leo. Aenean ultricies mauris sed quam lacinia lobortis. Cras ut vestibulum enim, in gravida nulla. Curab itur ornare nisl at sagittis cursus.
            </p>
    
        </div>
         <div id="footerProperties">
        <h4 id="footerTitle"> Latest Properties</h4>
        <div id="footerPropertiesContainer">
            <?php 
                 include('conn.php');
                 $properties=$conn->query("SELECT * FROM property INNER JOIN photo_property ON photo_property.property_id= property.id INNER JOIN photo ON photo.id = photo_property.photo_id WHERE photo.thumbnail = true ORDER BY created_at   LIMIT 3");
            ?>

            <?php if(!empty($properties)): ?>
                <?php while ($row = $properties->fetch_assoc()): ?>
                    <div class="footerProperty">
                        <img class="footerImg" src="<?php echo $row['photo'] ?>" alt="">
                        <div class="propertyInfo">
                            <h6><?php echo $row['title'] ?></h6>
                        <p><?php echo $row['area'] ?>m2</p>
                        <span> € <?php echo $row['price'] ?></span>
        
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            
       
           
        </div>
        </div>
    </div>
    <div id="footerMenu">
        <div id="callUsFooter">
            <a href="tel:+38349642136">&#9742; +38349642136 </a>
            <br>
            <p><abbr title="Real Estate Pros">R.E.P</abbr> All Rights Reserved <script>var date=new Date();document.write(date.getFullYear());</script></p>
            <address>
                Ulpian&euml; Prishtin&euml;  Kosov&euml; 10000
            </address>
            <a href="./files/pricing.pdf">Pricing</a>
        </div>
        <div id="menuFooter">
            <a href="index.php" class="menu-page "> Home </a> 
                <a href="about.php" class="menu-page"> About Us </a>
                <a href="properties.php" class="menu-page"> Properties </a>
                <a href="services.php" class="menu-page"> Services </a>
                <a href="addProperty.php" class="menu-page "> Add a Property </a>
                <a href="contact.php" class="menu-page"> Contact Us </a>
                <a href="login.php" id="loginLink" >Login</a>

        </div>
    
    </div>


<script>
var imageIndex=1;
imageSlider(imageIndex);

check_login();

function check_login(){
    let logged_in=sessionStorage.getItem('logged_in');
    if(logged_in){
        document.getElementById('loginLink').innerText=sessionStorage.getItem('email');
    }
}

function nextSlide(n){
    imageSlider(imageIndex+=n);
}

function showSlide(n){
    imageSlider(imageIndex=n)
}

function imageSlider(n){
    var images=document.getElementsByClassName('slides');
    var points=document.getElementsByClassName('point')
    if(n>images.length){imageIndex=1}
    if(n<1){imageIndex=images.length}
    for (let i = 0; i < images.length; i++) {
        images[i].style.display='none';

    }
    for (let i = 0; i < points.length; i++) {
       points[i].className= points[i].className.replace(' active-point','');

    }
    images[imageIndex-1].style.display='block';
    points[imageIndex-1].className+=' active-point'
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/subscribe.js"></script>
<script src="js/ajaxUpdatePhoto.js"></script>
</body>

</html>