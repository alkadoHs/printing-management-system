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

$emptyErr = $baki = ""; 
if (isset($_POST['submit'])) {
    $jina_la_mteja = $_POST['jina_la_mteja'];
    $namba_ya_simu = $_POST['namba_ya_simu'];
    $aina_ya_kazi = $_POST['aina_ya_kazi'];
    $bajeti = $_POST['bajeti'];
    $materials = $_POST['materials'];
    $matumizi_kiasi = $_POST['matumizi_kiasi'];

    if (empty($jina_la_mteja) && empty($bajeti)) {
       $emptyErr = "Haujajaza sehemu za muhimu";
    } else {
        $baki = $bajeti - $matumizi_kiasi;

        $sql = $conn->query("INSERT INTO odazote(jina_la_mteja,mawasiliano,huduma,bajeti,materials,matumizi,baki)
        VALUES('$jina_la_mteja','$namba_ya_simu','$aina_ya_kazi','$bajeti','$materials','$matumizi_kiasi','$baki')");

        if ($sql) {
            header('location: ./odazote.php');
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
    <title>Essam-digital | Oda mpya</title>
    <style>
        .table > table {
            margin-top: 0;
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
                    <h1>Oda Mpya</h1>
                    
                   <div class="table">
                    <span class="error"><?= $emptyErr; ?></span>
                      <div class="form-grid">
                         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
                            <div class="customer-name">
                                <label for="jina">Jina la mteja/Taasisi/Kampuni</label>
                                <input type="text" name="jina_la_mteja" id="jina" placeholder="Jina la mteja">
                            </div>
                            <div class="customer-number">
                                <label for="number">Mawasiliano ya mteja</label>
                                <input type="text" name="namba_ya_simu" id="number" placeholder=" eg 0713445546">
                            </div>
                            <div class="customer-work">
                                <label for="kazi">Aina ya kazi/Huduma</label>
                                <input type="text" name="aina_ya_kazi" id="kazi" placeholder="eg kuprint t-shirt">
                            </div>
                            <div class="customer-budget">
                                <label for="bajeti">Bajeti(Tsh)</label>
                                <input type="text" name="bajeti" id="bajeti" placeholder="Kiasi cha bajeti">
                            </div>
                            <div class="customer-uses">
                                <label for="matumizi">Matumizi</label>
                                <textarea name="materials" id="matumizi" cols="25" rows="3" placeholder="Jaza orodha ya materials"></textarea>
                            </div>
                            <div class="customer-amount">
                                <label for="kiasi">Kiasi cha matumizi(Tsh)</label>
                                <input type="text" name="matumizi_kiasi" id="kiasi" placeholder="Jumla kiasi cha matumizi ">
                            </div>
                            <div class="submitBtn">
                                <button class="btn-grad" title="hifadhi oda" type="submit" name="submit">Hifadhi oda</button>
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