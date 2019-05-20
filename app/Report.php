<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[

        'shipping_id',
        'name_report',
        'field_report',
        'evidence',
        'name_spv',
        'state',
        'barcode',
        'state_report'
    ];

    protected $appends =[
        'spv_name'
    ];

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }

    public function getSpvNameAttribute()
    {
        $spv_name = $this->name_spv;
        if($spv_name == 5)
        {
            return "Adi Candra";
        }
        elseif ($spv_name == 6) {
            return "esteban";
        }
        else{
            return "Konelo";
        }
    }
}
