<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['content'];

    protected $casts = ['user_id' => 'int'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
