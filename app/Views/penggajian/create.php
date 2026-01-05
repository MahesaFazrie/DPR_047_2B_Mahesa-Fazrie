<?= view('layout/header', ['title' => 'Tambah Penggajian']) ?>

<h3 class="mb-3">Tambah Data Penggajian</h3>

<form method="post" action="/penggajian/store">
<?= csrf_field() ?>

<div class="mb-3">
    <label class="form-label">Anggota DPR</label>
    <select name="id_anggota" class="form-select" required>
        <?php foreach ($anggota as $a): ?>
        <option value="<?= $a['id_anggota'] ?>">
            <?= $a['nama_depan'].' '.$a['nama_belakang'].' - '.$a['jabatan'] ?>
        </option>
        <?php endforeach ?>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Komponen Gaji</label>
    <?php foreach ($komponen as $k): ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                   name="komponen[]" value="<?= $k['id_komponen'] ?>">
            <label class="form-check-label">
                <?= $k['nama_komponen'] ?> (<?= $k['jabatan'] ?>)
            </label>
        </div>
    <?php endforeach ?>
</div>

<button class="btn btn-success">Simpan</button>
<a href="/penggajian" class="btn btn-secondary">Kembali</a>

</form>
<select id="anggota" name="id_anggota" class="form-select">
<?php foreach ($anggota as $a): ?>
<option value="<?= $a['id_anggota'] ?>" data-jabatan="<?= $a['jabatan'] ?>">
    <?= $a['nama_depan'].' '.$a['nama_belakang'].' - '.$a['jabatan'] ?>
</option>
<?php endforeach ?>
</select>

<div id="komponen-area" class="mt-3"></div>

<script>
document.getElementById('anggota').addEventListener('change', function(){
    let jabatan = this.selectedOptions[0].dataset.jabatan;

    fetch('/penggajian/komponen/' + jabatan)
        .then(res => res.json())
        .then(data => {
            let html = '';
            data.forEach(k => {
                html += `
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="komponen[]" value="${k.id_komponen}">
                    <label class="form-check-label">
                        ${k.nama_komponen} (${k.jabatan})
                    </label>
                </div>`;
            });
            document.getElementById('komponen-area').innerHTML = html;
        });
});
</script>


<?= view('layout/footer') ?>
