<?php
    if (isset($_POST['submitted']) && $_POST['submitted'] == 'true') {

    if (isset($_POST['name']) && empty($_POST['name'])) {
      echo "<script type='text/javascript'>
              alert('Error: Please enter your name.');
              history.go(-1);
            </script>";


    } else if (isset($_POST['email']) && empty($_POST['email'])) {

      echo "<script type='text/javascript'>
              alert('Error: Please enter your email.');
              history.go(-1);
            </script>";

    }else if (isset($_POST['message']) && empty($_POST['message'])) {

      echo "<script type='text/javascript'>
              alert('Error: Please enter your message.');
              history.go(-1);
            </script>";

    } else {

      header('location: home.php');
      exit();
    }

  } else {

    include 'header.php';
  
?>
 
   <!-- Start Contact section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-left wow fadeInLeft">
            <h2>Contact with us</h2>
            <address class="single-address">
              <h4>Address:</h4>
              <p>Z-1, Lebuh Bukit Jambul, Bukit Jambul, 11900 Bayan Lepas, Pulau Pinang</p>
            </address>
             <address class="single-address">
              <h4>Phone</h4>
              <p>Phone Number:04-631 0138</p>
            </address>
             <address class="single-address">
              <h4>E-Mail</h4>
              <p>mail.student.newinti.edu.my</p>

            </address>
          </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="contact-right wow fadeInRight">
            <h2>Send a message</h2>
            <form action="contact.php" class="contact-form" method="post">
              <div class="form-group">                
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">                
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
              </div>              
              <div class="form-group">
                <input type="text" name="message" class="form-control" placeholder="Enter your comment">
              </div>
			  <input type='hidden' name="submitted" value='true'>
              <button type="submit" data-text="SUBMIT" class="button button-default"><span>SUBMIT</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->
  <!-- Start Google Map -->
  <section id="google-map">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.489739915378!2d100.27924196751964!3d5.341950683393278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac048a161f277%3A0x881c46d428b3162c!2sINTI+International+College+Penang!5e0!3m2!1sen!2smy!4v1543238286480" 
width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
  <!-- End Google Map -->

  <?php
  }
  include('footer.html');
?>