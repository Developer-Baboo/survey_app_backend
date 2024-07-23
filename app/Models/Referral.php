<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $table = 'referrals';

    protected $fillable = [
        'referrer_id',
        'referent_id',
    ];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referent()
    {
        return $this->belongsTo(User::class, 'referent_id');
    }
}
