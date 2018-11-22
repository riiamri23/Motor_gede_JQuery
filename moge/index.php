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

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
  <script src="js/jquery.js"></script>
  <script src="js/jquery.mobile-1.4.0-rc.1.js"></script>
</head>
<body>
    <div data-role="page">
        <div data-role="header" data-theme="c">
            <a data-iconpos="notext" data-role="button" data-icon="home" title="Home" href="index.php">Home</a>
            <h1>Motor Imajinasi
            </h1>
            <a data-iconpos="notext" data-rel="popup" data-transition="pop" data-icon="flat-menu" data-role="button" href="#popupMenu">Menu</a>
            
            
            <div data-role="popup" id="popupMenu" data-overlay-theme="b" data-theme="b" data-dismissible="false">
                <a data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><ul data-role="listview">
                <?php
                    if(empty($_SESSION['id_user']) && empty($_SESSION['uid'])){
                        ?>
                    <li><a rel="external" href="login.php" >Login</a></li>
                <?php
                    }else{
                ?>
                    <li><a rel="external" href="#">hi, <?php echo $username  ?></a></li>
                <?php if($user_id != 1){ ?>
                    <li><a rel="external" href="riwayat-pembelian.php">Riwayat Pembelian</a></li>
                <?php }else{ ?>
                    <li><a rel="external" href="daftar-pembelian.php">Daftar Pembelian</a></li>
                <?php } ?>
                    <li>
                        <a id="submit">Logout</a>
                    </li>
                <?php
                    }
                ?>
                </ul>
            </div>
        </div>

        <div data-role="content" role="main"> 
            <p>Daftar Motor 
            <?php if($username == 'admin'){
                ?>
                <a rel="external" href="barang-fi.php">Tambah Barang</a>
            <?php
            } ?></p>
            <hr>
            <fieldset id="data" class="ui-grid-a">
                <?php
                $sql = "select * from barang order by id_barang DESC";
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
                            <a id="link" rel="external" href="barang-detail.php?id=<?php echo $id_barang ?>" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">
                                <img src="<?php echo $gambar_barang ?>" width="95%">
                                <p><?php echo $nama_barang ?></p>           
                                <p><?php echo rupiah($harga_barang) ?> </p>
                            </a>
                        </div>
                <?php
                    }
                }else {
                    echo "Tidak ada data yang akan di tampilkan";
                }

                ?>
                    <script>
                        $(document).delegate("body", "pageinit",function(){
                            $("#submit").click(function(){
                                $.ajax({
                                    url:"includes/logout-inc.php",
                                    method:"POST",
                                    success:function(result){
                                        window.location = "index.php";
                                    },
                                    error:function(er){
                                        alert(er);
                                        window.location = "index.php";
                                    }
                                });
                            });

                        });
                    </script>
            </fieldset>
        </div>
    </div>

</body>
</html>