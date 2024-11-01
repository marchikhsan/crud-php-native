<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_skema = $_POST['kd_skema'];
    $nm_peserta = $_POST['nm_peserta'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO peserta (kd_skema, nm_peserta, jk, alamat, no_hp) VALUES ('$kd_skema','$nm_peserta', '$jk','$alamat','$no_hp')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['flash_data'] = 'Data Berhasil Disimpan';
        header("Location: " . BASE_URL . "peserta");
    } else {
        $_SESSION['flash_data'] = 'Data Gagal Disimpan';
        header("Location: " . BASE_URL . "peserta");
    }
    mysqli_close($koneksi);
}
?>
<div class="row">
    <form action="<?= base_url('peserta/create'); ?>" method="post">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Peserta</strong>
            </div>
            <div class="card-body">
                <div class="form-group mb-2">
                    <label for="kd_skema">Kode Skema</label>
                    <select name="kd_skema" id="kd_skema" class="form-select">
                        <option value="">Pilih Skema</option>
                        <?php
                        $query = "SELECT * FROM skema";
                        $hasil = mysqli_query($koneksi, $query);
                        foreach ($hasil as $data) { ?>
                            <option value="<?= $data['kd_skema']; ?>"><?= $data['kd_skema'] . " - " . $data['nm_skema']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="nm_peserta">Nama Peserta</label>
                    <input type="text" name="nm_peserta" id="nm_peserta" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select">
                        <option value="">Pilih</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp">No. HP</label>
                    <input type="tel" name="no_hp" id="no_hp" class="form-control">
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