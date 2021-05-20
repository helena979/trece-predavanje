<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

model: class Knjiga extends Model
{
    use HasFactory;
    public function povez(){
        return $this->belongsTo(Povez::class);
    }
    public function format(){
        return $this->belongsTo(Format::class);
    }
    public function jezik(){
        return $this->belongsTo(Jezik::class);
    }
    public function pismo(){
        return $this->belongsTo(Pismo::class);
    }
    public function izdavac(){
        return $this->belongsTo(Izdavac::class);
    }
}