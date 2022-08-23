<?php
 
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Backdoor</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/jumbotron/">

    

    

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
    
<main>
  <div class="container py-4">

    <?php
      require_once("component/header.php");
    ?>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Local pawn shop</h1>
        <p class="col-md-8 fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio molestias totam, rem quisquam maxime sint, minus modi magnam necessitatibus voluptas dolorum voluptate, itaque consectetur molestiae repellendus a ipsum omnis facere?</p>
        <a class="btn btn-dark btn-lg" role="button" href="shop.php">Browse Product</a>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2022
    </footer>
  </div>
</main>


    
  </body>
</html>
