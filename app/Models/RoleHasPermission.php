<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';

    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
