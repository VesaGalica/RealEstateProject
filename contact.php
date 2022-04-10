<?php 
    include('header.php');
?>
      <div class="home">
          <div class="home-container">
              <div class="contain">
                  <div class="contain-row">
                      <div class="contain-col">
                          <div class="home-content d-flex flex-row align-items-end justify-content-start">
                              <div class="home-title">
                                  Contact
                              </div>
                              <div class="homecontact">
                                  <div class="hclists">
                                      <ul>
                                          <li><a href="index.html">Home</a></li>
                                          <li>Contact</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="home_search_container">
                              <div class="home_search_content">
                                  <form action="#" class="search_form d-flex flex-row align-items-start justify-content-start">
                                      <div class="search_form_content d-flex flex-row align-items-start justify-content-start flex-wrap">
                                          <div>
                                              <select class="search_form_select">
                                                  <option disabled="" selected="">For rent</option>
                                                  <option>Yes</option>
                                                  <option>No</option>
                                              </select>
                                          </div>
                                          <div>
                                              <select class="search_form_select">
                                                  <option disabled="" selected="">All types</option>
                                                  <option>Type 1</option>
                                                  <option>Type 2</option>
                                                  <option>Type 3</option>
                                                  <option>Type 4</option>
                                              </select>
                                          </div>
                                          <div>
                                              <select class="search_form_select">
                                                  <option disabled="" selected="">City</option>
                                                  <option>New York</option>
                                                  <option>Paris</option>
                                                  <option>Amsterdam</option>
                                                  <option>Rome</option>
                                              </select>
                                          </div>
                                          <div>
                                              <select class="search_form_select">
                                                  <option disabled="" selected="">Bedrooms</option>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                              </select>
                                          </div>
                                          <div>
                                              <select class="search_form_select">
                                                  <option disabled="" selected="">Bathrooms</option>
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                              </select>
                                          </div>
                                      </div>
                                      <button class="search_form_button ml-auto">search</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <style>
          .home {
              background-image: url("img/ArcDeTriomphe.jpg");
              background-attachment: fixed;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              position: relative;
              width: 100%;
              height: 400px;
          }

          @media screen and (max-width: 991px) {
              .home {
                  height: 800px;
              }
          }

          .home-title {
              font-size: 40px;
              font-weight: 600;
              color: #FFFFFF;
              line-height: 0.75;
          }

          @media screen and (max-width: 991px) {
              .home_title {
                  font-size: 48px;
              }
          }

          .home-container {
              position: absolute;
              left: 0;
              bottom: 173px;
              width: 100%;
          }

          .contain {
              width: 100%;
              padding-right: 15px;
              padding-left: 15px;
              margin-right: auto;
              margin-left: auto;
          }

          @media screen and (min-width: 1200px) {
              .container {
                  max-width: 1170px;
              }
          }

          .contain-row {
              display: flex;
              flex-wrap: wrap;
              margin-right: -15px;
              margin-left: -15px;
          }

          .contain-col {
              flex-basis: 0;
              flex-grow: 1;
              max-width: 100%;
              position: relative;
              width: 100%;
              min-height: 1px;
              padding-right: 90px;
              padding-left: 50px;
          }

          .home-content {
              position: relative;
              align-items: flex-end;
              justify-content: flex-start;
              flex-direction: row;
              display: flex;
          }

          @media screen and (min-width: 992px) {
              .flex-row {
                  flex-direction: row;
              }

              .align-items-end {
                  align-items: flex-end;
              }

              .justify-content-start {
                  justify-content: flex-start
              }

              .d-flex {
                  display: flex;
              }
          }

          .homecontact {
              margin-left: auto;
          }

          .hclists ul {
              line-height: 0.75;
          }

              .hclists ul li {
                  display: inline-block;
                  position: relative;
                  font-size: 12px;
                  font-weight: 500;
                  color: #FFFFFF;
                  line-height: 0.75;
              }

                  .hclists ul li:not(:last-child)::after {
                      display: inline-block;
                      content: '/';
                      margin-left: 3px;
                      margin-right: 3px;
                  }

                  .hclists ul li a {
                      font-size: 12px;
                      font-weight: 500;
                      color: #FFFFFF;
                      line-height: 0.75;
                      transition: all 200ms ease;
                  }

                      .hclists ul li a:hover {
                          color: rgb(4, 4, 68);
                      }

          .home_search_container {
              position: absolute;
              top: -112px;
              left: 45px;
              right: 90px;
              margin-top: 210px;
              height: 65px;
              border-radius: 45px;
              padding: 10px;
              background: rgba(255,255,255,0.33);
          }

          @media only screen and (max-width: 991px) {
              .home_search_container {
                  position: relative;
                  top: 145px;
                  left: -9px;
                  width: 100%;
                  height: auto;
                  margin-top: 80px;
                  margin-bottom: 43px;
                  background: linear-gradient(to right, #487fee, #32fa95);
              }
          }

          .home_search_content {
              width: 100%;
              height: 100%;
              background: #FFFFFF;
              border-radius: 35px;
          }

          @media only screen and (max-width: 991px) {
              .home_search_content {
                  padding-top: 20px;
                  padding-bottom: 20px;
              }
          }

          .search_form {
              position: relative;
              height: 100%;
          }

          @media screen and (min-width: 992px) {
              .align-items-start {
                  align-items: flex-start;
              }

              .flex-row {
                  flex-direction: row;
              }

              .d-flex {
                  display: flex;
              }
          }

          .search_form_content {
              width: 100%;
              height: 100%;
              padding-left: 14px;
              padding-right: 11px;
          }

          @media screen and (min-width: 992px) {
              .align-items-start {
                  align-items: flex-start;
              }

              .flex-wrap {
                  flex-wrap: wrap;
              }

              .flex-row {
                  flex-direction: row;
              }

              .d-flex {
                  display: flex;
              }
          }

          .search_form_content > div:not(:last-child) {
              border-right: solid 2px #d1d1d1;
          }

          @media only screen and (max-width: 991px) {
              .search_form_content > div:not(:last-child) {
                  border-right: none;
                  border-bottom: solid 1px #d1d1d1;
              }
          }

          .search_form_content > div {
              width: 18%;
              height: 100%;
              padding-left: 13px;
              padding-right: 3px;
          }

          @media only screen and (max-width: 991px) {
              .search_form_content > div {
                  width: 90%;
                  height: 50px;
                  margin-left: 10px;
              }
          }

          .search_form_select {
              display: block;
              position: relative;
              top: 50%;
              transform: translateY(-50%);
              width: 100%;
              border: none;
              outline: none;
              font-size: 13px;
              font-weight: 400;
              color: #6b6b6b;
              cursor: pointer;
          }

          .search_form_button {
              width: 193px;
              height: 100%;
              border-radius: 35px;
              border: none;
              outline: none;
              cursor: pointer;
              font-size: 14px;
              font-weight: 700;
              color: #FFFFFF;
              text-transform: uppercase;
              background: linear-gradient(to right, #487fee, #32fa95);
          }

          @media only screen and (max-width: 575px) {
              .search_form_button, .search_form_button_2 {
                  font-size: 12px;
              }
          }

          @media only screen and (max-width: 991px) {
              .search_form_button {
                  position: absolute;
                  bottom: -80px;
                  left: -10px;
                  height: 40px;
                  width: calc(100% + 20px);
              }
          }

          .ml-auto, .mx-auto {
              margin-left: auto;
          }
      </style>
      <div class="contacts">
          <div class="contact-info">

              <div class="title">
                  Get in touch with us
              </div>

              <div class="subtitle">
                  Say hello!
              </div>

              <div class="contact-info-txt">
                  <p>
                      Donec ullamcorper nulla non metus auctor fringi lla.
                      Curabitur blandit tempus porttitor.
                      Sed lectus urna, ultricies sit amet risus eget.
                  </p>
              </div>

              <div class="contact-info-content">
                  <ul class="contact-info-list">
                      <li>
                          <img src="img\icons\address.png" alt="adr" style="padding-right: 5px; float:left;width:20px;height:20px;">
                          <div>Address: </div>
                      </li>
                      <div>1481 Creekside lane Avila Beach</div>

                      <li>
                          <img src="img/icons/telephone.png" alt="phone" style="padding-right: 5px;float:left;width:20px;height:20px;">
                          <div>Phone: </div>
                      </li>
                      <div>+53 345 4875 67890</div>

                      <li>
                          <img src="img/icons/mail-inbox.png" alt="email" style="padding-right: 5px; float:left;width:20px;height:20px;">
                          <div>Email: </div>
                      </li>
                      <div>youremail@gmail.com</div>

                  </ul>
              </div>
          </div>
          <div class="wrap-contact">
              <form method="POST" class="contact-form" id="contactForm">
                  <table cellpadding="5">
                      <tr>
                          <td style="padding-right: 65px; width: 300px;">
                              <input class="input" type="text" id="name" placeholder="Full Name" required="required">
                          </td>

                          <td style="width: 300px;">
                              <input pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="e.g. john@example.com" class="input" type="text" name="email" id="emailContact" placeholder="E-mail" required="required">
                          </td>
                      </tr>
                      <tr>
                          <td colspan="2">
                              <input class="input" type="text" name="subject" id="subjectContact" placeholder="Subject" required="required">
                          </td>
                      </tr>
                      <tr>
                          <th colspan="2">
                              <textarea class="messages" name="message" id="msgContact" placeholder="Your Message" required="required"></textarea>
                          </th>
                      </tr>
                      <tr>
                          <th colspan="2">
                              <button class="contact-form-btn" name="button">
                                  send
                              </button>
                          </th>
                      </tr>
                  </table>
              </form>
          </div>
      </div>
      <?php
          include "conn.php"; // Using database connection file here
          $emailErr="";
          if(isset($_POST['button']))
          {		
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
              $message = $_POST['message'];
          
              $insert = mysqli_query($conn,"INSERT INTO `contact`(`email`, `msg`) VALUES ('$email','$message')");
          
              if(!$insert)
              {
                  echo mysqli_error();
              }
              else
              {
                echo "Values inserted!";
              }
          }
          
          mysqli_close($conn); // Close connection
          ?>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1qy85l5O0_fpIllK8nLI1GOiza-tTWNo&callback=initMap" type="text/javascript"></script>

      <div>
          <button class="position" type="button" onclick="showPosition();">Position on Google Map</button>
          <div id="embedMap" style="width: 100%; height: 500px;">
          </div>
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
                              <form action="#" class="newsletter_form">
                                  <input type="email" class="newsletter_input" placeholder="      Your e-mail address" required="required">
                                  <button class="newsletter_btn">subscribe now</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <style>
          .newsletter {
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



<?php 
include('footer.php');

?>