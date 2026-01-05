<?= view('layout/header', ['title' => 'Komponen Gaji']) ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Komponen Gaji & Tunjangan</h3>
    <a href="/komponen/create" class="btn btn-primary">Tambah Komponen</a>
</div>

<form method="get" class="mb-3">
    <div class="input-group">
        <input name="q" class="form-control" placeholder="Cari komponen...">
        <button class="btn btn-outline-secondary">Cari</button>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jabatan</th>
            <th>Nominal</th>
            <th>Satuan</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($komponen as $k): ?>
        <tr>
            <td><?= $k['id_komponen'] ?></td>
            <td><?= $k['nama_komponen'] ?></td>
            <td><?= $k['kategori'] ?></td>
            <td><?= $k['jabatan'] ?></td>
            <td>Rp <?= number_format($k['nominal'],0,',','.') ?></td>
            <td><?= $k['satuan'] ?></td>
            <td>
                <a href="/komponen/edit/<?= $k['id_komponen'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/komponen/delete/<?= $k['id_komponen'] ?>"
                   onclick="return confirm('Hapus komponen ini?')"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?= view('layout/footer') ?>
