
<?php


    include_once 'koneksi.php'; 
    include_once 'function.php';
    $sql = "select * from barang";
    $result = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($result) > 0){
        $counter = 0;
        while($row = mysqli_fetch_assoc($result)){
            $id_barang = $row['id_barang'];
            $nama_barang = $row['nama_barang'];
            $harga_barang = $row['harga_barang'];
            $gambar_barang = $row['gambar_barang'];
            $deskripsi_barang = $row['deskripsi_barang'];
            
                ?>
                
            <div class="ui-block-b">
                <a href="<?php echo '#'.$id_barang ?>" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">
                    <img src="<?php echo $gambar_barang ?>" width="95%">
                <p><?php echo $nama_barang ?></p>           
                <p><?php echo rupiah($harga_barang) ?> </p></a>
                <div data-role="popup" id="<?php echo $id_barang ?>" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15">
                    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img src="<?php echo $gambar_barang ?>" alt="Photo landscape">
                <h3><?php echo $nama_barang; ?></h3>
                <p><?php echo $deskripsi_barang; ?>
                </p>
                <p><strong>Harga</strong></p>
                <p><strong><?php echo rupiah($harga_barang) ?></strong> </p>
                <input type="button" value="Buy!">
                </div>
            </div>
                <?php
        }
    }else {
        echo "Tidak ada data yang akan di tampilkan";
    }

?>
