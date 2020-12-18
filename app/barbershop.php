<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barbershop extends Model
{
    protected $fillable = ["logo", "name", "location", "stars"];

    public function styles(){
        return $this->hasMany(Style::class, "bid");
    }
}
