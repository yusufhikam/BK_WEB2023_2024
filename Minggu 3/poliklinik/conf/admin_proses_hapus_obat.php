<?php
session_name('admin_session');

session_start();


include('koneksi.php');


// cek ketersediaan data parameter 'id' pada url
if (isset($_GET['id'])) {
    // mendapatkan id obat dari parameter URL
    $id_obat = $_GET['id'];

    // query untuk menghapus data obat berdasarkan ID
    $query = "DELETE FROM obat WHERE id = '$id_obat'";
    $result = mysqli_query($koneksi, $query);

    // Pengecekan apakah query berhasil dijalankan
    if ($result) {
        header('Location: ../admin_dashboard_obat.php?sukses=1'); 
    } else {
        // Handle kesalahan query
        echo "Error deleting data obat: " . mysqli_error($koneksi);
    }
} else {
    // Handle jika parameter 'id' tidak tersedia pada URL
    echo "ID obat tidak tersedia pada URL.";
    exit;
}
?>
