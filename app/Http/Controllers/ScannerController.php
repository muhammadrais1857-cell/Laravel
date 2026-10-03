<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScannerController extends Controller
{
    public function index()
    {
        return view('scanner.index');
    }

    public function scan(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa dengan NIM tersebut tidak ditemukan.'
            ], 404);
        }

        $sekarang = Carbon::now();

        $sudahPresensi = Presensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('tanggal', $sekarang->toDateString())
            ->exists();

        if ($sudahPresensi) {
            return response()->json([
                'success' => false,
                'message' => $mahasiswa->nama . ' sudah melakukan presensi hari ini.'
            ]);
        }

        Presensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'tanggal' => $sekarang->toDateString(),
            'waktu' => $sekarang->toTimeString(),
            'status' => 'Hadir',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Presensi berhasil.',
            'mahasiswa' => [
                'nama' => $mahasiswa->nama,
                'nim' => $mahasiswa->nim,
                'kelas' => $mahasiswa->kelas,
                'jurusan' => $mahasiswa->jurusan,
                'waktu' => $sekarang->format('H:i:s'),
            ]
        ]);
    }
}