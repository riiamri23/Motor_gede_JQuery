<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login-style.css" />
    <script >
        $(document).ready(function(){
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                return false;
            });
        });
    </script>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="name"/>
                <input type="password" placeholder="password"/>
                <input type="text" placeholder="email address"/>
                <button>create</button>
                <p class="message">Sudah Registrasi? <a href="#">Masuk</a></p>
            </form>
            <form class="login-form" action="includes/login.php" method="post">
                <input type="text" placeholder="username"/>
                <input type="password" placeholder="password"/>
                <button type="submit">login</button>
                <p class="message">Belum Registrasi? <a href="#">Buat Akun</a></p>
            </form>
        </div>
    </div>
</body>
</html>