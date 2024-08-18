<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "price",
        "sport_id",
    ] ;

    public function sport(){
        return $this->belongsTo(Sport::class);
    }
}
