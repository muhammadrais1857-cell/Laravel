

<?php $__env->startSection('title', 'Data Presensi'); ?>

<?php $__env->startSection('content'); ?>

<div class="presensi-page">

    

    <div class="page-header">

        <div>
            <div class="eyebrow">
                <span></span>
                ATTENDANCE RECORD
            </div>

            <h1>Data Presensi</h1>

            <p>
                Riwayat kehadiran mahasiswa yang tercatat melalui QR Code.
            </p>
        </div>

    </div>


    

    <div class="filter-card">

        <form
            method="GET"
            action="<?php echo e(route('presensi.index')); ?>"
            class="filter-form">

            <div class="filter-label">

                <span>📅</span>

                <div>
                    <strong>Pilih Tanggal</strong>

                    <small>
                        Tampilkan presensi berdasarkan tanggal
                    </small>
                </div>

            </div>


            <div class="filter-input">

                <input
                    type="date"
                    name="tanggal"
                    value="<?php echo e($tanggal); ?>"
                    required>

                <button type="submit">
                    Tampilkan
                </button>

            </div>

        </form>

    </div>


    

    <div class="stat-card">

        <div class="stat-icon">
            ✓
        </div>

        <div>

            <span>
                TOTAL HADIR
            </span>

            <strong>
                <?php echo e($presensis->count()); ?>

            </strong>

            <small>
                mahasiswa pada
                <?php echo e(\Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')); ?>

            </small>

        </div>

    </div>


    

    <div class="table-card">

        <div class="table-header">

            <div>

                <h2>
                    Riwayat Kehadiran
                </h2>

                <p>
                    Data presensi yang tercatat pada tanggal yang dipilih.
                </p>

            </div>

            <div class="record-count">
                <?php echo e($presensis->count()); ?> Data
            </div>

        </div>


        <?php if($presensis->count() > 0): ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Mahasiswa</th>

                            <th>NIM</th>

                            <th>Jurusan</th>

                            <th>Tanggal</th>

                            <th>Waktu</th>

                            <th>Status</th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $__currentLoopData = $presensis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $presensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td>

                                    <span class="number">
                                        <?php echo e($index + 1); ?>

                                    </span>

                                </td>


                                <td>

                                    <div class="student">

                                        <div class="avatar">

                                            <?php echo e(strtoupper(
                                                substr(
                                                    $presensi->mahasiswa->nama ?? '?',
                                                    0,
                                                    1
                                                )
                                            )); ?>


                                        </div>

                                        <div>

                                            <strong>
                                                <?php echo e($presensi->mahasiswa->nama ?? 'Mahasiswa'); ?>

                                            </strong>

                                            <small>
                                                Mahasiswa
                                            </small>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="nim">
                                        <?php echo e($presensi->mahasiswa->nim ?? '-'); ?>

                                    </span>

                                </td>


                                <td>

                                    <span class="jurusan">
                                        <?php echo e($presensi->mahasiswa->jurusan ?? '-'); ?>

                                    </span>

                                </td>


                                <td>

                                    <?php echo e(\Carbon\Carbon::parse(
                                        $presensi->tanggal
                                    )->translatedFormat('d M Y')); ?>


                                </td>


                                <td>

                                    <span class="time">

                                        <?php echo e(\Carbon\Carbon::parse(
                                            $presensi->waktu
                                        )->format('H:i:s')); ?>


                                    </span>

                                </td>


                                <td>

                                    <span class="status">

                                        <span class="status-dot"></span>

                                        Hadir

                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="empty-state">

                <div class="empty-icon">
                    ◌
                </div>

                <h3>
                    Belum Ada Presensi
                </h3>

                <p>
                    Belum ada mahasiswa yang melakukan presensi
                    pada tanggal tersebut.
                </p>

                <a
                    href="<?php echo e(route('scanner')); ?>"
                    class="scan-button">

                    📷 Buka Scanner

                </a>

            </div>

        <?php endif; ?>

    </div>

</div>


<?php $__env->startPush('styles'); ?>

<style>

    /* =========================
       PAGE
       ========================= */

    .presensi-page {
        max-width: 1100px;

        margin: 0 auto;

        padding: 15px 0 70px;
    }


    /* =========================
       HEADER
       ========================= */

    .page-header {
        margin-bottom: 28px;
    }


    .eyebrow {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        color: #22d3ee;

        font-size: 11px;

        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 10px;
    }


    .eyebrow span {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: #22d3ee;

        box-shadow:
            0 0 12px #22d3ee;
    }


    .page-header h1 {
        color: #f8fafc;

        font-size: 36px;

        margin-bottom: 7px;
    }


    .page-header p {
        color: #64748b;

        font-size: 14px;
    }


    /* =========================
       FILTER
       ========================= */

    .filter-card {
        padding: 20px;

        margin-bottom: 18px;

        border-radius: 16px;

        background:
            linear-gradient(
                145deg,
                rgba(15,23,42,.95),
                rgba(2,6,23,.95)
            );

        border:
            1px solid
            rgba(34,211,238,.1);

        box-shadow:
            0 12px 35px rgba(0,0,0,.18);
    }


    .filter-form {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;
    }


    .filter-label {
        display: flex;

        align-items: center;

        gap: 12px;
    }


    .filter-label > span {
        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background:
            rgba(34,211,238,.08);

        font-size: 18px;
    }


    .filter-label strong {
        display: block;

        color: #e2e8f0;

        font-size: 14px;

        margin-bottom: 3px;
    }


    .filter-label small {
        color: #64748b;

        font-size: 11px;
    }


    .filter-input {
        display: flex;

        gap: 8px;
    }


    .filter-input input {
        min-width: 190px;

        padding: 10px 12px;

        border-radius: 9px;

        border:
            1px solid
            #334155;

        background: #020617;

        color: #e2e8f0;

        outline: none;

        font-family: inherit;
    }


    .filter-input input:focus {
        border-color: #22d3ee;

        box-shadow:
            0 0 0 3px
            rgba(34,211,238,.08);
    }


    .filter-input button {
        padding: 10px 16px;

        border: none;

        border-radius: 9px;

        background: #22d3ee;

        color: #06111f;

        font-weight: 800;

        cursor: pointer;

        transition: .2s;
    }


    .filter-input button:hover {
        transform: translateY(-1px);

        box-shadow:
            0 0 20px
            rgba(34,211,238,.25);
    }


    /* =========================
       STAT
       ========================= */

    .stat-card {
        display: flex;

        align-items: center;

        gap: 15px;

        padding: 20px;

        margin-bottom: 18px;

        border-radius: 16px;

        background:
            linear-gradient(
                145deg,
                rgba(34,211,238,.07),
                rgba(15,23,42,.9)
            );

        border:
            1px solid
            rgba(34,211,238,.12);
    }


    .stat-icon {
        width: 52px;
        height: 52px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background:
            rgba(34,211,238,.1);

        color: #22d3ee;

        font-size: 22px;

        font-weight: 900;

        box-shadow:
            0 0 25px
            rgba(34,211,238,.07);
    }


    .stat-card span {
        display: block;

        color: #64748b;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1.5px;

        margin-bottom: 2px;
    }


    .stat-card strong {
        display: inline-block;

        color: #22d3ee;

        font-size: 25px;

        margin-right: 8px;
    }


    .stat-card small {
        color: #64748b;

        font-size: 12px;
    }


    /* =========================
       TABLE CARD
       ========================= */

    .table-card {
        overflow: hidden;

        border-radius: 18px;

        background:
            linear-gradient(
                145deg,
                rgba(15,23,42,.95),
                rgba(2,6,23,.95)
            );

        border:
            1px solid
            rgba(148,163,184,.09);

        box-shadow:
            0 15px 45px rgba(0,0,0,.2);
    }


    .table-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 22px;

        border-bottom:
            1px solid
            rgba(148,163,184,.08);
    }


    .table-header h2 {
        color: #f8fafc;

        font-size: 17px;

        margin-bottom: 5px;
    }


    .table-header p {
        color: #64748b;

        font-size: 12px;
    }


    .record-count {
        padding: 7px 11px;

        border-radius: 8px;

        background:
            rgba(34,211,238,.07);

        color: #22d3ee;

        font-size: 11px;

        font-weight: 800;

        white-space: nowrap;
    }


    /* =========================
       TABLE
       ========================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    table {
        width: 100%;

        min-width: 850px;

        border-collapse: collapse;
    }


    th {
        padding: 14px 18px;

        background:
            rgba(2,6,23,.5);

        color: #64748b;

        text-align: left;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1px;

        text-transform: uppercase;

        white-space: nowrap;
    }


    td {
        padding: 15px 18px;

        color: #94a3b8;

        font-size: 13px;

        border-top:
            1px solid
            rgba(148,163,184,.06);

        white-space: nowrap;
    }


    tbody tr {
        transition: .2s;
    }


    tbody tr:hover {
        background:
            rgba(34,211,238,.025);
    }


    .number {
        color: #475569;

        font-size: 12px;

        font-weight: 700;
    }


    /* =========================
       STUDENT
       ========================= */

    .student {
        display: flex;

        align-items: center;

        gap: 10px;
    }


    .avatar {
        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background:
            rgba(34,211,238,.08);

        color: #22d3ee;

        font-size: 13px;

        font-weight: 900;
    }


    .student strong {
        display: block;

        color: #e2e8f0;

        font-size: 13px;

        margin-bottom: 3px;
    }


    .student small {
        color: #475569;

        font-size: 10px;
    }


    .nim {
        color: #22d3ee;

        font-weight: 700;

        font-size: 12px;
    }


    .jurusan {
        color: #94a3b8;
    }


    .time {
        color: #c084fc;

        font-family: monospace;

        font-size: 12px;

        font-weight: 700;
    }


    /* =========================
       STATUS
       ========================= */

    .status {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 9px;

        border-radius: 7px;

        background:
            rgba(34,197,94,.07);

        color: #4ade80;

        font-size: 10px;

        font-weight: 800;
    }


    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #4ade80;

        box-shadow:
            0 0 8px
            rgba(74,222,128,.7);
    }


    /* =========================
       EMPTY
       ========================= */

    .empty-state {
        padding: 65px 20px;

        text-align: center;
    }


    .empty-icon {
        width: 65px;
        height: 65px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin: 0 auto 15px;

        border-radius: 18px;

        background:
            rgba(148,163,184,.05);

        color: #475569;

        font-size: 32px;
    }


    .empty-state h3 {
        color: #cbd5e1;

        font-size: 17px;

        margin-bottom: 7px;
    }


    .empty-state p {
        max-width: 400px;

        margin: 0 auto 20px;

        color: #64748b;

        font-size: 12px;

        line-height: 1.6;
    }


    .scan-button {
        display: inline-block;

        padding: 10px 15px;

        border-radius: 9px;

        background: #22d3ee;

        color: #06111f;

        text-decoration: none;

        font-size: 12px;

        font-weight: 800;
    }


    /* =========================
       RESPONSIVE
       ========================= */

    @media (max-width: 700px) {

        .presensi-page {
            padding-top: 5px;
        }


        .page-header h1 {
            font-size: 29px;
        }


        .filter-form {
            align-items: stretch;

            flex-direction: column;
        }


        .filter-input {
            width: 100%;

            flex-direction: column;
        }


        .filter-input input {
            width: 100%;
        }


        .filter-input button {
            width: 100%;
        }


        .table-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .stat-card {
            padding: 16px;
        }

    }

</style>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\presensi_qr\resources\views/presensi/index.blade.php ENDPATH**/ ?>