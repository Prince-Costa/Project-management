<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'description',
        'work_id',
        'contact_id',
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    
    public function transections()
    {
        return $this->hasMany(Transection::class);
    }
}
