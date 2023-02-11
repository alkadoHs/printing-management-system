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

$emptyErr = ""; 
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $kiasi = $_POST['kiasi'];
    $chanzo = $_POST['chanzo'];

    if (empty($kiasi) && empty($chanzo)) {
       $emptyErr = "Haujajaza sehemu za muhimu";
    } else {
        $sql = $conn->query("INSERT INTO `salio_la_mwezi`(`date`, `kiasi`, `chanzo`)
        VALUES('$date', '$kiasi', '$chanzo')");

        if ($sql) {
            header('location: saliolamwezi.php');
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
    <link rel="stylesheet" href="../styles/saliolamwezi.css">
    <title>Essam-digital | Wafanyakazi</title>
    <style>
        .table > table {
            margin-top: 0;
        }

        .error {
            color: red;
        }

        .form-grid {
    margin-top: 20px;
}

.form-grid > form {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 50%);
} 

label {
    display: block;
    margin-top: 10px;
    font-size: 1.1rem;
    font-weight: bold;
    color: black;
 }

 input, textarea, select {
    width: 80%;
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


.submitBtn {
    display: inline-block;
    grid-column: span 2;
    width: 100%;
}


.btn-grad {
    background-image: linear-gradient(to right, #f49e21 0%, #f2a735  51%, #f49e21 100%);
    margin: 10px;
    padding: 15px 45px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: #0b0647;            
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
    font-size: 1.3rem;
    width: 50%;
  }

  .btn-grad:hover {
    background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
  }

    .last-item {
    grid-column-start: 2;
    grid-row: 1/span 2;
    display: grid;
    gap: 5px;
    background-color: white;
    grid-template-columns: auto auto;
    padding: 10px;

}

  .last-item div {
    border: 2px solid #0b0647;
    padding: 10px;
  }

  .last-item .item1,.item2 {
     font-size: 1.3rem;
     font-weight: bold;
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
                    <h1>Salio la mwezi</h1>
                    
                   <div class="table">
                    <span class="error"><?= $emptyErr; ?></span>
                      <div class="form-grid">
                         <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                            <div class="customer-name">
                                <label for="jina">Tarehe</label>
                                <input type="date" name="date" id="jina" >
                            </div>
                            <div class="customer-number">
                                <label for="number">Kiasi</label>
                                <input type="text" name="kiasi" id="number" placeholder="kiasi(Tsh)">
                            </div>
                        
                            <div class="customer-budget">
                                <label for="chanzo">Chanzo</label>
                                <select name="chanzo" id="chanzo">
                                    <option value="NMB">NMB</option>
                                    <option value="CRDB">CRDB</option>
                                    <option value="Tigopesa lipa">Tigopesa Lipa</option>
                                    <option value="Cash">Cash</option>
                                    <!--<option value="M-Pesa lipa">M-Pesa Lipa</option> -->
                                </select>
                            </div>


                            <div class="last-item">
                                <div class="item1">Chanzo</div>
                                <div class="item2">Jumla ya salio</div>
                                <div class="item3">NMB</div>
                                <div class="item4">
                                    <?php
                                     $nmb_balance = $conn->query("SELECT SUM(kiasi) FROM salio_la_mwezi where chanzo='NMB'")->fetch_array()[0];
                                     echo number_format($nmb_balance);
                                     ?>
                                </div>
                                <div class="item5">CRDB</div>
                                <div class="item6">
                                <?php
                                     $crdb_balance = $conn->query("SELECT SUM(kiasi) FROM salio_la_mwezi where chanzo='CRDB'")->fetch_array()[0];
                                     echo number_format($crdb_balance);
                                     ?>
                                </div>
                                <div class="item5">Tigopesa Lipa</div>
                                <div class="item6">
                                <?php
                                     $tigopesa_balance = $conn->query("SELECT SUM(kiasi) FROM salio_la_mwezi where chanzo='Tigopesa Lipa'")->fetch_array()[0];
                                     echo number_format($tigopesa_balance);
                                     ?>
                                </div>
                                <div class="item5">Cash</div>
                                <div class="item6">
                                <?php
                                     $cash_balance = $conn->query("SELECT SUM(kiasi) FROM salio_la_mwezi where chanzo='Cash'")->fetch_array()[0];
                                     echo number_format($cash_balance);
                                     ?>
                                </div>
                            </div>
                           
                            <div class="submitBtn">
                                <button class="btn-grad" title="hifadhi oda" type="submit" name="submit">Hifadhi Salio</button>
                            </div>
                         </form>
                      </div>

                  <?php 
                    $i = 1;
                    $sql = $conn->query("SELECT * FROM salio_la_mwezi ORDER BY id DESC");
                   ?>

                   <?php if ($sql->num_rows > 0) {?>
                    <table id="myTable">
                        <tr>
                            <th>#</th>
                            <th>Tarehe</th>
                            <th>Kiasi</th>
                            <th>chanzo</th>
                        </tr>
                        <?php while($row = $sql->fetch_assoc()) {?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= number_format($row['kiasi']) ?></td>
                            <td><?= $row['chanzo'] ?></td>
                            
                        </tr>
                        <?php }?>
                    </table>
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