
<?php include "../includes/dbconfig.inc"; ?>

<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the USERS table exists. */
  VerifyusersTable($connection, DB_DATABASE);
  
  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	    // Validate Full Name
    if(empty(htmlentities($_POST['FULLNAME'])))
	{
        $fullname_err = "Please enter your name.";		
    }
 
    // Validate username
    if(empty(htmlentities($_POST['USERNAME'])))
	{
        $username_err = "Please enter a username.";		
    } 
    
    // Validate password
    if(empty(htmlentities($_POST['PASSWORD'])))
	{
        $password_err = "Please enter a password.";     
    } 
	
    if(empty($username_err) && empty($password_err) && empty($fullname_err))
	{
		  /* If input fields are populated, add a row to the USERS table. */
		$full_name = htmlentities($_POST['FULLNAME']);
		$user_name = htmlentities($_POST['USERNAME']);
		$user_password = htmlentities($_POST['PASSWORD']);

		if (strlen($full_name) || strlen($user_name) || strlen($user_password)) {
		AddEmployee($connection, $full_name, $user_name, $user_password);
		}
	}

}
?>

<html>

<head>
		<title>Sign Up</title>
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
			<h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="FULLNAME" class="form-control" value="<?php echo $fullname; ?>">
                <span class="help-block"><?php echo $fullname_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="USERNAME" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="PASSWORD" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Confirm">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
	</div>

	</div>

	</div>

</body>
</html>


<?php

/* Add an User to the table. */
function AddEmployee($connection, $fullname, $username, $password) {
   $f = mysqli_real_escape_string($connection, $fullname);
   $u = mysqli_real_escape_string($connection, $username);
   $p = mysqli_real_escape_string($connection, $password);

   $query = "INSERT INTO USERS (FULLNAME, USERNAME, PASSWORD) VALUES ('$f', '$u', '$p');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding User data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyusersTable($connection, $dbName) {
  if(!TableExists("USERS", $connection, $dbName))
  {
     $query = "CREATE TABLE USERS (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 FULLNAME VARCHAR(45),
         USERNAME VARCHAR(45),
         PASSWORD VARCHAR(90)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>                        
                