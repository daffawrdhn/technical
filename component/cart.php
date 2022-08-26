<?php

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

if (isset($_GET['kode_produk']) && isset($_GET['jumlah'])) {


    $k = array();
    $kode_produk=$_GET['kode_produk'];
    $jumlah=$_GET['jumlah'];


    $sql = "SELECT kode_produk,stok FROM products WHERE kode_produk='$kode_produk'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $kp = $row['kode_produk'];
        $st = $row['stok'];

        array_push($k,$kp);

        foreach($k as $value){
            if($kode_produk != $value){
                header("Location: shop.php?halaman=products");
            }
        }
    } else {
        header("Location: shop.php?halaman=products");
    }

    if($jumlah > $st){
        $jumlah = $st;
        echo "<script>alert('above product stock!')</script>";
    } 

    if($jumlah <= 0) {
        $jumlah = 1;
        echo "<script>alert('below product stock!')</script>";
    }

    $sql= "select * from products where kode_produk='$kode_produk'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($query);
    $kode_produk=$data['kode_produk'];
    $nama_produk=$data['nama'];
    $harga=$data['harga'];
    $stok=$data['stok'];
}else {
    $kode_produk="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}

switch($aksi){	
    case "tambah_produk":
        foreach($k as $value){
            if($kode_produk != $value || $stok <= 0){
                header("Location: shop.php?halaman=products");
            } else {
                $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga,'stok'=>$stok));
                if(!empty($_SESSION["keranjang_belanja"])) {
                    if(in_array($data['kode_produk'],array_keys($_SESSION["keranjang_belanja"]))) {
                        foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                         if($data['kode_produk'] == $k) {
                             $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                            }
                        }
             } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
            }
        }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["kode_produk"] == $k)
                        unset($_SESSION["keranjang_belanja"][$k]);
                    if(empty($_SESSION["keranjang_belanja"]))
                        unset($_SESSION["keranjang_belanja"]);
            }
        }
    break;

    case "update":
        $itemArray = array($kode_produk=>array('kode_produk'=>$kode_produk,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga));
        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($_GET["kode_produk"] == $k)
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
            }
        }
    break;

    case "order":
        $penerima = array("namadepan"=>$_GET['namadepan'], "namatengah"=>$_GET['namatengah'], "namabelakang"=>$_GET['namabelakang']);
        $alamat = array("address1"=>$_GET['address1'], "address2"=>$_GET['address2'], "Kota " ,"city"=>$_GET['city'], "Provinsi " , "state"=>$_GET['state'], "Kode Pos " , "zip"=>$_GET['zip']);

        $jumlah = array();
        $prod = array();
        $total = array();

        if(isset($_SESSION["keranjang_belanja"])){
            $outer_arr = $_SESSION["keranjang_belanja"];
            foreach($outer_arr as $key => $val) {
                // $sef = print($key." ,"); // "kanye"

                $sum = $val['jumlah'] * $val['harga'];
                $pcs = strval($val['jumlah']) . ' ' . "Pcs";

                array_push($jumlah, $pcs);
                array_push($prod, $val['nama_produk']);
                array_push($total, $sum);

                $terbeli = $val['jumlah'];
                $kode = $val['kode_produk'];

                $sqlb = "UPDATE products SET stok=stok - '$terbeli' WHERE kode_produk = '$kode'";
                $resultb = mysqli_query($conn, $sqlb);
            }
        } else {
            echo "<script>Tidak ada produk dalam keranjang.')</script>";
        }
        $t = array_sum($total); $j = implode(", ", $jumlah); $p = implode(", ", $prod); $a = implode(" ",$alamat); $pe = implode(" ",$penerima); $e = $_SESSION['email'];

            $sqla = "INSERT INTO orders (produk, jumlah, alamat, penerima, email, total) VALUES ('$p', '$j', '$a', '$pe', '$e' , '$t')";
            $resulta = mysqli_query($conn, $sqla);


            if ($resultb) {
                $_SESSION['keranjang_belanja'] = array();
                header("Location: shop.php?halaman=order");
            } else {
                echo "<script>alert('Woops! Order error!.')</script>";
            }
        

    break;
}

?>

<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Backdoor - Cart</h1>
        <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>SKU</th>
                    <th width="40%">Product Name</th>
                    <th>Price</th>
                    <th width="10%">QTY</th>
                    <th>Sub Total</th>
                    <th>Menu</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=0;
                    $sub_total=0;
                    $total=0;
                    $total_berat=0;
                    if(!empty($_SESSION["keranjang_belanja"])):
                    foreach ($_SESSION["keranjang_belanja"] as $item):
                        $no++;
                        $sub_total = $item["jumlah"]*$item['harga'];
                        $total+=$sub_total;
                ?>
                    <input type="hidden" name="kode_produk[]" class="kode_produk" value="<?php echo $item["kode_produk"]; ?>"/>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><a class="text-dark" style="text-decoration: none; text-color: black;" href="shop.php?halaman=detail&kode_produk=<?php echo $item["kode_produk"]; ?>"><?php echo $item["kode_produk"]; ?></a></td>
                        <td><a class="text-dark" style="text-decoration: none; text-color: black;" href="shop.php?halaman=detail&kode_produk=<?php echo $item["kode_produk"]; ?>"><?php echo $item["nama_produk"]; ?></a></td>
                        <td>Rp. <?php echo number_format($item["harga"],0,',','.');?> </td>
                        <td>

                        <input type="text" value="<?php echo $item["kode_produk"]; ?>" id="kode<?php echo $no; ?>" name="kode[]" hidden>
                        <input type="number" min="1" max="<?php echo $data["stok"]; ?>" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]">
                        
                        <script>   
                            
                            $("#jumlah<?php echo $no; ?>").bind('change', function () {
                                var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                                var kode<?php echo $no; ?>=$("#kode<?php echo $no; ?>").val();

                                $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);


                                location.href = "shop.php?halaman=cart&kode_produk=" + kode<?php echo $no; ?> + "&aksi=tambah_produk&jumlah=" + jumlah<?php echo $no; ?>;
                                

                            });
                            $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                                return false;
                            });
                            
                        </script>

                        </td>
                        <td>Rp. <?php echo number_format($sub_total,0,',','.');?> </td>

                        <td>
                            <form method="get">
                                <input type="hidden" name="kode_produk"  value="<?php echo $item['kode_produk']; ?>" class="form-control">
                                <input type="hidden" name="aksi"  value="update" class="form-control">
                                <input type="hidden" name="halaman"  value="cart" class="form-control">
                                <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                                <input type="submit" class="btn btn-warning btn-xs" value="Update" hidden>
                            </form>
                            <a href="shop.php?halaman=cart&kode_produk=<?php echo $item['kode_produk']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                        </td>
                    </tr>
                <?php 
                    endforeach;
                    endif;
                ?>
                </tbody>
            </table>
        </div>
    
        <?php
            if(empty($_SESSION['keranjang_belanja'])) {  ?>

                <div class="row mt-3">
                    <div class="col-sm-12 d-flex flex-row-reverse">
                         <a class="btn btn-outline-dark" role="button" href="shop.php">Browse Product</a>
                    </div>
                </div>

                <?php } else { ?>
            
                    <h3 class="text-end">Total Cost Rp. <?php echo number_format($total,0,',','.');?> </h3>

            
                <?php } ?>

</div>
      </div>
</div>

<?php
 include 'information.php';
?>