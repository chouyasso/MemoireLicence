<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="css/vetitiner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
    
<body>
     <?php
session_start();
include "Config.php"; 


if (!isset($_SESSION['user_id'])) {
    header("Location: Login-vet.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($con, "SELECT * FROM veterinaire WHERE ID = '$user_id'") or die('Query failed');

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
                <a class="active" href="#">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>

            <li>
                <a href="vue_demande_consultation.php">
                    <i class="fas fa-table"></i>
                    <p>Vue Consultation</p>
                </a>
            </li>

            <li>
                <a href="vue_demande_vac.php">
                    <i class="fa-solid fa-eye-dropper"></i>
                    <p> Vue Demande Vacci</p>
                </a>
            </li>
            <li>
                <a href="historiy_vac.php">
                   <i class="fa-solid fa-clock-rotate-left"></i>
                    <p>historiqe </p>
                </a>
            </li>


            <li class="log-out">
                <a href="../index1.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Log out</p>
                </a>
            </li>
        </ul>
    </div>
   
    <div class="content">
        <div class="title-info">
            <h2>Bonjour cher docteur, vos patients vous attendent avec impatience.</h2>
        </div>
        <br><br>
        <div class="data-info">
            <div class="box">
                <div class="imge-box">
                    <img src="image/yasso.tun.jpg" alt="profile">
                </div>
                <br><br><br><br><br><br><br><br>
                <div class="data" style="margin-top: 25px;">
                    <h2>Soigner n’est pas seulement guérir le corps, c’est élever l’âme — comme les sages de Rome, vous portez la lumière dans l’ombre. »
                    </h2>
                </div>
            </div>
        </div>
    </div>

</body>
</html>