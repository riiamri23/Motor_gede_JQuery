<?php

include_once 'includes/koneksi.php'; 
include_once 'includes/function.php';

$id=$_GET['id'];
$sql = "select * from barang where id_barang = $id";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);

$id_barang = $row['id_barang'];
$nama_barang = $row['nama_barang'];
$harga_barang = $row['harga_barang'];
$gambar_barang = $row['gambar_barang'];
$deskripsi_barang = $row['deskripsi_barang'];
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
    <script src="js/myscript.js"></script>
  
</head>
<body>
<div data-role="page">
        <div data-role="header" data-theme="c">
            <a data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="index.php">Home</a>
            <h1>Moge Imajinasi</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content" align="middle" >
                <img src="<?php echo $gambar_barang ?>" width="95%" >
                <h2><?php echo $nama_barang; ?></h2>
                <h3><?php echo rupiah($harga_barang); ?></h3>
                <div  align="left">
                    <p><strong>Deskripsi :</strong></p>
                    <p id="deskripsi" readonly><?php echo $deskripsi_barang ?></p>
                </div>
                <div data-role="popup" id="popupChart" data-overlay-theme="b" data-theme="b" data-dismissible="false" >
                    <div data-role="header" data-theme="c">
                        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                        <h1>Masukkan ke Keranjang</h1>
                    </div><!-- /header -->
                    
                    <input type="text" name="name2" id="name2" value=""                                               data-clear-btn="true">
        
                    <textarea cols="50" rows="8" name="textarea2"                                                     id="textarea2"></textarea>
                </div>
                <div data-role="popup" id="popupBuy" data-overlay-theme="b" data-theme="b" data-dismissible="false" >
                    <div data-role="header" data-theme="c">
                        <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                        <h1>Beli Barang</h1>
                    </div><!-- /header -->
                    
                    <div class="ui-field-contain">
                        <label for="nama">Atas Nama :</label><input type="text" name="nama" id="nama">
                    </div>
                    <div class="ui-field-contain">
                        <label for="tujuan">Alamat Tujuan :</label><textarea cols="50" rows="8" name="tujuan" id="tujuan"></textarea>
                    </div>
                    <div class="ui-field-contain">
                        <label for="select-native-1">Kurir:</label>
                        <select name="select-native-1" id="select-native-1">
                            <option value="1">Kurir 1</option>
                            <option value="2">Kurir 2</option>
                        </select>
                    </div>
                    <div class="ui-field-contain">
                        <p><?php echo $nama_barang; ?></p>
                        <label for="jumlah">Jumlah Beli :</label><input type="range" name="jumlah" id="jumlah" value="1" min="0" max="10" data-highlight="true">
                        <p style="text-align:right; font-weight:bold;" id="total"><?php echo rupiah($harga_barang); ?></p>
                    </div>
                    <div class="ui-field-contain"> 
                        <button type="submit" id="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Pembayar</button>
                    </div>
                </div>
            
        </div><!-- /content -->
        <div data-role="footer" data-id="foo1" data-position="fixed">
            <div data-role="navbar">
                <ul>
                    <li>
                        
                        <a data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" id="keranjang" data-icon="plus" data-theme="a" href="#popupChart" >Keranjang</a>
                    </li>
                    <li>
                        <a data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" id="pesan" data-icon="shop" data-theme="b" href="#popupBuy">Beli</a>
                    </li>
                </ul>
            </div><!-- /navbar -->
        </div><!-- /footer -->
    </div><!-- /page -->

    <script>
        $(document).ready(function(){
            var harga = <?php echo $harga_barang ?>;
            var total;
            $("#jumlah").change(function(){
                var jumlah = $(this).val();
                total = jumlah * harga;
                $("#total").text(rupiah(total));
            });
        });
    </script>
</body>
</html>