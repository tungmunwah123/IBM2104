<?php

	if (isset($_POST['submitted']) && $_POST['submitted'] == 'true') {

		if (isset($_POST['userID']) && empty($_POST['userID'])) {

			// display error message (userID is empty)
			echo "<script type='text/javascript'>
			alert('Error: Please enter your userID.');
			history.go(-1);
			</script>";

		} else if (isset($_POST['password']) && empty($_POST['password'])) {

			// display error message (password is empty)
			echo "<script type='text/javascript'>
			alert('Error: Please enter your password.');
			history.go(-1);
			</script>";

		} 
		else if (isset($_POST['email']) && empty($_POST['email'])) {

			// display error message (email is empty)
			echo "<script type='text/javascript'>
			alert('Error: Please enter your email.');
			history.go(-1);
			</script>";

		} else if (
		(isset($_POST['day']) && empty($_POST['day'])) ||
		(isset($_POST['month']) && empty($_POST['month'])) ||
		(isset($_POST['year']) && empty($_POST['year']))
		) {

			// display error message (date of birh is empty)
			echo "<script type='text/javascript'>
			alert('Error: Please enter your date of birth.');
			history.go(-1);
			</script>";

		} else if (
		(isset($_POST['day']) && !empty($_POST['day'])) ||
		(isset($_POST['month']) && !empty($_POST['month'])) ||
		(isset($_POST['year']) && !empty($_POST['year']))
		) {

			$userDOB = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];

			// convert to date format
			$dateOfBirth = date($userDOB);
			$dateNow = date('d-m-Y');

			// compare the time, show the message if date of birth greater than current date
			if (strtotime($dateOfBirth) >= strtotime($dateNow)) {

				// display error message (invalid date of birth)
				echo "<script type='text/javascript'>
				alert('Error: Invalid date of birth. Please try again.');
				history.go(-1);
				</script>";

			} else {

				//to connect to database
				$connection = new mysqli ('localhost','root','','health');
				$login = $connection -> prepare(					//to reject SQL injection
				'INSERT INTO user (UserID,Password,Email,Birthday) VALUES(?,?,?,?);');

				$birthday = ($_POST['day'] . '/' . $_POST['month'] . '/' . $_POST['year']);
				$login -> bind_param('ssss',$_POST['userID'],$_POST['password'],$_POST['email'],$birthday);
				
				
				if ($login -> execute()) {
				
					$affectedRow = $login -> affected_rows;
					
					$login -> close();
					$connection -> close();
					
					if($affectedRow == 1){
						echo"<script type = 'text/javascript'>
						alert('Your account has been created successfully');
						window.top.location='signin.php';
						</script>";	
					}
					else{
						echo"<script type = 'text/javascript'>
						alert('The userID has been used');
						window.top.location='register.php';
						</script>";			
					}

				} else {
					$login->close();
					$connection->close();
					
					echo"<script type = 'text/javascript'>
					alert('The userID has been used');
					window.top.location='register.php';
					</script>";
					$login->close();
					$connection->close();
				}
			}
		}
		
	} else {

include 'header.php';
?>
   <!-- Start Register section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="contact-left wow fadeInLeft">
            <h2>Register</h2>
            <form action="register.php" class="contact-form" method="post">
              <div class="form-group">                
                <input type="text" name="userID" class="form-control" placeholder="UserID">
              </div>
              <div class="form-group">                
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>  
              
             <div class="row mt-4">
            <div class="col">
			Birthday:
			<select name="day">
              <option value="">Day</option>
              <?php
              for($d=1; $d<=31; $d++){
                  echo"<option value=\"$d\">$d</option>\n";
                }
               ?>		
              </select>			
			  
              <select name="month">
              <option value="">Month</option>
              <?php
              for($m=1; $m<=12; $m++){
                  echo"<option value=\"$m\">$m</option>\n";
                }
               ?>		
              </select>		

              <select name="year">
              <option value="">Year</option>
              <?php
              for($y=1900; $y<=2018; $y++){
                  echo"<option value=\"$y\">$y</option>\n";
                }
               ?>		
              </select>					  
			  </div>
              <br>			  
              <div class="form-group">
               <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
			  <input type='hidden' name="submitted" value='true'>
              <button type="submit" data-text="SUBMIT" class="button button-default"><span>SUBMIT</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Register section -->

<?php
include('footer.html');
  }
?>