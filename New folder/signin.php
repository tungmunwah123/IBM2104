<?php
error_reporting(0);
session_start();

$_SESSION ['user'] = ' '; 
$_SESSION ['log'] = false; 
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

	  //to connect to database
	  $connection = new mysqli ('localhost','root','','health');
	  $login = $connection -> prepare(					//to reject SQL injection
	  'SELECT * FROM User
	  WHERE UserID = ?
	  AND Password = ?;');
	  
	  $login -> bind_param('ss',$_POST['userID'],$_POST['password']);
	  if ($login -> execute()){
		  $result = $login-> get_result();
		  $row = $result ->fetch_assoc();
	  if ($row['UserID'] == NULL){
		  echo "<script type='text/javascript'>
              alert('Error: Account is not existed');
              history.go(-1);
            </script>";
			$login -> close();
			$connection -> close();
	  }
	  else{
		  $login -> close();
		  $connection -> close();
		  $_SESSION['user'] = $_POST['userID'];
		  $_SESSION ['log'] = true;
		  header('location: home1.php');
		   exit();
	  }
    }
	}
	
  } else {

    include 'header.php';
?>
   <!-- Start Log In section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-left wow fadeInLeft">
            <h2>Sign In</h2>
            <form action="signin.php" class="contact-form" method="post">
              <div class="form-group">                
                <input type="text" name="userID" class="form-control" placeholder="UserID">
              </div>              
              <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
			  <input type='hidden' name="submitted" value='true'>
              <button type="submit" data-text="SUBMIT" class="button button-default"><span>SIGN IN</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Log In section -->

 <?php
include('footer.html');
  }
?>