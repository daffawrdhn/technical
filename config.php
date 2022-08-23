<?php 
 
$server = "localhost";
$user = "root";
$pass = "Plmnko123!";
$database = "technical";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>