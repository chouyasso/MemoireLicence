<?php
session_start();
include "Config.php";

// تحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit();
}

$fermier = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الاطلاع على الاجابة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        a.logout {
            display: inline-block;
            margin-top: 10px;
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        a.logout:hover {
            background-color: #c0392b;
        }
        .btn_rep {
            background-color: rgb(13, 189, 101);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn_del {
            background-color: rgb(240, 4, 4);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn_del a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2>طلبات التطعيم الخاصة بك</h2>

<table>
    <tr>
        <th>اسم الطبيب البيطري</th>
         <th>قبول الطلب</th>
       <th>تأكيد الموعد</th>
        <th>موعد المحدد</th>
        <th>اللقاح المتوفر</th>
        <th>السعر</th>
        <th>رقم الهاتف</th>
        <th>ملاحظات</th>
       
    </tr>

    <?php 
 
    $fermier = $_SESSION['user_id'];

    echo "<h2>مرحبًا</h2>";
   

    
    $sql = "SELECT * FROM rep_vac WHERE ID_fermier = $fermier";
        $result = mysqli_query($con, $sql);

    if (!$result) {
        die("خطأ في الاستعلام: " . mysqli_error($con));
    }

        if (mysqli_num_rows($result) == 0) {
            echo '<tr><td colspan="7" class="no-records">لا توجد سجلات لعرضها.</td></tr>';
        } else {
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
    <td><?php echo !empty($row['Nom_vet']) ? htmlspecialchars($row['Nom_vet']) : '----'; ?></td>
    <td><?php echo !empty($row['accept']) ? htmlspecialchars($row['accept']) : '----'; ?></td>
    <td><?php echo !empty($row['confarmation_de_date']) ? htmlspecialchars($row['confarmation_de_date']) : '----'; ?></td>
    <td><?php echo !empty($row['nouvaeu_date']) ? htmlspecialchars($row['nouvaeu_date']) : '----'; ?></td>
    <td><?php echo !empty($row['vac']) ? htmlspecialchars($row['vac']) : '----'; ?></td>
    <td><?php echo !empty($row['Prix']) ? htmlspecialchars($row['Prix']) : '----'; ?></td>
    <td><?php echo !empty($row['Num']) ? htmlspecialchars($row['Num']) : '----'; ?></td>
    <td><?php echo !empty($row['notes']) ? htmlspecialchars($row['notes']) : '----'; ?></td>
                   
                </tr>
            <?php endwhile;
        }
       
        mysqli_close($con);
        ?>
    </table>


<a href="consultation.php" class="logout">تسجيل الخروج</a>

</body>
</html>
