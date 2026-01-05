<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    protected $table = 'sarpras';
    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'lokasi',
        'jumlah',
        'kondisi',
        'tanggal',
        'tanggal_perbaikan',
        'hasil_rekondisi',
    ];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 7;
}
