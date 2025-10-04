<thead>
  <tr>
    <th>ID</th><th>Nama Lengkap</th><th>Jabatan</th><th>Status</th><th>Anak</th><th>Aksi</th>
  </tr>
</thead>
<tbody>
  <?php foreach($anggota as $a): ?>
  <tr>
    <td><?= $a['id'] ?></td>
    <td><?= $a['nama_depan'].' '.$a['nama_belakang'] ?></td>
    <td><?= $a['jabatan'] ?></td>
    <td><?= $a['status_pernikahan'] ?></td>
    <td><?= $a['jumlah_anak'] ?></td>
    <td>
      <a href="/anggota/edit/<?= $a['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    </td>
  </tr>
  <?php endforeach ?>
</tbody>
