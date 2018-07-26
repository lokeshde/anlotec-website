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
	$subject = 'Message from Anlotec';
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


<!DOCTYPE HTML>
<html>
	<head>
		<title>Anlotec</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="#header" id="logo">Anlotec</a></h1>
							<hr />
							<p>Solving Problems, Delivering Solutions.</p>
						</header>
						<footer>
							<!-- <a href="#banner" class="button circled scrolly">Start</a> -->
						</footer>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#services">SERVICES</a></li>
							<li><a href="#aboutUs">ABOUT US</a></li>
							<li><a href="#contactUs">CONTACT US</a></li>
						</ul>
					</nav>

				</div>

				<!-- Features -->
				<div class="wrapper style" id="services">

					<section id="features" class="container special">
						<header>
							<h2>
								<strong>Services</strong>
							</h2>
						</header>
						<div class="row">
							<article class="col-4 col-12-mobile special">
								<header>
									<h3><strong>Consulting</strong></h3>
								</header>
								<span class="fa-stack fa-4x" style="text-align: center; display: inline-block; width: 100%">
									<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
									<i class="fa fa-lightbulb-o fa-stack-1x "></i>
								</span>
								<p style="text-align: center">
									ERP Implementation<br>
									Application Development<br>
								</p>
							</article>
							<article class="col-4 col-12-mobile special">
								<header>
									<h3><strong>Support</strong></h3>
								</header>
								<span class="fa-stack fa-4x" style="text-align: center; display: inline-block; width: 100%">
									<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
									<i class="fa fa-desktop fa-stack-1x "></i>
								</span>
								<p style="text-align: center">
									Applications Maintenance<br>
									Quality Control<br>
								</p>
							</article>
							<article class="col-4 col-12-mobile special">
								<header>
									<h3><strong>Architecture</strong></h3>
								</header>
								<span class="fa-stack fa-4x" style="text-align: center; display: inline-block; width: 100%">
									<!-- <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
									<i class="fa fa-institution fa-stack-1x "></i>
								</span>
								<p style="text-align: center">
									Enterprise Solutions<br>
									Mobile Solutions<br>
								</p>
							</article>
						</div>
					</section>

				</div>


			<!-- Main -->
				<div class="wrapper style1" id="aboutUs">

					<article id="main" class="container special">
						<header>
							<h2><strong>About Us</strong></h2>
						</header>
						<p style="text-align: center">
							Welcome to Anlotec,  We are committed to helping our customers achieve their business objectives.<br>
							We are professional consulting company that specializes in SAP technologies.  We help our customers 
							worldwide drive business optimization, digital innovation via design thinking, rapid prototyping and 
							iterative development. <br>
							Our consultants have decades of technical, managerial, architectural experience with Fortune 500 
							clients across all industries. We have implemented state-of-the-art solutions on multiple lifecycle 
							implementations.<br> 
							We have delivered successfully using methodologies such as CMM, PMI and Agile.<br>
							Our expertise spans diverse industries including Healthcare, Public Sector, Insurance, Commercial, 
							Chemical, Financial, and Higher Education.<br>
							We work closely with our customers as trusted partner. We pride ourselves on our experience, integrity 
							and commitment to delivering the right solution.<br>
						</p>
					</article>
				</div>

				<div id="contactUs" class="wrapper">
					<article id="main" class="container special">
                        <div>
                            <header>
                                <h2 style="text-align: center">
                                    <strong>Contact Us</strong>
                                </h2>
                            </header>
                            <?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
                                <p class="warning">Sorry, your mail couldn't be sent</p>
                            <?php elseif ($errors && $missing) : ?>
                                <p class="warning">Please fix the item(s) indicated</p>
                            <?php endif; ?>
                        </div>
						<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form">
							<div class="row">
                                <div class="form-group col-6 col-12-mobile">
                                    <input class="form-control" type="text" name="name" placeholder="First Name*" required="required" maxlength="50" data-error="First name is required"
                                        <?php
                                        if ($errors || $missing) {
                                            echo 'value="' .htmlentities($name). '"';
                                        }
                                        ?>
                                    />
                                    <div class="help-block with-errors"></div>
								</div>
                                <div class="form-group col-6 col-12-mobile">
									<input class="form-control" type="text" name="surname" placeholder="Last Name*" maxlength="50" required="required" data-error="Last name is required"
                                        <?php
                                        if ($errors || $missing) {
                                            echo 'value="' .htmlentities($surname). '"';
                                        }
                                        ?>
                                    />
                                    <div class="help-block with-errors"></div>
								</div>
                                <div class="form-group col-6 col-12-mobile">
									<input type="email" name="email" placeholder="Email*" class="form-control" maxlength="254" required="required" data-error="Valid email is required"
                                        <?php
                                        if ($errors || $missing) {
                                            echo 'value="' .htmlentities($email). '"';
                                        }
                                        ?>
                                    />
                                    <div class="help-block with-errors"></div>
								</div>
                                <div class="form-group col-6 col-12-mobile">
									<input class="form-control" type="tel" name="phone" placeholder="10-digit phone number" pattern="\d{10}" maxlength="10"
                                        <?php
                                        if ($errors || $missing) {
                                            echo 'value="' .htmlentities($phone). '"';
                                        }
                                        ?>
                                    />
                                    <div class="help-block with-errors"></div>
								</div>
                                <div class="form-group col-12">
									<textarea class="form-control" name="comments" placeholder="Message for us*" required="required" data-error="Please leave us a message" maxlength="1000">
                                        <?php
                                        if ($errors || $missing) {
                                            echo htmlentities($message);
                                        }
                                        ?>
                                    </textarea>
                                    <div class="help-block with-errors"></div>
								</div>
								<div class="col-12">
									<input name="send" id="send" type="submit" value="Send Message" />
								</div>
							</div>
						</form>

					</article>
				</div>

			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">

							<!-- Tweets -->
								<!-- <section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon fa-twitter circled"><span class="label">Tweets</span></h2>
									</header>
									<ul class="divided">
										<li>
											<article class="tweet">
												Amet nullam fringilla nibh nulla convallis tique ante sociis accumsan.
												<span class="timestamp">5 minutes ago</span>
											</article>
										</li>
										<li>
											<article class="tweet">
												Hendrerit rutrum quisque.
												<span class="timestamp">30 minutes ago</span>
											</article>
										</li>
										<li>
											<article class="tweet">
												Curabitur donec nulla massa laoreet nibh. Lorem praesent montes.
												<span class="timestamp">3 hours ago</span>
											</article>
										</li>
										<li>
											<article class="tweet">
												Lacus natoque cras rhoncus curae dignissim ultricies. Convallis orci aliquet.
												<span class="timestamp">5 hours ago</span>
											</article>
										</li>
									</ul>
								</section> -->

							<!-- Posts -->
								<!-- <section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
									</header>
									<ul class="divided">
										<li>
											<article class="post stub">
												<header>
													<h3><a href="#">Nisl fermentum integer</a></h3>
												</header>
												<span class="timestamp">3 hours ago</span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="#">Phasellus portitor lorem</a></h3>
												</header>
												<span class="timestamp">6 hours ago</span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="#">Magna tempus consequat</a></h3>
												</header>
												<span class="timestamp">Yesterday</span>
											</article>
										</li>
										<li>
											<article class="post stub">
												<header>
													<h3><a href="#">Feugiat lorem ipsum</a></h3>
												</header>
												<span class="timestamp">2 days ago</span>
											</article>
										</li>
									</ul>
								</section> -->

							<!-- Photos -->
								<!-- <section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon fa-camera circled"><span class="label">Photos</span></h2>
									</header>
									<div class="row gtr-25">
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic13.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic14.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/pic15.jpg" alt="" /></a>
										</div>
									</div>
								</section>

						</div>
						<hr />
						<div class="row">
							<div class="col-12"> -->

								<!-- Contact -->
									<!-- <section class="contact">
										<header>
											<h3>Nisl turpis nascetur interdum?</h3>
										</header>
										<p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
											<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
										</ul>
									</section> -->

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
                                            <li>
                                                <a href="tel:+4109292626">
                                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                                    (410)929-2626
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:contact@anlotec.com">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    contact@anlotec.com
                                                </a>
                                            </li>
											<li>
                                                &copy; 2018 <a href="http://anlotec.com/">Anlotec.com</a>. All rights reserved.
                                            </li>
                                            <li>
                                                Design: <a href="http://html5up.net">HTML5 UP</a>
                                            </li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>