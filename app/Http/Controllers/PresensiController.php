<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->tanggal ?? Carbon::today()->toDateString();

        $presensis = Presensi::with('mahasiswa')
            ->whereDate('tanggal', $tanggal)
            ->orderBy('waktu', 'desc')
            ->get();

        return view('presensi.index', compact('presensis', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'string'],
        ]);

        $nim = trim($request->nim);

        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan.'
            ], 404);
        }

        $tanggal = Carbon::today()->toDateString();

        // Cek apakah mahasiswa sudah presensi hari ini
        $sudahHadir = Presensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('tanggal', $tanggal)
            ->exists();

        if ($sudahHadir) {
            return response()->json([
                'success' => false,
                'message' => $mahasiswa->nama . ' sudah melakukan presensi hari ini.'
            ], 409);
        }

        // Simpan presensi
        $presensi = new Presensi();
        $presensi->mahasiswa_id = $mahasiswa->id;
        $presensi->tanggal = $tanggal;
        $presensi->waktu = Carbon::now()->format('H:i:s');
        $presensi->save();

        return response()->json([
            'success' => true,
            'message' => 'Presensi berhasil dicatat.',
            'data' => [
                'nim' => $mahasiswa->nim,
                'nama' => $mahasiswa->nama,
                'tanggal' => $presensi->tanggal,
                'waktu' => $presensi->waktu,
            ]
        ]);
    }
}