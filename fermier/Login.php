<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les transports</title>
    <link  href="Login.css" rel="stylesheet">

	
</head>
<body>
	<br><br><br>
    <?php
 include "Config.php";

$text = '';
$message = '';


  if(isset($_POST['Sign_Up'])){

	$Name= mysqli_real_escape_string($con,$_POST['Name']);
	$Email= mysqli_real_escape_string($con,$_POST['Email']);
	$Password= mysqli_real_escape_string($con,md5($_POST['Password']));
	$Num = (int) $_POST['Num'];
	$Nomferme= mysqli_real_escape_string($con,$_POST['Nomferme']);
	$address= mysqli_real_escape_string($con,$_POST['address']);
	
 


	$select = mysqli_query($con, "SELECT * FROM `fermier` WHERE Email = '$Email' and Password='$Password'") or die('Query failed');

	if(mysqli_num_rows($select) > 0){
	  $text= 'المستخدم موجود بالفعل!';
	}
	else{


    $sqls ="insert into fermier (Name, Email, Password, Num, Nomferme, address) values ('$Name','$Email','$Password',$Num,'$Nomferme','$address')";
    mysqli_query($con,$sqls);
	$message = 'لقد تم تسجيلك الآن بنجاح!';
	
  }
  
}
    ?>
	<br>
	<div class="chou">
    <h5><?php echo $message ;?></h5>
<h5 style="color: red;"><?php echo $text ;?></h5>
</div>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>إنشاء حساب</h1>
			<h> استخدم بريدك الإلكتروني للتسجيل</h>
			<input type="text" placeholder="Name" name="Name" id="Name"required >
			<input type="email" placeholder="Email" name="Email" id="Email" required>
			<input type="password" placeholder="Password" name="Password" id="Password" required 
       pattern="^(?=.*[A-Za-z])(?=.*\d)(?=(?:.*[?!#:]){1,}).{6,}$"
       title="(: ? # !)يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل، تتضمن أرقامًا، حروفًا، وعلى الأقل علامة من ">
             <input type="tel" placeholder="Telephone" name="Num" id="Num" pattern="[0-9]{10}" maxlength="10" required title="الرجاء إدخال 10 أرقام ">

			<input type="text" placeholder="Nomferme" name="Nomferme" id="Nomferme" required>
			<input type="text" placeholder="address" name="address" id="address" required>
			<br>
			<button name="Sign_Up">إنشاء حساب</button> 
			<br>
		</form>
	</div>
	<div class="form-container sign-in-container">
<?php
session_start();
include "Config.php"; 

 $mes ='';
if (isset($_POST['Sign_In'])) {

    $Email1 = mysqli_real_escape_string($con, $_POST['Email']);
    $Password1 = mysqli_real_escape_string($con, md5($_POST['Password']));

    
    $verification = mysqli_query($con, "SELECT * FROM `fermier` WHERE Email = '$Email1' AND Password = '$Password1'") or die('Query failed');

    if (mysqli_num_rows($verification) > 0) { 
        $row = mysqli_fetch_assoc($verification);
        $_SESSION['user_id'] = $row['ID'];  

        
        header("Location: fermier.php");
        exit(); 
    } else {
        $mes =  "المستخدم غير موجود، يرجى التسجيل أولاً.";
    }
}
?>
		<form action="" method="Post">
			<h5 style="text-align: center; color: red;"><?php echo $mes; ?></h5>
			<h1>تسجيل الدخول</h1>
			<span>أو استخدم حسابك</span>
			<input type="email" placeholder="Email" name="Email" required>
			<input type="password" placeholder="Password" name="Password" required>
			
			<button name="Sign_In">تسجيل الدخول</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>مرحبًا بعودتك</h1>
				<p>للبقاء على تواصل معنا، يرجى تسجيل الدخول باستخدام معلوماتك الشخصية.</p>
				<button class="ghost" id="signIn">تسجيل الدخول</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>مرحبًا، صديقي</h1>
				<p>أدخل معلوماتك الشخصية وابدأ رحلتك معنا</p>
				<button class="ghost" id="signUp">إنشاء حساب</button>

			</div>
		</div>
	</div>
</div>
<script src="Login.js"></script>

<br><hr>
</body>
</html>