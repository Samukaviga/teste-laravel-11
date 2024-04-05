<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporadas extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'series_id'];
    protected $table = "temporadas";

    public function series(){

        return $this->belongsTo(Series::class);
    }

    public function episodios() { 

        return $this->hasMany(Episodios::class);
    }


}
