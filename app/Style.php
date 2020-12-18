<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ["name", "price"];

    public function barbershop(){
        return $this->belongsTo(barbershop::class, "bid", "id");
    }
}
