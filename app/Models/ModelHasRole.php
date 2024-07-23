<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelHasRole extends Model
{
    use HasFactory;

    protected $table = 'model_has_roles';

    protected $fillable = [
        'role_id',
        'model_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'model_id');
    }
}
