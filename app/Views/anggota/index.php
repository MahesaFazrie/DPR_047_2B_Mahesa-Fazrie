<?= view('layout/header', ['title' => 'Data Anggota DPR']) ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Data Anggota DPR</h3>
    <a href="/anggota/create" class="btn btn-primary">Tambah Anggota</a>
</div>

<form method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari nama, jabatan, atau ID">
        <button class="btn btn-outline-secondary">Cari</button>
    </div>
</form>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Status</th>
            <!-- <th>Jumlah Anak</th> -->
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($anggota as $a): ?>
        <tr>
            <td><?= $a['id_anggota'] ?></td>
            <td>
                <?= $a['gelar_depan'].' '.$a['nama_depan'].' '.$a['nama_belakang'].' '.$a['gelar_belakang'] ?>
            </td>
            <td><?= $a['jabatan'] ?></td>
            <td><?= $a['status_pernikahan'] ?></td>
            
            <td>
                <a href="/anggota/edit/<?= $a['id_anggota'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/anggota/delete/<?= $a['id_anggota'] ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?= view('layout/footer') ?>
