<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title',
        'status',
        'user_id',
        'total_charge',
        'advance',
        'date_line',
        'domain',
        'cpanel_url',
        'cpanel_user',
        'cpanel_password',
        'admin_panel_user',
        'admin_panel_password',
        'details',
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transections()
    {
        return $this->hasMany(Transection::class);
    }
}
