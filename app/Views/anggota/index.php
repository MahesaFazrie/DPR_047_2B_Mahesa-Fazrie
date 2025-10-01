<!DOCTYPE html>
<html>
<head>
  <title>Data Anggota DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-3">Data Anggota DPR</h2>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th><th>Nama Lengkap</th><th>Jabatan</th><th>Status</th><th>Anak</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($anggota) > 0): ?>
          <?php foreach($anggota as $a): ?>
          <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['gelar_depan'].' '.$a['nama_depan'].' '.$a['nama_belakang'].' '.$a['gelar_belakang'] ?></td>
            <td><?= $a['jabatan'] ?></td>
            <td><?= $a['status_pernikahan'] ?></td>
            <td><?= $a['jumlah_anak'] ?></td>
          </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-center">Belum ada data anggota</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
