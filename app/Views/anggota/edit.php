<?= view('layout/header', ['title' => 'Edit Anggota DPR']) ?>

<h3 class="mb-3">Edit Data Anggota DPR</h3>

<form method="post" action="/anggota/update/<?= $anggota['id_anggota'] ?>">
    <?= csrf_field() ?>

    <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota'] ?>">

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Nama Depan</label>
            <input name="nama_depan" class="form-control" value="<?= $anggota['nama_depan'] ?>" required>
        </div>
        <div class="col">
            <label class="form-label">Nama Belakang</label>
            <input name="nama_belakang" class="form-control" value="<?= $anggota['nama_belakang'] ?>">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <input name="jabatan" class="form-control" value="<?= $anggota['jabatan'] ?>" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="/anggota" class="btn btn-secondary">Batal</a>
</form>

<?= view('layout/footer') ?>
