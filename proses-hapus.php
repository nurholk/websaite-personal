<?php 
include 'koneksi.php';

if(isset($_GET['idk'])){
    $id_kategori = $_GET['idk']; // Simpan nilai $_GET['idk'] dalam variabel untuk menghindari SQL injection
    $delete = mysqli_query($conn, "DELETE FROM categoryy WHERE category_id = '$id_kategori' "); // Gunakan variabel dalam query
    
    if($delete){
        echo '<script>window.location="data-kategori.php"</script>';
    } else {
        echo 'Gagal menghapus data: ' . mysqli_error($conn);
    }
}

if(isset($_GET['idp'])){
    $barangs = mysqli_query($conn, "SELECT barang_image FROM barangs WHERE barang_id = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($barangs);
    
    unlink('uploads/'.$p->barang_image); // Sesuaikan path dengan tempat penyimpanan gambar

    $delete = mysqli_query($conn, "DELETE FROM barangs WHERE barang_id = '".$_GET['idp']."' ");
    echo '<script>window.location="data-barang.php"</script>';
}

?>
