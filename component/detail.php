<?php

// if($_GET['halaman']!= 'detail' || !isset($_GET['kode_produk'])) {
//     echo "<center><h3>404 Product not found !</h3></center>";
// } else {
//     echo $_GET['halaman'];
//     echo $_GET['kode_produk'];
// }

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

// if(empty($_SESSION['keranjang_belanja'])) {
//     echo "Card Kosong";
// } else {
//     echo "Card Ada";

// }

    $kode = $_GET['kode_produk'];
 
    $sql = "SELECT * FROM products WHERE kode_produk='$kode'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $kodeproduk = $row['kode_produk'];
        $nama = $row['nama'];
        $stok = $row['stok'];
        $keterangan = $row['keterangan'];
        $gambar = $row['gambar'];
    } else {
        header("Location: shop.php?halaman=products");
    }

?>



<div class="row mt-2">
    <div class="col-sm-4">
        <img src="<?php echo $gambar; ?>" class="img-fluid" alt="...">
    </div>
    <div class="col-sm-8 border-start border-1 border-dark border-opacity-25 px-4 ">
        <h1><?php echo $nama; ?></h1>
            <p class="fs-5 col-md-8"><?php echo $keterangan; ?>.</p>
            <p>Stok: <?php echo $stok; ?> Pcs | SKU Product: <?php echo $kodeproduk; ?></p>
            <p><a href="shop.php?halaman=cart&kode_produk=<?php echo $kodeproduk;?>&aksi=tambah_produk&jumlah=1" class="btn btn-outline-dark" role="button" target="_blank">Add to Cart</a></p>
    </div>
</div>
