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
                console.log(`Set ${id} to:`, val); // DEBUG
            } else {
                console.warn(`Element #${id} not found`); // DEBUG
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
    addBtn.addEventListener('click', () => {
        setCreateMode();
        openModal();
    });

    // Close Modal Function
    const closeModal = () => {
        modalOverlay.classList.remove('active');
        setTimeout(() => {
            modalOverlay.classList.add('hidden');
            addForm.reset();
        }, 300);
    };

    // Close Event Listeners
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close on click outside
    modalOverlay.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
            closeModal();
        }
    });

    // Handle Save Button Click
    const saveBtn = document.getElementById('saveBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', (e) => {
            // e.preventDefault(); // Don't prevent default, let it submit via form attribute
            console.log('Save button clicked');
            console.log('Form action:', addForm.action);
            console.log('Method override:', formMethodOverride ? formMethodOverride.value : 'None');
        });
    }

    // Also keep form submit listener just in case
    addForm.addEventListener('submit', (e) => {
        console.log('Form submit event triggered');
    });

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

            // If search is cleared, submit immediately
            if (searchValue === '') {
                clearTimeout(searchTimeout);
                searchForm.submit();
                return;
            }

            // Otherwise wait 800ms before submitting
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
                        // Update stats cards
                        const totalEl = document.getElementById('statTotalBarang');
                        if (totalEl) {
                            const currentTotal = parseInt(totalEl.textContent || '0', 10);
                            if (!Number.isNaN(currentTotal) && currentTotal > 0) {
                                totalEl.textContent = currentTotal - 1;
                            }
                        }

                        const kondisi = (row.dataset.kondisi || '').toLowerCase();
                        const map = {
                            'baik': 'statBaik',
                            'perbaikan': 'statPerbaikan',
                            'rusak': 'statRusak',
                        };
                        const targetId = map[kondisi];
                        if (targetId) {
                            const el = document.getElementById(targetId);
                            if (el) {
                                const current = parseInt(el.textContent || '0', 10);
                                if (!Number.isNaN(current) && current > 0) {
                                    el.textContent = current - 1;
                                }
                            }
                        }

                        // Remove row from table
                        row.remove();
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
        // Open Filter Modal
        filterBtn.addEventListener('click', () => {
            filterModalOverlay.classList.remove('hidden');
            setTimeout(() => {
                filterModalOverlay.classList.add('active');
            }, 10);
        });

        // Close Filter Modal Function
        const closeFilterModal = () => {
            filterModalOverlay.classList.remove('active');
            setTimeout(() => {
                filterModalOverlay.classList.add('hidden');
            }, 300);
        };

        // Close Event Listeners
        if (closeFilterBtn) {
            closeFilterBtn.addEventListener('click', closeFilterModal);
        }
        if (cancelFilterBtn) {
            cancelFilterBtn.addEventListener('click', closeFilterModal);
        }

        // Close on click outside
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

            // Reset select to default option
            if (action !== '') {
                select.value = '';
            }
        });
    });
});
