

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="fermier.css">
   
    <!-- Font Awesome CDN -->
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
                <a class="active" href="fermier.php">
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
                <a href="Vaccination.php">
                    <i class="fa-solid fa-eye-dropper"></i>
                    <p>تطعيم</p>
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
            <h2>Salutations chaleureuses aux agriculteurs</h2>
        </div>
        <br>
        <div class="data-info">
            <div class="box">
                <div class="imge-box">
                    <img src="image/téléchargement.jpg" alt="profile">
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="data" >
                    <h2>
                   <p style="color: black;"> healty farm   مرحبًا بكم في موقعنا</p>
                   <br>
                   <h2 style="color: black;">
                   نحن هنا لخدمتك وخدمة ابقارك بأفضل رعاية واهتمام. من خلال هذا الموقع، يمكنك
                    </h2>
                    <br>
                    <h2 dir="rtl"  style="text-align: center; color: black;">طلب التطعيمات بسهولة عبر نموذج مخصص وسهل الاستخدام.</h2>
                    <h2  dir="rtl"  style="text-align: center; color: black;">حجز المواعيد البيطرية في الوقت الذي يناسبك.</h2>
                    <h2  dir="rtl"  style="text-align: center; color: black;">هدفنا هو تسهيل حياتك كمربي وضمان صحة أفضل ابقارك</h2>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
