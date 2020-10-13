<!DOCTYPE HTML>

<html>
	<head>
		<title>Simple Demo Cars Website</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<p style="color:#FFF;font-size:350%;">Hello From Tech Wizards</p>
						<span></span>
						<span></span>
						<span></span>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="active"><a href="/">Home</a></li>
							<li><a href="register.php">Sign up</a></li>
							<li><a href="login.php">Sign in</a></li>
							<li><a href="justalink.html">Just another link</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->
			
	<!-- Main -->
		<div id="main">
			<div class="container">
				<header>
				
				






        <?php  
		session_start(); 
		if (isset($_SESSION['username'])) : ?> 
            <p style="color:blue; font-size: 300%;"> 
                Welcome  
                <strong> 
                    <?php echo $_SESSION['username']; ?> 
                </strong> 
            </p> 
        <?php endif ?> 


		
				
				
				
				
					<h2>News and Events</h2>
				</header>
				<div class="row">
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic01.jpg" alt="" /></a>
							<p>Hello, this is a simple website demo created by group3 tech wizards.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic02.jpg" alt="" /></a>
							<p>This a simple dynamic website using MySQL as Database engine.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic03.jpg" alt="" /></a>
							<p>This demo website contains a simple registration and login system.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic04.jpg" alt="" /></a>
							<p>Hello, this is a simple website demo created by group3 tech wizards.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
				</div>
				<div class="divider">&nbsp;</div>
			
			</div>
			
						<div class="container">
				<header>
					<h2>Parts & Accessories</h2>
				</header>
				<div class="row">
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic05.jpg" alt="" /></a>
							<p>This a simple dynamic website using MySQL as Database engine.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic06.jpg" alt="" /></a>
							<p>Hello, this is a simple website demo created by group3 tech wizards.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic07.jpg" alt="" /></a>
							<p>Hello, this is a simple website demo created by group3 tech wizards.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
					<div class="3u">
						<section>
							<a href="#" class="image full"><img src="images/pic08.jpg" alt="" /></a>
							<p>This demo website contains a simple registration and login system.</p>
							<a href="#" class="button">Read More</a>
						</section>
					</div>
				</div>
				<div class="divider">&nbsp;</div>
			
			</div>
		</div>
	<!-- Main -->

	</body>
</html>