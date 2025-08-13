<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UserAssessment; // Add this if missing
use App\Models\UserLevelAccess; // Add this if missing
use App\Models\UserLevelProgress; // Add this if missing
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



public function unlockedLevels()
{
    return $this->progress()->where('unlocked', true)->count();
}



public function submissions()
{
    return $this->hasMany(Submission::class);
}


public function progress()
{
    return $this->hasMany(Progress::class);
}

public function exercises()
{
    return $this->hasMany(Exercise::class);
}

public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}

   public function assessments(): HasMany
    {
        return $this->hasMany(UserAssessment::class);
    }

    public function levelAccess(): HasMany
    {
        return $this->hasMany(UserLevelAccess::class);
    }

// app/Models/User.php
public function levelProgress()
{
    return $this->hasMany(UserLevelProgress::class);
}

public function completedLevels()
{
    return $this->hasMany(UserLevelProgress::class)->where('completed', true);
}


}
