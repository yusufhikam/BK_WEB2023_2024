<?php
// $koneksi = mysqli_connect('localhost', 'root', '','poliklinik');
$host = "localhost";
$username = "root";
$password = "";
$database = "poliklinik";

$koneksi = new mysqli($host, $username, $password, $database);

function ambil_id_dokter($username, $koneksi){
    $query = mysqli_query($koneksi, "SELECT id_dokter FROM users WHERE username='$username'");

    if (!$query) {
        die('Error: ' . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die('Tidak ada data ditemukan untuk username: ' . $username);
    }


    return $data['id_dokter'];
}

if($koneksi->connect_error){
    die("Connection Failed: ".$koneksi->connect_error);
}
?>
