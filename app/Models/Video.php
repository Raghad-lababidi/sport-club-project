<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        "path",
        "sport_id",
    ] ;

    public function sport(){
        return $this->belongsTo(Sport::class);
    }
}
