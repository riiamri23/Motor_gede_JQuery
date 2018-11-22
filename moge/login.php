
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
            <a data-iconpos="notext" data-role="button" data-icon="back" title="Home" href="index.php">Home</a>
        </div><!-- /header -->
        <div role="main" class="ui-content">
            <h1>Login Form</h1>
                <label >Username</label>
                <input type="text" id="username" value="">
                <label >Password</label>
                <input type="password" id="password" value="">
                <fieldset data-role="controlgroup">
                    <input type="checkbox" name="chck-rememberme" id="chck-rememberme" checked="">
                    <label for="chck-rememberme">Remember me</label>
                </fieldset>
                <button rel="external" type="submit" id="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Login</button>
            <p class="mc-top-margin-1-5">Belum punya akun? <a rel="external" href="registrasi.php" id="linkRegistrasi" data-theme="a"  >Klik disini</a></p>
        </div><!-- /content -->



        <script>
        $(document).delegate("body", "pageinit", function(){
            $("#submit").click( function(){
                var username = $("#username").val();
                var password = $("#password").val();
                $.ajax({
                    url:"includes/login-inc.php",
                    method:"POST",
                    data:{
                        username:username,
                        password:password
                    },
                    success:function(result){
                        window.location = "index.php";
                    },
                    error:function(er){
                        alert(er);
                        window.location = "login.php";
                    }
                });
            });
        });
    </script>
    </div><!-- /page -->

</body>
</html>