<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les </title>
    <link  href="css/login_admin.css" rel="stylesheet">

	
</head>
<body>
    
<div class="container" id="container">
	
	
<?php
session_start();
include "config.php"; 

if (isset($_POST['Sign_In'])) {

    $Email1 = mysqli_real_escape_string($con, $_POST['Email']);
    $Password1 = mysqli_real_escape_string($con, $_POST['Password']);

    
    $verification = mysqli_query($con, "SELECT * FROM `admin` WHERE Email = '$Email1' AND Password = '$Password1'") or die('Query failed');

    if (mysqli_num_rows($verification) > 0) { 
        $row = mysqli_fetch_assoc(result: $verification);
        $_SESSION['user_id'] = $row['ID']; 

        
        header("Location: Admin.php");
        exit(); 
    } else {
        echo "User not found, please register first.";
    }
}
?>
		<form action="" method="Post">
			<h1 style="text-align: center;">Welcom</h1>
		<br><br><br>
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="Email" required>
			<input type="password" placeholder="Password" name="Password" required>
			
			<button name="Sign_In">Sign In</button>
		</form>

	</div>



<br><hr>
</body>
</html>