<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sarpras;
use Carbon\Carbon;

class SarprasSeeder extends Seeder
{
    public function run(): void
    {
        // Tambah 15 data contoh (agar ada 2-3 halaman)
        $items = [
            ['kode' => 'EL-001', 'nama' => 'Laptop Lenovo ThinkPad', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang IT', 'jumlah' => 5, 'kondisi' => 'Baik'],
            ['kode' => 'EL-002', 'nama' => 'Proyektor Epson', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang Rapat', 'jumlah' => 2, 'kondisi' => 'Baik'],
            ['kode' => 'FR-001', 'nama' => 'Meja Kerja Kayu', 'kategori' => 'Furniture', 'lokasi' => 'Kantor Utama', 'jumlah' => 10, 'kondisi' => 'Baik'],
            ['kode' => 'FR-002', 'nama' => 'Kursi Ergonomis', 'kategori' => 'Furniture', 'lokasi' => 'Kantor Utama', 'jumlah' => 15, 'kondisi' => 'Perbaikan'],
            ['kode' => 'EL-003', 'nama' => 'Printer HP LaserJet', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang Admin', 'jumlah' => 3, 'kondisi' => 'Baik'],
            ['kode' => 'KD-001', 'nama' => 'Mobil Dinas Toyota', 'kategori' => 'Kendaraan', 'lokasi' => 'Parkir Utama', 'jumlah' => 2, 'kondisi' => 'Baik'],
            ['kode' => 'EL-004', 'nama' => 'AC Daikin 2PK', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang Server', 'jumlah' => 4, 'kondisi' => 'Rusak'],
            ['kode' => 'FR-003', 'nama' => 'Lemari Arsip Besi', 'kategori' => 'Furniture', 'lokasi' => 'Gudang A', 'jumlah' => 8, 'kondisi' => 'Baik'],
            ['kode' => 'EL-005', 'nama' => 'Monitor Samsung 24 inch', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang IT', 'jumlah' => 12, 'kondisi' => 'Baik'],
            ['kode' => 'FR-004', 'nama' => 'Sofa Ruang Tamu', 'kategori' => 'Furniture', 'lokasi' => 'Lobby', 'jumlah' => 2, 'kondisi' => 'Perbaikan'],
            ['kode' => 'KD-002', 'nama' => 'Motor Honda Beat', 'kategori' => 'Kendaraan', 'lokasi' => 'Parkir Motor', 'jumlah' => 3, 'kondisi' => 'Baik'],
            ['kode' => 'EL-006', 'nama' => 'CCTV Hikvision', 'kategori' => 'Elektronik', 'lokasi' => 'Pos Satpam', 'jumlah' => 8, 'kondisi' => 'Baik'],
            ['kode' => 'FR-005', 'nama' => 'Rak Buku Kayu', 'kategori' => 'Furniture', 'lokasi' => 'Perpustakaan', 'jumlah' => 6, 'kondisi' => 'Baik'],
            ['kode' => 'EL-007', 'nama' => 'UPS APC 1200VA', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang Server', 'jumlah' => 4, 'kondisi' => 'Rusak'],
            ['kode' => 'LN-001', 'nama' => 'Genset Yamaha 5000W', 'kategori' => 'Lainnya', 'lokasi' => 'Gudang B', 'jumlah' => 1, 'kondisi' => 'Baik'],
        ];

        foreach ($items as $item) {
            Sarpras::firstOrCreate(
                ['kode' => $item['kode']], // Check by unique code
                [
                    'nama' => $item['nama'],
                    'kategori' => $item['kategori'],
                    'lokasi' => $item['lokasi'],
                    'jumlah' => $item['jumlah'],
                    'kondisi' => $item['kondisi'],
                    'tanggal' => Carbon::now()->subDays(rand(1, 365)),
                    'tanggal_perbaikan' => null,
                    'hasil_rekondisi' => null,
                ]
            );
        }
    }
}
