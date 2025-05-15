<?php
include 'includes/header.php';
include 'includes/koneksi.php';

$search = isset($_GET['search']) ? $koneksi->real_escape_string($_GET['search']) : '';
?>
<div class="container mt-5">
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-primary text-white py-3">
            <h3 class="mb-0"><i class="bi bi-list-ul me-2"></i>Daftar Tamu</h3>
        </div>
        
        <div class="card-body">
            <form method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" 
                           placeholder="Cari berdasarkan nama atau instansi..." 
                           value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Tujuan</th>
                            <th>Tanggal/Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM buku_tamu 
                                  WHERE nama LIKE '%$search%' OR instansi LIKE '%$search%'
                                  ORDER BY tanggal DESC, waktu DESC";
                        $result = $koneksi->query($query);
                        
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>$no</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['instansi']}</td>
                                    <td>{$row['tujuan']}</td>
                                    <td>" . date('d/m/Y', strtotime($row['tanggal'])) . "<br>" . $row['waktu'] . "</td>
                                </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Tidak ada data tamu</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
$koneksi->close();
include 'includes/footer.php'; 
?>