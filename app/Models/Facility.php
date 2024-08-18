<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "number",
        "size",
    ];

    public function sports(){
        return $this->hasMany(Sport::class);
    }

    }
