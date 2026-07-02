<?= $this->include('layouts/header_admin'); ?>
<?= $this->include('layouts/sidebar_admin'); ?>

<div class="main-content">

    <div class="page-header">

        <div>
            <h1>Data Sekolah</h1>
            <p>Kelola seluruh data sekolah.</p>
        </div>


    </div>

    <div class="card">

        <form method="get" style="margin-bottom:20px;display:flex;gap:15px;">

            <input
                type="text"
                name="keyword"
                value="<?= esc($keyword ?? ''); ?>"
                placeholder="Cari nama sekolah..."
                class="search-input">

            <button class="btn-search">
                Cari
            </button>

        </form>

        <table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama Sekolah</th>

                    <th>NPSN</th>

                    <th>Jenjang</th>

                    <th>Kecamatan</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; ?>

            <?php foreach($sekolah as $s): ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $s['nama_sekolah']; ?></td>

                    <td><?= $s['npsn']; ?></td>

                    <td><?= $s['jenjang']; ?></td>

                    <td><?= $s['kecamatan']; ?></td>

                    <td><?= $s['status_sekolah'] ?? '-'; ?></td>

                    <td>

                        <a href="<?= base_url('admin/detail-sekolah/'.$s['id']); ?>" class="btn-detail">

                            Detail

                        </a>
                        <!-- GANTI DENGAN INI -->
                        <a href="<?= base_url('admin/profil'); ?>" class="btn-edit">
                            <i class="fa fa-building"></i> Profil
                        </a>

                        <a href="<?= base_url('admin/hapus-sekolah/'.$s['id']); ?>"
                           onclick="return confirm('Hapus data?')"
                           class="btn-hapus">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<style>

.btn-tambah{

background:#2563eb;

color:white;

padding:14px 22px;

border-radius:12px;

font-weight:600;

}

.card{

background:white;

padding:25px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,.05);

}

.search-input{

padding:14px;

border-radius:10px;

border:1px solid #ddd;

width:350px;

}

.btn-search{

padding:14px 20px;

background:#2563eb;

color:white;

border:none;

border-radius:10px;

cursor:pointer;

}

table{

width:100%;

border-collapse:collapse;

}

th{

background:#2563eb;

color:white;

padding:15px;

}

td{

padding:15px;

border-bottom:1px solid #eee;

}

.btn-detail{

background:#3b82f6;

color:white;

padding:8px 12px;

border-radius:8px;

font-size:13px;

}

.btn-edit{

background:#16a34a;

color:white;

padding:8px 12px;

border-radius:8px;

font-size:13px;

margin-left:5px;

}

.btn-hapus{

background:#ef4444;

color:white;

padding:8px 12px;

border-radius:8px;

font-size:13px;

margin-left:5px;

}

</style>
<?= $this->include('layouts/footer_admin', ['sekolah' => $sekolah_map ?? []]); ?>