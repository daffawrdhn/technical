<?php

require 'config.php';
require 'auth.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Backdoor - Shop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/jumbotron/">

    

    

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/jquery.min.js"></script>

    
  </head>
  <body>
    
<main>
  <div class="container py-4">

    <?php
      require_once("component/header.php");

      if(isset($_GET['halaman'])){
        $halaman = $_GET['halaman'];
        switch ($halaman) {
            case 'products':
                include "component/products.php";
                break;
            case 'cart':
                include "component/cart.php";
                break;
            case 'order':
                include "component/order.php";
                break;
            case 'detail':
                include "component/detail.php";
                break;
            default:
            echo "<center><h3>404 Page not found !</h3></center>";
            break;
        }
    }else {
        include "component/products.php";
    }

    ?>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2022 - WOM Finance Technical Test - Management Trainee Information Technology
    </footer>
  </div>
</main>


    
  </body>
</html>
