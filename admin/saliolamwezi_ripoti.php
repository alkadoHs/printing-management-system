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

    $from2 = $_SESSION['from2'];
    $to2 = $_SESSION['to2'];

} else {
    header('location: ../login.php');
    exit();
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Essam-digital | Salipo la mwezi - ripoti</title>
    <style>
         table {
            margin-top: 1rem ;
        }

        main {
            margin: 1rem 1rem;
        }

        h1, h3,p {
            text-align: center;
        }
    </style>
</head>
<body>
   
    <main>
        <h1>Essam Digital Record Management System</h1>
        <h3>Ripoti ya salio kuanzia tarehe__ <?= $from2 ?>  mpaka__ <?= $to2 ?> </h3>
    <?php 
        $total = 0;
        $i = 1;
        $sql = $conn->query("SELECT * from salio_la_mwezi where
        (date BETWEEN '$from2'AND '$to2')");
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
                <?php $total += $row['kiasi'] ?>
            </tr>
            <?php }?>
            <tr>
                <td colspan="2">
                    <h2>Jumla</h2>
                </td>
                <td>
                    <b><?= number_format($total) ?></b>
                </td>
            </tr>
        </table>
        <?php } else {?>
            <h1 class="emptyoda">Hakuna ripoti ya huo muda 🤷‍♀️</h1>
            <p>Unaweza kuwa umekosea kujaza pengine, rudi nyuma ujaze tena kwa makini kadiri ya maelekezo.</p>
        <?php } ?>
    </main>
<script>
    window.addEventListener('click', () => {
        print();
    })
    
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }
</script>   
</body>
</html>