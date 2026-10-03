@extends('layouts.app')

@section('title', 'QR Code Mahasiswa')

@section('content')

<div class="qr-page">

    <div class="qr-header">

        <div class="eyebrow">
            <span></span>
            STUDENT QR CODE
        </div>

        <h1>QR Code Mahasiswa</h1>

        <p>
            QR Code ini digunakan untuk melakukan presensi.
        </p>

    </div>


    <div class="qr-card">

        <div class="student-info">

            <div class="avatar">
                {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
            </div>

            <div>

                <h2>
                    {{ $mahasiswa->nama }}
                </h2>

                <p>
                    NIM {{ $mahasiswa->nim }}
                </p>

                <span>
                    {{ $mahasiswa->jurusan }}
                </span>

            </div>

        </div>


        <div class="qr-wrapper">

            <div class="qr-glow"></div>

            <div class="qr-box">

                {!! QrCode::size(280)->margin(2)->generate($mahasiswa->nim) !!}

            </div>

        </div>


        <div class="qr-label">
            <span>SCAN THIS CODE</span>

            <strong>
                {{ $mahasiswa->nim }}
            </strong>
        </div>


        <div class="qr-actions">

            <button
                type="button"
                class="download-button"
                onclick="window.print()">

                🖨️ Cetak / Simpan QR

            </button>


            <a
                href="{{ route('mahasiswa.index') }}"
                class="back-button">

                ← Kembali

            </a>

        </div>

    </div>

</div>


@push('styles')

<style>

    .qr-page {
        max-width: 900px;

        margin: 0 auto;

        padding: 20px 0 70px;

        text-align: center;
    }


    /* HEADER */

    .qr-header {
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

        box-shadow:
            0 0 12px #22d3ee;
    }


    .qr-header h1 {
        color: #f8fafc;

        font-size: 36px;

        margin-bottom: 8px;
    }


    .qr-header p {
        color: #94a3b8;

        font-size: 15px;
    }


    /* CARD */

    .qr-card {
        position: relative;

        max-width: 520px;

        margin: auto;

        padding: 35px 30px 30px;

        background:
            linear-gradient(
                145deg,
                rgba(15,23,42,.96),
                rgba(2,6,23,.96)
            );

        border: 1px solid rgba(34,211,238,.15);

        border-radius: 22px;

        box-shadow:
            0 25px 70px rgba(0,0,0,.35),
            0 0 40px rgba(34,211,238,.04);

        overflow: hidden;
    }


    .qr-card::before {
        content: "";

        position: absolute;

        width: 220px;
        height: 220px;

        top: -120px;
        right: -100px;

        background: #22d3ee;

        opacity: .05;

        border-radius: 50%;

        filter: blur(30px);
    }


    /* STUDENT */

    .student-info {
        position: relative;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 13px;

        margin-bottom: 28px;

        text-align: left;
    }


    .avatar {
        flex-shrink: 0;

        width: 52px;
        height: 52px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: rgba(34,211,238,.1);

        border: 1px solid rgba(34,211,238,.18);

        color: #22d3ee;

        font-size: 20px;

        font-weight: 900;

        box-shadow:
            0 0 20px rgba(34,211,238,.08);
    }


    .student-info h2 {
        color: #f8fafc;

        font-size: 18px;

        margin-bottom: 4px;
    }


    .student-info p {
        color: #22d3ee;

        font-size: 13px;

        font-weight: 700;

        margin-bottom: 3px;
    }


    .student-info span {
        color: #64748b;

        font-size: 12px;
    }


    /* QR */

    .qr-wrapper {
        position: relative;

        display: flex;

        align-items: center;

        justify-content: center;

        margin: 10px auto 25px;
    }


    .qr-glow {
        position: absolute;

        width: 300px;
        height: 300px;

        border-radius: 50%;

        background: #22d3ee;

        opacity: .08;

        filter: blur(50px);

        animation: pulse 3s ease-in-out infinite;
    }


    @keyframes pulse {

        0%, 100% {
            transform: scale(.9);

            opacity: .05;
        }

        50% {
            transform: scale(1.08);

            opacity: .1;
        }

    }


    .qr-box {
        position: relative;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 18px;

        background: white;

        border-radius: 18px;

        box-shadow:
            0 0 30px rgba(34,211,238,.15);
    }


    .qr-box svg {
        display: block;

        max-width: 100%;

        height: auto;
    }


    /* LABEL */

    .qr-label {
        margin-bottom: 25px;
    }


    .qr-label span {
        display: block;

        color: #64748b;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 2px;

        margin-bottom: 5px;
    }


    .qr-label strong {
        color: #22d3ee;

        font-size: 16px;

        letter-spacing: 1px;
    }


    /* BUTTONS */

    .qr-actions {
        display: flex;

        justify-content: center;

        gap: 10px;
    }


    .download-button,
    .back-button {
        padding: 11px 16px;

        border-radius: 9px;

        font-size: 13px;

        font-weight: 800;

        cursor: pointer;

        text-decoration: none;

        transition: .2s;
    }


    .download-button {
        border: none;

        background: #22d3ee;

        color: #06111f;
    }


    .download-button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 0 25px rgba(34,211,238,.35);
    }


    .back-button {
        border: 1px solid #334155;

        background: transparent;

        color: #94a3b8;
    }


    .back-button:hover {
        border-color: #22d3ee;

        color: #22d3ee;
    }


    /* MOBILE */

    @media (max-width: 600px) {

        .qr-page {
            padding-top: 5px;
        }


        .qr-header h1 {
            font-size: 29px;
        }


        .qr-card {
            padding: 28px 18px 22px;

            border-radius: 18px;
        }


        .qr-box {
            padding: 13px;
        }


        .qr-box svg {
            width: 240px;

            height: 240px;
        }


        .qr-actions {
            flex-direction: column;
        }


        .download-button,
        .back-button {
            width: 100%;
        }

    }


    /* PRINT */

    @media print {

        body {
            background: white !important;
        }


        .navbar,
        .qr-header,
        .qr-actions {
            display: none !important;
        }


        .main {
            padding: 0 !important;
        }


        .qr-page {
            padding: 0 !important;
        }


        .qr-card {
            box-shadow: none !important;

            border: none !important;

            background: white !important;

            color: black !important;
        }


        .student-info h2,
        .student-info span,
        .qr-label span {
            color: #111 !important;
        }


        .student-info p,
        .qr-label strong {
            color: #111 !important;
        }


        .qr-glow {
            display: none;
        }

    }

</style>

@endpush

@endsection