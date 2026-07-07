<?= $this->include('layouts/header'); ?>

<?= $this->include('layouts/sidebar'); ?>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>

    :root{
        --navy-950:#0a1d33;
        --navy-900:#0e2a47;
        --navy-800:#153a5f;
        --gold-500:#c08a28;
        --gold-400:#d6a445;
        --ink-900:#1c2733;
        --ink-600:#54626f;
        --ink-400:#8b97a3;
        --line:#e3e8ee;
        --surface:#ffffff;
        --green-500:#1a8a5f;
        --red-500:#c0392b;
        --amber-500:#b8850f;
    }

    .main-content{
        margin-left:280px;
        padding:32px;
        background:#f5f7fa;
        min-height:100vh;
        font-family:'Plus Jakarta Sans',sans-serif;
        color:var(--ink-900);
    }

    .main-content .mono{
        font-family:'JetBrains Mono',monospace;
    }

    /* HEADER */

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:28px;
        flex-wrap:wrap;
        gap:20px;
    }

    .page-title .eyebrow{
        font-family:'JetBrains Mono',monospace;
        font-size:11.5px;
        letter-spacing:1.2px;
        text-transform:uppercase;
        color:var(--gold-500);
        margin-bottom:10px;
        display:flex;
        align-items:center;
        gap:9px;
    }

    .page-title .eyebrow::before{
        content:'';
        width:20px;
        height:1px;
        background:var(--gold-500);
    }

    .page-title h1{
        font-size:28px;
        font-weight:800;
        color:var(--ink-900);
        margin-bottom:6px;
        letter-spacing:-0.4px;
    }

    .page-title p{
        color:var(--ink-600);
        font-size:14px;
    }

    .add-btn{
        background:var(--navy-900);
        color:white;
        padding:13px 22px;
        border-radius:12px;
        text-decoration:none;
        font-size:13.5px;
        font-weight:700;
        display:flex;
        align-items:center;
        gap:9px;
        transition:background 0.15s ease;
        white-space:nowrap;
    }

    .add-btn:hover{
        background:var(--navy-800);
    }

    /* TABLE */

    .table-card{
        background:var(--surface);
        border-radius:20px;
        padding:22px;
        border:1px solid var(--line);
        overflow-x:auto;
        box-shadow:0 10px 25px rgba(14,42,71,0.05);
    }

    .main-content table{
        width:100%;
        border-collapse:collapse;
        min-width:600px;
    }

    .main-content thead{
        background:#f8fafc;
    }

    .main-content th{
        padding:16px;
        text-align:left;
        font-size:11px;
        font-weight:700;
        letter-spacing:0.6px;
        font-family:'JetBrains Mono',monospace;
        color:var(--ink-400);
        border-bottom:1px solid var(--line);
    }

    .main-content td{
        padding:17px 16px;
        border-bottom:1px solid #f1f5f9;
        font-size:13.5px;
        color:var(--ink-900);
        vertical-align:middle;
    }

    .main-content tbody tr:last-child td{
        border-bottom:none;
    }

    .main-content tbody tr:hover{
        background:#f8fafc;
    }

    /* BADGE */

    .badge{
        background:#f0f4f9;
        color:var(--navy-900);
        padding:7px 14px;
        border-radius:30px;
        font-size:11.5px;
        font-weight:700;
        display:inline-block;
    }

    .status{
        background:none;
        color:var(--green-500);
        font-weight:600;
        font-size:13px;
        padding:0;
        display:inline-flex;
        align-items:center;
        gap:7px;
    }

    .status::before{
        content:'';
        width:7px;
        height:7px;
        border-radius:50%;
        background:var(--green-500);
    }

    /* BUTTON */

    .action-group{
        display:flex;
        gap:9px;
    }

    .edit-btn{
        background:#fdf3e0;
        color:var(--amber-500);
        padding:9px 15px;
        border-radius:10px;
        text-decoration:none;
        font-size:12.5px;
        font-weight:700;
        transition:background 0.15s ease, color 0.15s ease;
    }

    .edit-btn:hover{
        background:var(--amber-500);
        color:white;
    }

    .delete-btn{
        background:#fdecec;
        color:var(--red-500);
        padding:9px 15px;
        border-radius:10px;
        text-decoration:none;
        font-size:12.5px;
        font-weight:700;
        transition:background 0.15s ease, color 0.15s ease;
    }

    .delete-btn:hover{
        background:var(--red-500);
        color:white;
    }

    .empty-row{
        text-align:center;
        padding:32px;
        color:var(--ink-600);
        font-size:13.5px;
    }

    @media(max-width:600px){

        .page-header{
            align-items:flex-start;
        }

        .add-btn{
            width:100%;
            justify-content:center;
        }

    }

</style>

<div class="main-content">

    <!-- HEADER -->

    <div class="page-header">

        <div class="page-title">

            <div class="eyebrow">Manajemen Akun</div>

            <h1>
                Data Operator
            </h1>

            <p>
                Manajemen akun operator sekolah.
            </p>

        </div>

        
        <a href="<?= base_url('/superadmin/tambah-operator'); ?>"
        class="add-btn">

            <i class="fa-solid fa-plus"></i>
            Tambah Operator

        </a>

    </div>

    <!-- TABLE -->

    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>
                        Nama
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

                        <td class="mono">

                            <?= $o['username']; ?>

                        </td>

                        <td>

                            <span class="badge">

                                Operator

                            </span>

                        </td>

                        <td>

                            <span class="status">

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
                                class="delete-btn">

                                    Hapus

                                </a>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php else : ?>

                    <tr>

                        <td colspan="5" class="empty-row">

                            Belum ada operator.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->include('layouts/footer'); ?>