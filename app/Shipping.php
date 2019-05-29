<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable =[

        'client_id',
        'tongkang',
        'loading_plan',
        'quantity',
        'tax_proof',
        'no_tax',
        'tgl_tax',
        'packing_list',
        'invoice',
        'tempat_pemeriksaan',
        'pelabuhan_tujuan',
        'pelabuhan_muat',
        'no_lsl',
        'no_ko',
        'tgl_ko',
        'tgl_pemeriksaan',
        'jenis_produk'

    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function report(){
        return $this->hasOne(Report::class);
    }
}
