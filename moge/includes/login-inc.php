
<?php
    include 'koneksi.php';
    session_start();
        $uid = $_POST['username'];
        $pwd = $_POST['password'];
        $query ="SELECT * FROM user
        WHERE username = '$uid' AND password = '$pwd'";
        $result = mysqli_query($koneksi, $query);
        $resultCheck = mysqli_num_rows($result);
        
        
        if($resultCheck < 1){
            echo 'fail';
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                $_SESSION['uid'] = $row['username'];
                $_SESSION['pwd'] = $row['password'];
                $_SESSION['id_user'] = $row['id_user'];
    
                echo 'success';
                exit();
            }
        }
?>