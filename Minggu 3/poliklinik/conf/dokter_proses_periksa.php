<?php
session_name('dokter_admin_session');
session_start();
include('koneksi.php');

// cek data tersedia
if (isset($_POST['nama_obat'], $_POST['tgl_periksa'], $_POST['catatan'])) {
    $id_pasien = $_GET['id_pasien'];
    $id_dokter = $_SESSION['id_dokter'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $catatan = $_POST['catatan'];

    // mendapatkan id_daftar_poli
    $query_id_daftar_poli = "SELECT id FROM daftar_poli WHERE id_pasien = '$id_pasien'";
    $result_id_daftar_poli = $koneksi->query($query_id_daftar_poli);

    if ($result_id_daftar_poli->num_rows > 0) {
        $data_id_daftar_poli = $result_id_daftar_poli->fetch_assoc();
        $id_daftar_poli = $data_id_daftar_poli['id'];

        // mendapatkan harga obat
        if (isset($_POST['nama_obat']) && is_array($_POST['nama_obat'])) {
            $id_obat = $_POST['nama_obat'];

            $total_biaya = 0;

            foreach ($id_obat as $id_obat_item) {
                // mendapatkan harga obat dari database
                $query_harga_obat = "SELECT harga FROM obat WHERE id = '$id_obat_item'";
                $result_harga_obat = $koneksi->query($query_harga_obat);

                if ($result_harga_obat) {
                    $data_harga_obat = $result_harga_obat->fetch_assoc();
                    $harga_obat = $data_harga_obat['harga'];

                    // tambahkan harga obat ke total biaya
                    $total_biaya += $harga_obat;
                } else {
                    echo "Gagal Mendapatkan Harga obat: " . $koneksi->error;
                    exit;
                }
            }

            // tambahkan biaya jasa dokter
            $biaya_jasa_dokter = 150000;
            $total_biaya += $biaya_jasa_dokter;

            // insert data periksa
            $query_periksa = "INSERT INTO periksa(id_daftar_poli, tgl_periksa, catatan, biaya_periksa)
                            VALUES('$id_daftar_poli','$tgl_periksa','$catatan','$total_biaya')";

            if ($koneksi->query($query_periksa) === TRUE) {
                $id_periksa = $koneksi->insert_id;

                // update status daftar poli
                $query_update_daftar_poli = "UPDATE daftar_poli SET status = 1 WHERE id = '$id_daftar_poli'";
                if ($koneksi->query($query_update_daftar_poli) === FALSE) {
                    echo "Error: " . $query_update_daftar_poli . "<br>" . $koneksi->error;
                    exit;
                }

                // insert detail periksa
                foreach ($id_obat as $id_obat_item) {
                    $query_detail_periksa = "INSERT INTO detail_periksa (id_periksa, id_obat)
                                            VALUES ('$id_periksa','$id_obat_item')";

                    $koneksi->query($query_detail_periksa);
                }

                echo "Data Periksa Berhasil disimpan";
                header('Location: ../dokter_dashboard_periksa_pasien.php');
                exit;
            } else {
                echo "ERROR: " . $query_periksa . "<br>" . $koneksi->error;
                exit;
            }
        } else {
            echo "Data obat tidak valid.";
            exit;
        }
    } else {
        echo "Pasien belum mendaftar poli";
        exit;
    }
} else {
    echo "Data tidak lengkap";
    exit;
}
?>
