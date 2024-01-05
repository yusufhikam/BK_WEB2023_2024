<?php

session_start();

include('koneksi.php');

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    // $no_rm = $_POST['no_rm'];
    // $id_pasien = $_SESSION['id_pasien'];
    $id_poli = $_POST['id_poli'];
    $id_jadwal = $_POST['id_jadwal'];
    $keluhan = $_POST['keluhan'];

    if( empty($id_poli) || empty($id_jadwal) || empty($keluhan)){
        $_SESSION['error'] = "Silahkan Lengkapi Form.";
        header('Location: ../pasien_dashboard_poli');
        exit();
    }

    if (isset($_SESSION['id_pasien'])) {
        $id_pasien = $_SESSION['id_pasien'];
    } else {
        $_SESSION['error'] = 'Sesi tidak valid. Silakan login kembali.';
        header('Location: ../login_pasien.php');
        exit();
    }

    $query_antrian = "SELECT MAX(no_antrian) AS max_antrian FROM daftar_poli WHERE id_poli = '$id_poli' AND id_jadwal = '$id_jadwal'";
    $result_antrian = $koneksi->query($query_antrian);

    if($result_antrian === FALSE){
        $_SESSION['error'] = "Error mengambil antrian: " . $koneksi->error;
        header('Location: ../pasien_dashboard_poli.php');
        exit();
    }

    $row_antrian = $result_antrian->fetch_assoc();
    $nomor_antrian = $row_antrian['max_antrian'] + 1;

    $query = "INSERT INTO daftar_poli (id_pasien, id_poli, id_jadwal, keluhan, no_antrian)
            VALUES ('$id_pasien','$id_poli','$id_jadwal','$keluhan','$nomor_antrian')";

    if($koneksi->query($query)){
        $_SESSION['success'] = "Pendaftaran Poli Berhasil. Nomor Antrian Anda : $nomor_antrian";
        header('Location: ../pasien_dashboard_poli.php');
        exit();
    } else{
        $_SESSION['error'] = "Error: ". $query . "<br>" . $koneksi->error;
        header('Location: ../pasien_dashboard_poli.php');
        exit();
    }
}else{
    header('Location: ../pasien_dashboard_poli.php');
    exit();
}

?>