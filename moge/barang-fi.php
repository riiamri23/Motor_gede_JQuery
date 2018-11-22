
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery.mobile-1.4.0-rc.1.js"></script>
  
</head>
<body>
<div data-role="page">
        <div data-role="header" data-theme="c">
            <a rel="external" data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="index.php">Home</a>
            <h1>Moge Imajinasi</h1>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h3>Tambah Barang Form</h3>
            <form data-ajax="false" method="POST" action="-barang-i-inc.php" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga"  value="">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="berkas">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" ></textarea>
                <button type="submit" name="submit" id="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Tambah Barang</button>
            </form>
        
        </div><!-- /content -->
        <script type="text/javascript">
        </script>
    </div><!-- /page -->
</body>
</html>