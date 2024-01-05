<?php 
session_name('pasien_session');
session_start();
include('koneksi.php');

$id_poli =$_POST['id_poli'];
    $query = "SELECT jp.id, d.nama, jp.hari, jp.jam_mulai, jp.jam_selesai FROM jadwal_periksa jp
        INNER JOIN dokter d ON jp.id_dokter = d.id
        WHERE d.id_poli = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('i',$id_poli);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();

    while ($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    $stmt->close();
    $koneksi->close();

    echo json_encode($data);
?>