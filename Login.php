<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login"> 
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="button">
        </form>
        <?php 
            if (isset($_POST['submit'])){
                session_start();
                include 'koneksi.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn, "SELECT * FROM tb_adminn WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if (mysqli_num_rows($cek) > 0 ){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d -> admin_id;
                    echo '<script>window.location="beranda.php"</script>';
                } else {
                    echo '<script>alert("Username atau password Anda salah!")</script>';
                }
            }
        ?> 
    </div>
</body> 
</html>
