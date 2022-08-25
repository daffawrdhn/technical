<?php
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$email = $_SESSION['email'];
if ($conn->connect_errno) {
  die("Connect failed: ".$mysqli->connect_error);
}

$query = "SELECT * FROM orders WHERE email = '$email'";
$result = $conn->query($query);

?>

<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Orders</h1>
        <p class="col-md-8 fs-4">Order detail information</p>

          <div class="table-responsive pb-3">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No. Order</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Penerima</th>
                  <th scope="col">Email</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">

               <?php while($row = $result->fetch_array()){ ?>    

                <tr>
                  <td><?php  echo $row['id']?></td>                
                  <td><?php  echo $row['produk']?></td>                
                  <td><?php  echo $row['jumlah']?></td>                
                  <td><?php  echo $row['alamat']?></td>                                    
                  <td><?php  echo $row['penerima']?></td>                                    
                  <td><?php  echo $row['email']?></td>                                    
                  <td>Rp. <?php echo number_format($row['total'],2,',','.'); ?></td>      
                </tr>

                <?php 
                } ?>

              </tbody>
            </table>
          </div>

        <a class="btn btn-dark btn-lg" role="button" href="shop.php">Browse Product</a>
      </div>
    </div>