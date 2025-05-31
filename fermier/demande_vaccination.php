<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب تطعيم الحيوانات</title>
    <link rel="stylesheet" href="demandevac.css">
    
</head>
<body>
<?php
session_start();
include "Config.php"; 
if (!isset($_SESSION['user_id'])) {
    header("Location: demande_vaccination.php");
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



$ID=$user['ID'];



?>
<?php




include "Config.php";


if (isset($_POST['Sign_Up'])) {
    
    
    $farmer_name = mysqli_real_escape_string($con, $_POST['farmer_name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $breed = mysqli_real_escape_string($con, $_POST['breed']);
    $age = (int) $_POST['age'];
    $quantity = (int) $_POST['quantity'];
   
    $date = mysqli_real_escape_string($con, $_POST['date']); 
    $notes = mysqli_real_escape_string($con, $_POST['notes']);
    $vet_id = (int) $_POST['vet_id'];
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $Email = mysqli_real_escape_string($con, string: $_POST['Email']);
    $ID = mysqli_real_escape_string($con, $_POST['id']);

     if (strtotime($date) < strtotime(date('Y-m-d'))) {
        echo "لا يمكنك اختيار تاريخ في الماضي.";
        exit();
    }

  else {
    $sql = "INSERT INTO demande_vaccination 
        (farmer_name, phone, location, breed, Email, age, quantity, date, notes, vet_id ,ID_fermier) 
        VALUES 
        ('$farmer_name', '$phone', '$location', '$breed', '$Email', $age, $quantity, '$date', '$notes', $vet_id, $ID)";

    // تنفيذ الاستعلام
    if (mysqli_query($con, $sql)) {
        // تم التسجيل بنجاح
        header('Location: confirmation22.php');
        exit();
    } else {
        // خطأ في الاستعلام
        echo "حدث خطأ أثناء التسجيل: " . mysqli_error($con);
    }

  }
    
}
?>


<div class="container">
    <h2>طلب تطعيم الحيوانات</h2>
    <form action="" method="post">
        
       
       <input type="text" placeholder="الاسم الكامل"  id="farmer_name" name="farmer_name" required><br><br>
<input type="tel" placeholder="رقم الهاتف" id="phone" name="phone" required><br><br>
<input type="email" placeholder="البريد الإلكتروني" name="Email" id="Email" required><br><br>
<input type="text" placeholder="الموقع" id="location" name="location" required><br>

<label for="breed">السلالة (للأبقار فقط):</label>
<select id="breed" name="breed" required>
    <option value="">اختر السلالة</option>
    <option value="هولشتاين">هولشتاين</option>
    <option value="مونبيليارد">مونبيليارد</option>
    <option value="سيمينتال">سيمينتال</option>
    <option value="بنية جزائرية">بنية جزائرية</option>
</select>

<label for="age">عمر الحيوان (بالأشهر):</label>
<input type="number" placeholder="العمر بالأشهر" id="age" name="age" required>

<label for="quantity">عدد الحيوانات:</label>
<input type="number" placeholder="العدد" id="quantity" name="quantity" required>
       

        <label for="date">الموعد المفضل للتطعيم:</label>
         <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">

        <label for="notes">ملاحظات إضافية:</label>
        <textarea id="notes" name="notes" rows="3"></textarea>

        
      
<label for="vet_id">اختر البيطري:</label>
<select id="vet_id" name="vet_id" required>
   <?php
   $query="select * from veterinaire";
   $result=mysqli_query( $con, $query);
   while( $row=mysqli_fetch_array( $result)){
      ?>
      <option value=" <?php echo  $row['ID'];?>"><?php echo $row['Name'];?></option>
      <?php } ?>
</select>

<input type="text" readonly name="id" value="<?php echo $ID   ?>" style="display: none;">

<button name="Sign_Up" class="Sign_Up">ارسال</button>

<a href="Vaccination.php" class="return" style="text-decoration: none;">العودة</a>

    </form>
    
</div>

</body>
</html>