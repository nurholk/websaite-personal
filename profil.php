<?php 
    include 'koneksi.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_adminn WHERE admin_id = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
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

    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box"> 
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_tellpon ?>" required>
                    <input type="text" name="email" placeholder="Gmail" class="input-control" value="<?php echo $d->admin_gmail ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="button">
                </form>
                <?php 
                    if(isset($_POST['submit'])){
                        $nama = $_POST['nama'];
                        $user = $_POST['user'];
                        $hp   = $_POST['hp'];
                        $gmail = $_POST['email'];    
                        $alamat = $_POST['alamat'];

                        $update = mysqli_query($conn,"UPDATE tb_adminn SET 
                            admin_name = '".$nama."',
                            username = '".$user."',
                            admin_tellpon = '".$hp."',
                            admin_gmail = '".$gmail."',  
                            admin_address = '".$alamat."'
                            WHERE admin_id = '".$_SESSION['id']."'");
                        
                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'Gagal '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <small> Copyright &copy; 2023 - bukajualan</small>
        </div>
    </footer>
</body> 
</html>
