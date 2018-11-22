
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
            <h1>Moge Imajinasi</h1>
            <a data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="login.php">Home</a>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h1>Registrasi Form</h1>
                
                <div class="ui-field-contain">
                    <label >Username</label>
                    <input type="text" id="username" value="" required>
                </div>
                
                <div class="ui-field-contain">
                    <label >Password</label>
                    <input type="password" id="password" value="" required>
                </div>
                
                <div class="ui-field-contain">
                    <label >E-mail</label>
                    <input type="email" id="email" value="" required>
                </div>
                
                <div class="ui-field-contain">
                    <label >Nama Lengkap</label>
                    <input type="text" id="nama" value="" required>
                </div>
                
                <div class="ui-field-contain">
                    <label for="alamat">Alamat :</label>
                    <textarea cols="50" rows="8" name="alamat" id="alamat"></textarea>
                </div>
                <div class="ui-field-contain">
                    <label >Phone</label>
                    <input type="text" id="phone" value="" required>
                </div>
                <div class="ui-field-contain">
                    <label >Jenis Kelamin</label>
                    <select id="jk">
                        <option value="0">Pria</option>
                        <option value="1">Wanita</option>
                    </select>
                </div>

                <div class="ui-field-contain">
                    <label >Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" value="" required>
                </div>
                
                <fieldset data-role="controlgroup">
                    <input type="checkbox" name="chck-rememberme" id="chck-rememberme" checked="">
                    <label for="chck-rememberme">Saya setuju dengan peraturan yang ada</label>
                </fieldset>
                <button type="submit" id="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Registrasi</button>
        </div><!-- /content -->




        <script>
        $(document).delegate("body", "pageinit", function(){
            $("#submit").click( function(){
                var username = $("#username").val();
                var password = $("#password").val();
                var email = $("#email").val();
                var nama = $("#nama").val();
                var alamat = $("#alamat").val();
                var phone = $("#phone").val();
                var jk = $("#jk").val();
                var tgl_lahir = $("#tgl_lahir").val();

                $.ajax({
                    url:"includes/registrasi-inc.php",
                    method:"POST",
                    data:{
                        username:username,
                        password:password,
                        email:email,
                        nama:nama,
                        alamat:alamat,
                        phone:phone,
                        jk:jk,
                        tgl_lahir:tgl_lahir
                    },
                    success:function(result){
                        window.location = "login.php";
                    },
                    error:function(er){
                        alert(er);
                        window.location = "registrasi.php";
                    }
                });
            });
        });
    </script>
    
    </div><!-- /page -->

</body>
</html>