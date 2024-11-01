<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_skema = $_POST['kd_skema'];
    $nm_peserta = $_POST['nm_peserta'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $id_peserta = $_POST['id_peserta'];

    $query = "UPDATE peserta SET kd_skema='$kd_skema', nm_peserta='$nm_peserta', jk='$jk', alamat='$alamat', no_hp='$no_hp' WHERE id_peserta='$id_peserta'";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['flash_data'] = 'Data Berhasil Diupdate';
        header("Location: " . BASE_URL . "peserta");
    } else {
        $_SESSION['flash_data'] = 'Data Gagal Diupdate';
        header("Location: " . BASE_URL . "peserta");
    }
    mysqli_close($koneksi);
}

$id = $_GET['id'];
$sql = "SELECT * FROM peserta WHERE id_peserta='$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="row">
    <form action="<?= base_url('peserta/update'); ?>" method="post">
        <div class="card">
            <div class="card-header">
                <strong>Update Peserta</strong>
            </div>
            <div class="card-body">
                <input type="hidden" name="id_peserta" value="<?= $data['id_peserta'] ?>">
                <div class="form-group mb-2">
                    <label for="kd_skema">Kode Skema</label>
                    <select name="kd_skema" id="kd_skema" class="form-select">
                        <option value="">Pilih Skema</option>
                        <?php
                        $query = "SELECT * FROM skema";
                        $hasil = mysqli_query($koneksi, $query);
                        foreach ($hasil as $skema) { ?>
                            <option value="<?= $skema['kd_skema']; ?>" <?= $data['kd_skema'] == $skema['kd_skema'] ? 'selected' : '' ?>><?= $skema['kd_skema'] . " - " . $skema['nm_skema']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="nm_peserta">Nama Peserta</label>
                    <input value="<?= $data['nm_peserta']; ?>" type="text" name="nm_peserta" id="nm_peserta" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select">
                        <option value="">Pilih</option>
                        <option value="Laki-Laki" <?= $data['jk'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= $data['jk'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap"><?= $data['alamat']; ?></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp">No. HP</label>
                    <input value="<?= $data['no_hp']; ?>" type="tel" name="no_hp" id="no_hp" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <a href="<?= base_url('peserta'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                </div>
            </div>
        </div>
    </form>
</div>