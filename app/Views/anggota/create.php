<?= view('layout/header', ['title' => 'Tambah Anggota DPR']) ?>

<h3 class="mb-3">Tambah Data Anggota DPR</h3>

<form method="post" action="/anggota/store">
    <?= csrf_field() ?>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Gelar Depan</label>
            <input name="gelar_depan" class="form-control">
        </div>
        <div class="col">
            <label class="form-label">Gelar Belakang</label>
            <input name="gelar_belakang" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Nama Depan</label>
            <input name="nama_depan" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Nama Belakang</label>
            <input name="nama_belakang" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input name="jabatan" class="form-control" required>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-select">
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
            </select>
        </div>
        <!-- <div class="col">
            <label class="form-label">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" class="form-control" min="0" value="0">
        </div> -->
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/anggota" class="btn btn-secondary">Kembali</a>
</form>

<?= view('layout/footer') ?>
