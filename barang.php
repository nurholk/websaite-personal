<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang</title>
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
                <form action="barang.php" method="GET">
                    <input type="text" name="search" placeholder="Pencarian Barang">
                    <input type="submit" name="cari" value="Cari barang">
                </form>
            </div>
        </div>

        <!-- Barang -->
        <div class="section">
            <div class="container">
                <h3>Barang</h3>
                <div class="box">
                    <?php
                    $where = '';
                    if (isset($_GET['search']) && $_GET['search'] != '') {
                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                        $where = "AND nama_barang LIKE '%$search%' ";
                    }

                    $barang = mysqli_query($conn, "SELECT * FROM barangs WHERE barang_status = 1 $where ORDER BY barang_id DESC");

                    if (mysqli_num_rows($barang) > 0) {
                        while ($p = mysqli_fetch_array($barang)) {
                    ?>
                            <a href="detail-barang.php?id=<?php echo $p['barang_id'] ?>">
                                <div class="col-4">
                                    <img src="<?php echo $p['barang_image']; ?>" alt="<?php echo $p['nama_barang']; ?>">
                                    <p class="nama"><?php echo $p['nama_barang']; ?></p>
                                    <p class="harga">Rp <?php echo $p['barang_harga']; ?></p>
                                </div>
                            </a>
                    <?php
                        }
                    } else {
                    ?>
                        <p>Barang tidak ada</p>
                    <?php
                    }
                    ?>
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
    </div>
</body>

</html>
