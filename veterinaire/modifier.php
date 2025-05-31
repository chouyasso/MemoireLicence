<?php
session_start();
include "Config.php";


if (!isset($_SESSION['user_id'])) {
    header('Location: Login-vet.php');
    exit();
}

if (!isset($_GET['ID'])) {
    echo "معرف غير صالح.";
    exit();
}

$id_con = $_GET['ID'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accept = $_POST['accept'];
    $confarmation_de_date = $_POST['confarmation_de_date'];
    $nouvaeu_date = $_POST['nouvaeu_date'];
    $raison = $_POST['raison'];
    $prix = $_POST['prix'];
    $num = $_POST['num'];
    $notes = $_POST['notes'];

    $sql = "UPDATE rep_con SET 
            accept = '$accept', 
            confarmation_de_date = '$confarmation_de_date', 
            nouvaeu_date = '$nouvaeu_date',
            Raison_du_rendez_vous = '$raison',
            Prix = '$prix',
            Num = '$num',
            notes = '$notes'
            WHERE ID_con = $id_con";

    if (mysqli_query($con, $sql)) {
        echo "تم التعديل بنجاح. <a href='historiy_con.php'>العودة إلى القائمة</a>";
        exit();
    } else {
        echo "خطأ في التعديل: " . mysqli_error($con);
    }
}


$sql = "SELECT * FROM rep_con WHERE ID_con = $id_con";
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "السجل غير موجود.";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل الرد</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        direction: rtl;
        background-color: #f0f4f7;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 30px;
    }

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #bdc3c7;
        border-radius: 6px;
        font-size: 16px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    textarea:focus {
        border-color: #3498db;
        outline: none;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    button[type="submit"] {
        background-color: #3498db;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        display: block;
        margin: 20px auto 0;
    }

    button[type="submit"]:hover {
        background-color: #2980b9;
    }

    a {
        color: #3498db;
        text-decoration: none;
        display: inline-block;
        margin-top: 15px;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        form {
            padding: 20px;
        }
    }
</style>
</head>
<body>

<h2 style="text-align:center;">  Modification de la réponse de consultation </h2>

<form method="post">
    <label>Acceptation de la demande :</label>
    <input type="text" name="accept" value="<?php echo $row['accept']; ?>">

    <label>Confirmation du rendez-vous :</label>
    <input type="text" name="confarmation_de_date" value="<?php echo $row['confarmation_de_date']; ?>">

    <label>Nouvelle date :</label>
    <input type="date" name="nouvaeu_date" value="<?php echo $row['nouvaeu_date']; ?>">

    <label>Confirmation de l'état :</label>
    <input type="text" name="raison" value="<?php echo $row['Raison_du_rendez_vous']; ?>">

    <label>Prix :</label>
    <input type="text" name="prix" value="<?php echo $row['Prix']; ?>">

    <label>Numéro de téléphone :</label>
    <input type="text" name="num" value="<?php echo $row['Num']; ?>">

    <label>Remarques :</label>
    <textarea name="notes"><?php echo $row['notes']; ?></textarea>

    <button type="submit">Mettre à jour</button>
</form>

</form>

</body>
</html>
