<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            width: min(700px, 92%);
            margin: 40px auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 9px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        @media (max-width: 600px) {
            .container {
                margin: 25px auto;
            }

            .card {
                padding: 18px;
            }

            .header h1 {
                font-size: 23px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Tambah Mahasiswa</h1>
        <p>Masukkan data mahasiswa baru.</p>
    </div>

    <div class="card">

        <form
            action="{{ route('mahasiswa.store') }}"
            method="POST">

            @csrf

            <div class="form-group">

                <label for="nim">
                    NIM
                </label>

                <input
                    type="text"
                    id="nim"
                    name="nim"
                    value="{{ old('nim') }}"
                    placeholder="Contoh: 2301003"
                    required>

                @error('nim')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="nama">
                    Nama Mahasiswa
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama mahasiswa"
                    required>

                @error('nama')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="kelas">
                    Kelas
                </label>

                <input
                    type="text"
                    id="kelas"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    placeholder="Contoh: TI-1"
                    required>

                @error('kelas')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="jurusan">
                    Jurusan
                </label>

                <input
                    type="text"
                    id="jurusan"
                    name="jurusan"
                    value="{{ old('jurusan') }}"
                    placeholder="Contoh: Informatika"
                    required>

                @error('jurusan')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="actions">

                <a
                    href="{{ route('mahasiswa.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Simpan Mahasiswa
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>