<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; // Include HasApiTokens trait
class User extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'password',
        'last_name',
        'approved',
        'referral_link',
        'referral_share_count',
        'current_survey_id',
        'current_survey_deadline',
        'unlocked_amount',
        'language_id',
        'city',
        'phone_number',
        'otp',
        'otp_expiry',
        'email',
        'provider',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function withdrawalRequests()
    {
        return $this->hasMany(WithdrawalRequest::class, 'surveyee_id');
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }
}
