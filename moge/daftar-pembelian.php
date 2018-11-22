<?php

include_once 'includes/koneksi.php'; 
include_once 'includes/function.php';

session_start();
$user_id = ''; 
$username = '';
if(!empty($_SESSION['id_user']) && !empty($_SESSION['uid'])){
    $user_id = $_SESSION['id_user'];
    $username = $_SESSION['uid'];
}


$sql = "SELECT * FROM db_moge.penjualan a
left outer join barang b on a.id_barang = b.id_barang
left outer join user c on a.id_user = c.id_user
order by id_penjualan DESC";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
    <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.4.0-rc.1.js"></script>
  
</head>
<body>
<div data-role="page">
        <div data-role="header" data-theme="c">
            <a rel="external" data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="index.php" >Back</a>
            <h1>Moge Imajinasi</h1>
           
            
        </div><!-- /header -->
        <div role="main" class="ui-content" align="middle" >
            <ul data-role="listview" data-inset="true">
            <?php 
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){ 
                    $id_penjualan = $row['id_penjualan'];
                    $tgl_penjualan = date('Y-m-d', strtotime($row['tgl_penjualan']));
                    $id_barang = $row['id_barang'];
                    $atas_nama = $row['atas_nama'];
                    $alamat_tujuan = $row['alamat_tujuan'];
                    $kurir = $row['kurir'];
                    $bank = $row['bank'];
                    $total_bayar = $row['total_bayar'];
                    $nama_barang = $row['nama_barang'];
                    $harga_barang = $row['harga_barang'];
                    $gambar_barang = $row['gambar_barang'];
                    $deskripsi_barang = $row['deskripsi_barang'];
                    $kode_pembayaran = $row['kode_pembayaran'];
                    $status = $row['status'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $nama = $row['nama'];
                    $phone = $row['phone'];
                    if($row['jenis_kelamin'] == 0){
                        $jk = 'Pria';
                    }else if($row['jenis_kelamin'] == 1){
                        $jk = 'Wanita';
                    }
                    ?>
                    <li><a href="#popupPembelian<?php echo $id_penjualan; ?>" data-rel="popup" data-position-to="window">
                        <img src="<?php echo $gambar_barang ?>">
                        <h1><?php echo $nama_barang; ?></h1>
                        <h5><?php echo Rupiah($harga_barang); ?></h5>
                        <p>Kode Bayar : <?php echo $kode_pembayaran; ?></p>
                        <p>User : <?php echo $username ?></p>
                        <p>Tanggal Pembelian <strong><em><?php echo tanggal_indo($tgl_penjualan, true); ?></em></strong></p>
                        </a>
                            <div data-role="popup" id="popupPembelian<?php echo $id_penjualan; ?>" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15">
                            <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img src="<?php echo $gambar_barang ?>" alt="Photo landscape">
                            <p>Kode Pembayaran : <strong><?php echo $kode_pembayaran; ?></strong></p>
                            <h3><?php echo $nama_barang; ?></h3>
                            <h4>Atas Nama : <?php echo $atas_nama; ?></h4>
                            <h4>Jasa Pengantar : <?php echo $kurir ?></h4>
                            <h4>Tujuan : </h4>
                            <p><?php echo $alamat_tujuan ?></p>
                            <h4>Status</h4>
                            <p><em><?php echo $status; ?></em></p>
                            <p><strong>Harga</strong></p>
                            <p><?php echo Rupiah($harga_barang); ?></p>
                            <input type="hidden" id="id_penjualan" value="<?php echo $id_penjualan; ?>">
                            
                            <?php if($status == 'belum dibayar'){ ?>
                            <button type="submit" id="submit_pembayaran" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Konfirmasi Pembayaran</button>
                            <?php } ?>
                            
                        </div>
                    </li>
                 <?php  }} ?>
            </ul>
            
        </div><!-- /content -->

        <script src="js/myscript.js"></script>
        <script>

            $(document).delegate("body", "pageinit", function(){
                $("#submit_pembayaran").click(function(){
                    var id_penjualan = $("#id_penjualan").val();
                    var konfirmasi = "Barang dalam perjalanan";

                    $.ajax({
                        url:"includes/barang-knfrmasi-inc.php",
                        method:"POST",
                        data:{
                            id_penjualan:id_penjualan,
                            konfirmasi:konfirmasi
                        },
                        success:function(result){
                            window.location = "daftar-pembelian.php";
                        },
                        error:function(er){
                            alert(er);
                            window.location = "daftar-pembelian.php";
                        }
                    });
                });
            });

        </script>
        
    </div><!-- /page -->

</body>
</html>