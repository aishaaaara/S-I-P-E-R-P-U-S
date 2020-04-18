<?php
include '../koneksi.php';

$sql = "SELECT * FROM peminjaman 
INNER JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota 
INNER JOIN petugas ON peminjaman.id_petugas=petugas.id_petugas
INNER JOIN detail_pinjam ON peminjaman.id_pinjam = detail_pinjam.id_pinjam ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($kon, $sql);
$pinjam = array();
while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
} 
?>

<?php
include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
            <div class="card">
                <div class="card-hedaer">
                    <h2 class="card-title"><i class="fas fa-edit"></i>Data Peminjaman<a href="form-pinjam.php">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-plus"></i></button></a></h2>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="">Choose</option>
                            <option value="1">Yesterday</option>
                            <option value="3">Three Days Ago</option>
                            <option value="7"> A Week Ago</option>
                        </select>
                        
                    </div>
                    <div class="ser">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th csope="col">#</th>
                                    <th csope="col">Nama Peminjam</th>
                                    <th csope="col">Tanggal Pinjam</th>
                                    <th csope="col">Tanggal Jatuh Tempo</th>
                                    <th csope="col">Petugas</th>
                                    <th csope="col">Status</th>
                                    <th csope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no=1;
                            foreach ($pinjam as $p ) {
                            ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $p['nama']?></td>
                                <td><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></td>
                                <td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo'])) ?></td>
                                <td><?= $p['nama_petugas'] ?></td>
                                <td>
                                    <?php
                                    if ($p['status'] == "dipinjam") {
                                        echo'<h5><span class="badge bagde-success">Dipinjam</span></h5>';
                                    } else {
                                        echo'<h5><span class="badge badge-info">Kembali</span></h5>';
                                    }
                                    ?>
                                </td>
                                <td>
                                <a href="detail.php?id_pinjam=<?php echo $p['id_pinjam']; ?>" class="badge badge-success">Detail</a>
                                <a href="edit.php?id_pinjam=<?php echo $p['id_pinjam']; ?>" class="badge badge-warning">Edit</a>
                                <a href="hapus.php?id_pinjam=<?php echo $p['id_pinjam']; ?>" class="badge badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script sch="search.js"></script>
</div>
<?php
include'../aset/footer.php';
?>