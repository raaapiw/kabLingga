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
        'packing_list'
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
