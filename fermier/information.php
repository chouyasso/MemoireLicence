<?php
session_start();
include "Config.php"; 


if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}


$user_id = $_SESSION['user_id'];

$query = mysqli_query($con, "SELECT * FROM fermier WHERE ID = '$user_id'") or die('Query failed');

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
} else {
    echo "User not found.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fermier Profile</title>
    <link rel="stylesheet" href="information.css">
</head>
<body>
    <h2>مرحبًا، <?php echo htmlspecialchars($user['Name']); ?>!</h2>
    <p><strong>البريد الإلكتروني:</strong> <?php echo htmlspecialchars($user['Email']); ?></p>
    <p><strong>رقم الهاتف:</strong> <?php echo htmlspecialchars($user['Num']); ?></p>
    <p><strong>اسم المزرعة:</strong> <?php echo htmlspecialchars($user['Nomferme']); ?></p>
    <p><strong>العنوان:</strong> <?php echo htmlspecialchars($user['address']); ?></p>


   
  <a href="fermier.php">العودة</a>
  


    
</body>
</html>





		