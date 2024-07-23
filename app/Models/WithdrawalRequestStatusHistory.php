<?php

namespace App\Models;

use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawalRequestStatusHistory extends Model
{
    use HasFactory;

    protected $table = 'withdrawal_request_status_history';

    protected $fillable = [
        'withdrawal_request_id',
        'editor_id',
        'status',
        'date',
        'note',
    ];

    public function withdrawalRequest()
    {
        return $this->belongsTo(WithdrawalRequest::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
