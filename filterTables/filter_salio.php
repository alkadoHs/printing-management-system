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
    $from2 = $_POST['from2'];
    $to2 = $_POST['to2'];

    $_SESSION['from2'] = $from2;
    $_SESSION['to2'] = $to2;

    if (empty($from2) && empty($to2)) {
       $emptyErr = "Haujajaza sehemu za muhimu";
    } else {
        $sql = $conn->query("SELECT * from salio_la_mwezi where
        (date BETWEEN '$from2'AND '$to2')");

        if ($sql) {
            header('location: ../admin/saliolamwezi_ripoti.php');
        } else{
            echo "Jaribu kujaza vizuri, kuna makosa katika ujazaji";
            header('location: ./filter_salio.php');
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
    <title>Essam-digital | Filter salio</title>
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
    background-image: linear-gradient(to right, #2b5876 0%, #4e4376  51%, #2b5876  100%);
    margin: 10px;
    padding: 15px 45px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;            
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
                <p><span class="navicon"> </span> <a href="../admin/dashboard.php">Dashboard</a></p>
               <p><span class="navicon"></span> <a href="../admin/odampya.php">Oda Mpya</a></p>
               <p><span class="navicon"></span> <a href="../admin/odazote.php">Oda Zote</a></p>

               <h3>Ripoti</h3>
               
               <p><span class="navicon"></span> <a href="../admin/ripotiyaleo.php">Ripoti ya leo</a></p>
               <p><span class="navicon"></span> <a href="./filter_oda.php">Ripoti ya muda maalumu</a></p>
               <!-- <p><span class="navicon"></span> <a href=""></a></p> -->
                
               <div class="logout"><a href="../admin/logout.php">Logout</a></div>

               <h3>Sehemu ya admin</h3>
               <p><span class="navicon"></span> <a href="../admin/wafanyakazi.php">Wafanyakazi</a></p>
               <p><span class="navicon"></span> <a href="../admin/lipamishahara.php">Lipa mishahara</a></p>
               <p><span class="navicon"></span> <a href="../admin/saliolamwezi.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="../admin/matengenezo.php">Matengenezo</a></p>

               <h4>Ripoti za admin</h4>
               <p><span class="navicon"> </span><a href="../admin/mishahara-ripoti.php">Mishahara</a></p>
               <p><span class="navicon"></span> <a href="./filter_salio.php">Salio la mwezi</a></p>
               <p><span class="navicon"></span> <a href="../admin/matengenezo_ripoti.php">Matengenezo</a></p>
            </div>
            <div class="dashboard-contents">
                <div class="top-nav">
                    <div class="toggle">
                        <div></div>
                        <div></div>
                    </div>
                    <div class="company-profile dropbtn">
                       <img src="../assets/images/profile.png" alt="user-profile">
                       <div class="company-name">Admininstrator</div>
                    </div>
                </div>
                <div class="contents">
                    <h1>Jaza tarehe kupata ripoti za muda unaotaka</h1>
                    <p>Ripoti itatengenezwa kulingana na tarehe uliyojaza.</p>
                    
                   <div class="table">
                    <span class="error"><?= $emptyErr; ?></span>
                      <div class="form-grid">
                         <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                            
                         <div class="customer-name">
                                <label for="jina">Kuanzia tarehe</label>
                                <input type="text" name="from2" id="jina" placeholder="yyyy-mm-dd">
                            </div>
                            
                            <div class="customer-number">
                                <label for="number">Mpaka tarehe</label>
                                <input type="text" name="to2" id="number" placeholder="yyyy-mm-dd">
                            </div>

                            <div class="submitBtn">
                                <button class="btn-grad" title="hifadhi oda" type="submit" name="submit">Tengeneza ripoti</button>
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