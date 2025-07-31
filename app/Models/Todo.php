<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'time',
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
}
