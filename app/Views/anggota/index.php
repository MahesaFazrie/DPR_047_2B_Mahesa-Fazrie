<!DOCTYPE html>
<html>
<head>
  <title>Data Anggota DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Data Anggota DPR</h2>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>ID</th><th>Nama</th><th>Jabatan</th><th>Status</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($anggota as $a): ?>
        <tr>
          <td><?= $a['id_anggota'] ?></td>
          <td><?= $a['nama_depan'].' '.$a['nama_belakang'] ?></td>
          <td><?= $a['jabatan'] ?></td>
          <td><?= $a['status_pernikahan'] ?></td>
          <td>
            <a href="/anggota/delete/<?= $a['id_anggota'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
