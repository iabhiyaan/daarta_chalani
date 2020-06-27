<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function documents()
    {
        return $this->hasMany('\App\Models\DaartaChalani', 'branch_type');
    }
}
