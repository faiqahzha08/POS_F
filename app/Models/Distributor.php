<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'distributors';

    protected $fillable = [
        'nama',
        'nama_perusahaan',
        'alamat',
        'telepon',
        'email',
    ];


    public function produks()
    {
        return $this->hasMany(
            Produk::class,
            'distributor_id'
        );
    }
}