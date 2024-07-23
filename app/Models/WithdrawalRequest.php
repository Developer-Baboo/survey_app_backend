<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\WithdrawalRequestStatusHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawalRequest extends Model
{
    use HasFactory;

    protected $table = 'withdrawal_requests';

    protected $fillable = [
        'surveyee_id',
        'amount',
        'date',
        'mobile_number',
        'wallet_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'surveyee_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(WithdrawalRequestStatusHistory::class);
    }
}
