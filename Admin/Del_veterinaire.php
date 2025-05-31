<?php
include "config.php";

if (isset($_GET['ID'])) {
    $ID = intval($_GET['ID']); 

   
    $sql = "DELETE FROM veterinaire WHERE ID = $ID";
    if (mysqli_query($con, $sql)) {
        
        header("Location: list_veterinaire.php"); 
        exit();
    } else {
        echo "حدث خطأ أثناء الحذف: " . mysqli_error($con);
    }
} else {
    echo "معرّف غير موجود.";
}
?>
