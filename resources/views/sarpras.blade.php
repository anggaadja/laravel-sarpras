<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarpras & Inventaris</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">Sarpras & Inventaris</h1>
                <p style="color: var(--text-muted);">Manajemen Data Sekolah</p>
            </div>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <span class="badge badge-success">{{ auth()->user()->email }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem;">Keluar</button>
                </form>
            </div>
        </header>

        <!-- Stats Grid (Guaranteed Centered by CSS) -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Barang</h3>
                <div class="stat-value">{{ $totalBarang }}</div>
            </div>
            <div class="stat-card">
                <h3>Kondisi Baik</h3>
                <div class="stat-value" style="color: var(--success);">{{ $totalBaik }}</div>
            </div>
            <div class="stat-card">
                <h3>Perlu Perbaikan</h3>
                <div class="stat-value" style="color: var(--warning);">{{ $totalPerbaikan }}</div>
            </div>
            <div class="stat-card">
                <h3>Rusak Berat</h3>
                <div class="stat-value" style="color: var(--danger);">{{ $totalRusak }}</div>
            </div>
        </div>

        <!-- Action Bar -->
        <div style="display: flex; justify-content: space-between; margin-bottom: 1.5rem;">
            <div style="display: flex; gap: 0.5rem; flex: 1; max-width: 500px;">
                <input type="text" class="form-control" placeholder="Cari barang..." style="margin: 0;">
                <button class="btn btn-primary">Cari</button>
            </div>
            <button id="addBtn" class="btn btn-primary">
                + Tambah Data
            </button>
        </div>

        <!-- Data Table (Guaranteed Centered by CSS) -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sarpras as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge" style="background: #f1f5f9;">{{ $item->kode }}</span></td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            @if($item->kondisi == 'Baik')
                                <span class="badge badge-success">Baik</span>
                            @elseif($item->kondisi == 'Perbaikan')
                                <span class="badge badge-warning">Perbaikan</span>
                            @else
                                <span class="badge badge-danger">Rusak</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">Ubah</button>
                            <button class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.75rem; color: var(--danger); border-color: var(--danger);">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($sarpras->isEmpty())
                <div style="padding: 3rem; text-align: center; color: var(--text-muted);">
                    Tidak ada data ditemukan.
                </div>
            @endif
        </div>
        
        <div style="margin-top: 1.5rem; display: flex; justify-content: flex-end;">
            {{ $sarpras->links('simple-pagination') }}
        </div>
    </div>

    <!-- Modal Template (Hidden by default) -->
    <div id="modalOverlay" class="modal-overlay">
        <div class="card" style="width: 100%; max-width: 500px;">
            <h2 style="margin-bottom: 1.5rem;">Tambah Data</h2>
            <form action="{{ route('sarpras.store') }}" method="POST">
                @csrf
                <div style="display: grid; gap: 1rem;">
                    <div>
                        <label>Nama Barang</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <!-- Add other fields here similarly -->
                    <div style="display: flex; justify-content: flex-end; gap: 0.5rem; margin-top: 1rem;">
                        <button type="button" id="closeModal" class="btn btn-outline">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Simple Modal Logic
        const modal = document.getElementById('modalOverlay');
        const addBtn = document.getElementById('addBtn');
        const closeBtn = document.getElementById('closeModal');

        if(addBtn) {
            addBtn.addEventListener('click', () => {
                modal.classList.add('active');
            });
        }
        if(closeBtn) {
            closeBtn.addEventListener('click', () => {
                modal.classList.remove('active');
            });
        }
        modal.addEventListener('click', (e) => {
            if(e.target === modal) modal.classList.remove('active');
        });
    </script>
</body>
</html>
