<?php 
 
include 'config.php';
 
session_start();
 
if (isset($_SESSION['email'])) {
    header("Location: index.php");
}
 
if (isset($_POST['signup'])) {

    $namadepan = $_POST['namadepan'];
    $namatengah = $_POST['namatengah'];
    $namabelakang = $_POST['namabelakang'];

    if (empty($namadepan)|| empty($namatengah) || empty($namabelakang)) {
      echo "<script>alert('Please enter your name.')</script>";

    } else {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
 
    if ($password == $password) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (email, nama_depan, nama_tengah, nama_belakang, password)
                    VALUES ('$email', '$namadepan', '$namatengah', '$namabelakang', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Congratulation, Registration Complete!')</script>";
                header("Location: signin.php");
            } else {
                echo "<script>alert('Woops! Registration error!.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email already in use.')</script>";
        }
         
    } else {
        echo "<script>alert('Password no recognize')</script>";
    }
    }

}
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Backdoor - Sign Up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST" name="signup" onsubmit="return validateForm()" action="">
    <!-- <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="57" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>

    <h1 class="h3 mt-2 mb-3 fw-normal">Registration</h1>

    <!-- nama depan -->
    <div class="form-floating form-top">
      <input type="text" name="namadepan" class="form-control" id="floatingInput" pattern="[a-zA-Z]+" placeholder="First name" title="No Space please">
      <label for="floatingInput">First name</label>
    </div>

    <!-- nama tengah -->
    <div class="form-floating form-mid">
      <input type="text" name="namatengah" class="form-control" id="floatingInput" pattern="[a-zA-Z]+" placeholder="Middle name" title="No Space please">
      <label for="floatingInput">Middle name</label>
    </div>

    <!-- nama belakang -->
    <div class="form-floating form-mid">
      <input type="text" name="namabelakang" class="form-control" id="floatingInput" pattern="[a-zA-Z]+" placeholder="Last name" title="No Space please">
      <label for="floatingInput">Last name</label>
    </div>

    <!-- email as username -->
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <!-- password -->
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" pattern="(?=.*\d)(?=.*[#$@!%&*?])(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, one special character, and at between 8 or 16 characters">
      <label for="floatingPassword">Password</label>
    </div>

    <!-- input check -->
    <script type="text/javascript">
        function validateForm() {
            var a = document.forms["signup"]["namadepan"].value;
            var b = document.forms["signup"]["namatengah"].value;
            var c = document.forms["signup"]["namabelakang"].value;
            var d = document.forms["signup"]["email"].value;
            var e = document.forms["signup"]["password"].value;
            
            if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "") {
            alert("Please Fill All Required Field");
            return false;
            }
        }
    </script>

    <button class="w-100 btn btn-lg btn-dark" name="signup" type="submit">Sign Up</button>


    <p class="mt-5 mb-3 text-muted">Already have account?
      <a class="mt-5 mb-3 text-muted" href="signin.php"> Sign In</a>
      <a class="mt-5 mb-3 text-muted"> | </a>
      <a class="mt-5 mb-3 text-muted" href="index.php">Home</a>
      
    </p>
    <p class="text-muted">&copy; 2017–2022</p>
  </form>
</main>


    
  </body>
</html>
