<?php
session_start();
include "Config.php";


if (!isset($_SESSION['user_id'])) {
    header('Location: Login-vet.php');
    exit();
}

$Vet_id = $_SESSION['user_id'];


if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title> </title>
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
            width: 200px;
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
    <button class="btn_con" onclick="navigateTo('historiy_con.php', 'Consultation')">Historique con</button>
    <button class="btn_vac" onclick="navigateTo('historiy_vac.php', 'Vaccination')">Historique vacc</button>
</div>

<h2>list de reponse</h2>


<form method="GET">
    <label for="search"></label>
    <input type="text"  style="width: 250px;" id="search" name="search" placeholder="entrer le Nom" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Recharche</button>
</form>

<table>
<tr>
    <th>Nom Agriculteur</th>
    <th>Acceptation</th>
    <th>Confirmation du rendez-vous</th>
    <th>Nouveau rendez-vous</th>
    <th>État confirmé</th>
    <th>Prix</th>
    <th>Numéro de téléphone</th>
    <th>Remarques</th>
    <th>Modifier</th>
</tr>

    <?php 
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    if (!empty($search)) {
        $sql = "SELECT * FROM rep_con WHERE vet_id = $Vet_id AND Name LIKE '%$search%' ORDER BY nouvaeu_date ASC";
    } else {
        $sql = "SELECT * FROM rep_con WHERE vet_id = $Vet_id ORDER BY nouvaeu_date ASC";
    }
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("خطأ في الاستعلام: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="9" class="no-records">Aucun enregistrement à afficher</td></tr>';
    } else {
        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td><?php echo !empty($row['accept']) ? htmlspecialchars($row['accept']) : '----'; ?></td>
                <td><?php echo !empty($row['confarmation_de_date']) ? htmlspecialchars($row['confarmation_de_date']) : '----'; ?></td>
                <td><?php echo !empty($row['nouvaeu_date']) ? htmlspecialchars($row['nouvaeu_date']) : '----'; ?></td>
                <td><?php echo !empty($row['Raison_du_rendez_vous']) ? htmlspecialchars($row['Raison_du_rendez_vous']) : '----'; ?></td>
                <td><?php echo !empty($row['Prix']) ? htmlspecialchars($row['Prix']) : '----'; ?></td>
                <td><?php echo !empty($row['Num']) ? htmlspecialchars($row['Num']) : '----'; ?></td>
                <td><?php echo !empty($row['notes']) ? htmlspecialchars($row['notes']) : '----'; ?></td>
                <td>
                    <a href="modifier.php?ID=<?php echo htmlspecialchars($row['ID_con']); ?>">
                        <button class="btn_rep">Modifier</button>
                    </a>
                </td>
            </tr>
        <?php endwhile;
    }

    mysqli_close($con);
    ?>
</table>

<a href="vetiriner.php" class="logout">Déconnexion</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.navigateTo = function(url, type) {
        if (confirm(`Êtes-vous sûr de vouloir afficher l’historique  ${type}؟`)) {
            const button = event.target;
            button.disabled = true;
            button.textContent = 'Chargement en cours..';
            setTimeout(() => {
                window.location.href = url;
            }, 1000); 
        }
    };
});
</script>

</body>
</html>
