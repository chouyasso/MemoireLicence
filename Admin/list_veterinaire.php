<?php
session_start();
include "config.php";


$sql = "SELECT * FROM veterinaire";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
<title>Vos Veterinaire</title>

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
            background-color:rgb(99, 182, 230);
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

<h2> List Veterinaire</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Num</th>
        <th>Numdelicencevet</th>
        <th>supp</th>
        
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php echo $row['Num']; ?></td>
            <td><?php echo $row['Numdelicencevet']; ?></td>
            
            
           

<td><a href="Del_veterinaire.php?ID=<?php echo $row['ID']; ?>" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟');"><button class="btn_del">Dell</button></a></td>
        </tr>
    <?php endwhile; ?>
</table>  
        
 <a href="Admin.php" class="logout">Déconnexion</a> 
</body>
</html>