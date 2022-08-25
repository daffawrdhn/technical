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
        <div class="col-sm-3 border border-dark border-2 pb-2 mx-2">
            <div class="thumbnail">
                <a href="#"><img src="<?php echo $data['gambar'];?>" width="100%" alt="..."></a>
                <div class="caption">
                    <h5><?php echo $data['nama'];?></h5>
                    <h6>Rp. <?php echo number_format($data['harga'],2,',','.'); ?> </h6>
                    <p>Sisa <?php echo $data['stok'];?> Pcs</p>
                    <p><a href="shop.php?halaman=cart&kode_produk=<?php echo $data['kode_produk'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-outline-dark" role="button">Masukan Keranjang</a></p>
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