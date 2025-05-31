<?php

include "Config.php";


if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>سجل الاستشارات</title>
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
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        form input[type="text"] {
            padding: 8px;
            width: 250px;
            
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        form button {
            padding: 8px 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
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
        .btn_con, .btn_vac {
            background-color: rgb(23, 5, 58);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            height: 50px;
        }
        .btn_con {
            margin-left: 30px;
        }
        .btn_vac {
            margin-right: 30px;
        }
        .btn_con:hover, .btn_vac:hover {
            background-color: rgb(31, 163, 119);
        }
        .btn_del a {
            color: white;
            text-decoration: none;
        }
        .btn {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            gap: 60px;
        }
        .btn_rep {
            background-color: rgb(13, 189, 101);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn_rep:hover {
            background-color: rgb(116, 119, 118);
        }
        .no-records {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
<div class="btn">
    <button class="btn_con" onclick="navigateTo('vue_les demande_con.php', 'consultation')">demande consultation</button>
    <button class="btn_vac" onclick="navigateTo('vue_les demande_Vac.php', 'vaccination')">Reponse vaccination</button>
</div>

<h2>les demande de consultation</h2>


<form method="GET">
    <label for="search"></label>
    <input type="text" id="search" name="search" placeholder="entrer le numero" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Recharche</button>
</form>

<table>
<tr>
<tr>
        <th>ID_veterinaire</th>
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
        
    </tr>
</tr>

    <?php 
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    if (!empty($search)) {
        $sql = "SELECT * FROM demande_consultation WHERE vet_id LIKE '%$search%' ORDER BY date ASC ";
    } else {
        $sql = "SELECT * FROM demande_consultation  ORDER BY date ASC";
    }
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("خطأ في الاستعلام: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="11" class="no-records">لا توجد سجلات لعرضها.</td></tr>';
    } else {
        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['vet_id']); ?></td>
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
               
            </tr>
        <?php endwhile;
    }

    mysqli_close($con);
    ?>
</table>

<a href="Admin.php" class="logout">Déconnexion</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.navigateTo = function(url, type) {
        if (confirm(`Êtes-vous sûr de vouloir afficher l’historique ${type}؟`)) {
            const button = event.target;
            button.disabled = true;
            button.textContent = 'Chargement en cours....';
            setTimeout(() => {
                window.location.href = url;
            }, 1000); 
        }
    };
});
</script>

</body>
</html>
