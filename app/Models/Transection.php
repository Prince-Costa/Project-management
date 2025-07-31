<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    protected $fillable = ['description', 'type', 'payment_type','amount','tansection_number','date','work_id','contact_id','user_id'];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
