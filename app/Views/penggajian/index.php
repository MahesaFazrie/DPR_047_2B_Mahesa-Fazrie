<?= view('layout/header', ['title' => 'Data Penggajian']) ?>

<h3>Data Penggajian</h3>

<a href="/penggajian/create" class="btn btn-primary mb-3">Tambah Penggajian</a>

<table class="table table-bordered">
<thead class="table-dark">
<tr>
    <th>ID Anggota</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Take Home Pay (Bulanan)</th>
</tr>
</thead>
<tbody>
<?php foreach ($data as $d): ?>
<tr>
    <td><?= $d['id_anggota'] ?></td>
    <td><?= $d['nama_depan'].' '.$d['nama_belakang'] ?></td>
    <td><?= $d['jabatan'] ?></td>
    <td>Rp <?= number_format($d['take_home_pay'],0,',','.') ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>

<?= view('layout/footer') ?>
