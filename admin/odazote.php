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

} else {
    header('location: ../login.php');
    exit();
}

$i = 1;
$sql = $conn->query("SELECT * FROM odazote ORDER BY id DESC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/odazote.css">
    <title>Essam-digital | Oda Zote</title>
    <style>
        .table > table {
            margin-top: 0;
        }
        input {
            width: 100%;
            display: block;
            margin-top: 5px;
            padding: 12px 14px;
            outline: transparent;
            border: 2px solid #282267;
            border-radius: 4px;
            transition: 1s;
            box-sizing: border-box;
}

input:focus {
    border: 2px solid #0b0647
}
    </style>
</head>
<body>
   
    <main>
        <div class="dashboard-container">
        <div class="sidebar">
                <div class="company-profile">
                    <img src="../assets/images/logo.jpg" alt="logo">
                    <div class="company-name">Essam Digital</div>
                </div>
               <p><span class="navicon"> </span> <a href="./dashboard.php">Dashboard</a></p>
               <p><span class="navicon"></span> <a href="./odampya.php">Oda Mpya</a></p>
               <p><span class="navicon"></span> <a href="./odazote.php">Oda Zote</a></p>

               <h3>Ripoti</h3>
               
               <p><span class="navicon"></span> <a href="./ripotiyaleo.php">Ripoti ya leo</a></p>
               <p><span class="navicon"></span> <a href="../filterTables/filter_oda.php">Ripoti ya muda maalumu</a></p>
               <!-- <p><span class="navicon"></span> <a href=""></a></p> -->

               <div class="logout"><a href="./logout.php">Logout</a></div>

               <?php if($cheo == "Adminstrator") { ?>
               <h3>Sehemu ya admin</h3>
               <p><span class="navicon"></span> <a href="./wafanyakazi.php">Wafanyakazi</a></p>
               <p><span class="navicon"></span> <a href="./lipamishahara.php">Lipa mishahara</a></p>
               <p><span class="navicon"></span> <a href="./saliolamwezi.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="./matengenezo.php">Matengenezo</a></p>

               <h4>Ripoti za admin</h4>
               <p><span class="navicon"> </span><a href="./mishahara-ripoti.php">Mishahara</a></p>
               <p><span class="navicon"></span> <a href="../filterTables/filter_salio.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="./matengenezo_ripoti.php">Matengenezo</a></p>
               <?php } ?>
            </div>
            <div class="dashboard-contents">
                <div class="top-nav">
                    <div class="toggle">
                        <div></div>
                        <div></div>
                    </div>
                    <div class="company-profile dropbtn">
                       <img src="../assets/images/profile.png" alt="user-profile">
                       <div class="company-name"><?= $user_id ?></div>
                    </div>
                </div>
                <div class="contents">
                    <h1>Jumla ya oda zote</h1>
                 
                <input type="text" name="" id="myInput" onkeyup="filterTable()" placeholder="Tafuta jina la mteja..">
                 <br>
                <?php if ($sql->num_rows > 0) {?>
                   <div class="table">
                    <table id="myTable">
                        <tr>
                            <th>#</th>
                            <th>Jina la Mteja/Taasisi/Kampuni</th>
                            <th>Mawasiliano</th>
                            <th>Huduma</th>
                            <th>Bajeti</th>
                            <th>Matumizi</th>
                            <th>Kiasi cha matumizi</th>
                            <th>Baki</th>
                            <th colspan="2">Actions</th>
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
                            <td><a href="deleteoda.php?id=<?= $row['id'] ?>">delete</a></td>
                        </tr>
                        <?php }?>
                    </table>
                   </div>
                 <?php } ?>
                </div>
            </div>
        </div>
    </main>
<script src="../js/filter.js"></script>  
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>
</body>
</html>