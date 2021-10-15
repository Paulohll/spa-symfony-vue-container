<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";
    protected $fillable = [
        'activity_id', 'amount_people','pr','date_activity'
    ];

    public function activity()
    {
       return $this->belongsTo(Activity::class,'activity_id');
    }
}
