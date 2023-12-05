<?php 
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
            <h3>beranda</h3>
            <div class="box"> <!-- Ganti "conteiner" menjadi "container" -->
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name; ?> Di Web kami</h4>
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
