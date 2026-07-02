<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Sekolah Baru</h3>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/simpan-sekolah') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" name="name_sekolah" class="form-control" 
                                           value="<?= old('name_sekolah') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NPSN <span class="text-danger">*</span></label>
                                    <input type="number" name="npsn" class="form-control" 
                                           value="<?= old('npsn') ?>" required min="10000000" max="99999999">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenjang <span class="text-danger">*</span></label>
                                    <select name="jenjang" class="form-control" required>
                                        <option value="">Pilih Jenjang</option>
                                        <option value="SD" <?= old('jenjang') == 'SD' ? 'selected' : '' ?>>SD</option>
                                        <option value="SMP" <?= old('jenjang') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                                        <option value="SMA" <?= old('jenjang') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                                        <option value="SMK" <?= old('jenjang') == 'SMK' ? 'selected' : '' ?>>SMK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status_sekolah" class="form-control" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Negeri" <?= old('status_sekolah') == 'Negeri' ? 'selected' : '' ?>>Negeri</option>
                                        <option value="Swasta" <?= old('status_sekolah') == 'Swasta' ? 'selected' : '' ?>>Swasta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Akreditasi</label>
                                    <select nama="akreditasi" class="form-control">
                                        <option value="">Pilih Akreditasi</option>
                                        <option value="A" <?= old('akreditasi') == 'A' ? 'selected' : '' ?>>A</option>
                                        <option value="B" <?= old('akreditasi') == 'B' ? 'selected' : '' ?>>B</option>
                                        <option value="C" <?= old('akreditasi') == 'C' ? 'selected' : '' ?>>C</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kecamatan <span class="text-danger">*</span></label>
                                    <input type="text" nama="kecamatan" class="form-control" 
                                           value="<?= old('kecamatan') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kurikulum</label>
                                    <select nama="kurikulum" class="form-control">
                                        <option value="">Pilih Kurikulum</option>
                                        <option value="K13" <?= old('kurikulum') == 'K13' ? 'selected' : '' ?>>K13</option>
                                        <option value="Kurikulum Merdeka" <?= old('kurikulum') == 'Kurikulum Merdeka' ? 'selected' : '' ?>>Kurikulum Merdeka</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat <span class="text-danger">*</span></label>
                            <textarea nama="alamat" class="form-control" rows="2" required><?= old('alamat') ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telepon <span class="text-danger">*</span></label>
                                    <input type="text" nama="telepon" class="form-control" 
                                           value="<?= old('telepon') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" nama="email" class="form-control" 
                                           value="<?= old('email') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="url" nama="website" class="form-control" 
                                           value="<?= old('website') ?>" placeholder="https://...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" nama="latitude" class="form-control" 
                                           value="<?= old('latitude') ?? '-0.947083' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" nama="longitude" class="form-control" 
                                           value="<?= old('longitude') ?? '100.417181' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <a href="<?= base_url('admin/data-sekolah') ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>