@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-page">

    {{-- HEADER --}}

    <div class="dashboard-header">

        <div>

            <div class="eyebrow">
                <span></span>
                PRESENSI QR SYSTEM
            </div>

            <h1>Dashboard</h1>

            <p>
                Pantau aktivitas kehadiran mahasiswa secara realtime.
            </p>

        </div>


        <div class="date-card">

            <span>HARI INI</span>

            <strong>
                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
            </strong>

        </div>

    </div>


    {{-- STATISTICS --}}

    <div class="stats-grid">

        {{-- TOTAL MAHASISWA --}}

        <div class="stat-card">

            <div class="stat-icon blue">
                👨‍🎓
            </div>

            <div>

                <span class="stat-label">
                    TOTAL MAHASISWA
                </span>

                <strong class="stat-value">
                    {{ $totalMahasiswa }}
                </strong>

                <small>
                    Terdaftar
                </small>

            </div>

        </div>


        {{-- HADIR --}}

        <div class="stat-card">

            <div class="stat-icon green">
                ✓
            </div>

            <div>

                <span class="stat-label">
                    HADIR HARI INI
                </span>

                <strong class="stat-value">
                    {{ $totalHadir }}
                </strong>

                <small>
                    Sudah presensi
                </small>

            </div>

        </div>


        {{-- BELUM HADIR --}}

        <div class="stat-card">

            <div class="stat-icon purple">
                ◌
            </div>

            <div>

                <span class="stat-label">
                    BELUM HADIR
                </span>

                <strong class="stat-value">
                    {{ $totalBelumHadir }}
                </strong>

                <small>
                    Belum presensi
                </small>

            </div>

        </div>


        {{-- PERSENTASE --}}

        <div class="stat-card">

            <div class="stat-icon cyan">
                %
            </div>

            <div>

                <span class="stat-label">
                    KEHADIRAN
                </span>

                <strong class="stat-value">
                    {{ $persentase }}%
                </strong>

                <small>
                    Hari ini
                </small>

            </div>

        </div>

    </div>


    {{-- MAIN GRID --}}

    <div class="dashboard-grid">


        {{-- ATTENDANCE OVERVIEW --}}

        <div class="overview-card">

            <div class="section-header">

                <div>

                    <div class="section-label">
                        OVERVIEW
                    </div>

                    <h2>
                        Tingkat Kehadiran
                    </h2>

                </div>

                <span class="live-badge">

                    <span></span>

                    LIVE

                </span>

            </div>


            <div class="attendance-content">

                <div class="percentage-circle">

                    <div class="circle-inner">

                        <strong>
                            {{ $persentase }}%
                        </strong>

                        <span>
                            Hadir
                        </span>

                    </div>

                </div>


                <div class="attendance-details">

                    <div class="attendance-row">

                        <div>

                            <span class="legend green"></span>

                            <span>
                                Hadir
                            </span>

                        </div>

                        <strong>
                            {{ $totalHadir }}
                        </strong>

                    </div>


                    <div class="attendance-row">

                        <div>

                            <span class="legend purple"></span>

                            <span>
                                Belum Hadir
                            </span>

                        </div>

                        <strong>
                            {{ $totalBelumHadir }}
                        </strong>

                    </div>


                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="width: {{ min($persentase, 100) }}%;">
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- QUICK ACTION --}}

        <div class="quick-card">

            <div class="section-label">
                QUICK ACTION
            </div>

            <h2>
                Mulai Presensi
            </h2>

            <p>
                Scan QR Code mahasiswa untuk mencatat
                kehadiran dengan cepat.
            </p>


            <a
                href="{{ route('scanner') }}"
                class="scan-button">

                📷

                <span>
                    Buka Scanner
                </span>

                →

            </a>


            <a
                href="{{ route('mahasiswa.index') }}"
                class="secondary-button">

                👨‍🎓

                Kelola Mahasiswa

            </a>

        </div>

    </div>


    {{-- RECENT ATTENDANCE --}}

    <div class="recent-card">

        <div class="section-header">

            <div>

                <div class="section-label">
                    ACTIVITY
                </div>

                <h2>
                    Presensi Terbaru
                </h2>

            </div>


            <a
                href="{{ route('presensi.index') }}"
                class="view-all">

                Lihat Semua →

            </a>

        </div>


        @if($presensiTerbaru->count() > 0)

            <div class="recent-list">

                @foreach($presensiTerbaru as $presensi)

                    <div class="recent-item">

                        <div class="recent-avatar">

                            {{ strtoupper(
                                substr(
                                    $presensi->mahasiswa->nama ?? '?',
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div class="recent-info">

                            <strong>

                                {{ $presensi->mahasiswa->nama ?? 'Mahasiswa' }}

                            </strong>

                            <span>

                                NIM
                                {{ $presensi->mahasiswa->nim ?? '-' }}

                            </span>

                        </div>


                        <div class="recent-time">

                            <span>
                                {{ \Carbon\Carbon::parse($presensi->waktu)->format('H:i') }}
                            </span>

                            <small>
                                Hari ini
                            </small>

                        </div>


                        <div class="present-badge">

                            <span></span>

                            Hadir

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-dashboard">

                <div>
                    ◌
                </div>

                <h3>
                    Belum ada aktivitas
                </h3>

                <p>
                    Belum ada mahasiswa yang melakukan presensi hari ini.
                </p>

            </div>

        @endif

    </div>

</div>


@push('styles')

<style>

/* =========================
   PAGE
   ========================= */

.dashboard-page {

    max-width: 1100px;

    margin: 0 auto;

    padding: 15px 0 70px;

}


/* =========================
   HEADER
   ========================= */

.dashboard-header {

    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    gap: 20px;

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


.dashboard-header h1 {

    color: #f8fafc;

    font-size: 38px;

    margin-bottom: 7px;

}


.dashboard-header p {

    color: #64748b;

    font-size: 14px;

}


.date-card {

    min-width: 175px;

    padding: 13px 16px;

    border-radius: 12px;

    background:
        rgba(15,23,42,.85);

    border:
        1px solid
        rgba(34,211,238,.1);

    text-align: right;

}


.date-card span {

    display: block;

    color: #475569;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.5px;

    margin-bottom: 4px;

}


.date-card strong {

    color: #22d3ee;

    font-size: 13px;

}


/* =========================
   STATISTICS
   ========================= */

.stats-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 15px;

    margin-bottom: 18px;

}


.stat-card {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 18px;

    border-radius: 16px;

    background:
        linear-gradient(
            145deg,
            rgba(15,23,42,.95),
            rgba(2,6,23,.95)
        );

    border:
        1px solid
        rgba(148,163,184,.08);

    box-shadow:
        0 12px 35px
        rgba(0,0,0,.16);

    transition: .2s;

}


.stat-card:hover {

    transform:
        translateY(-3px);

    border-color:
        rgba(34,211,238,.16);

}


.stat-icon {

    width: 45px;

    height: 45px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 12px;

    font-size: 18px;

    font-weight: 900;

}


.stat-icon.blue {

    background:
        rgba(59,130,246,.1);

    color: #60a5fa;

}


.stat-icon.green {

    background:
        rgba(34,197,94,.1);

    color: #4ade80;

}


.stat-icon.purple {

    background:
        rgba(168,85,247,.1);

    color: #c084fc;

}


.stat-icon.cyan {

    background:
        rgba(34,211,238,.1);

    color: #22d3ee;

}


.stat-label {

    display: block;

    color: #64748b;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1px;

    margin-bottom: 3px;

}


.stat-value {

    display: block;

    color: #f8fafc;

    font-size: 24px;

    line-height: 1.1;

}


.stat-card small {

    color: #475569;

    font-size: 10px;

}


/* =========================
   MAIN GRID
   ========================= */

.dashboard-grid {

    display: grid;

    grid-template-columns:
        1.4fr
        .6fr;

    gap: 18px;

    margin-bottom: 18px;

}


.overview-card,
.quick-card,
.recent-card {

    background:
        linear-gradient(
            145deg,
            rgba(15,23,42,.95),
            rgba(2,6,23,.95)
        );

    border:
        1px solid
        rgba(148,163,184,.08);

    border-radius: 18px;

    box-shadow:
        0 15px 45px
        rgba(0,0,0,.18);

}


.overview-card {

    padding: 22px;

}


.quick-card {

    padding: 22px;

}


/* =========================
   SECTION HEADER
   ========================= */

.section-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 20px;

}


.section-label {

    color: #22d3ee;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.5px;

    margin-bottom: 5px;

}


.section-header h2,
.quick-card h2 {

    color: #f8fafc;

    font-size: 17px;

}


.live-badge {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 6px 8px;

    border-radius: 7px;

    background:
        rgba(34,197,94,.06);

    color: #4ade80;

    font-size: 9px;

    font-weight: 800;

}


.live-badge span {

    width: 5px;

    height: 5px;

    border-radius: 50%;

    background: #4ade80;

    box-shadow:
        0 0 7px #4ade80;

}


/* =========================
   ATTENDANCE
   ========================= */

.attendance-content {

    display: flex;

    align-items: center;

    gap: 35px;

}


.percentage-circle {

    width: 170px;

    height: 170px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background:
        conic-gradient(
            #22d3ee
            {{ $persentase }}%,
            #1e293b
            {{ $persentase }}%
        );

    box-shadow:
        0 0 35px
        rgba(34,211,238,.08);

}


.circle-inner {

    width: 135px;

    height: 135px;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background: #020617;

}


.circle-inner strong {

    color: #f8fafc;

    font-size: 30px;

}


.circle-inner span {

    color: #64748b;

    font-size: 11px;

}


.attendance-details {

    flex: 1;

}


.attendance-row {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 9px 0;

    color: #94a3b8;

    font-size: 12px;

}


.attendance-row > div {

    display: flex;

    align-items: center;

    gap: 8px;

}


.attendance-row strong {

    color: #e2e8f0;

}


.legend {

    width: 7px;

    height: 7px;

    border-radius: 50%;

}


.legend.green {

    background: #4ade80;

    box-shadow:
        0 0 8px #4ade80;

}


.legend.purple {

    background: #c084fc;

    box-shadow:
        0 0 8px #c084fc;

}


.progress {

    height: 7px;

    margin-top: 14px;

    overflow: hidden;

    border-radius: 20px;

    background: #1e293b;

}


.progress-bar {

    height: 100%;

    border-radius: inherit;

    background:
        linear-gradient(
            90deg,
            #22d3ee,
            #67e8f9
        );

    box-shadow:
        0 0 12px
        rgba(34,211,238,.3);

    transition:
        width .5s ease;

}


/* =========================
   QUICK ACTION
   ========================= */

.quick-card p {

    margin: 10px 0 22px;

    color: #64748b;

    font-size: 12px;

    line-height: 1.6;

}


.scan-button {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    width: 100%;

    padding: 12px 14px;

    margin-bottom: 9px;

    border-radius: 10px;

    background: #22d3ee;

    color: #06111f;

    text-decoration: none;

    font-size: 12px;

    font-weight: 800;

    transition: .2s;

}


.scan-button:hover {

    transform:
        translateY(-2px);

    box-shadow:
        0 0 25px
        rgba(34,211,238,.25);

}


.secondary-button {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    width: 100%;

    padding: 11px;

    border-radius: 10px;

    border:
        1px solid
        #334155;

    color: #94a3b8;

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

    transition: .2s;

}


.secondary-button:hover {

    border-color: #22d3ee;

    color: #22d3ee;

}


/* =========================
   RECENT
   ========================= */

.recent-card {

    padding: 22px;

}


.view-all {

    color: #22d3ee;

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

}


.recent-list {

    display: flex;

    flex-direction: column;

}


.recent-item {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 13px 0;

    border-top:
        1px solid
        rgba(148,163,184,.06);

}


.recent-avatar {

    width: 38px;

    height: 38px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 10px;

    background:
        rgba(34,211,238,.08);

    color: #22d3ee;

    font-size: 13px;

    font-weight: 900;

}


.recent-info {

    flex: 1;

    min-width: 0;

}


.recent-info strong {

    display: block;

    color: #e2e8f0;

    font-size: 12px;

    margin-bottom: 3px;

}


.recent-info span {

    color: #475569;

    font-size: 10px;

}


.recent-time {

    text-align: right;

}


.recent-time span {

    display: block;

    color: #c084fc;

    font-family: monospace;

    font-size: 11px;

    font-weight: 700;

}


.recent-time small {

    color: #475569;

    font-size: 9px;

}


.present-badge {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 5px 7px;

    border-radius: 6px;

    background:
        rgba(34,197,94,.06);

    color: #4ade80;

    font-size: 9px;

    font-weight: 800;

}


.present-badge span {

    width: 5px;

    height: 5px;

    border-radius: 50%;

    background: #4ade80;

}


/* =========================
   EMPTY
   ========================= */

.empty-dashboard {

    padding: 40px 20px;

    text-align: center;

}


.empty-dashboard > div {

    margin-bottom: 10px;

    color: #475569;

    font-size: 30px;

}


.empty-dashboard h3 {

    color: #cbd5e1;

    font-size: 14px;

    margin-bottom: 5px;

}


.empty-dashboard p {

    color: #475569;

    font-size: 11px;

}


/* =========================
   RESPONSIVE
   ========================= */

@media (max-width: 900px) {

    .stats-grid {

        grid-template-columns:
            repeat(2, 1fr);

    }


    .dashboard-grid {

        grid-template-columns: 1fr;

    }

}


@media (max-width: 650px) {

    .dashboard-header {

        align-items: flex-start;

        flex-direction: column;

    }


    .date-card {

        width: 100%;

        text-align: left;

    }


    .dashboard-header h1 {

        font-size: 30px;

    }


    .attendance-content {

        flex-direction: column;

    }


    .attendance-details {

        width: 100%;

    }

}


@media (max-width: 500px) {

    .stats-grid {

        grid-template-columns: 1fr;

    }


    .recent-item {

        flex-wrap: wrap;

    }


    .recent-time {

        margin-left: auto;

    }

}

</style>

@endpush

@endsection