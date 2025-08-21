<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form name="RegForm" method="post" action="register.php" onsubmit="return ValidateEmail(document.RegForm.email)">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
		<script>
			// On form submission, alert the user that registration was successful
			$("#submitForm").click(function() {
				alert("The Form has been Submitted.");
			});
		</script>
  	</div>
	<p>
  		Already a member? <a href="login.php" class="sign-in-link">Sign in</a>
	</p>

  </form>

  <?php
    // If registration is successful, redirect to the login page
    if (isset($_POST['reg_user'])) {
        header("Location: login.php");
        exit();
    }
  ?>

</body>
<script>
			// Email validation script
			function ValidateEmail(inputText)
			{
				var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if(inputText.value.match(mailformat))
				{
					// Valid email format
				}
				else
				{
					alert("You have entered an invalid email address!");
					document.RegForm.email.focus();
					return false;
				}
			}
		</script>

</html>
