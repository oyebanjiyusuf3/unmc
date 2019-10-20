<?php 
  $title = "Contact Us &ndash; UNMC";
  include_once "includes/head.php";
?>    
  <body id="body">

    <?php include_once "includes/navbar.php";?>
    <!--==========================
    Intro Section
    ============================-->
    <section id="reach">
      <div class="reach-content">
        <h2 class="wow fadeInUp">Contact <span>Us</span></h2>
      </div>
    </section>

    <main id="main">
      <!--==========================
        Contact Page
      ============================-->
      <section id="contact" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Contact Us</h2>
            <p>For any other enquiries feel free to reach us using the form below. Thank you</p>
          </div>

          <div class="row contact-info">

            <div class="col-md-4">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>5 Gernon Walk, Letchworth Garden City, Hertfordshire, SG6 3HW, UK </address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:">+1234567890</a></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:info@website.com">info@website.com</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <!-- Uncomment below if you wan to use dynamic maps -->
          <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
        </div>

        <div class="container">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </section>

      <?php include_once "includes/call.html"; ?>
      
    </main>

  <?php include_once "includes/footer.html" ?>
  