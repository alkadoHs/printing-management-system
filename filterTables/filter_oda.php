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

$emptyErr = "";
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];

    $_SESSION['from'] = $from;
    $_SESSION['to'] = $to;

//     SELECT * from Product_sales where
// (From_date BETWEEN '2013-01-03'AND '2013-01-09') OR 
// (To_date BETWEEN '2013-01-03' AND '2013-01-09') OR 
// (From_date <= '2013-01-03' AND To_date >= '2013-01-09')

    if (empty($from) && empty($to)) {
       $emptyErr = "Haujajaza sehemu za muhimu";
    } else {
        $sql = $conn->query("SELECT * from odazote where
        (date_added BETWEEN '$from'AND '$to')");

        if ($sql) {
            header('location: ../admin/ripotiyawakati.php');
        } else{
            echo "Jaribu kujaza vizuri, kuna makosa katika ujazaji";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="../styles/odampya.css">
    <title>Essam-digital | Filter oda</title>
    <style>
        .table > table {
            margin-top: 0;
        }

        .error {
            color: red;
        }
    .dashboard-container {
        padding-left: 0;
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
               <p><span class="navicon"> </span> <a href="../admin/dashboard.php">Dashboard</a></p>
               <p><span class="navicon"></span> <a href="../admin/odampya.php">Oda Mpya</a></p>
               <p><span class="navicon"></span> <a href="../admin/odazote.php">Oda Zote</a></p>

               <h3>Ripoti</h3>
               
               <p><span class="navicon"></span> <a href="../admin/ripotiyaleo.php">Ripoti ya leo</a></p>
               <p><span class="navicon"></span> <a href="./filter_oda.php">Ripoti ya muda maalumu</a></p>

               <div class="logout"><a href="../admin/logout.php">Logout</a></div>
               <!-- <p><span class="navicon"></span> <a href=""></a></p> -->
               
               <?php if($cheo == "Adminstrator") { ?>
               <h3>Sehemu ya admin</h3>
               <p><span class="navicon"></span> <a href="../admin/wafanyakazi.php">Wafanyakazi</a></p>
               <p><span class="navicon"></span> <a href="../admin/lipamishahara.php">Lipa mishahara</a></p>
               <p><span class="navicon"></span> <a href="../admin/saliolamwezi.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="../admin/matengenezo.php">Matengenezo</a></p>

               <h4>Ripoti za admin</h4>
               <p><span class="navicon"> </span><a href="../admin/mishahara-ripoti.php">Mishahara</a></p>
               <p><span class="navicon"></span> <a href="./filter_salio.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="../admin/matengenezo_ripoti.php">Matengenezo</a></p>
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
                    <h1>Jaza tarehe kupata ripoti unayohitaji</h1>
                    <p>Ripoti itatengenezwa kulingana na taarehe ulizojaza</p>
                    
                   <div class="table">
                    <span class="error"><?= $emptyErr; ?></span>
                      <div class="form-grid">
                         <form action="" method="post">
                            <div class="customer-name">
                                <label for="jina">Kutoka tarehe</label>
                                <input type="text" name="from" id="jina" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="customer-number">
                                <label for="number">Mpaka tarehe</label>
                                <input type="text" name="to" id="yyyy-mm-dd">
                            </div>
                            
                            <div class="submitBtn">
                                <button class="btn-grad" title="Hii link itakupeleka kwenye ripoti" type="submit" name="submit">Tengeneza ripoti</button>
                            </div>
                         </form>
                      </div>
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