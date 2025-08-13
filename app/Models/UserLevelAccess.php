<?php

// app/Models/UserLevelAccess.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevelAccess extends Model
{
    use HasFactory;

    protected $guarded = [];
     protected $table = 'user_level_access';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}