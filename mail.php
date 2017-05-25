<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'mtang8264@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contact - WE Advocate Mental Health</title>
		
		<link rel="stylesheet"
			type="text/css"
			href="myStyle.css"/>
	</head>

	<body>
		<!-- logo and navigation -->
		<a href="index.html"><img src="assets/logo.jpg" alt="Logo" id="logo"></a>
		<br>
		<table style="display: block; width: 100%; overflow-x: auto;">
			<td id="navitem">
				<a href="index.html"><h3>Home</h3></a>
			</td>
			<td id="navitem">
				<a href="resources.html"><h3>Resources</h3></a>
			</td>
			<td id="navitem">
				<a href="team.html"><h3>Our Team</h3></a>
			</td>
			<td id="navitem">
				<a href="blog.html"><h3>Team Blog</h3></a>
			</td>
			<td id="navitem">
				<a href="contact.html"><h3>Contact</h3></a>
			</td>
		</table>
		
		<!-- contents -->
		<p id="spacebar"></p>
    
      		<div style="padding-left: 20px">
			<form class="form-horizontal" role="form" method="post" action="index.php">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
			<?php echo "<p class='text-danger'>$errName</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
			<?php echo "<p class='text-danger'>$errEmail</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
			<?php echo "<p class='text-danger'>$errMessage</p>";?>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
			<?php echo "<p class='text-danger'>$errHuman</p>";?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<?php echo $result; ?>	
		</div>
	</div>
</form>
		</div>
		<br>
		<br>
		
		<!-- footer -->
		<div style="background-color: #00a9e7; height: 125px; max-width: 200% !important; position: relative;">
			<div id="footy" style="max-width: 200% !important">
				<p id="foot">
					&copy;2017 Michael Tang | Philadelphia, PA
				</p>
				<p id="foot">
					<a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
					|&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="resources.html">Resources</a>&nbsp;&nbsp;&nbsp;&nbsp;
					|&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="team.html">Our Team</a>&nbsp;&nbsp;&nbsp;&nbsp;
					|&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="blog.html">Team Blog</a>&nbsp;&nbsp;&nbsp;&nbsp;
					|&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="log.html">Full Activity Log</a>
				</p>
				<p id="foot">
					<a href="contact.html">Contact</a>
				</p>
				<br>
				<br>
				<br>
			</div>
		</div>
  </body>
</html>
