<?php
session_start();
include "Config.php";


if (!isset($_SESSION['user_id'])) {
    header('Location: Login-vet.php');
    exit();
}

$vet_id = $_SESSION['user_id'];


$sql = "SELECT * FROM demande_consultation WHERE vet_id = $vet_id ORDER BY date DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title></title>
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
            background-color: rgb(78, 148, 175);
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
        .btn_rep{
            background-color:rgb(13, 189, 101);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn_del {
            background-color:rgb(240, 4, 4);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Vos demandes</h2>
   <table>
    <tr>
        
         <th>Nom de l'agriculteur</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Wilaya</th>
        <th>Région</th>
        <th>Quantité</th>
        <th>Type</th>
        <th>Motif</th>
        <th>Consulté ?</th>
        <th>Date</th>
        <th>Confirmation</th>
        <th>Refus</th>
    </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
         
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Wilaya']; ?></td>
                <td><?php echo $row['Zone']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['breed']; ?></td>
                <td><?php echo $row['Raison_du_rendez_vous']; ?></td>
                <td><?php echo $row['Deja_consulte']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td> <a href="rep.php?ID_fermier=<?php echo $row['ID_fermier']; ?>&vet_id=<?php echo $row['vet_id']; ?>&Name=<?php echo $row['Name']; ?>">
                <button class="btn_rep">Rep</button></td>
                <td><a href="delet.php?ID=<?php echo $row['ID']; ?>" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟');"><button class="btn_del">Dell</button></a></td>
            </tr>
        <?php endwhile; ?>
    </table>
 <a href="vetiriner.php" class="logout">Déconnexion</a> 
    

</body>
</html>