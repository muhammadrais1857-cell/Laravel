<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    {{-- CSRF TOKEN UNTUK REQUEST JAVASCRIPT --}}
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Presensi QR')
    </title>

    <style>

        /* =========================================
           GLOBAL
        ========================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;

            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(34, 211, 238, 0.08),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 20%,
                    rgba(168, 85, 247, 0.08),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 50% 100%,
                    rgba(34, 211, 238, 0.05),
                    transparent 35%
                ),
                #050816;

            color: #e5e7eb;
            min-height: 100vh;
        }

        a {
            color: inherit;
        }


        /* =========================================
           NAVBAR
        ========================================= */

        .navbar {
            background:
                linear-gradient(
                    90deg,
                    rgba(5, 8, 22, 0.97),
                    rgba(10, 15, 35, 0.97)
                );

            border-bottom: 1px solid rgba(34, 211, 238, 0.18);

            position: sticky;
            top: 0;
            z-index: 100;

            box-shadow:
                0 4px 25px rgba(0, 0, 0, 0.35);
        }

        .nav-container {
            width: min(1100px, 92%);
            margin: auto;

            min-height: 65px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }


        /* =========================================
           BRAND
        ========================================= */

        .brand {
            text-decoration: none;

            color: #22d3ee;

            font-size: 20px;
            font-weight: bold;

            white-space: nowrap;

            text-shadow:
                0 0 12px rgba(34, 211, 238, 0.35);

            transition: 0.25s;
        }

        .brand:hover {
            color: #67e8f9;

            text-shadow:
                0 0 18px rgba(34, 211, 238, 0.65);
        }


        /* =========================================
           NAVIGATION
        ========================================= */

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a {
            text-decoration: none;

            color: #94a3b8;

            padding: 9px 12px;

            border-radius: 9px;

            font-size: 14px;

            transition:
                background 0.2s,
                color 0.2s,
                box-shadow 0.2s;
        }

        .nav-links a:hover {
            background:
                rgba(34, 211, 238, 0.08);

            color: #22d3ee;

            box-shadow:
                0 0 15px rgba(34, 211, 238, 0.08);
        }

        .nav-links a.active {
            background:
                rgba(34, 211, 238, 0.13);

            color: #22d3ee;

            font-weight: bold;

            box-shadow:
                inset 0 0 0 1px rgba(34, 211, 238, 0.15),
                0 0 15px rgba(34, 211, 238, 0.08);
        }


        /* =========================================
           MAIN
        ========================================= */

        .main {
            width: min(1100px, 92%);
            margin: auto;

            padding: 35px 0;

            min-height:
                calc(100vh - 65px);
        }


        /* =========================================
           GENERAL CONTAINER
        ========================================= */

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }


        /* =========================================
           CARD
        ========================================= */

        .card {
            background:
                linear-gradient(
                    145deg,
                    rgba(15, 23, 42, 0.96),
                    rgba(8, 15, 32, 0.96)
                );

            border-radius: 16px;

            padding: 24px;

            border:
                1px solid rgba(148, 163, 184, 0.12);

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.28);

            margin-bottom: 20px;

            color: #e5e7eb;
        }


        /* =========================================
           BUTTON
        ========================================= */

        .btn {
            display: inline-block;

            padding: 10px 18px;

            border-radius: 10px;

            text-decoration: none;

            border: none;

            cursor: pointer;

            font-weight: 600;

            transition:
                transform 0.2s,
                box-shadow 0.2s,
                background 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #0891b2;
            color: white;

            box-shadow:
                0 0 18px rgba(34, 211, 238, 0.18);
        }

        .btn-primary:hover {
            background: #06b6d4;

            box-shadow:
                0 0 25px rgba(34, 211, 238, 0.35);
        }

        .btn-success {
            background: #16a34a;
            color: white;

            box-shadow:
                0 0 15px rgba(34, 197, 94, 0.15);
        }

        .btn-danger {
            background: #dc2626;
            color: white;

            box-shadow:
                0 0 15px rgba(239, 68, 68, 0.15);
        }


        /* =========================================
           TABLE
        ========================================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;

            color: #e5e7eb;
        }

        th,
        td {
            padding: 14px;

            text-align: left;

            border-bottom:
                1px solid rgba(148, 163, 184, 0.12);
        }

        th {
            background:
                rgba(15, 23, 42, 0.9);

            color: #22d3ee;

            font-weight: 700;
        }

        tr:hover td {
            background:
                rgba(34, 211, 238, 0.025);
        }


        /* =========================================
           STATISTICS
        ========================================= */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 25px;
        }

        .stat-card {
            background:
                linear-gradient(
                    145deg,
                    rgba(15, 23, 42, 0.98),
                    rgba(8, 15, 32, 0.98)
                );

            border-radius: 16px;

            padding: 20px;

            display: flex;
            align-items: center;

            gap: 15px;

            border:
                1px solid rgba(34, 211, 238, 0.12);

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.28);

            transition:
                transform 0.2s,
                border-color 0.2s,
                box-shadow 0.2s;

            color: #e5e7eb;
        }

        .stat-card:hover {
            transform: translateY(-3px);

            border-color:
                rgba(34, 211, 238, 0.28);

            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.35),
                0 0 20px rgba(34, 211, 238, 0.06);
        }

        .stat-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                rgba(34, 211, 238, 0.08);

            border:
                1px solid rgba(34, 211, 238, 0.12);

            border-radius: 12px;

            font-size: 22px;
        }

        .stat-label {
            font-size: 13px;

            color: #94a3b8;

            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 26px;

            font-weight: bold;

            color: #f8fafc;

            text-shadow:
                0 0 10px rgba(255, 255, 255, 0.04);
        }


        /* =========================================
           FORM
        ========================================= */

        input,
        select,
        textarea {
            background:
                rgba(15, 23, 42, 0.9);

            color: #e5e7eb;

            border:
                1px solid rgba(148, 163, 184, 0.2);

            border-radius: 9px;

            padding: 10px 12px;

            outline: none;

            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #22d3ee;

            box-shadow:
                0 0 0 3px rgba(34, 211, 238, 0.08),
                0 0 15px rgba(34, 211, 238, 0.08);
        }

        input::placeholder,
        textarea::placeholder {
            color: #64748b;
        }


        /* =========================================
           LABEL
        ========================================= */

        label {
            color: #cbd5e1;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 850px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 768px) {

            .container {
                padding: 12px;
            }

            .card {
                padding: 16px;
            }

            th,
            td {
                padding: 10px;

                font-size: 14px;
            }

        }


        @media (max-width: 650px) {

            .nav-container {
                min-height: auto;

                padding: 12px 0;

                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }

            .nav-links {
                width: 100%;

                overflow-x: auto;

                padding-bottom: 3px;
            }

            .nav-links a {
                white-space: nowrap;
            }

            .main {
                padding: 25px 0;
            }

        }


        @media (max-width: 500px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .brand {
                font-size: 18px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

    <nav class="navbar">

        <div class="nav-container">

            <a
                href="{{ route('dashboard') }}"
                class="brand">

                📚 Presensi QR

            </a>


            <div class="nav-links">

                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    Dashboard

                </a>


                <a
                    href="{{ route('scanner') }}"
                    class="{{ request()->routeIs('scanner') ? 'active' : '' }}">

                    📷 Scan QR

                </a>


                <a
                    href="{{ route('mahasiswa.index') }}"
                    class="{{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">

                    Mahasiswa

                </a>


                <a
                    href="{{ route('presensi.index') }}"
                    class="{{ request()->routeIs('presensi.*') ? 'active' : '' }}">

                    Presensi

                </a>

            </div>

        </div>

    </nav>


    <main class="main">

        @yield('content')

    </main>


    @stack('scripts')

</body>

</html>