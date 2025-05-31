<?php
include "Config.php";


if (isset($_GET['ID'])) {
    $ID = intval($_GET['ID']); 

    
    $sql = "DELETE FROM demande_vaccination WHERE ID = $ID";
    if (mysqli_query($con, $sql)) {
   
        header("Location: vue_demande_vac.php"); 
        exit();
    } else {
        echo "حدث خطأ أثناء الحذف: " . mysqli_error($con);
    }
} else {
    echo "معرّف غير موجود.";
}
?>
