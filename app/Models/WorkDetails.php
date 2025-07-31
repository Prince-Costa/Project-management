<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkDetails extends Model
{
    protected $fillable = ['title', 'details','screenshort','work_id'];

    public function work(){
        return $this->belongsTo(Work::class);
    }
}
