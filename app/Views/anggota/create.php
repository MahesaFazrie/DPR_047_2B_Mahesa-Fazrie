<!DOCTYPE html>
<html>
<head>
  <title>Tambah Anggota DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-3">Tambah Data Anggota DPR</h2>
    <form method="post" action="/anggota/store">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Gelar Depan</label>
          <input type="text" name="gelar_depan" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
          <label>Gelar Belakang</label>
          <input type="text" name="gelar_belakang" class="form-control">
        </div>
      </div>
      <div class="mb-3">
        <label>Nama Depan</label>
        <input type="text" name="nama_depan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Belakang</label>
        <input type="text" name="nama_belakang" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Status Pernikahan</label>
        <select name="status_pernikahan" class="form-control">
          <option value="Belum Kawin">Belum Kawin</option>
          <option value="Kawin">Kawin</option>
          <a href="/anggota/create" class="btn btn-success mb-3">+ Tambah Anggota</a>
        </select>
      </div>
      <div class="mb-3">
        <label>Jumlah Anak</label>
        <input type="number" name="jumlah_anak" class="form-control" min="0" value="0">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/anggota" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
