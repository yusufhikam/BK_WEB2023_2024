 $query = "SELECT daftar_poli.no_antrian, daftar_poli.status, poli.nama_poli, dokter.nama AS nama_dokter, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai
                            FROM daftar_poli 
                            JOIN poli ON daftar_poli.id_poli = poli.id
                            JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                            JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                            WHERE daftar_poli.id_pasien = '$id_pasien'";
                    
                            // $result = $koneksi->query($query);
                            $result = mysqli_query($koneksi, $query);
                    ?>
