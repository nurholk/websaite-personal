<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <div class="container">
        <header>
            <h1><a href="index.php">WEB KAIN</a></h1>
            <ul>
                <li><a href="barang.php">Barang</a></li>
            </ul>
        </header>
        <!-- search -->
        <div class="search">
            <div class="container">
                <form>
                    <input type="text" name="search" placeholder="Pencarian Barang">
                    <input type="submit" name="cari" value="Cari barang">
                </form>
            </div>
        </div>
        
        <!-- category -->
        <div class="section">
            <div class="container">
                Kategori
                <div class="box">
                    <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM categoryy ORDER BY category_id DESC"); // Menambahkan koma
                        if (mysqli_num_rows($kategori) > 0 ){
                            while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <a href="barang.php?kat=<?php echo $k['category_id']; ?>"> <!-- Mengganti tag a -->
                        <div class="col-5">
                            <img src="img/kategorii.png" width="50px" style="margin-bottom: 5px;">
                            <p><?php echo $k['category_name']; ?></p>
                        </div>
                    </a>
                    <?php } } else{ ?>
                        <p>Kategori tidak ada</p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div> 
    <!-- Barang -->
    <div class="section">
        <div class="container">
            <h3>Barang Terbaru</h3>
            <div class="box">
                <?php
                    $barang = mysqli_query($conn, "SELECT * FROM barangs ORDER BY barang_id DESC LIMIT 8"); // Menambahkan koma
                    if(mysqli_num_rows($barang) > 0 ){
                        while($p = mysqli_fetch_array($barang)){
                ?>
                <a href ="detail-barang.php?id=<?php echo $p['barang_id']?>">
                    <div class="col-4">
                        <img src="path/to/your/image.jpg" alt="Nama Barang"> <!-- Isi src dengan path atau URL gambar -->
                        <p class="nama"><?php echo $p['nama_barang']; ?></p>
                        <p class="harga">Rp <?php echo $p['barang_harga']; ?></p>
                    </div>
                <?php }} else{?>
                    <p>Barang tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <p>Alamat</p>
            <p>Kp.Laksanamekar RT05/05</p>
            <small>Copyright &copy; 2023 - bukajualan.</small>
        </div>
    </div>
</body> 
</html>
