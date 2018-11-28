<?php
    if (isset($_POST['submitted']) && $_POST['submitted'] == 'true') {

    if (isset($_POST['userID']) && empty($_POST['userID'])) {
      echo "<script type='text/javascript'>
              alert('Error: Please enter your userID.');
              history.go(-1);
            </script>";


    } else if (isset($_POST['password']) && empty($_POST['password'])) {

      echo "<script type='text/javascript'>
              alert('Error: Please enter your password.');
              history.go(-1);
            </script>";

    } else {

      header('location: home.php');
	  
      exit();
    }

  } else {

    include 'header.html';
?>
   <!-- Start LogIn section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-left wow fadeInLeft">
            <h2>Sign In</h2>
            <form action="login.php" class="contact-form" method="post">
              <div class="form-group">                
                <input type="text" name="userID" class="form-control" placeholder="UserID">
              </div>           
              <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Enter Password">
              </div>
			  <input type='hidden' name="submitted" value='true'>
              <button type="submit" data-text="SUBMIT" class="button button-default"><span>SIGN IN</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->

 <?php
include('footer.html');
  }
?>