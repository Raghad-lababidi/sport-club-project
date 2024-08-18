<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ] ;

    public function sports(){
        return $this->hasMany(Sport::class);
    }
}
