<?php 

$conn = new mysqli("localhost", "root", "", "essam_digital");
if($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
} 


?>