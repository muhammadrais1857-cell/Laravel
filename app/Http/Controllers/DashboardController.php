<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Presensi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::today()->toDateString();

        // Total seluruh mahasiswa
        $totalMahasiswa = Mahasiswa::count();

        // Jumlah mahasiswa yang sudah hadir hari ini
        $totalHadir = Presensi::whereDate('tanggal', $tanggal)
            ->distinct('mahasiswa_id')
            ->count('mahasiswa_id');

        // Jumlah mahasiswa yang belum hadir
        $totalBelumHadir = max(
            $totalMahasiswa - $totalHadir,
            0
        );

        // Persentase kehadiran
        $persentase = $totalMahasiswa > 0
            ? round(($totalHadir / $totalMahasiswa) * 100)
            : 0;

        // Lima presensi terbaru hari ini
        $presensiTerbaru = Presensi::with('mahasiswa')
            ->whereDate('tanggal', $tanggal)
            ->orderBy('waktu', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'tanggal',
            'totalMahasiswa',
            'totalHadir',
            'totalBelumHadir',
            'persentase',
            'presensiTerbaru'
        ));
    }
}