<?php 
    session_start();
    include'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                <li><a href="keluar.php">keluar</a></li>
            </ul>
        </header>
    </div> 

    <!-- content -->
    <div class="section">
        <div class="container"> <!-- Ganti "conteiner" menjadi "container" -->
            <h3>data Barang</h3>
            <div class="box">
                <p><a href="tambah-barang.php">Tambah Data </a></p>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th width ="60px">No</th>
                            <th>kategori</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width ="150px">Aksi</th>

                        </tr>
                    </thead>
                        <?php 
                            $no = 1;
                            $barangs = mysqli_query($conn, "SELECT * FROM barangs LEFT JOIN categoryy USING (category_id) ORDER BY barang_id DESC");
                            if (mysqli_num_rows($barangs) > 0 ){
                            while ($row = mysqli_fetch_array($barangs)){
                        ?>
                    <tbody> 
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['nama_barang'] ?></td>
                            <td>Rp. <?php echo number_format ($row['barang_harga'])?></td>
                            <td><?php echo $row['barang_deskripsi'] ?></td>
                            <td><img src="barang/<?php echo $row['barang_image']?>" width =50px></td>
                            <td><?php echo ($row['barang_status'] == 0)? "TIDAK AKTIF":"AKTIF";?></td>
                            <td>
                                <a href="edit-barang.php?id=<?php echo $row ['barang_id']?>">Edit</a> 
                                <a href="proses-hapus.php?idp=<?php echo $row ['barang_id']?>" onclick="return confirm('YAKIN INGIN HAPUS ?')" >Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{  ?>
                            <tr> 
                                <td colspan="8">Tidak ada Data</td>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>
           
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container"> <!-- Ganti "conteiner" menjadi "container" -->
            <small> Copyright &copy; 2023 - bukajualan</small>
        </div>
    </footer>
                
</body> 
</html>
