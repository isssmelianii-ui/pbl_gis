<?= view('layouts/header_admin'); ?>

<?= view('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>

            <h1>Dashboard Operator</h1>

            <p>
                Selamat datang,
                <b><?= session()->get('name'); ?></b>
            </p>

        </div>

    </div>

    <!-- =============================== -->
    <!-- CARD WEBSITE -->
    <!-- =============================== -->

    <div class="card">

        <h2>

            <?= $sekolah['nama_sekolah'] ?: 'Nama Sekolah Belum Diisi'; ?>

        </h2>

        <br>

        <p>

            Website sekolah sedang dikembangkan.

        </p>

        <br>

        <div style="background:#e2e8f0;height:18px;border-radius:20px;overflow:hidden;">

            <div style="
                width:<?= $persen ?>%;
                background:#2563eb;
                height:18px;
            ">

            </div>

        </div>

        <br>

        <b>

            Kelengkapan Profil :
            <?= $persen ?>%

        </b>

    </div>

    <br>

    <!-- =============================== -->
    <!-- MENU -->
    <!-- =============================== -->

    <div class="cards">

        <a href="<?= base_url('admin/profil') ?>" class="card-stat">

            <div class="card-top">

                <i class="fa fa-school bg1"></i>

            </div>

            <h3>Profil Sekolah</h3>

            <p>Edit identitas sekolah</p>

        </a>

        <a href="<?= base_url('admin/visi') ?>" class="card-stat">

            <div class="card-top">

                <i class="fa fa-book bg2"></i>

            </div>

            <h3>Visi & Misi</h3>

            <p>Kelola visi dan misi</p>

        </a>

        <a href="<?= base_url('admin/kepala') ?>" class="card-stat">

            <div class="card-top">

                <i class="fa fa-user-tie bg3"></i>

            </div>

            <h3>Kepala Sekolah</h3>

            <p>Data kepala sekolah</p>

        </a>

        <a href="<?= base_url('admin/lokasi') ?>" class="card-stat">

            <div class="card-top">

                <i class="fa fa-location-dot bg4"></i>

            </div>

            <h3>Lokasi</h3>

            <p>Koordinat sekolah</p>

        </a>

    </div>

    <br>

    <div class="cards">

        <a href="<?= base_url('admin/preview') ?>" class="card-stat">

            <div class="card-top">

                <i class="fa fa-globe bg1"></i>

            </div>

            <h3>Preview Website</h3>

            <p>Lihat tampilan website</p>

        </a>

        <a href="<?= base_url('detail-peta?id='.$sekolah['id']) ?>" target="_blank" class="card-stat">

            <div class="card-top">

                <i class="fa fa-eye bg2"></i>

            </div>

            <h3>Website Publik</h3>

            <p>Buka halaman sekolah</p>

        </a>

    </div>

    <br>

    <!-- =============================== -->
    <!-- COVER -->
    <!-- =============================== -->

    <div class="card">

        <h3>Preview Cover Sekolah</h3>

        <br>

        <?php if(!empty($sekolah['cover'])): ?>

            <img

                src="<?= base_url('uploads/cover/'.$sekolah['cover']) ?>"

                style="

                width:100%;

                height:300px;

                object-fit:cover;

                border-radius:20px;

                ">

        <?php else: ?>

            <div style="

            height:300px;

            background:#f1f5f9;

            display:flex;

            justify-content:center;

            align-items:center;

            border-radius:20px;

            color:#64748b;

            ">

                Cover Belum Diupload

            </div>

        <?php endif; ?>

    </div>

    <br>

    <!-- =============================== -->
    <!-- STATUS -->
    <!-- =============================== -->

    <div class="card">

        <h3>Status Website</h3>

        <br>

        <table style="width:100%;line-height:35px;">

            <tr>

                <td>Profil Sekolah</td>

                <td>

                    <?= $sekolah['nama_sekolah'] ? '✅ Lengkap' : '❌ Belum'; ?>

                </td>

            </tr>

            <tr>

                <td>Visi & Misi</td>

                <td>

                    <?= $sekolah['visi'] ? '✅ Lengkap' : '❌ Belum'; ?>

                </td>

            </tr>

            <tr>

                <td>Kepala Sekolah</td>

                <td>

                    <?= $sekolah['kepala_sekolah'] ? '✅ Lengkap' : '❌ Belum'; ?>

                </td>

            </tr>

            <tr>

                <td>Lokasi</td>

                <td>

                    <?= $sekolah['latitude'] ? '✅ Lengkap' : '❌ Belum'; ?>

                </td>

            </tr>

            <tr>

                <td>Logo</td>

                <td>

                    <?= $sekolah['logo'] ? '✅ Ada' : '❌ Belum'; ?>

                </td>

            </tr>

            <tr>

                <td>Cover</td>

                <td>

                    <?= $sekolah['cover'] ? '✅ Ada' : '❌ Belum'; ?>

                </td>

            </tr>

        </table>

    </div>

</div>

<?= view('layouts/footer_admin'); ?>