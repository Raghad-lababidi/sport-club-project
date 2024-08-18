<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "amount",
        "description",
        "member_id",
    ] ;

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
