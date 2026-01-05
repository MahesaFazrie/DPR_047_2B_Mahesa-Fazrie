<?= view('layout/header', ['title' => 'Atur Komponen Gaji']) ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">⚙️ Atur Komponen Gaji Anggota</h4>
        </div>
        <div class="card-body">
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="/penggajian/store" method="post">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label for="id_anggota" class="form-label fw-bold">Pilih Anggota DPR</label>
                    <select name="id_anggota" id="id_anggota" class="form-select" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach ($anggota_list as $anggota): ?>
                            <option value="<?= $anggota['id_anggota'] ?>">
                                <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?> - <?= esc($anggota['jabatan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <hr>

                <div class="mb-4">
                    <label class="form-label fw-bold mb-3">Pilih Komponen Gaji yang Diterima:</label>
                    <div class="row">
                        <?php foreach ($komponen_list as $k): ?>
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="komponen[]" 
                                           value="<?= $k['id_komponen_gaji'] ?>" id="k_<?= $k['id_komponen_gaji'] ?>">
                                    
                                    <label class="form-check-label" for="k_<?= $k['id_komponen_gaji'] ?>">
                                        <strong><?= esc($k['nama_komponen']) ?></strong> 
                                        <span class="badge bg-secondary ms-2"><?= $k['kategori'] ?></span>
                                        <br>
                                        <small class="text-muted">Rp <?= number_format($k['nominal'], 0, ',', '.') ?></small>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="/penggajian" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">💾 Simpan Penggajian</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>