<?php include "../includes/dbconfig.inc"; ?>
<?php  //Start the Session
session_start();
 
   /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);
  


if (isset($_POST['username']) and isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM `USERS` WHERE USERNAME='$username' and PASSWORD='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
$_SESSION['username'] = $username;
}else{

$fmsg = "Invalid Login Credentials.";
}
}

if (isset($_SESSION['username'])){
header("Location: /");
 
}else{

?>
<html>
<head>
		<title>Login</title>
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
		
		    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px;    margin-left: auto;
    margin-right: auto; }
    </style>
</head>
<body class="Register">

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
	<div id="main">
	
	<div class="container">
	<div class="wrapper">

        <h2>Please Login.</h2>
      <form class="form-signin" method="POST">
	  
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	  
	  
			<div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>  
			
			<div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            </div> 	


            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Confirm">
				<a class="btn btn-default" href="register.php">Register</a>
            </div>			
			
      </form>
	</div>

	</div>




	</div>

</body>
 
</html>
<?php } ?>