<?php 
    include('conn.php');
    include('header.php');

    $city=$conn->query("SELECT * FROM city");
    $properties=$conn->query("SELECT * FROM property INNER JOIN photo_property ON photo_property.property_id= property.id INNER JOIN photo ON photo.id = photo_property.photo_id WHERE photo.thumbnail = true LIMIT 9");
    $sliderProps=$conn->query("SELECT * FROM property INNER JOIN photo_property ON photo_property.property_id= property.id INNER JOIN photo ON photo.id = photo_property.photo_id WHERE photo.thumbnail ORDER BY created_at = true LIMIT 3");
    
    
    $count=0;
    $propertyCount=0;
?>
    <div class="slideshow">
        <?php while ($row = $sliderProps->fetch_assoc()): ?>
            <div class="slides">
                <img src="<?php echo $row['photo'] ?>" alt="">
                <div class="slideText">
                    <h1><?php echo $row['title'] ?></h1>
                    <div class="sliderSpecs">
                        <div>
                            <img src="img/icons/icon_area.png" class="slider-icons" alt="">
                            <span><?php echo $row['area'] ?>m2</span>
                        </div>
                        <div>
                            <img src="img/icons/icon_parking.png"  class="slider-icons" alt="">
                            <span><?php echo $row['bedrooms'] ?></span>

                        </div>
                        <div>
                            <img src="img/icons/icon_shower.png"  class="slider-icons" alt="">
                            <span><?php echo $row['bathrooms'] ?></span>
                        </div>
                        <div>
                            <img src="img/icons/euro.png"  class="slider-icons" alt="">
                            <span><?php echo $row['price'] ?></span>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php endwhile; ?>
        <a class="prev" onclick="nextSlide(-1)">&#10094;</a>
        <a class="next" onclick="nextSlide(1)">&#10095;</a>
    </div>
    <div  class="slideNav">
        <span class="point" onclick="showSlide(1)"></span> 
        <span class="point" onclick="showSlide(2)"></span> 
        <span class="point" onclick="showSlide(3)"></span> 
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
                    
        <div class="btn-holder">
            <button class="more-btn"><a href="properties.php" style="color:white">See all properties</a></button>
        </div>
    </div> 


    <div id="weather_wrapper">
        <div class="weatherCard">
            <div class="currentTemp">
                <span class="temp"><span id="weatherTemp"></span>&deg;</span>
                <span class="location" id="weatherLocation"></span>
            </div>
            <div class="currentWeather">
                <span class="conditions" id="weatherIcon"></span>
                <div class="info">
                    <span class="rain" id="weatherRain"></span>
                    <span class="wind" id="weatherWind"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="property-cities">
        <div class="cities-headline">
            <h2>Search for your dream house in these cities</h2>
        </div>
        <?php if(!empty($city)): ?>

            <?php while ($row = $city->fetch_assoc()): ?>
                <?php if($count % 4 == 0 ): ?>
                <div class="cities-row">
                <?php endif; ?>
                    <div class="city">
                        <img src="<?php echo $row['photo'] ?>" alt="">
                        <div class="city-text">
                            <a href="#"><h4><?php echo $row['name'] ?></h4></a>
                        </div>
                    </div>
                    <?php $count++; ?>

                <?php if($count % 4 == 0): ?>
                </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="newsletter">
        <div class="p-background"></div>
        <div class="sub-contain">
        <div class="sub-row">
        <div class="sub-col">
        <div class=" d-flex flex-row align-items-start justify-content-start">
        <div class="newsletter_title_container">
        <div class="newsletter_title">Are you buying or selling?</div>
        <div class="newsletter_subtitle">Search for your dream home</div>
        </div>
        <div class="newsletter_form_container">
        <form action="#" class="newsletter_form" id="subscribeForm">
            <input type="email"  class="newsletter_input" name="email" placeholder="Your e-mail address" required="required">
            <button class="newsletter_btn" id="subscribeBtn" type="submit">subscribe now</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <style>
             .newsletter{
                background-image: url("img/house.jpg");
                background-attachment: scroll;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                width: 100%;
                width: 100%;
                padding-top: 107px;
                padding-bottom: 105px;
                position: relative;
                font-family: Georgia, 'Times New Roman', Times, serif;
                margin-top: 20px;
            }
        </style>


    <script>
        function getWeather()
        {
            if(navigator.geolocation)
            {
                var curr=navigator.geolocation.getCurrentPosition(curr=>{
                    const key="f69ea492215d4b4e8c6111259212005";
                    fetch(`http://api.weatherapi.com/v1/current.json?key=${key}&q=${curr.coords.latitude},${curr.coords.longitude}`)
                    .then(res=>{
                        res.json().then(data => {
                            document.getElementById('weatherTemp').innerHTML=data.current.temp_c;
                            document.getElementById('weatherLocation').innerHTML=data.location.name+" "+data.location.country;
                            let img=document.createElement('img');
                            img.setAttribute('src',data.current.condition.icon);
                            document.getElementById('weatherIcon').appendChild(img);
                            document.getElementById('weatherRain').innerHTML=data.current.precip_mm+" mm";
                            document.getElementById('weatherWind').innerHTML=data.current.wind_kph+" kph";

                            
                        });
                    });
                },err=>{
                    document.getElementById('weather_wrapper').innerHTML="<p>To view current weather allow us to know  your locaiton</p>";
                });
            }
            else{
                document.getElementById('weather_wrapper').innerHTML="<p>Browser dosent support weather</p>";

            }
        }
        getWeather();
       
        
    </script>
<?php 
    include('footer.php');
?>
