<?php

    $sql="select * from products order by id_produk desc";
    $hasil=mysqli_query($conn,$sql);
    $jumlah = mysqli_num_rows($hasil);

?>

<div class="row">
    <?php   
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
        <div class="col-sm-3 border border-dark border-opacity-25 border-1 pb-2 mb-3 mx-2">
            <div class="thumbnail">
                <a href="shop.php?halaman=detail&kode_produk=<?php echo $data['kode_produk'];?>"><img src="<?php echo $data['gambar'];?>" width="100%" alt="..."></a>
                <div class="caption">
                    <h5><a class="text-dark text-decoration-none" href="shop.php?halaman=detail&kode_produk=<?php echo $data['kode_produk'];?>"><?php echo $data['nama'];?></a></h5>
                    <h6>Rp. <?php echo number_format($data['harga'],2,',','.'); ?> </h6>
                    <p>Sisa <?php echo $data['stok'];?> Pcs</p>
                    <p><a href="shop.php?halaman=cart&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-outline-dark" role="button" target="_blank">Add to Cart</a></p>
                </div>
            </div>
        </div>
        <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
</div>