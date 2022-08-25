<?php
    $host="localhost";
    $user="root";
    $password="Plmnko123!";
    $db="technical";
    
    $kon = mysqli_connect($host,$user,$password,$db);
    if (!$kon){
          die("Koneksi gagal:".mysqli_connect_error());
    } else {
        // echo "good";
    }
?>