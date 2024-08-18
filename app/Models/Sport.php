<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "time",
        "date",
        "category_id",
    ] ;

    public function sportCategory(){
        return $this->belongsTo(SportCategory::class);
    }

    public function days(){
        return $this->hasMany(Day::class);
    }

    public function facilities(){
        return $this->hasMany(Facility::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
}
