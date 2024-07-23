<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model
{
    use HasFactory;

    protected $table = 'activity_log';

    protected $fillable = [
        'date',
        'editor_id',
        'scope_id',
        'action',
        'entity_id',
        'ip_address',
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
