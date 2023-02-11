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
$sql = $conn->query("SELECT * FROM odazote WHERE date(date_added) = '".(date("Y-m-d"))."'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Essam-digital | Dashboard</title>
    <Style>
        .emptyoda {
            margin-top: 200px;
        }
    </Style>
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
                    <div class="company-profile">
                        <img src="../assets/images/profile.png" alt="user-profile">
                        <div class="company-name"><?= $user_id?></div>
                     </div>
                </div>
                <div class="contents">
                    <h1>Essam Digital Record Management system - Admin Panel</h1>
                    <div class="grid-container">
                        <div class="balance">
                            <div class="description">Baki ya leo | Jumla</div>

                            <?php 
                              $daySalary = $conn->query("SELECT SUM(kiasi) FROM salaries where date(date_added)='".(date("Y-m-d"))."'")->fetch_array()[0];

                              $todayBaki = $conn->query("SELECT SUM(baki) FROM `odazote` where date(date_added) = '".(date("Y-m-d"))."'")->fetch_array()[0];
                              $dayBaki = $todayBaki - $daySalary;
                              $dayBaki = $dayBaki > 0 ? $dayBaki : 0.00;
                            ?>

                            <div class="amount"><?= number_format($dayBaki) ?></div>
                        </div>
                        <div class="pending">

                           <?php if($cheo == "Adminstrator") { ?>
                            <div class="description">Baki ya mwezi huu</div>

                            <?php 
                                $monthSalary = $conn->query("SELECT SUM(kiasi) FROM salaries where MONTH(date_added)='".(date("m"))."'")->fetch_array()[0];
                                $monthBaki = $conn->query("SELECT SUM(baki) FROM `odazote` where MONTH(date_added) = '".(date("m"))."'")->fetch_array()[0];
                                $total_month_baki = $monthBaki - $monthSalary;
                            
                                $total_month_baki = $total_month_baki > 0 ? $total_month_baki : 0.00;
                            ?>
                            
                            <div class="amount"><?= number_format($total_month_baki) ?></div>
                        </div>
                        <div class="on-progress">
                            <div class="description">Baki ya mwaka huu</div>

                            <?php 
                                $yearSalary = $conn->query("SELECT SUM(kiasi) FROM salaries where YEAR(date_added)='".(date("Y"))."'")->fetch_array()[0];

                                $yearBaki = $conn->query("SELECT SUM(baki) FROM `odazote` where YEAR(date_added) = '".(date("Y"))."'")->fetch_array()[0];
                                $total_year_baki = $yearBaki - $yearSalary;
                                $total_year_baki = $total_year_baki > 0 ? $total_year_baki : 0.00;
                            ?>

                            <div class="amount"><?= number_format($total_year_baki) ?></div>
                        </div>
                        <div class="completed">
                            <?php } ?>
                            <div class="description">Wateja wa mwaka <?= date('Y') ?></div>

                            <?php
                             $sql2 = $conn->query("SELECT * FROM odazote");
                             $last_id = $sql2->num_rows;
                              ?>

                            <div class="amount">Idadi: <?= $last_id ?></div>
                        </div>
                    </div>
                    <?php if ($sql->num_rows > 0) {?>

                    <div class="table">
                       
                    <table>
                        <caption> <h3>Oda za hivi karibuni</h3></caption>
                        <tr>
                            <th>#</th>
                            <th>Jina la Mteja/Taasisi/Kampuni</th>
                            <th>Mawasiliano</th>
                            <th>Huduma</th>
                            <th>Bajeti</th>
                            <th>Matumizi</th>
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
                        </tr>
                        <?php }?>
                    </table>
                    </div>
                <?php } else {?>
                    <h1 class="emptyoda">Hakuna oda yoyote mpaka sasa 🤷‍♀️</h1>
                <?php } ?>
                </div>

                </div>
            </div>
        </div>
    </main>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>   
</body>
</html>