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

$emptyErr = $baki = ""; 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $kiasi = $_POST['kiasi'];

    if (empty($username) && empty($kiasi)) {
       $emptyErr = "Haujajaza sehemu za muhimu";
    } else {
        $sql = $conn->query("INSERT INTO salaries(username, kiasi)
        VALUES('$username', '$kiasi')");

        if ($sql) {
            header('location: lipamishahara.php');
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
    <link rel="stylesheet" href="../styles/mfanyakazi.css">
    <title>Essam-digital | Lipa mishahara</title>
    <style>
        .table , table {
            margin-top: 10px;
        }

        .error {
            color: red;
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
               <!-- <p><spanipotiyawakati.php class="navicon"></spanipotiyawakati.php> <a href=""></a></p> -->
               
               <div class="logout"><a href="./logout.php">Logout</a></div>
               <h3>Sehemu ya admin</h3>
               <p><span class="navicon"></span> <a href="./wafanyakazi.php">Wafanyakazi</a></p>
               <p><span class="navicon"></span> <a href="./lipamishahara.php">Lipa mishahara</a></p>
               <p><span class="navicon"></span> <a href="./saliolamwezi.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="./matengenezo.php">Matengenezo</a></p>

               <h4>Ripoti za admin</h4>
               <p><span class="navicon"> </span><a href="./mishahara-ripoti.php">Mishahara</a></p>
               <p><span class="navicon"></span> <a href="../filterTables/filter_salio.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="./matengenezo_ripoti.php">Matengenezo</a></p>
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
                    <h1>Mishahara kwa wafanyakazi</h1>
                   <div class="table">
                    <span class="error"><?= $emptyErr; ?></span>
                      <div class="form-grid">
                         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                            <div class="customer-name">
                                <label for="jina">Username</label>
                                <input type="text" name="username" id="jina" placeholder="Jaza username yake">
                            </div>
                            <div class="customer-number">
                                <label for="number">Kiasi(Tsh)</label>
                                <input type="text" name="kiasi" id="pass" placeholder="kiasi..">
                            </div>
                            <div class="submitBtn">
                                <button class="btn-grad" title="lipa mshahara" type="submit" name="submit">Lipa mshahara</button>
                            </div>
                         </form>
                      </div>
                   </div>

                   <?php 
                    $i = 1;
                    $sql = $conn->query("SELECT * FROM salaries where MONTH(date_added)='".(date("m"))."' ORDER BY id DESC" );
                   ?>

                   <?php if ($sql->num_rows > 0) {?>
                    <table id="myTable">
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>Kiasi</th>
                            <th>Date added</th>
                        </tr>
                        <?php while($row = $sql->fetch_assoc()) {?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= number_format($row['kiasi']) ?></td>
                            <td><?= $row['date_added'] ?></td>
                        </tr>
                        <?php }?>
                    </table>
                 <?php } ?>

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