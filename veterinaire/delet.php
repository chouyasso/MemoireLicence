<?php
include "Config.php";

// التأكد من وجود المعرف في الرابط
if (isset($_GET['ID'])) {
    $ID = intval($_GET['ID']); // تأمين من الحقن

    // تنفيذ الحذف
    $sql = "DELETE FROM demande_consultation WHERE ID = $ID";
    if (mysqli_query($con, $sql)) {
        // إعادة التوجيه بعد الحذف
        header("Location: vue_demande_consultation.php"); // عدّل الاسم حسب اسم صفحتك الرئيسية
        exit();
    } else {
        echo "حدث خطأ أثناء الحذف: " . mysqli_error($con);
    }
} else {
    echo "معرّف غير موجود.";
}
?>
