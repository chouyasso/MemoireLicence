<?php

if (isset($_GET['ID_fermier']) && isset($_GET['vet_id'])&& isset($_GET['farmer_name']) ) {
    $id_fermier = $_GET['ID_fermier'];
    $vet_id = $_GET['vet_id'];
    $farmer_name = $_GET['farmer_name'];
} else {
    echo "Impossible de trouver les identifiants";
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Vaccination des Animaux</title>
    <link rel="stylesheet" href="css/rep_vac.css">
</head>
<body>

<br><br><br>

<?php
include "Config.php";

if (isset($_POST['Sign_Up'])) { 

    $accept = mysqli_real_escape_string($con, $_POST['accept']);
    $confarmation_de_date = mysqli_real_escape_string($con, $_POST['confarmation_de_date']);
    $nouvaeu_date = mysqli_real_escape_string($con, $_POST['nouvaeu_date']);
    $vac = mysqli_real_escape_string($con, $_POST['vac']);
    $Prix = mysqli_real_escape_string($con, $_POST['Prix']);
    $notes = mysqli_real_escape_string($con, $_POST['notes']);
    $Num = mysqli_real_escape_string($con, $_POST['Num']);
    $id_fermier = mysqli_real_escape_string($con, $_POST['ID_fermier']);
    $vet_id = mysqli_real_escape_string($con, $_POST['vet_id']);
    $farmer_name = mysqli_real_escape_string($con, $_POST['farmer_name']);
    $Nom_vet = mysqli_real_escape_string($con, $_POST['Nom_vet']);
   
    
   if (strtotime($nouvaeu_date) < strtotime(date('Y-m-d'))) {
        echo "Vous ne pouvez pas choisir une date dans le passé";
        exit();
    
      } 
      else{

   
    $sql = "INSERT INTO rep_vac 
        (confarmation_de_date, Num, nouvaeu_date, vac, notes, Prix, ID_fermier, accept , vet_id , farmer_name , Nom_vet) 
        VALUES 
        ('$confarmation_de_date', '$Num', '$nouvaeu_date', '$vac', '$notes', '$Prix', '$id_fermier','$accept','$vet_id','$farmer_name' , '$Nom_vet')";
    
    if (mysqli_query($con, $sql)) {
        header('Location: confirmation_vac.php?ID_fermier=' . $id_fermier);
        exit();
    } else {
        echo "Une erreur est survenue lors de l'enregistrement : " . mysqli_error($con);
    }
}
}
?>

<div class="container">
    <h2>Répondre à la demande de vaccination</h2>

    <form action="" method="post">
          <label for="">Nom veterinaire</label>
        <input type="text" placeholder="Nom veterinaire" id="Prix" name="Nom_vet" required ><br><br>

    <label for="accept">Acceptez-vous la demande ?</label>
        <select id="accept" name="accept" required>
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br><br>

        <label for="confarmation_de_date">Êtes-vous d'accord pour le rendez-vous ?</label>
        <select id="confarmation_de_date" name="confarmation_de_date" >
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br><br>
        
        <label for="nouvaeu_date">Choisissez un nouveau rendez-vous</label>
         <input type="date" id="nouvaeu_date" name="nouvaeu_date" required min="<?php echo date('Y-m-d'); ?>"><br><br>

        <label for="vac">Type de vaccination :</label>
        <select id="vac" name="vac" >
            <option value="">اختر التطعيم</option>
            <option value="الحمى القلاعية">الحمى القلاعية</option>
            <option value="التسمم المعوي">التسمم المعوي</option>
            <option value="جدري الأغنام">جدري الأغنام</option>
            <option value="التهاب الضرع">التهاب الضرع</option>
        </select><br><br>

        <label for="Prix">Prix</label>
        <input type="text" placeholder="Prix" id="Prix" name="Prix" ><br><br>

        <label for="Num">Numéro de téléphone</label>
       <input type="tel" placeholder="Telephone" name="Num" id="Num" pattern="[0-9]{10}" maxlength="10" required title="الرجاء إدخال 10 أرقام "><br><br>

        <label for="notes">Notes</label>
        <textarea id="notes" name="notes" rows="3"></textarea><br><br>
      
        <input type="hidden" name="ID_fermier" value="<?php echo $id_fermier; ?>">
        <input type="hidden" name="vet_id" value="<?php echo $vet_id; ?>">
        <input type="hidden" name="farmer_name" value="<?php echo $farmer_name; ?>">
        

        <button name="Sign_Up" class="Sign_Up">Envoyer</button>
        <a href="vue_demande_vac.php" class="return" style="text-decoration: none;">Retour</a>
    </form>
</div>

</body>
</html>