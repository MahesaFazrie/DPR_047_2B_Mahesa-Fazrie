<?= view('layout/header', ['title' => 'Tambah Komponen']) ?>

<h3 class="mb-3">Tambah Komponen Gaji</h3>

<form method="post" action="/komponen/store">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Nama Komponen</label>
        <input name="nama_komponen" class="form-control" required>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Kategori</label>
            <input name="kategori" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-select">
                <option>Semua</option>
                <option>Ketua</option>
                <option>Wakil Ketua</option>
                <option>Anggota</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Satuan</label>
            <select name="satuan" class="form-select">
                <option>Bulanan</option>
                <option>Tahunan</option>
            </select>
        </div>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/komponen" class="btn btn-secondary">Kembali</a>
</form>

<?= view('layout/footer') ?>
