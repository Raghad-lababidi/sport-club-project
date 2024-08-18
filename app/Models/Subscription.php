<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date",
        "status",
        "length",
        "cancel_reason",
        "member_id",
        "offer_id",
        "plan_id",
    ] ;

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
