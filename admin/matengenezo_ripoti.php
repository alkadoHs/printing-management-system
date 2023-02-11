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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Essam-digital | Ripoti ya matengenezo</title>
    <style>
        table {
            margin-top: 0;
        }

        main {
            margin: 1rem;
        }

        h1,h3,h2 {
            text-align: center;
        }
    </style>
</head>
<body>
   
    <main>
    <h1>Essam Digital Record Management System</h1>
    <h3>Ripoti ya mishahara kwa staff</h3>
    <?php 
           $total = 0;
            $i = 1;
            $sql = $conn->query("SELECT * FROM matengenezo");
            ?>

            <?php if ($sql->num_rows > 0) {?>
            <table id="myTable">
                <tr>
                    <th>#</th>
                    <th>Matumizi</th>
                    <th>Kiasi</th>
                    <th>Maoni</th>
                    <td>Date added</td>
                </tr>
                <?php while($row = $sql->fetch_assoc()) {?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['matumizi'] ?></td>
                    <td><?= $row['kiasi'] ?></td>
                    <td><?= $row['maoni'] ?></td>
                    <td><?= $row['date_added'] ?></td>
                    <?php $total += $row['kiasi'] ?>
                </tr>
                <?php }?>
                <tr>
                    <td colspan="2">
                        <h2>JUMLA</h2>
                    </td>
                    <td><b><?= number_format($total) ?></b></td>
                </tr>
            </table>
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