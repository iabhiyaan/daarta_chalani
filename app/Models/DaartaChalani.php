<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaartaChalani extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function branch()
    {
        return $this->belongsTo('\App\Models\Branch', 'branch_type');
    }
}
