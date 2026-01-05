<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARPRAS DAN INVENTARIS STUDY KASUS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}_wrapped_divs">
    <style>
        /* Force center alignment for all table data and headers */
        .data-table th,
        .data-table td {
            text-align: center !important;
            vertical-align: middle !important;
        }
        /* Ensure specific columns don't override this */
        .data-table td:nth-child(n) {
            text-align: center !important;
        }

        /* Force Centering for Stat Cards */
        .stat-card {
            text-align: center !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .stat-card h3 {
            text-align: center !important;
            width: auto !important; /* Let flexbox center the element */
            margin: 0 0 0.5rem 0 !important;
        }
        .stat-value {
            text-align: center !important;
            width: auto !important; /* Let flexbox center the element */
            margin: 0 !important;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); min-height: 100vh;">
    <div class="app-container">
        <!-- Header -->
        <header class="main-header">
            <div class="header-content" style="position: relative; justify-content: flex-end;">
                <h1 style="position: absolute; left: 50%; transform: translateX(-50%); width: max-content; margin: 0;">Sarpras & Inventaris Study Kasus</h1>
                <div class="user-profile">
                    <span class="user-name">{{ auth()->user()->email }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Action Bar -->
            @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 1rem; margin-bottom: 1rem; border-radius: 0.5rem;">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 1rem; margin-bottom: 1rem; border-radius: 0.5rem;">
                <ul style="margin: 0; padding-left: 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="action-bar">
                <div class="search-box">
                    <form method="GET" action="{{ route('sarpras.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" id="searchInput" name="search" placeholder="Cari barang..." value="{{ request('search') }}">
                        @if(request('search'))
                        <a href="{{ route('sarpras.index') }}" class="search-clear" title="Hapus pencarian">✕</a>
                        @endif
                    </form>
                </div>
                <button id="addBtn" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Tambah Sarpras Baru
                </button>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; text-align: center !important;">
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <h3 style="text-align: center !important; margin: 0 auto !important; width: auto !important; border-bottom: 2px solid transparent;">Total Barang</h3>
                    </div>
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <p class="stat-value" id="statTotalBarang" style="text-align: center !important; margin: 0 auto !important; width: auto !important;">{{ $totalBarang }}</p>
                    </div>
                </div>
                <div class="stat-card" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; text-align: center !important;">
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <h3 style="text-align: center !important; margin: 0 auto !important; width: auto !important;">Kondisi Baik</h3>
                    </div>
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <p class="stat-value text-success" id="statBaik" style="text-align: center !important; margin: 0 auto !important; width: auto !important;">{{ $totalBaik }}</p>
                    </div>
                </div>
                <div class="stat-card" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; text-align: center !important;">
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <h3 style="text-align: center !important; margin: 0 auto !important; width: auto !important;">Perlu Perbaikan</h3>
                    </div>
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <p class="stat-value text-warning" id="statPerbaikan" style="text-align: center !important; margin: 0 auto !important; width: auto !important;">{{ $totalPerbaikan }}</p>
                    </div>
                </div>
                <div class="stat-card" style="display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: center !important; text-align: center !important;">
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <h3 style="text-align: center !important; margin: 0 auto !important; width: auto !important;">Rusak Berat</h3>
                    </div>
                    <div style="width: 100% !important; text-align: center !important; display: flex !important; justify-content: center !important;">
                        <p class="stat-value text-danger" id="statRusak" style="text-align: center !important; margin: 0 auto !important; width: auto !important;">{{ $totalRusak }}</p>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <div class="table-header">
                    <h2>Daftar Sarpras</h2>
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        @if(request('filter_kategori') || request('filter_kondisi') || request('filter_lokasi'))
                        <a href="{{ route('sarpras.index', request()->only('search')) }}" class="btn btn-outline" style="font-size: 0.875rem; padding: 0.5rem 1rem;">
                            Hapus Filter
                        </a>
                        @endif
                        <button id="filterBtn" class="btn btn-outline">Filter</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th style="vertical-align: middle;">Tgl<br>Pengadaan</th>
                            <th style="vertical-align: middle;">Tgl<br>Perbaikan</th>
                            <th style="vertical-align: middle;">Hasil<br>Rekondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sarpras as $item)
                        <tr id="row-{{ $item->id }}" data-kondisi="{{ $item->kondisi }}">
                            <td>{{ $loop->iteration + ($sarpras->currentPage() - 1) * $sarpras->perPage() }}</td>
                            <td><span class="badge badge-gray">{{ $item->kode }}</span></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                @php
                                    $statusClass = match(true) {
                                        stripos($item->kondisi, 'Perbaikan') !== false => 'status-perbaikan',
                                        stripos($item->kondisi, 'Rusak') !== false => 'status-rusak',
                                        stripos($item->kondisi, 'Baik') !== false => 'status-baik',
                                        default => 'status-gray'
                                    };
                                @endphp
                                <span class="status-pill {{ $statusClass }}">{{ $item->kondisi }}</span>
                            </td>
                            <td>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}</td>
                            <td>{{ $item->tanggal_perbaikan ? \Carbon\Carbon::parse($item->tanggal_perbaikan)->format('d-m-Y') : '-' }}</td>
                            <td>{{ $item->hasil_rekondisi ?? '-' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button
                                        class="action-btn edit"
                                        title="Edit"
                                        data-id="{{ $item->id }}"
                                        data-edit-url="{{ route('sarpras.edit', $item->id) }}"
                                        data-update-url="{{ route('sarpras.update', $item->id) }}"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </button>
                                    <form
                                        method="POST"
                                        action="{{ route('sarpras.destroy', $item) }}"
                                        class="delete-form"
                                        data-name="{{ $item->nama }}"
                                        style="display:inline;"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn delete" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 1.5rem;">
                    {{ $sarpras->links('simple-pagination') }}
                </div>
            </div>
        </main>

        <!-- Filter Modal -->
        <div id="filterModalOverlay" class="modal-overlay hidden">
            <div class="modal">
                <div class="modal-header">
                    <h2>Filter Data</h2>
                    <button id="closeFilterModal" class="close-btn">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="filterForm" method="GET" action="{{ route('sarpras.index') }}">
                        @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="filter_kategori">Kategori</label>
                                <select id="filter_kategori" name="filter_kategori">
                                    <option value="">Semua Kategori</option>
                                    @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori }}" {{ request('filter_kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_kondisi">Kondisi</label>
                                <select id="filter_kondisi" name="filter_kondisi">
                                    <option value="">Semua Kondisi</option>
                                    <option value="Baik" {{ request('filter_kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Perbaikan" {{ request('filter_kondisi') == 'Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                    <option value="Rusak" {{ request('filter_kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_lokasi">Lokasi</label>
                                <select id="filter_lokasi" name="filter_lokasi">
                                    <option value="">Semua Lokasi</option>
                                    @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi }}" {{ request('filter_lokasi') == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cancelFilterBtn" class="btn btn-secondary">Batal</button>
                    <a href="{{ route('sarpras.index', request()->only('search')) }}" class="btn btn-secondary" style="text-decoration: none; display: inline-flex; align-items: center;">Reset</a>
                    <button type="submit" form="filterForm" class="btn btn-primary">Terapkan Filter</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalOverlay" class="modal-overlay hidden">
            <div class="modal">
                <div class="modal-header">
                    <h2 id="modalTitle">Tambah Data Baru</h2>
                    <button id="closeModal" class="close-btn">&times;</button>
                </div>
                <div class="modal-body">
                    <form
                        id="addForm"
                        method="POST"
                        action="{{ route('sarpras.store') }}"
                        data-store-action="{{ route('sarpras.store') }}"
                        data-update-base="{{ url('sarpras') }}"
                    >
                        @csrf
                        <input type="hidden" name="_method" id="formMethodOverride">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" id="nama" name="nama" placeholder="Contoh: Laptop Acer" required>
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Barang</label>
                                <input type="text" id="kode" name="kode" placeholder="Contoh: LP-002" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select id="kategori" name="kategori">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Gudang A" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select id="kondisi" name="kondisi">
                                    <option value="Baik">Baik</option>
                                    <option value="Perbaikan">Perlu Perbaikan</option>
                                    <option value="Rusak">Rusak Berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pengadaan</label>
                                <div class="date-input-with-menu" style="display:flex;align-items:center;gap:0.5rem;">
                                    <input type="date" id="tanggal" name="tanggal">
                                    <select class="date-select" data-target="tanggal" style="padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
                                        <option value="">Opsi...</option>
                                        <option value="today">Hari ini</option>
                                        <option value="yesterday">Kemarin</option>
                                        <option value="clear">Kosongkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
                                <div class="date-input-with-menu" style="display:flex;align-items:center;gap:0.5rem;">
                                    <input type="date" id="tanggal_perbaikan" name="tanggal_perbaikan">
                                    <select class="date-select" data-target="tanggal_perbaikan" style="padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
                                        <option value="">Opsi...</option>
                                        <option value="today">Hari ini</option>
                                        <option value="yesterday">Kemarin</option>
                                        <option value="clear">Kosongkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hasil_rekondisi">Hasil Rekondisi</label>
                                <select id="hasil_rekondisi" name="hasil_rekondisi">
                                    <option value="">Pilih Hasil...</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Dihanguskan">Dihanguskan</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="cancelBtn" class="btn btn-secondary">Batal</button>
                    <button type="submit" form="addForm" id="saveBtn" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalOverlay = document.getElementById('modalOverlay');
        const addBtn = document.getElementById('addBtn');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const addForm = document.getElementById('addForm');
        const modalTitle = document.getElementById('modalTitle');
        const formMethodOverride = document.getElementById('formMethodOverride');
        const storeAction = addForm ? addForm.dataset.storeAction : null;
        const searchInput = document.getElementById('searchInput');
        const searchForm = searchInput ? searchInput.closest('form') : null;
        const editButtons = document.querySelectorAll('.action-btn.edit');
        const deleteForms = document.querySelectorAll('.delete-form');
        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null;

        // Filter Modal Elements
        const filterModalOverlay = document.getElementById('filterModalOverlay');
        const filterBtn = document.getElementById('filterBtn');
        const closeFilterBtn = document.getElementById('closeFilterModal');
        const cancelFilterBtn = document.getElementById('cancelFilterBtn');

        const openModal = () => {
            modalOverlay.classList.remove('hidden');
            setTimeout(() => {
                modalOverlay.classList.add('active');
            }, 10);
        };

        const setCreateMode = () => {
            if (!addForm) return;
            addForm.reset();
            addForm.action = storeAction;
            if (formMethodOverride) {
                formMethodOverride.value = '';
            }
            if (modalTitle) {
                modalTitle.textContent = 'Tambah Data Baru';
            }
        };

        const populateForm = (data) => {
            if (!data) return;
            
            // Helper to safely set value using getElementById
            const setVal = (id, val) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = val || '';
                }
            };

            setVal('nama', data.nama);
            setVal('kode', data.kode);
            setVal('kategori', data.kategori || 'Elektronik');
            setVal('lokasi', data.lokasi);
            setVal('jumlah', data.jumlah || 1);
            setVal('kondisi', data.kondisi || 'Baik');
            setVal('hasil_rekondisi', data.hasil_rekondisi);

            // Handle dates - ensure YYYY-MM-DD format
            const formatDate = (dateStr) => {
                if (!dateStr) return '';
                return dateStr.substring(0, 10);
            };

            setVal('tanggal', formatDate(data.tanggal));
            setVal('tanggal_perbaikan', formatDate(data.tanggal_perbaikan));
        };

        // Open Modal in create mode
        if (addBtn) {
            addBtn.addEventListener('click', () => {
                setCreateMode();
                openModal();
            });
        }

        // Close Modal Function
        const closeModal = () => {
            modalOverlay.classList.remove('active');
            setTimeout(() => {
                modalOverlay.classList.add('hidden');
                addForm.reset();
            }, 300);
        };

        // Close Event Listeners
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

        // Close on click outside
        if (modalOverlay) {
            modalOverlay.addEventListener('click', (e) => {
                if (e.target === modalOverlay) {
                    closeModal();
                }
            });
        }

        // Handle Form Submission - Let browser handle it naturally
        if (addForm) {
            addForm.addEventListener('submit', (e) => {
                console.log('Submitting form to:', addForm.action);
                // We don't prevent default, let it submit
            });
        }

        // Handle Search - Submit on Enter or after typing stops
        if (searchInput && searchForm) {
            let searchTimeout;

            // Submit on Enter key
            searchInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(searchTimeout);
                    searchForm.submit();
                }
            });

            // Auto submit after user stops typing (800ms delay)
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                const searchValue = e.target.value.trim();

                if (searchValue === '') {
                    clearTimeout(searchTimeout);
                    searchForm.submit();
                    return;
                }

                searchTimeout = setTimeout(() => {
                    if (searchForm) {
                        searchForm.submit();
                    }
                }, 800);
            });
        }

        // Edit buttons handler
        editButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const editUrl = button.dataset.editUrl;
                const updateUrl = button.dataset.updateUrl;
                if (!editUrl || !updateUrl) return;

                console.log('Fetching data from:', editUrl); // DEBUG
                fetch(editUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Gagal mengambil data');
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log('Data received:', data); // DEBUG
                        populateForm(data);
                        addForm.action = updateUrl;
                        if (formMethodOverride) {
                            formMethodOverride.value = 'PUT';
                        }
                        if (modalTitle) {
                            modalTitle.textContent = 'Edit Data Sarpras';
                        }
                        openModal();
                    })
                    .catch((error) => {
                        console.error('Error fetching data:', error); // DEBUG
                        alert(error.message || 'Terjadi kesalahan saat mengambil data');
                    });
            });
        });

        // Confirm delete
        const attachDeleteHandler = (form) => {
            const handler = (event) => {
                event.preventDefault();
                const targetName = form.dataset.name || 'data ini';
                const confirmation = confirm(`Yakin ingin menghapus ${targetName}?`);
                if (!confirmation) {
                    return;
                }

                if (!csrfToken) {
                    form.removeEventListener('submit', handler);
                    form.submit();
                    return;
                }

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Gagal menghapus data');
                        }
                        return response.json().catch(() => ({}));
                    })
                    .then(() => {
                        const row = form.closest('tr');
                        if (row) {
                            // Update stats cards logic here (omitted for brevity, can be re-added if needed)
                            row.remove();
                            // Optional: Reload page to update stats correctly
                            window.location.reload();
                        }
                    })
                    .catch(() => {
                        form.removeEventListener('submit', handler);
                        form.submit();
                    });
            };

            form.addEventListener('submit', handler);
        };

        deleteForms.forEach((form) => attachDeleteHandler(form));

        // Filter Modal Functions
        if (filterBtn && filterModalOverlay) {
            filterBtn.addEventListener('click', () => {
                filterModalOverlay.classList.remove('hidden');
                setTimeout(() => {
                    filterModalOverlay.classList.add('active');
                }, 10);
            });

            const closeFilterModal = () => {
                filterModalOverlay.classList.remove('active');
                setTimeout(() => {
                    filterModalOverlay.classList.add('hidden');
                }, 300);
            };

            if (closeFilterBtn) closeFilterBtn.addEventListener('click', closeFilterModal);
            if (cancelFilterBtn) cancelFilterBtn.addEventListener('click', closeFilterModal);

            filterModalOverlay.addEventListener('click', (e) => {
                if (e.target === filterModalOverlay) {
                    closeFilterModal();
                }
            });
        }

        // Date Select Logic
        function toISODate(d) {
            const yyyy = d.getFullYear();
            const mm = String(d.getMonth() + 1).padStart(2, '0');
            const dd = String(d.getDate()).padStart(2, '0');
            return `${yyyy}-${mm}-${dd}`;
        }

        const dateSelects = document.querySelectorAll('.date-select');
        dateSelects.forEach(select => {
            select.addEventListener('change', (e) => {
                const action = e.target.value;
                const targetId = select.dataset.target;
                const targetInput = document.getElementById(targetId);

                if (!targetInput) return;

                if (action === 'today') {
                    targetInput.value = toISODate(new Date());
                } else if (action === 'yesterday') {
                    const d = new Date();
                    d.setDate(d.getDate() - 1);
                    targetInput.value = toISODate(d);
                } else if (action === 'clear') {
                    targetInput.value = '';
                }

                if (action !== '') {
                    select.value = '';
                }
            });
        });
    });
    </script>
    @if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalOverlay = document.getElementById('modalOverlay');
            if(modalOverlay) {
                modalOverlay.classList.remove('hidden');
                modalOverlay.classList.add('active');
            }
        });
    </script>
    @endif
</body>
</html>
