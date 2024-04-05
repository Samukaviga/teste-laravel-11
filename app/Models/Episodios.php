<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    use HasFactory;

    protected  $fillable = ['numero', 'assistido', 'temporadas_id'];
    protected $table = "episodios";
    public function temporadas () {

        return $this->belongsTo(Temporadas::class);
        
    }
}
