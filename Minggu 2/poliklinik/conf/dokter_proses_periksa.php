<?php 
include('koneksi.php');


session_start();

// cek ddata tersedia
if(isset($_POST['nama_obat'], $_POST['tgl_periksa'], $_POST['catatan'])){
    $id_pasien = $_GET['id_pasien'];
    $id_dokter = $_SESSION['id_dokter'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $catatan = $_POST['catatan'];
    $id_obat = $_POST['nama_obat'];
    $harga_obat = $_POST['harga'];
    $biaya_jasa_dokter = 150000;

    $total_biaya = $harga_obat + $biaya_jasa_dokter;

    $query_periksa = "INSERT INTO periksa(id_daftar_poli, tgl_periksa, catatan, biaya_periksa)
                    VALUES('$id_pasien','$tgl_periksa','$catatan','$total_biaya')";
    
    if($koneksi->query($query_periksa)=== TRUE){
        $id_periksa = $koneksi->insert_id;

        foreach($_POST['nama_obat'] as $id_obat){
            $query_detail_periksa = "INSERT INTO detail_periksa (id_periksa, id_obat)
                                    VALUES ('$id_periksa','$id_obat')";

            $koneksi->query($query_detail_periksa);
        }
        echo "Data Periksa Berhasil disimpan";
        header('Location: ../dokter_dashboard.php');
        
    }else {
        echo "ERROR: " .$query_periksa . "<br>" . $koneksi->error;

    }
}else {
    echo "Data tidak lengkap";

}

?>