<?php

include_once 'includes/koneksi.php'; 
include_once 'includes/function.php';

session_start();
$user_id = ''; 
$username = '';
if(!empty($_SESSION['id_user']) && !empty($_SESSION['uid'])){
    $user_id = $_SESSION['id_user'];
    $username = $_SESSION['uid'];
}else{
    $user_id ='';
    $user_id ='';
}

$tgl_sekarang = date("Y-m-d");

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
  
</head>
<body>
<div data-role="page">
        <div data-role="header" data-theme="c">
            <a rel="external" data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="index.php" >Back</a>
            <h1>Moge Imajinasi</h1>
            <?php if($user_id == 1){ ?>
                <a data-iconpos="notext" data-role="button" data-icon="edit" title="Home" href="#popupEdit" data-rel="popup" data-position-to="window" href="#popupBuy">Edit</a>
                <div data-role="popup" id="popupEdit" data-transition="pop"  data-overlay-theme="b" data-theme="b" data-dismissible="false">
                    <div data-role="header" data-theme="c">
                        <a rel="external" href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                        <h1>Edit Barang</h1>
                    </div><!-- /header -->
                    
                    <form data-ajax="false" method="POST" action="-barang-e-inc.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang; ?>">
                    <div class="ui-field-contain">
                        <label for="nama_barang">Nama Barang :</label><input type="text" name="nama_barang" id="nama_barang" value="<?php echo $nama_barang; ?>">
                    </div>
                    <div class="ui-field-contain">
                        <label for="harga_barang">Harga Barang :</label><input type="number" name="harga_barang" id="harga_barang" value="<?php echo $harga_barang; ?>">
                    </div>
                    <div class="ui-field-contain">
                        <label for="harga_barang">Gambar Barang :</label><input type="file" name="berkas" id="gambar_barang">
                    </div>
                    <div class="ui-field-contain">
                        <label for="deskripsi_barang">deskripsi Barang :</label>
                        <textarea cols="50" max-rows="8" name="deskripsi_barang" id="deskripsi_barang"><?php echo $deskripsi_barang; ?></textarea>
                    </div>
                    <div class="ui-field-contain">
                        <button type="submit" id="submit_barang" name="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Ubah</button>
                    </div>
                    </form>
                </div>
            <?php } ?>
            
        </div><!-- /header -->
        <div role="main" class="ui-content" align="middle" >
                <?php if($gambar_barang !=''){ ?>
                    <img src="<?php echo $gambar_barang ?>" width="95%" >
                <?php }else{ ?>
                    
                <?php } ?>

                <h2><?php echo  $nama_barang; ?></h2>

                <h3><?php echo rupiah($harga_barang); ?></h3>

                <div  align="left">
                    <p><strong>Deskripsi :</strong></p>
                    <p id="deskripsi" readonly><?php echo $deskripsi_barang ?></p>
                </div>

                <div data-role="popup" id="popupBuy" data-transition="pop"  data-overlay-theme="b" data-theme="b" data-dismissible="false">
                    <div data-role="header" data-theme="c">
                        <a rel="external" href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
                        <h1>Beli Barang</h1>
                    </div><!-- /header -->
                        <div class="ui-field-contain">
                            <label for="nama">Atas Nama :</label><input type="text" name="nama" id="nama">
                        </div>
                        <div class="ui-field-contain">
                            <label for="tujuan">Alamat Tujuan :</label><textarea cols="50" rows="8" name="tujuan" id="tujuan"></textarea>
                        </div>
                        <div class="ui-field-contain">
                            <label>Kurir :</label>
                            <select id="kurir">
                                <option value="kurir 1">Kurir 1</option>
                                <option value="kurir 2">Kurir 2</option>
                            </select>
                        </div>
                        <div class="ui-field-contain">
                            <label>Bank :</label>
                            <select id="bank">
                                <option value="bank 1">Bank 1</option>
                                <option value="bank 2">Bank 2</option>
                                <option value="bank 2">Bank 3</option>
                            </select>
                        </div>
                        <div class="ui-field-contain">
                            <p><?php echo $nama_barang; ?></p>
                            <label for="jumlah">Jumlah Beli :</label><input type="range" name="jumlah" id="jumlah" value="1" min="0" max="10" data-highlight="true">
                            <p style="text-align:right; font-weight:bold;" id="total"><?php echo rupiah($harga_barang); ?></p>
                        </div>
                        <div class="ui-field-contain">
                            <input type="hidden" id="h-total" value="<?php echo $harga_barang; ?>">
                            <button type="submit" id="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Pembayar</button>
                        </div>
                </div>
            
        </div><!-- /content -->
        <div data-role="footer" data-id="foo1" data-position="fixed">
            <div data-role="navbar">
                <ul>
                    <li>
                        <a data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" id="pesan" data-icon="shop" href="#popupBuy">Beli</a>
                    </li>
                </ul>
            </div><!-- /navbar -->
        </div><!-- /footer -->

        <script src="js/myscript.js"></script>
        <script>
            $(document).delegate("body", "pageinit",function(){
                $("#jumlah").change(function(){
                    var harga = <?php echo $harga_barang ?>;
                    var total;
                    var jumlah = $(this).val();
                    total = jumlah * harga;
                    $("#total").text(rupiah(total));
                    $("#h-total").val(total);
                });

                $("#submit").click(function(){
                    var id_user = <?php echo $user_id; ?>;
                    var id_barang = <?php echo $id_barang; ?>;
                    var atas_nama = $('#nama').val();
                    var alamat_tujuan = $('#tujuan').val();
                    var kurir = $('#kurir').val();
                    var total = $('#h-total').val();
                    var bank = $('#bank').val();

                    $.ajax({
                        url:"includes/barang-beli-inc.php",
                        method:"POST",
                        data:{
                            id_user:id_user,
                            id_barang:id_barang,
                            atas_nama:atas_nama,
                            alamat_tujuan:alamat_tujuan,
                            kurir:kurir,
                            bank:bank,
                            total:total
                        },
                        success:function(result){
                            window.location = "riwayat-pembelian.php";
                        },
                        error:function(er){
                            alert(er);
                            window.location = "barang-detail.php";
                        }
                    });
                });
                
               
            });
        </script>
        
    </div><!-- /page -->

</body>
</html>