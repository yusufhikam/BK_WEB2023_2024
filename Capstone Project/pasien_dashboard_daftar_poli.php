 $id_pasien = $_SESSION['id_pasien'];
            
                    // Include your database connection file (e.g., koneksi.php)
                    // include('koneksi.php');

                    // Query to retrieve data from the obat table
                    // $query = "SELECT dp.no_antrian, p.nama_poli, d.nama AS nama_dokter, jp.hari, jp.jam_mulai, jp.jam_selesai, dp.status
                    //         FROM daftar_poli dp
                    //         JOIN poli p ON dp.id_poli = p.id
                    //         JOIN jadwal_periksa jp ON dp.id_jadwal = jp.id
                    //         JOIN dokter d ON jp.id_dokter = d.id
                    //         WHERE dp.id_pasien = '$id_pasien'
                    //         ORDER BY dp.no_antrian DESC";
                    $query = "SELECT daftar_poli.no_antrian, daftar_poli.status, poli.nama_poli, dokter.nama AS nama_dokter, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai
                            FROM daftar_poli 
                            JOIN poli ON daftar_poli.id_poli = poli.id
                            JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                            JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                            WHERE daftar_poli.id_pasien = '$id_pasien'";
                    
                            // $result = $koneksi->query($query);
                            $result = mysqli_query($koneksi, $query);
                    ?>
                        <div class="col-md-8">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Riwayat Daftar Poli</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Poli</th>
                                                <th>Dokter</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Antrian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $no = 1;
                                        while ($data = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['nama_poli']; ?></td>
                                                <td><?php echo $data['nama_dokter']; ?></td>
                                                <td><?php echo $data['jam_mulai']; ?></td>
                                                <td><?php echo $data['jam_selesai']; ?></td>
                                                <td><?php echo $data['no_antrian']; ?></td>
                                                <td><?php echo $data['status'] == 'Sudah Diperiksa' ? 'Sudah Diperiksa' : 'Belum Diperiksa'; ?>
                                                </td>
                                               
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
