<?php
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <div class="container">
        <header>
            <h1><a href="beranda.php">WEB KAIN</a></h1>
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="Profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-barang.php">Data Barang</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </header>
    </div> 

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data</h3>
            <div class="box"> 
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="submit" class="button">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $insert = mysqli_query($conn, "INSERT INTO categoryy (category_name) VALUES ('".$nama."')");

                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        } else {
                            echo 'Gagal '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small> Copyright &copy; 2023 - bukajualan</small>
        </div>
    </footer>
</body> 
</html>
