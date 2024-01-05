<?php
session_start();
include('koneksi.php');


$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_poli = $_POST['id_poli'];

// Query untuk menyimpan data ke tabel dokter
$query_dokter = "INSERT INTO dokter (nama, alamat, no_hp, id_poli) VALUES ('$nama', '$alamat', '$no_hp', '$id_poli')";
$result_dokter = $koneksi->query($query_dokter);

if ($result_dokter) {
    // Jika penyimpanan data dokter berhasil, ambil ID dokter yang baru saja ditambahkan
    $id_dokter = $koneksi->insert_id;

    // Buat username dari nama dokter
    $username = strtolower(str_replace(' ', '', $nama));

    // Buat password dari nomor HP dokter
    $password = $no_hp;

    // Query untuk menyimpan data ke tabel users
    $query_users = "INSERT INTO users (username, password, id_dokter, role) VALUES ('$username', '$password', '$id_dokter', 'dokter')";
    $result_users = $koneksi->query($query_users);

    if ($result_users) {
        // Jika penyimpanan data users berhasil
        header("Location: ../admin_dashboard_dokter.php?sukses=1");
    } else {
        // Jika penyimpanan data users gagal
        header("Location: ../admin_dashboard_dokter.php?error=1");
    }
} else {
    // Jika penyimpanan data dokter gagal
    header("Location: ../admin_dashboard_dokter.php?error=1");
}

// Tutup koneksi ke database
$koneksi->close();
?>
