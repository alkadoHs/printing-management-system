<!--
     Project made by Alkado Heneliko
     GitHub @alkado1
     Twitter @alkadoHs

     Contact: alkadosichone@gmail.com
     -->


<?php 
require "../connect.php";
session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

} else {
    header('location: ../login.php');
    exit();
}
$totalExpenses = 0;
$totalBaki = 0;
$i = 1;
$sql = $conn->query("SELECT * FROM odazote WHERE date(date_added) = '".(date("Y-m-d"))."'")

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/ripotiyaleo.css">
    <title>Essam-digital | Ripoti ya leo</title>
    <style>
        .table > table {
            margin-top: 0;
        }
        h1 {
            margin-top: 0;
        }
        h3 {
            text-align: center;
        }

        .contents {
            padding: 0 20px;
        }
    </style>
</head>
<body>
    
    <div class="contents">

        <h1>Essam Digital Record Management System</h1>
        <h3>Ripoti Ya Oda za Tarehe <?= date('d-m-Y') ?></h3>

        <?php if ($sql->num_rows > 0) {?>

        <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>Jina la Mteja/Taasisi/Kampuni</th>
                <th>Mawasiliano</th>
                <th>Huduma</th>
                <th>Bajeti</th>
                <th>Matuizi</th>
                <th>Kiasi cha Matumizi</th>
                <th>Baki</th>
            </tr>
            <?php while($row = $sql->fetch_assoc()) {?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['jina_la_mteja'] ?></td>
                <td><?= $row['mawasiliano'] ?></td>
                <td><?= $row['huduma'] ?></td>
                <td><?= number_format($row['bajeti']) ?></td>
                <td><?= $row['materials'] ?></td>
                <td><?= number_format($row['matumizi']) ?></td>
                <td><?= number_format($row['baki']) ?></td>
                <?php
                $totalExpenses += $row['matumizi'];
                $totalBaki += $row['baki'];
                ?>
            </tr>
            <?php }?>
            <tr>
                <td colspan="6"><h3>JUMLA</h3></td>
                <td><b><?= number_format($totalExpenses) ?></b></td>
                <td><b><?= number_format($totalBaki) ?></b></td>
            </tr>
        </table>
        </div>
        <?php } else {?>
            <h1>Hakuna ripoti yoyote leo 📪</h1>
        <?php }?>
    </div>

<script>
    window.addEventListener('click', () => {
        print()
    })

    
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>  
</body>
</html>
