<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<style>

    .main-content{
        margin-left:280px;
        padding:30px;
        background:#f8fafc;
        min-height:100vh;
    }

    /* HEADER */

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .page-title h1{
        font-size:30px;
        color:#0f172a;
        margin-bottom:8px;
    }

    .page-title p{
        color:#64748b;
        font-size:14px;
    }

    .add-btn{
        background:#2563eb;
        color:white;
        padding:14px 22px;
        border-radius:16px;
        text-decoration:none;
        font-size:14px;
        font-weight:600;
    }

    /* TABLE */

    .table-card{
        background:white;
        border-radius:24px;
        padding:25px;
        border:1px solid #e5e7eb;
        overflow-x:auto;
        box-shadow:0 10px 25px rgba(0,0,0,0.04);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#f8fafc;
    }

    th{
        padding:18px;
        text-align:left;
        font-size:13px;
        color:#475569;
    }

    td{
        padding:18px;
        border-bottom:1px solid #f1f5f9;
        font-size:14px;
        color:#334155;
    }

    tr:hover{
        background:#f8fafc;
    }

    /* BADGE */

    .badge{
        background:#dbeafe;
        color:#2563eb;
        padding:8px 14px;
        border-radius:30px;
        font-size:12px;
        font-weight:600;
    }

    .status{
        background:#dcfce7;
        color:#16a34a;
    }

    /* BUTTON */

    .action-group{
        display:flex;
        gap:10px;
    }

    .edit-btn{
        background:#facc15;
        color:white;
        padding:10px 14px;
        border-radius:10px;
        text-decoration:none;
        font-size:13px;
        font-weight:600;
    }

    .delete-btn{
        background:#ef4444;
        color:white;
        padding:10px 14px;
        border-radius:10px;
        text-decoration:none;
        font-size:13px;
        font-weight:600;
    }

</style>

<div class="main-content">

    <!-- HEADER -->

    <div class="page-header">

        <div class="page-title">

            <h1>
                Data Operator
            </h1>

            <p>
                Manajemen akun operator sekolah.
            </p>

        </div>

        
        <a href="<?= base_url('/superadmin/tambah-operator'); ?>"
        class="add-btn">


            + Tambah Operator

        </a>

    </div>

    <!-- TABLE -->

    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>
                        Nam
                    </th>

                    <th>
                        Username
                    </th>

                    <th>
                        Role
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($operator)) : ?>

                    <?php foreach($operator as $o): ?>

                    <tr>

                        <td>

                            <?= $o['name']; ?>

                        </td>

                        <td>

                            <?= $o['username']; ?>

                        </td>

                        <td>

                            <span class="badge">

                                Operator

                            </span>

                        </td>

                        <td>

                            <span class="badge status">

                                Aktif

                            </span>

                        </td>

                        <td>

                            <div class="action-group">

                                <a href="<?= base_url('/superadmin/edit-operator/'.$o['id']); ?>"
                                class="edit-btn">

                                    Edit

                                </a>

                                
                            <a href="<?= base_url('/superadmin/delete-operator/'.$o['id']); ?>"
                            onclick="return confirm('Yakin ingin menghapus operator ini?')"
                            style="
                                background:#ef4444;
                                color:white;
                                padding:8px 14px;
                                border-radius:10px;
                                text-decoration:none;
                                font-size:13px;
                            ">

                                Hapus

                            </a>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="5"
                        style="
                            text-align:center;
                            padding:30px;
                            color:#64748b;
                        ">

                            Belum ada operator.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>