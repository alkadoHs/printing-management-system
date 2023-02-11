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
    $cheo = $_SESSION['cheo'];
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];

} else {
    header('location: ../login.php');
    exit();
}

$i = 1;
$sql = $conn->query("SELECT * from odazote where
(date_added BETWEEN '$from' AND '$to')");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/ripotiyaleo.css">
    <title>Essam-digital | Ripoti ya muda maalumu</title>
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
        <h3>Ripoti Ya kuanzia tarehe__ <?= $from ?> mpaka __  <?= $to ?></h3>
    
        <?php if ($sql->num_rows > 0) {?>

        <div class="table">
        <table>
            <tr>
                <th>#</th>
                <th>Jina la Mteja/Taasisi/kampuni</th>
                <th>Mawasiliano</th>
                <th>Huduma</th>
                <th>Bajeti</th>
                <th>Matumizi</th>
                <th>Kiasi cha matumizi</th>
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
            </tr>
            <?php }?>
        </table>
        </div>
        <?php } ?>
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
