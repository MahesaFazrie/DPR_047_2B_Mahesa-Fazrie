<?= view('layout/header', ['title' => 'Transparansi Gaji DPR']) ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>📢 Transparansi Gaji Anggota DPR</h3>
        <a href="/penggajian/create" class="btn btn-primary">Atur Komponen Gaji</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Jabatan</th>
                            <th class="bg-success">Gaji Pokok</th>
                            <th class="bg-info text-dark">Total Tunjangan</th>
                            <th class="bg-warning text-dark">Take Home Pay (THP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d): 
                            $thp = $d['total_gaji_pokok'] + $d['total_tunjangan'];
                        ?>
                        <tr>
                            <td>
                                <strong><?= esc($d['nama_depan'] . ' ' . $d['nama_belakang']) ?></strong><br>
                                <small class="text-muted">ID: <?= esc($d['id_anggota']) ?></small>
                            </td>
                            <td>
                                <span class="badge bg-secondary"><?= esc($d['jabatan']) ?></span>
                            </td>
                            <td class="text-end">
                                Rp <?= number_format($d['total_gaji_pokok'], 0, ',', '.') ?>
                            </td>
                            <td class="text-end">
                                Rp <?= number_format($d['total_tunjangan'], 0, ',', '.') ?>
                            </td>
                            <td class="text-end fw-bold bg-light">
                                Rp <?= number_format($thp, 0, ',', '.') ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>