<!--
     Project made by Alkado Heneliko
     GitHub @alkado1
     Twitter @alkadoHs

     Contact: alkadosichone@gmail.com
     -->

<?php 
require("../connect.php");
session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('location: ../login.php');
    exit();
}

$id = $_REQUEST['id'];

$sql = $conn->query("DELETE FROM users WHERE id= '$id'");
if($sql) {
     $conn->query("SET @num := 0");
     $conn->query("UPDATE users SET id = @num := (@num+1)");
     $conn->query("ALTER TABLE users AUTO_INCREMENT = 1");
  header('location: wafanyakazi.php');
  exit();
} else {
    echo "Kuna tatizo limetokea wakati wa kufuta hizi taarifa";
}

?>