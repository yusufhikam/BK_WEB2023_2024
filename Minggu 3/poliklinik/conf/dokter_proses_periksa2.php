<?php
session_name('dokter_admin_session');
session_start();
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $id_pasien = $_POST['id_pasien'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $obat = $_POST['nama_obat'];
    $catatan = $_POST['catatan'];
    $biaya_periksa = $_POST['biaya'];

    // Lakukan validasi data jika diperlukan

    // Periksa apakah id_pasien ada di dalam tabel daftar_poli
    $query_check_id_pasien = "SELECT * FROM daftar_poli WHERE id = '$id_pasien'";
    $result_check_id_pasien = $koneksi->query($query_check_id_pasien);

    if ($result_check_id_pasien->num_rows > 0) {
        // Simpan data periksa ke dalam tabel periksa
        $query_periksa = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id_pasien', '$tgl_periksa', '$catatan', '$biaya_periksa')";
        $result_periksa = $koneksi->query($query_periksa);

        if ($result_periksa) {
            $id_periksa = $koneksi->insert_id;

            // Simpan data obat ke dalam tabel detail_periksa
            foreach ($obat as $id_obat) {
                $query_detail_periksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$id_periksa', '$id_obat')";
                $result_detail_periksa = $koneksi->query($query_detail_periksa);

                // Lakukan validasi atau penanganan kesalahan jika diperlukan
                if (!$result_detail_periksa) {
                    echo "Gagal menyimpan detail periksa: " . $koneksi->error;
                    exit;
                }
            }

            // Ubah status di tabel daftar_poli menjadi 1 (sudah diperiksa)
            $query_update_status = "UPDATE daftar_poli SET status = 1 WHERE id = '$id_pasien'";
            $result_update_status = $koneksi->query($query_update_status);

            // Lakukan validasi atau penanganan kesalahan jika diperlukan
            if (!$result_update_status) {
                echo "Gagal mengupdate status: " . $koneksi->error;
                exit;
            }

            // Redirect atau lakukan tindakan sesuai kebutuhan bisnis Anda
            header("Location: dokter_dashboard_periksa_pasien.php");
            exit;
        } else {
            echo "Gagal menyimpan data periksa: " . $koneksi->error;
            exit;
        }
    } else {
        echo "ID pasien tidak valid.";
        exit;
    }
} else {
    echo "Metode HTTP tidak valid.";
    exit;
}

?>
