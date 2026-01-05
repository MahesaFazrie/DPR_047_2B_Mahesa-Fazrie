<?= view('layout/header', ['title' => 'Data Anggota DPR']) ?>

<h3>Data Anggota DPR (Public)</h3>

<table class="table table-bordered">
<tr>
<th>Nama</th><th>Jabatan</th>
</tr>
<?php foreach ($anggota as $a): ?>
<tr>
<td><?= $a['nama_depan'].' '.$a['nama_belakang'] ?></td>
<td><?= $a['jabatan'] ?></td>
</tr>
<?php endforeach ?>
</table>

<?= view('layout/footer') ?>
