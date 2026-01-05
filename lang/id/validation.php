<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut berisi pesan kesalahan default yang digunakan oleh
    | kelas validator. Beberapa aturan ini memiliki beberapa versi seperti
    | aturan ukuran. Jangan ragu untuk mengubah setiap pesan ini di sini.
    |
    */

    'accepted' => 'Isian :attribute harus diterima.',
    'accepted_if' => 'Isian :attribute harus diterima bila :other adalah :value.',
    'active_url' => 'Isian :attribute bukan URL yang valid.',
    'after' => 'Isian :attribute harus tanggal setelah :date.',
    'after_or_equal' => 'Isian :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Isian :attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'any_of' => 'Isian :attribute tidak valid.',
    'array' => 'Isian :attribute harus berupa array.',
    'ascii' => 'Isian :attribute hanya boleh berisi karakter alfanumerik dan simbol byte tunggal.',
    'before' => 'Isian :attribute harus tanggal sebelum :date.',
    'before_or_equal' => 'Isian :attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Isian :attribute harus memiliki antara :min dan :max item.',
        'file' => 'Isian :attribute harus antara :min dan :max kilobyte.',
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'string' => 'Isian :attribute harus antara :min dan :max karakter.',
    ],
    'boolean' => 'Isian :attribute harus bernilai true atau false.',
    'can' => 'Isian :attribute mengandung nilai yang tidak diizinkan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'contains' => 'Isian :attribute tidak memuat nilai yang diperlukan.',
    'current_password' => 'Kata sandi salah.',
    'date' => 'Isian :attribute bukan tanggal yang valid.',
    'date_equals' => 'Isian :attribute harus tanggal yang sama dengan :date.',
    'date_format' => 'Isian :attribute tidak cocok dengan format :format.',
    'decimal' => 'Isian :attribute harus memiliki :decimal tempat desimal.',
    'declined' => 'Isian :attribute harus ditolak.',
    'declined_if' => 'Isian :attribute harus ditolak bila :other adalah :value.',
    'different' => 'Isian :attribute dan :other harus berbeda.',
    'digits' => 'Isian :attribute harus :digits digit.',
    'digits_between' => 'Isian :attribute harus antara :min dan :max digit.',
    'dimensions' => 'Isian :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Isian :attribute memiliki nilai duplikat.',
    'doesnt_contain' => 'Isian :attribute tidak boleh mengandung salah satu dari: :values.',
    'doesnt_end_with' => 'Isian :attribute tidak boleh diakhiri dengan salah satu dari: :values.',
    'doesnt_start_with' => 'Isian :attribute tidak boleh dimulai dengan salah satu dari: :values.',
    'email' => 'Isian :attribute harus alamat email yang valid.',
    'encoding' => 'Isian :attribute harus dikodekan dalam :encoding.',
    'ends_with' => 'Isian :attribute harus diakhiri dengan salah satu dari: :values.',
    'enum' => 'Pilihan :attribute tidak valid.',
    'exists' => 'Pilihan :attribute tidak valid.',
    'extensions' => 'Isian :attribute harus memiliki salah satu ekstensi berikut: :values.',
    'file' => 'Isian :attribute harus berupa file.',
    'filled' => 'Isian :attribute harus memiliki nilai.',
    'gt' => [
        'array' => 'Isian :attribute harus memiliki lebih dari :value item.',
        'file' => 'Isian :attribute harus lebih besar dari :value kilobyte.',
        'numeric' => 'Isian :attribute harus lebih besar dari :value.',
        'string' => 'Isian :attribute harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => 'Isian :attribute harus memiliki :value item atau lebih.',
        'file' => 'Isian :attribute harus lebih besar dari atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :attribute harus lebih besar dari atau sama dengan :value.',
        'string' => 'Isian :attribute harus lebih besar dari atau sama dengan :value karakter.',
    ],
    'hex_color' => 'Isian :attribute harus warna heksadesimal yang valid.',
    'image' => 'Isian :attribute harus berupa gambar.',
    'in' => 'Pilihan :attribute tidak valid.',
    'in_array' => 'Isian :attribute harus ada di :other.',
    'in_array_keys' => 'Isian :attribute harus mengandung setidaknya salah satu kunci berikut: :values.',
    'integer' => 'Isian :attribute harus berupa bilangan bulat.',
    'ip' => 'Isian :attribute harus alamat IP yang valid.',
    'ipv4' => 'Isian :attribute harus alamat IPv4 yang valid.',
    'ipv6' => 'Isian :attribute harus alamat IPv6 yang valid.',
    'json' => 'Isian :attribute harus berupa string JSON yang valid.',
    'list' => 'Isian :attribute harus berupa daftar.',
    'lowercase' => 'Isian :attribute harus huruf kecil.',
    'lt' => [
        'array' => 'Isian :attribute harus memiliki kurang dari :value item.',
        'file' => 'Isian :attribute harus kurang dari :value kilobyte.',
        'numeric' => 'Isian :attribute harus kurang dari :value.',
        'string' => 'Isian :attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => 'Isian :attribute tidak boleh memiliki lebih dari :value item.',
        'file' => 'Isian :attribute harus kurang dari atau sama dengan :value kilobyte.',
        'numeric' => 'Isian :attribute harus kurang dari atau sama dengan :value.',
        'string' => 'Isian :attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'Isian :attribute harus alamat MAC yang valid.',
    'max' => [
        'array' => 'Isian :attribute tidak boleh memiliki lebih dari :max item.',
        'file' => 'Isian :attribute tidak boleh lebih besar dari :max kilobyte.',
        'numeric' => 'Isian :attribute tidak boleh lebih besar dari :max.',
        'string' => 'Isian :attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'max_digits' => 'Isian :attribute tidak boleh memiliki lebih dari :max digit.',
    'mimes' => 'Isian :attribute harus berupa file bertipe: :values.',
    'mimetypes' => 'Isian :attribute harus berupa file bertipe: :values.',
    'min' => [
        'array' => 'Isian :attribute harus memiliki setidaknya :min item.',
        'file' => 'Isian :attribute harus setidaknya :min kilobyte.',
        'numeric' => 'Isian :attribute harus setidaknya :min.',
        'string' => 'Isian :attribute harus setidaknya :min karakter.',
    ],
    'min_digits' => 'Isian :attribute harus memiliki setidaknya :min digit.',
    'missing' => 'Isian :attribute harus tidak ada.',
    'missing_if' => 'Isian :attribute harus tidak ada bila :other adalah :value.',
    'missing_unless' => 'Isian :attribute harus tidak ada kecuali :other adalah :value.',
    'missing_with' => 'Isian :attribute harus tidak ada bila :values ada.',
    'missing_with_all' => 'Isian :attribute harus tidak ada bila :values ada.',
    'multiple_of' => 'Isian :attribute harus kelipatan dari :value.',
    'not_in' => 'Pilihan :attribute tidak valid.',
    'not_regex' => 'Format isian :attribute tidak valid.',
    'numeric' => 'Isian :attribute harus berupa angka.',
    'password' => [
        'letters' => 'Isian :attribute harus mengandung setidaknya satu huruf.',
        'mixed' => 'Isian :attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => 'Isian :attribute harus mengandung setidaknya satu angka.',
        'symbols' => 'Isian :attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih :attribute yang berbeda.',
    ],
    'present' => 'Isian :attribute harus ada.',
    'present_if' => 'Isian :attribute harus ada bila :other adalah :value.',
    'present_unless' => 'Isian :attribute harus ada kecuali :other adalah :value.',
    'present_with' => 'Isian :attribute harus ada bila :values ada.',
    'present_with_all' => 'Isian :attribute harus ada bila :values ada.',
    'prohibited' => 'Isian :attribute dilarang.',
    'prohibited_if' => 'Isian :attribute dilarang bila :other adalah :value.',
    'prohibited_if_accepted' => 'Isian :attribute dilarang bila :other diterima.',
    'prohibited_if_declined' => 'Isian :attribute dilarang bila :other ditolak.',
    'prohibited_unless' => 'Isian :attribute dilarang kecuali :other ada di :values.',
    'prohibits' => 'Isian :attribute melarang :other untuk ada.',
    'regex' => 'Format isian :attribute tidak valid.',
    'required' => 'Isian :attribute wajib diisi.',
    'required_array_keys' => 'Isian :attribute harus berisi entri untuk: :values.',
    'required_if' => 'Isian :attribute wajib diisi bila :other adalah :value.',
    'required_if_accepted' => 'Isian :attribute wajib diisi bila :other diterima.',
    'required_if_declined' => 'Isian :attribute wajib diisi bila :other ditolak.',
    'required_unless' => 'Isian :attribute wajib diisi kecuali :other ada di :values.',
    'required_with' => 'Isian :attribute wajib diisi bila :values ada.',
    'required_with_all' => 'Isian :attribute wajib diisi bila :values ada.',
    'required_without' => 'Isian :attribute wajib diisi bila :values tidak ada.',
    'required_without_all' => 'Isian :attribute wajib diisi bila tidak ada satupun dari :values yang ada.',
    'same' => 'Isian :attribute harus cocok dengan :other.',
    'size' => [
        'array' => 'Isian :attribute harus mengandung :size item.',
        'file' => 'Isian :attribute harus :size kilobyte.',
        'numeric' => 'Isian :attribute harus :size.',
        'string' => 'Isian :attribute harus :size karakter.',
    ],
    'starts_with' => 'Isian :attribute harus dimulai dengan salah satu dari: :values.',
    'string' => 'Isian :attribute harus berupa string.',
    'timezone' => 'Isian :attribute harus zona waktu yang valid.',
    'unique' => ':attribute sudah digunakan.',
    'uploaded' => ':attribute gagal diunggah.',
    'uppercase' => 'Isian :attribute harus huruf besar.',
    'url' => 'Isian :attribute harus URL yang valid.',
    'ulid' => 'Isian :attribute harus ULID yang valid.',
    'uuid' => 'Isian :attribute harus UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut menggunakan
    | konvensi "attribute.rule" untuk menamai baris. Ini membuatnya cepat untuk
    | menentukan baris bahasa kustom tertentu untuk aturan atribut tertentu.
    |
    */

    'custom' => [
        'email' => [
            'required' => 'Email wajib diisi.',
            'email' => 'Format email tidak valid.',
        ],
        'password' => [
            'required' => 'Kata sandi wajib diisi.',
        ],
        'nama' => [
            'required' => 'Nama barang wajib diisi.',
        ],
        'kode' => [
            'required' => 'Kode wajib diisi.',
            'unique' => 'Kode sudah digunakan.',
        ],
        'kategori' => [
            'required' => 'Kategori wajib diisi.',
        ],
        'lokasi' => [
            'required' => 'Lokasi wajib diisi.',
        ],
        'jumlah' => [
            'required' => 'Jumlah wajib diisi.',
            'integer' => 'Jumlah harus berupa angka.',
            'min' => 'Jumlah minimal 1.',
        ],
        'kondisi' => [
            'required' => 'Kondisi wajib dipilih.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar placeholder atribut kami
    | dengan sesuatu yang lebih ramah pembaca seperti "Alamat E-Mail" alih-alih
    | "email". Ini hanya membantu kami membuat pesan kami lebih ekspresif.
    |
    */

    'attributes' => [
        'email' => 'Email',
        'password' => 'Kata Sandi',
        'nama' => 'Nama Barang',
        'kode' => 'Kode',
        'kategori' => 'Kategori',
        'lokasi' => 'Lokasi',
        'jumlah' => 'Jumlah',
        'kondisi' => 'Kondisi',
        'tanggal' => 'Tanggal Pengadaan',
        'tanggal_perbaikan' => 'Tanggal Perbaikan',
        'hasil_rekondisi' => 'Hasil Rekondisi',
    ],

];
