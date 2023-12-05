<?php
include 'koneksi.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Validasi ID kategori
$id_kategori = $_GET['id'];
$kategori = mysqli_query($conn, "SELECT * FROM categoryy WHERE category_id = '$id_kategori'");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="data-kategori.php"</script>';
}

$k = mysqli_fetch_object($kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Kategori</title>
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
            <h3>Edit data kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
                    <input type="submit" name="submit" value="Submit" class="button">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    // Validasi input
                    $nama = ucwords($_POST['nama']);

                    // Update data kategori
                    $update = mysqli_query($conn, "UPDATE categoryy SET category_name = '$nama' WHERE category_id = '$k->category_id'");
                    
                    if ($update) {
                        echo '<script>alert("Edit Data Berhasil"); window.location="data-kategori.php"</script>';
                    } else {
                        echo '<script>alert("Gagal: ' . mysqli_error($conn) . '")</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - bukajualan</small>
        </div>
    </footer>
</body>

</html>
