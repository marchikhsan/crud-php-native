<div class="row">
    <div class="container">
        <a href="<?= base_url('skema/create'); ?>" class="btn btn-sm btn-primary my-2">Tambah Skema</a>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $id =  $_GET['id'];
        $query = "DELETE FROM skema WHERE kd_skema='$id'";
        if (mysqli_query($koneksi, $query)) {
            $_SESSION['flash_data'] = 'Data Berhasil Dihapus';
            header("Location: " . BASE_URL . "skema");
        } else {
            $_SESSION['flash_data'] = 'Gagal Menghapus Data';
            header("Location: " . BASE_URL . "skema");
        }
    }
    ?>
    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Skema</th>
                    <th class="text-center">Nama Skema</th>
                    <th class="text-center">Jenis Skema</th>
                    <th class="text-center">Jumlah Unit</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM skema";
                $hasil = mysqli_query($koneksi, $query);
                $no = 0;
                foreach ($hasil as $data) {
                    $no++; ?>
                    <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class="text-center"><?= $data["kd_skema"] ?></td>
                        <td><?= $data["nm_skema"]; ?></td>
                        <td class="text-center"><?= $data["jenis"] ?></td>
                        <td class="text-center"><?= $data["jml_unit"]; ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="<?= base_url('skema/update/' . $data['kd_skema']); ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('skema/delete/' . $data['kd_skema']); ?>" onclick="return confirm('Apakah Data Akan Dihapus ?')">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>