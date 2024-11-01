<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_skema = $_POST['kd_skema'];
    $nm_skema = $_POST['nm_skema'];
    $jenis = $_POST['jenis'];
    $jml_unit = $_POST['jml_unit'];

    $query = "INSERT INTO skema (kd_skema, nm_skema, jenis, jml_unit) VALUES ('$kd_skema','$nm_skema', '$jenis','$jml_unit')";

    if (mysqli_query($koneksi, $query)) {
        $_SESSION['flash_data'] = 'Data Berhasil Disimpan';
        header("Location: " . BASE_URL . "skema");
    } else {
        $_SESSION['flash_data'] = 'Data Gagal Disimpan';
        header("Location: " . BASE_URL . "skema");
    }
    mysqli_close($koneksi);
}
?>
<div class="row">
    <form action="<?= base_url('skema/create'); ?>" method="post">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Skema</strong>
            </div>
            <div class="card-body">
                <div class="form-group mb-2">
                    <label for="kd_skema">Kode Skema</label>
                    <input type="text" name="kd_skema" id="kd_skema" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="nm_skema">Nama Skema</label>
                    <input type="text" name="nm_skema" id="nm_skema" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="jenis">Jenis Skema</label>
                    <select name="jenis" id="jenis" class="form-select">
                        <option value="">Pilih</option>
                        <option value="Kluster">Kluster</option>
                        <option value="KKNI">KKNI</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="jml_unit">Jumlah Unit</label>
                    <input type="tel" name="jml_unit" id="jml_unit" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <a href="<?= base_url('skema'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
                    <input type="submit" class="btn btn-sm btn-success" value="Simpan">
                </div>
            </div>
        </div>
    </form>
</div>