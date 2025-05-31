
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Vaccination.css">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
    
<body>
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
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                     <img src="image/personne.jpg" alt="profile">
                </div>
                    <h2><?php echo htmlspecialchars($user['Name']); ?></h2>
            </li>

            <li>
                <a  href="fermier.php">
                    <i class="fas fa-home"></i>
                    <p>الصفحة الرئيسية</p>
                </a>
            </li>

            <li>
                <a href="information.php">
                    <i class="fas fa-user"></i>
                    <p>المعلومات الشخصية</p>
                </a>
            </li>

            <li>
                <a href="consultation.php">
                    <i class="fas fa-table"></i>
                    <p>استشارة طبية</p>
                </a>
            </li>

            <li>
                <a  class="active" href="Vaccination.php">
                    <i class="fa-solid fa-eye-dropper"></i>
                    <p>التطعيم</p>
                </a>
            </li>

            <li class="log-out">
               <a href="../index1.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>تسجيل خروج</p>
                </a>
            </li>
        </ul>
    </div>
   <div class="content">
    
        <div class="title-info">
            <h2>vaccination</h2>
        </div>
        <h1>مرحبا بك</h1>
        <br><br>
        <div class="data-info">
            <div class="box">
               <br>
                <div class="data">
                <div class="imge-box">
                    <img src="image/Vet.jpg" alt="profile">
                </div>
                <br><br><br><br><br> <br><br><br>
                    <h2 dir="rtl"  style="text-align: center; color: black;padding: 15px;">
                    بعد تقديم طلبك للحصول على التطعيم أو حجز موعد، يمكنك العودة إلى هذا القسم للاطّلاع على الرد من الطبيب البيطري. ستجد هنا حالة طلبك (مقبول، مرفوض) مع تفاصيل إضافية حول الموعد أو التعليمات الخاصةبحيواناتك

                    </h2>
                   <br><br>
                   <a href="nun.php"><button class="elegant-button">اضغط</button></a>
              

                </div>
            </div>
            <div class="box1">
               <br>
                <div class="data">
                    <br>
                    <h2 dir="rtl"  style="text-align: center; color: black; padding: 15px;">
                  عزيزي المزارع، صحة حيواناتك أساس نجاح مزرعتك!
سجّل لدى الطبيب البيطري لتحمي قطيعك، ترفع جودة الإنتاج، وتقلل الخسائر.
الفحوصات والتطعيمات المنتظمة تساعدك على الوقاية وتوفير المال.
لا تنتظر المشكلة — ابدأ الآن!

                    </h2>
                    <br><br><br><br>

  <h2>قم بالضغط على الزر الذي في الاسفل لتتمكن من ادخال معلومات حيواناتك لحجز موعد مع البيطري للتطعيم</h2>

  <br><br><br><br>
           

  <a href="demande_vaccination.php"><button class="elegant-button1" >التسجيل</button></a>

                    </h2>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
