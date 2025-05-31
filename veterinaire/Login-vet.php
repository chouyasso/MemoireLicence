<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les transports</title>
    <link  href="css/Login-vet.css" rel="stylesheet">

	
</head>
<body>
<br><br>
<div class="container" id="container">
	
	<div class="form-container sign-in-container">
<?php
session_start();
include "Config.php"; 
$message = '';

if (isset($_POST['Sign_In'])) {

    $Email1 = mysqli_real_escape_string($con, $_POST['Email']);
    $Password1 = mysqli_real_escape_string($con, md5($_POST['Password']));

   
    $verification = mysqli_query($con, "SELECT * FROM `veterinaire` WHERE Email = '$Email1' AND Password = '$Password1'") or die('Query failed');

    if (mysqli_num_rows($verification) > 0) { 
        $row = mysqli_fetch_assoc(result: $verification);
        $_SESSION['user_id'] = $row['ID']; 
      
        header("Location: vetiriner.php");
        exit(); 
    } else {
        $message= "User not found, please register first.";
    }
}
?>
		<form action="" method="Post">
			<h5 style="text-align: center; color:red"> <?php   echo $message?></h5>
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="Email" required>
			<input type="password" placeholder="Password" name="Password" required>
			
			<button name="Sign_In">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			
			<div class="overlay-panel overlay-right">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				
			</div>
		</div>
	</div>


<br><hr>
</body>
</html>