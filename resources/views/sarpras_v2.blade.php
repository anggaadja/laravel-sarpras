<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sarpras Studi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: #f0f2f5; margin: 0; padding: 20px; }
        
        /* Navbar */
        .navbar {
            background: white;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .brand { font-size: 24px; font-weight: 700; color: #333; }
        
        /* Stats Grid - FLEXBOX CENTERED */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            
            /* CRITICAL CENTERING STYLES */
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center;
            text-align: center;
        }
        
        .stat-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            text-align: center;
            width: 100%;
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            text-align: center;
            width: 100%;
        }
        
        /* Table Styles */
        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            padding: 20px;
            overflow-x: auto;
        }
        
        table { width: 100%; border-collapse: collapse; }
        
        th {
            background: #f8fafc;
            padding: 15px;
            font-weight: 600;
            color: #475569;
            text-align: center;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            text-align: center;
            vertical-align: middle;
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .bg-success { background: #dcfce7; color: #166534; }
        .bg-warning { background: #fef9c3; color: #854d0e; }
        .bg-danger { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="brand">Aplikasi Sarpras Studi</div>
        <div>
            <span style="color: #666; margin-right: 15px;">{{ auth()->check() ? auth()->user()->email : 'Guest' }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button style="background: none; border: 1px solid #ddd; padding: 8px 16px; border-radius: 6px; cursor: pointer;">Logout</button>
            </form>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Total Barang</div>
            <div class="stat-value">{{ $totalBarang }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Kondisi Baik</div>
            <div class="stat-value" style="color: #10b981;">{{ $totalBaik }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Perlu Perbaikan</div>
            <div class="stat-value" style="color: #f59e0b;">{{ $totalPerbaikan }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Rusak Berat</div>
            <div class="stat-value" style="color: #ef4444;">{{ $totalRusak }}</div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
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
                    <td><b>{{ $item->nama }}</b><br><small style="color: #888;">{{ $item->kode }}</small></td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        @if($item->kondisi == 'Baik') <span class="badge bg-success">Baik</span>
                        @elseif($item->kondisi == 'Perbaikan') <span class="badge bg-warning">Perbaikan</span>
                        @else <span class="badge bg-danger">Rusak</span> @endif
                    </td>
                    <td>
                        <button style="background: #eff6ff; color: #1d4ed8; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer;">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 20px; text-align: center;">
             {{-- Pagination if needed --}}
        </div>
    </div>

</body>
</html>
