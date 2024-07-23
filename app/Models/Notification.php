<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'targeted_user_id',
        'target_entity_id',
        'type',
        'viewed_at',
        'opened_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'targeted_user_id');
    }
}
