@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')

<div class="mahasiswa-page">

    {{-- HEADER --}}

    <div class="page-header">

        <div>

            <div class="eyebrow">
                <span></span>
                STUDENT DATABASE
            </div>

            <h1>Data Mahasiswa</h1>

            <p>
                Kelola data mahasiswa dan QR Code untuk kebutuhan presensi.
            </p>

        </div>

        <a href="{{ route('mahasiswa.create') }}" class="add-button">
            + Tambah Mahasiswa
        </a>

    </div>


    {{-- NOTIFIKASI --}}

    @if(session('success'))

        <div class="alert success">
            <span>✓</span>
            {{ session('success') }}
        </div>

    @endif


    {{-- STATISTIK --}}

    <div class="stats">

        <div class="stat-card">

            <div class="stat-icon blue">
                👥
            </div>

            <div>
                <span>Total Mahasiswa</span>

                <strong>
                    {{ $mahasiswas->count() }}
                </strong>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon green">
                QR
            </div>

            <div>
                <span>QR Code</span>

                <strong>
                    {{ $mahasiswas->count() }}
                </strong>
            </div>

        </div>

    </div>


    {{-- DATA TABLE --}}

    <div class="table-card">

        <div class="table-header">

            <div>

                <h2>Daftar Mahasiswa</h2>

                <p>
                    Seluruh mahasiswa yang terdaftar dalam sistem.
                </p>

            </div>

            <div class="record-count">
                {{ $mahasiswas->count() }} mahasiswa
            </div>

        </div>


        @if($mahasiswas->count() > 0)

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Mahasiswa</th>

                            <th>NIM</th>

                            <th>Jurusan</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($mahasiswas as $index => $mahasiswa)

                            <tr>

                                <td class="number">
                                    {{ $index + 1 }}
                                </td>


                                <td>

                                    <div class="student">

                                        <div class="avatar">

                                            {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}

                                        </div>


                                        <div>

                                            <strong>
                                                {{ $mahasiswa->nama }}
                                            </strong>

                                            <small>
                                                Mahasiswa
                                            </small>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="nim">
                                        {{ $mahasiswa->nim }}
                                    </span>

                                </td>


                                <td>

                                    <span class="jurusan">
                                        {{ $mahasiswa->jurusan }}
                                    </span>

                                </td>


                                <td>

                                    <div class="actions">

                                        {{-- QR --}}

                                        <a
                                            href="{{ route('mahasiswa.qr', $mahasiswa) }}"
                                            class="action qr"
                                            title="Lihat QR Code">

                                            QR

                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                                            class="action edit"
                                            title="Edit mahasiswa">

                                            Edit

                                        </a>


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('mahasiswa.destroy', $mahasiswa) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action delete">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    👨‍🎓
                </div>

                <h3>Belum ada mahasiswa</h3>

                <p>
                    Tambahkan mahasiswa pertama untuk mulai menggunakan sistem.
                </p>

                <a href="{{ route('mahasiswa.create') }}">
                    + Tambah Mahasiswa
                </a>

            </div>

        @endif

    </div>

</div>


@push('styles')

