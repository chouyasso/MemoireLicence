<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les</title>
    <link  href="css/ajoute_veterinaire.css" rel="stylesheet">

	
</head>
<body>
    <?php

 include "config.php";




  if(isset($_POST['Sign_Up'])){

	$Name= mysqli_real_escape_string($con,$_POST['Name']);
	$Email= mysqli_real_escape_string($con,$_POST['Email']);
	$Password= mysqli_real_escape_string($con, md5($_POST['Password']));
	$Num = (int) $_POST['Num'];
	$Numdelicencevet= mysqli_real_escape_string($con,$_POST['Numdelicencevet']);
	$info= mysqli_real_escape_string($con , $_POST['Info']);


	$select = mysqli_query($con, "SELECT * FROM `veterinaire` WHERE Email = '$Email' AND Password = '$Password'") or die('Query failed');

	if(mysqli_num_rows($select) > 0){
	   echo 'user already exist!';
	}
	else{


    $sqls ="insert into veterinaire (Name, Email, Password, Num, Numdelicencevet , info)
	 values ('$Name','$Email','$Password',$Num,'$Numdelicencevet', '$info')";
    mysqli_query($con,$sqls);
	$message[] = 'you are now registered!';
	header('location:confarmation_veterinaire.php');
  }
  
}
    ?>
	<br><br>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>Create Account</h1>
	<br>
			<input type="text" placeholder=" Full Name " name="Name" id="Name"required >
			<input type="email" placeholder="Email" name="Email" id="Email" required>
			<input type="password" placeholder="Password" name="Password" id="Password" required 
       pattern="^(?=.*[A-Za-z])(?=.*\d)(?=(?:.*[?!#:]){1,}).{6,}$"
       title="مe mot de passe doit contenir au moins 6 caractères, incluant des chiffres, des lettres, et au moins un symbole parmi (: ? # !).">
			<input type="tel" placeholder="Telephone" name="Num" id="Num" pattern="[0-9]{10}" maxlength="10" required title="الرجاء إدخال 10 أرقام">

			<input type="text" placeholder="Num de licence vet" name="Numdelicencevet" id="Numdelicencevet" required>
		
			<textarea name="Info" id="Info" rows="3" placeholder="information" required style="width: 100%; margin-top: 8px;"></textarea>
			
			<br>
			<button name="Sign_Up">Sign Up</button>
		</form>
	</div>
</div>
	


<br>
</body>
</html>