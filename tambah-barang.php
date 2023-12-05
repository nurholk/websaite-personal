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
    <script src="https://cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
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
            <h3>Tambah Data barang</h3>
            <div class="box"> 
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input-control" name="kategori" required>
                     <option value="">--PILIH--</option>
                     <?php 
                     $kategori = mysqli_query($conn, "SELECT * FROM categoryy ORDER BY category_id DESC");
                     while($r = mysqli_fetch_array($kategori)){
                     ?>
                          <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?></option>
                     <?php } ?>
                   </select>
                    <input type="text" name="nama" class="input-control" placeholder ="Nama Barang" required>
                    <input type="text" name="harga" class="input-control" placeholder ="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder ="deskripsi"></textarea>
                    <select class= "input-control" name="status">
                        <option value="">--PILIH--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="submit" class="button">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        // menampung inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        // menampung data file yang diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        // menampung data format file yang diizinkan
                        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi format file
                        $type1 = explode('.', $filename);
                        $type2 = end($type1);

                        $newname = 'barang' . time() . '.' . $type2;

                        if(in_array($type2, $allowed_types)){
                            // proses upload file 
                            move_uploaded_file($tmp_name, 'uploads/'.$newname);

                            // lakukan insert data ke database
                            $insert = mysqli_query($conn, "INSERT INTO barangs VALUES ( 
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                'uploads/".$newname."',
                                '".$status."',
                                null
                            )");

                            if ($insert){
                                echo '<script>alert("Data berhasil ditambahkan"); window.location="data-barang.php";</script>';
                            } else {
                                echo '<script>alert("Gagal menyimpan data: ' . mysqli_error($conn) . '");</script>';
                            }
                        } else {
                            echo '<script>alert("Format file tidak diizinkan");</script>';
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
                 <script>
                        CKEDITOR.replace( 'deskripsi' );
                </script>
</body> 
</html>
