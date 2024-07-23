<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralUnlockingInterval extends Model
{
    use HasFactory;

    protected $table = 'referral_unlocking_intervals';

    protected $fillable = [
        'number_of_referents',
        'amount',
    ];
}
