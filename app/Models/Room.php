<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        "number",
        "size",
        "sport_id",
    ] ;

    public function sport(){
        return $this->belongsTo(Sport::class);
    }
}