<style>

    .mahasiswa-page {
        max-width: 1150px;
        margin: 0 auto;
        padding: 15px 0 60px;
    }


    /* HEADER */

    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 30px;
    }


    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #22d3ee;

        font-size: 12px;
        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 12px;
    }


    .eyebrow span {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: #22d3ee;

        box-shadow: 0 0 12px #22d3ee;
    }


    .page-header h1 {
        color: #f8fafc;

        font-size: 38px;

        margin-bottom: 8px;
    }


    .page-header p {
        color: #94a3b8;

        font-size: 15px;
    }


    /* BUTTON */

    .add-button {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 12px 18px;

        border-radius: 10px;

        background: #22d3ee;

        color: #06111f;

        text-decoration: none;

        font-weight: 800;

        box-shadow: 0 0 20px rgba(34,211,238,.2);

        transition: .2s;
    }


    .add-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 0 30px rgba(34,211,238,.45);
    }


    /* ALERT */

    .alert {
        display: flex;

        align-items: center;

        gap: 10px;

        padding: 13px 16px;

        margin-bottom: 20px;

        border-radius: 10px;

        font-size: 14px;

        font-weight: 600;
    }


    .alert.success {
        background: rgba(34,197,94,.08);

        border: 1px solid rgba(34,197,94,.2);

        color: #4ade80;
    }


    /* STATS */

    .stats {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 18px;

        margin-bottom: 22px;
    }


    .stat-card {
        display: flex;

        align-items: center;

        gap: 15px;

        padding: 20px;

        background: rgba(15,23,42,.88);

        border: 1px solid rgba(148,163,184,.12);

        border-radius: 15px;

        box-shadow:
            0 10px 35px rgba(0,0,0,.18);
    }


    .stat-icon {
        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        font-size: 19px;

        font-weight: 800;
    }


    .stat-icon.blue {
        background: rgba(34,211,238,.1);

        color: #22d3ee;
    }


    .stat-icon.green {
        background: rgba(34,197,94,.1);

        color: #4ade80;
    }


    .stat-card span {
        display: block;

        color: #94a3b8;

        font-size: 13px;

        margin-bottom: 5px;
    }


    .stat-card strong {
        display: block;

        color: #f8fafc;

        font-size: 22px;
    }


    /* TABLE */

    .table-card {
        overflow: hidden;

        background: rgba(15,23,42,.9);

        border: 1px solid rgba(148,163,184,.12);

        border-radius: 17px;

        box-shadow:
            0 15px 45px rgba(0,0,0,.2);
    }


    .table-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 22px 24px;

        border-bottom:
            1px solid rgba(148,163,184,.1);
    }


    .table-header h2 {
        color: #f8fafc;

        font-size: 19px;

        margin-bottom: 5px;
    }


    .table-header p {
        color: #64748b;

        font-size: 13px;
    }


    .record-count {
        padding: 7px 11px;

        border-radius: 20px;

        background: rgba(34,211,238,.08);

        color: #22d3ee;

        font-size: 12px;

        font-weight: 800;
    }


    .table-wrapper {
        overflow-x: auto;
    }


    table {
        width: 100%;

        border-collapse: collapse;

        min-width: 800px;
    }


    th {
        padding: 14px 18px;

        background: rgba(2,6,23,.4);

        color: #64748b;

        font-size: 11px;

        letter-spacing: .8px;

        text-transform: uppercase;

        text-align: left;
    }


    td {
        padding: 16px 18px;

        color: #cbd5e1;

        border-top:
            1px solid rgba(148,163,184,.07);

        font-size: 14px;
    }


    tbody tr {
        transition: .2s;
    }


    tbody tr:hover {
        background: rgba(34,211,238,.025);
    }


    .number {
        color: #64748b;
    }


    /* STUDENT */

    .student {
        display: flex;

        align-items: center;

        gap: 11px;
    }


    .avatar {
        width: 38px;
        height: 38px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: rgba(34,211,238,.1);

        color: #22d3ee;

        font-weight: 800;
    }


    .student strong {
        display: block;

        color: #f1f5f9;

        margin-bottom: 3px;
    }


    .student small {
        color: #64748b;

        font-size: 11px;
    }


    .nim {
        color: #94a3b8;
    }


    .jurusan {
        color: #cbd5e1;
    }


    /* ACTIONS */

    .actions {
        display: flex;

        align-items: center;

        gap: 7px;
    }


    .actions form {
        margin: 0;
    }


    .action {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 7px 10px;

        border-radius: 7px;

        border: 1px solid transparent;

        text-decoration: none;

        font-size: 12px;

        font-weight: 800;

        cursor: pointer;

        transition: .2s;
    }


    .action.qr {
        background: rgba(34,211,238,.08);

        border-color: rgba(34,211,238,.15);

        color: #22d3ee;
    }


    .action.qr:hover {
        background: rgba(34,211,238,.16);

        box-shadow:
            0 0 15px rgba(34,211,238,.2);
    }


    .action.edit {
        background: rgba(168,85,247,.08);

        border-color: rgba(168,85,247,.15);

        color: #c084fc;
    }


    .action.edit:hover {
        background: rgba(168,85,247,.16);
    }


    .action.delete {
        background: rgba(239,68,68,.08);

        border-color: rgba(239,68,68,.15);

        color: #f87171;
    }


    .action.delete:hover {
        background: rgba(239,68,68,.16);
    }


    /* EMPTY */

    .empty-state {
        padding: 70px 20px;

        text-align: center;
    }


    .empty-icon {
        font-size: 42px;

        margin-bottom: 15px;
    }


    .empty-state h3 {
        color: #f8fafc;

        margin-bottom: 7px;
    }


    .empty-state p {
        color: #64748b;

        margin-bottom: 18px;
    }


    .empty-state a {
        color: #22d3ee;

        text-decoration: none;

        font-weight: 700;
    }


    /* RESPONSIVE */

    @media (max-width: 750px) {

        .page-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .page-header h1 {
            font-size: 30px;
        }


        .add-button {
            width: 100%;

            justify-content: center;
        }


        .stats {
            grid-template-columns: 1fr;
        }


        .table-header {
            align-items: flex-start;

            gap: 12px;

            flex-direction: column;
        }

    }

</style>

@endpush

@endsection