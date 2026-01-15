<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPasswordNotification;

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
        'profession',
        'organization',
        'bio',
        'referral_source',
        'member_name',
        'linkedin_url',
        'instagram_handle',
        'role',
        'status',
        'profile_image',
        'is_approved',
        'approved_at',
        'declined_at',
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
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function golfProfile()
    {
        return $this->hasOne(GolfProfile::class);
    }

    public function useravailability()
    {
        return $this->hasOne(UserAvailability::class);
    }

    public function usermatchingPreference()
    {
        return $this->hasOne(UserMatchingPreference::class);
    }

    public function groups()
    {
        return $this->belongsToMany(
            Group::class,
            'group_users',  
            'user_id',
            'group_id'
        );
    }

    public function events()
    {
        return $this->belongsToMany(
            Event::class,
            'event_member',  
            'member_id',
            'event_id'
        );
    }
}
