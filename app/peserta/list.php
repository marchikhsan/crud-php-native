<div class="row">
    <h4>Selamat Datang</h4>
    <div class="container">
        <a href="<?= base_url('peserta/create'); ?>" class="btn btn-sm btn-primary my-2">Tambah Peserta</a>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $id =  $_GET['id'];
        $query = "DELETE FROM peserta WHERE id_peserta='$id'";
        if (mysqli_query($koneksi, $query)) {
            $_SESSION['flash_data'] = 'Data Berhasil Dihapus';
            header("Location: " . BASE_URL . "peserta");
        } else {
            $_SESSION['flash_data'] = 'Gagal Menghapus Data';
            header("Location: " . BASE_URL . "peserta");
        }
    }
    ?>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Skema</th>
                    <th class="text-center">Nama Peserta</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. HP</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM peserta ORDER BY id_peserta DESC";
                $hasil = mysqli_query($koneksi, $query);
                $no = 0;
                foreach ($hasil as $data) {
                    $no++; ?>
                    <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class="text-center"><?= $data["kd_skema"] ?></td>
                        <td><?= $data["nm_peserta"]; ?></td>
                        <td class="text-center"><?= $data["jk"] ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td class="text-center"><?= $data["no_hp"]; ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="<?= base_url('peserta/update/' . $data['id_peserta']); ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('peserta/delete/' . $data['id_peserta']); ?>" onclick="return confirm('Apakah Data Akan Dihapus ?')">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>