<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب تطعيم الحيوانات</title>
    <link rel="stylesheet" href="demandeconn.css">
</head>

<body>
<?php
session_start();
include "Config.php"; 


if (!isset($_SESSION['user_id'])) {
    header("Location: demande_consultation.php");
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

echo "<h2>مرحبًا " . htmlspecialchars($user['Name']) . "</h2>";
$ID = $user['ID'];
?>

<?php

if (isset($_POST['Sign_Up'])) {
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $Wilaya = mysqli_real_escape_string($con, $_POST['Wilaya']);
    $Raison_du_rendez_vous = mysqli_real_escape_string($con, $_POST['Raison_du_rendez_vous']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $Zone = mysqli_real_escape_string($con, $_POST['Zone']);
    $vet_id = (int) $_POST['vet_id'];
    $Deja_consulte = mysqli_real_escape_string($con, $_POST['Deja_consulte']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $ID = mysqli_real_escape_string($con, $_POST['id']);
    $quantity = (int) $_POST['quantity'];
    $breed = mysqli_real_escape_string($con, $_POST['breed']);

      if (strtotime($date) < strtotime(date('Y-m-d'))) {
        echo "لا يمكنك اختيار تاريخ في الماضي.";
        exit();
    }

  else{  $sql = "INSERT INTO demande_consultation 
            (Name, phone, Wilaya, Email, Raison_du_rendez_vous, Zone, Deja_consulte, date, vet_id, ID_fermier, quantity, breed) 
            VALUES 
            ('$Name', '$phone', '$Wilaya','$Email','$Raison_du_rendez_vous', '$Zone', '$Deja_consulte', '$date', $vet_id, '$ID', $quantity, '$breed')";

    if (mysqli_query($con, $sql)) {
        header('Location: confirmation.php');
        exit();
    } else {
        echo "حدث خطأ أثناء التسجيل: " . mysqli_error($con);
    }
}
}
?>

<div class="container">
    <h2>طلب حجز موعد</h2>
    <form action="" method="post">
        <input type="text" placeholder="الاسم الكامل" id="Name" name="Name" required><br><br>
        <input type="tel" placeholder="رقم الهاتف" id="phone" name="phone" required><br><br>
        <input type="email" placeholder="البريد الإلكتروني" name="Email" id="Email" required><br><br>
        <input type="text" placeholder="الولاية" id="Wilaya" name="Wilaya" required><br><br>

        <label for="breed">السلالة (للأبقار فقط):</label>
        <select id="breed" name="breed" required>
            <option value="">اختر السلالة</option>
            <option value="هولشتاين">هولشتاين</option>
            <option value="مونبيليارد">مونبيليارد</option>
            <option value="سيمينتال">سيمينتال</option>
            <option value="بنية جزائرية">بنية جزائرية</option>
        </select><br><br>

        <label for="quantity">عدد الأبقار:</label>
        <input type="number" placeholder="العدد" id="quantity" name="quantity" required><br><br>

        <label for="Raison_du_rendez_vous">سبب الحجز:</label>
        <select id="Raison_du_rendez_vous" name="Raison_du_rendez_vous" required>
            <option value="">اختر السبب</option>
            <option value="فحص عام">فحص عام</option>
            <option value="علاج مرض">علاج مرض</option>
            <option value="استشارة تغدية">استشارة تغدية</option>
            <option value="طلب  تلقيح اصطناعي ">طلب  تلقيح اصطناعي </option>
            <option value="متابعة الولادات ">متابعة الولادات</option>
            
        </select><br><br>

        <label for="Zone">المنطقة:</label>
        <input type="text" placeholder="المنطقة" id="Zone" name="Zone" required><br><br>

        <label for="Deja_consulte">هل سبق المعاينة او الطلب ؟</label>
        <select id="Deja_consulte" name="Deja_consulte" required>
            <option value="">اختر</option>
            <option value="نعم">نعم</option>
            <option value="لا">لا</option>
        </select><br><br>

        <label for="date">الموعد المفضل:</label>
        <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">
<br><br>
        

        <label for="vet_id">اختر البيطري:</label>
        <select id="vet_id" name="vet_id" required>
   <?php
   $query="select * from veterinaire";
   $result=mysqli_query( $con, $query);
   while( $row=mysqli_fetch_array( $result)){
      ?>
      <option value=" <?php echo  $row['ID'];?>"><?php echo $row['Name'];?></option>
      <?php } ?>
</select><br><br>

        <input type="hidden" name="id" value="<?php echo $ID; ?>">
        

        <button name="Sign_Up" class="Sign_Up">ارسال</button>
        <a href="consultation.php" class="return" style="text-decoration: none;">العودة</a>
    </form>
</div>

</body>
</html>
