<?php
$errors = [];
$missing = [];

$mailSent = false;
$suspect = false;
$success = false;

if (isset($_POST['send'])) {
	$expected = ['name', 'surname', 'email', 'phone', 'comments'];
	$required = ['name', 'surname', 'email',  'comments'];

	$to = 'info@anlotec.com';
	$subject = 'Message from Anlotec' ;
	$headers = [];
	$headers[] = 'From: webmaster@example.com';
	//$headers[] = 'Cc: another@example.com';
	$headers[] = 'Content-type: text/plain; charset=utf-8';
	$authorized = '-finfo@anlotec.com';
	
    require './includes/process_mail.php';

	if ($mailSent) {
	    $success = true;
		//header('Location: index.php#contactUs');
		//exit;
	}

	
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Anlotec</title>
  
  <!-- Fonts -->  
  <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,100%7CRoboto:400,700,300,100" rel="stylesheet" type="text/css">
  <!-- Icons -->  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Bootstrap -->  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <!-- Custom Stylesheet -->  
  <link rel="stylesheet" href="css/style.css">

  <script src="js/prefixfree.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body id="featured">

	<header>

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#featured"><h1>Anlotec</h1></a>
			  </div><!-- navbar-header -->
			  <div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav navbar-right">
				  <li class="hidden"><a href="#featured">Home</a></li>
				  <li><a href="#services">Services</a></li>
				  <li><a href="#aboutUs">About Us</a></li>
				  <li><a href="#contactUs">Contact Us</a></li>
				  </ul>        
			  </div><!-- collapse navbar-collapse -->
			</div><!-- container -->
		</nav>


	  <div class="carousel fade" data-ride="carousel" id="featured">
		<div class="carousel-inner fullheight">
		  <div class="item">
			<img src="images/anlotec_carousel_6.jpg" alt="anlotec_carousel_1">
			 <div class="container">
				<div class="carousel-caption">
				  <?php if (($success)){ 
							$success = "false";
							echo "<div class=\"alert alert-success\" role=\"alert\"> Thanks for contacting us! </div> ";
							} ?>

				<h1>Solving problems, delivering solutions.</h1>

				</div>
			  </div>	  
		  </div>
		</div>
	  </div>
	</header>

	  
	  <div class="page" id="services" >
		<div class="content container">
		  <h2>Services</h2>
		  <div class="row">
			<article class="service col-md-4 col-sm-6 col-xs-12">
			  <h3 >Consulting</h3>
				<span class="fa-stack fa-2x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<i class="fa fa-lightbulb-o fa-stack-1x "></i>
				</span>
		
			  <p>ERP Implementation </p>
			  <p>Application Development </p>
			</article>

			<article class="service col-md-4 col-sm-6 col-xs-12">
			  <h3 >Support</h3>
				<span class="fa-stack fa-2x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<i class="fa fa-desktop fa-stack-1x "></i>
				</span>

			  <p>Applications Maintenance </p>
			  <p>Quality Control </p>
			</article>

			<article class="service col-md-4 col-sm-6 col-xs-12">
			  <h3 >Architecture</h3>

				<span class="fa-stack fa-2x">
					<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
					<i class="fa fa-institution fa-stack-1x "></i>
				</span>

			  <p>Enterprise Solutions</p>
			  <p>Mobile Solutions</p>
			</article>

		  </div><!-- row -->   
		</div><!-- content container --> 
	  </div><!-- services page -->

	 
	  
	  <div class="page" id="aboutUs">
		<div class="content container">

			<div class="row">
				<div class="col-sm-12 ">
					<h2>About Us</h2>
				</div>	 
			</div>
		  

		  <div class="row aboutustext">
			<p class="col-md-10 col-md-offset-1">Welcome to Anlotec,  We are committed to helping our customers achieve their business objectives.</p> 
			<p class="col-md-10 col-md-offset-1">We are professional consulting company that specializes in SAP technologies.  We help our customers worldwide drive business optimization, digital innovation via design thinking, rapid prototyping and iterative development.</p> 
			<p class="col-md-10 col-md-offset-1">Our consultants have decades of technical, managerial, architectural experience with Fortune 500 clients across all industries. We have implemented state-of-the-art solutions on multiple lifecycle implementations.</p> 
			<p class="col-md-10 col-md-offset-1">We have delivered successfully using methodologies such as CMM, PMI and Agile.</p> 
			<p class="col-md-10 col-md-offset-1">Our expertise spans diverse industries including Healthcare, Public Sector, Insurance, Commercial, Chemical, Financial, and Higher Education.</p> 
			<p class="col-md-10 col-md-offset-1">We work closely with our customers as trusted partner. We pride ourselves on our experience, integrity and commitment to delivering the right solution.</p> 
		  </div><!-- row -->
		  </div><!-- container -->
	  </div><!-- About Us page -->

	  
	  <div class="page" id="contactUs">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Contact Us</h2>
					<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
					<p class="warning">Sorry, your mail couldn't be sent</p>
					<?php elseif ($errors && $missing) : ?>
					<p class="warning">Please fix the item(s) indicated</p>
					<?php endif; ?>
				</div>	 
			</div>

			<div class="row">
				<div class="col-md-8 col-md-offset-2">

				<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form">
						<div class="messages"></div>
						<div class="controls">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_name">Firstname *
											<?php if ($missing && in_array('name', $missing)) :?>
												<span class="warning">Please enter Firstname</span>
											<?php endif;?>
										</label>
										<input id="form_name" type="text" name="name" class="form-control" 
										placeholder="Please enter your firstname *" maxlength="50" required="required" data-error="Firstname is required."
										<?php 
										if ($errors || $missing) {
											echo 'value="' .htmlentities($name). '"';
										}
										?>
										>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_lastname">Lastname *
											<?php if ($missing && in_array('surname', $missing)) :?>
												<span class="warning">Please enter Lastname</span>
											<?php endif;?>
										</label>
										<input id="form_lastname" type="text" name="surname" class="form-control" 
										placeholder="Please enter your lastname *" maxlength="50" required="required" data-error="Lastname is required."
										<?php 
										if ($errors || $missing) {
											echo 'value="' .htmlentities($surname). '"';
										}
										?>
										>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_email">Email *
											<?php if ($missing && in_array('email', $missing)) :?>
												<span class="warning">Please enter Lastname</span>
											<?php elseif (isset($errors['email'])) :?>
												<span class="warning">Invalid email address</span>
											<?php endif;?>
										
										</label>
										<input id="form_email" type="email" name="email" class="form-control" 
										placeholder="Please enter your email *" maxlength="50" required="required" data-error="Valid email is required."
										<?php 
										if ($errors || $missing) {
											echo 'value="' .htmlentities($email). '"';
										}
										?>
										>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_phone">Phone</label>
										<input id="form_phone" type="tel" name="phone" class="form-control" 
										placeholder="Please enter 10 digit phone number "  maxlength="15"
										title="Phone Number "
										pattern="\d{10}"
										
										<?php 
										if ($errors || $missing) {
											echo 'value="' .htmlentities($phone). '"';
										}
										?>

										>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="form_message">Message *</label>
										<textarea id="form_message" name="comments" class="form-control" 
										placeholder="Message for me *" rows="4"  maxlength="1000" required="required" data-error="Please,leave us a message."><?php 
										if ($errors || $missing) {
											echo htmlentities($message);
										}
										?></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<input class="btn btn-primary btn-lg" value="Send message" type="submit" name="send" id="send" >
									
								</div>
							
							</div>
						</div>
					</form>
				</div>
			</div>
		  
		</div><!-- container -->
	  </div><!-- Contact Us page -->

	  </div><!-- main -->

	<footer>
	  <div class="content container-fluid">
		<div class="row">
		  <div class="col-sm-6">
		    <p>
				<a class="contact-link phone" href="tel:+4109292626">
				<i class="fa fa-phone-square" aria-hidden="true"></i>
				(410)929-2626
				</a>
			</p>
			<p>
				<a class="contact-link email" href="mailto:contact@anlotec.com">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<span>contact.anlotec@gmail.com</span>
				</a>
			</p>
<!--  		<p>Call us <span class="phone">(410)929-2626</span></p>-->			
			<p>All contents &copy; 2016 <a href="http://anlotec.com">Anlotec.com</a>. All rights reserved.</p>    
		 </div>
<!-- 		 <div class="col-sm-6">
			<nav class="navbar navbar-default" role="navigation">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#">Terms of use</a></li>
				<li><a href="#">Privacy policy</a></li>
			  </ul>
			</nav>        
		  </div>  -->
		</div>
	  </div>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/myscript.js"></script>
</body>
</html>
