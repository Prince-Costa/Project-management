<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $fillable = [
        'name','phone_number','email','whats_app_number','company','designetion','address' 
    ];

    
    public function work(): HasMany
    {
        return $this->hasMany(Work::class,'contact_id');
    }
}
