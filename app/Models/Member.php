<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "age",
        "joined_date",
    ];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
