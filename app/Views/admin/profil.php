<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Profil Sekolah</h1>

            <p>Lengkapi informasi sekolah agar tampil pada website publik.</p>

        </div>
        

    </div>

    <?php if(session()->getFlashdata('success')) : ?>

        <div class="alert-success">

            <?= session()->getFlashdata('success'); ?>

        </div>

    <?php endif; ?>

    <form
        action="<?= base_url('admin/update-profil'); ?>"
        method="post"
        enctype="multipart/form-data">

        <div class="profile-grid">

            <!-- KIRI -->

            <div class="card">

                <h3>Informasi Sekolah</h3>

                <div class="form-group">

                    <label>Nama Sekolah</label>

                    <input
                        type="text"
                        name="nama_sekolah"
                        value="<?= $sekolah['nama_sekolah']; ?>">

                </div>

                <div class="form-group">

                    <label>NPSN</label>

                    <input
                        type="text"
                        name="npsn"
                        value="<?= $sekolah['npsn']; ?>">

                </div>

                <div class="form-row">

                    <div class="form-group">

                        <label>Jenjang</label>

                        <select name="jenjang">

                            <option value="">Pilih</option>

                            <option value="TK" <?= $sekolah['jenjang']=='TK'?'selected':''; ?>>TK</option>

                            <option value="SD" <?= $sekolah['jenjang']=='SD'?'selected':''; ?>>SD</option>

                            <option value="SMP" <?= $sekolah['jenjang']=='SMP'?'selected':''; ?>>SMP</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <input
                            type="text"
                            name="status_sekolah"
                            value="<?= $sekolah['status_sekolah']; ?>">

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">

                        <label>Akreditasi</label>

                        <input
                            type="text"
                            name="akreditasi"
                            value="<?= $sekolah['akreditasi']; ?>">

                    </div>

                    <div class="form-group">

                        <label>Kurikulum</label>

                        <input
                            type="text"
                            name="kurikulum"
                            value="<?= $sekolah['kurikulum']; ?>">

                    </div>

                </div>

                <div class="form-group">

                    <label>Kecamatan</label>

                    <input
                        type="text"
                        name="kecamatan"
                        value="<?= $sekolah['kecamatan']; ?>">

                </div>

                <div class="form-group">

                    <label>Alamat</label>

                    <textarea
                        rows="5"
                        name="alamat"><?= $sekolah['alamat']; ?></textarea>

                </div>

            </div>

            <!-- KANAN -->

            <div class="card">

                <h3>Kontak Sekolah</h3>

                <div class="form-group">

                    <label>Telepon</label>

                    <input
                        type="text"
                        name="telepon"
                        value="<?= $sekolah['telepon']; ?>">

                </div>

                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="<?= $sekolah['email']; ?>">

                </div>

                <div class="form-group">

                    <label>Website</label>

                    <input
                        type="text"
                        name="website"
                        value="<?= $sekolah['website']; ?>">

                </div>

                <div class="form-group">

                    <label>Latitude</label>

                    <input
                        type="text"
                        name="latitude"
                        value="<?= $sekolah['latitude']; ?>">

                </div>

                <div class="form-group">

                    <label>Longitude</label>

                    <input
                        type="text"
                        name="longitude"
                        value="<?= $sekolah['longitude']; ?>">

                </div>

            </div>

        </div>

        <div class="card mt">

            <h3>Media Sekolah</h3>

            <div class="upload-grid">

                <div>

                    <label>Cover</label>

                    <input type="file" name="cover">

                    <?php if($sekolah['cover']) : ?>

                        <img
                        src="<?= base_url('uploads/cover/'.$sekolah['cover']); ?>">

                    <?php endif; ?>

                </div>

                <div>

                    <label>Logo</label>

                    <input type="file" name="logo">

                    <?php if($sekolah['logo']) : ?>

                        <img
                        src="<?= base_url('uploads/logo/'.$sekolah['logo']); ?>">

                    <?php endif; ?>

                </div>

                <div>

                    <label>Foto Sekolah</label>

                    <input type="file" name="foto">

                    <?php if($sekolah['foto']) : ?>

                        <img
                        src="<?= base_url('uploads/sekolah/'.$sekolah['foto']); ?>">

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <button class="btn-save">

            Simpan Profil Sekolah

        </button>

    </form>

</div>

<style>

.alert-success{

background:#dcfce7;

padding:15px;

margin-bottom:20px;

border-radius:12px;

color:#166534;

}

.profile-grid{

display:grid;

grid-template-columns:2fr 1fr;

gap:25px;

}

.card{

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px rgba(0,0,0,.05);

margin-bottom:25px;

}

.card h3{

margin-bottom:25px;

}

.form-group{

margin-bottom:18px;

}

.form-group label{

display:block;

margin-bottom:8px;

font-weight:600;

}

input,
select,
textarea{

width:100%;

padding:14px;

border-radius:12px;

border:1px solid #ddd;

font-size:15px;

}

.form-row{

display:grid;

grid-template-columns:1fr 1fr;

gap:15px;

}

.upload-grid{

display:grid;

grid-template-columns:repeat(3,1fr);

gap:20px;

}

.upload-grid img{

width:100%;

height:180px;

object-fit:cover;

margin-top:10px;

border-radius:15px;

}

.mt{

margin-top:20px;

}

.btn-save{

margin-top:25px;

background:#2563eb;

color:white;

padding:15px 35px;

border:none;

border-radius:15px;

font-size:16px;

cursor:pointer;

font-weight:bold;

}

.btn-save:hover{

background:#1d4ed8;

}

@media(max-width:900px){

.profile-grid{

grid-template-columns:1fr;

}

.upload-grid{

grid-template-columns:1fr;

}

.form-row{

grid-template-columns:1fr;

}

}
.btn-edit-profil {
    background: #16a34a;
    color: white;
    padding: 14px 22px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-edit-profil:hover {
    background: #15803d;
    color: white;
}
</style>

<?= $this->include('layouts/footer_admin'); ?>