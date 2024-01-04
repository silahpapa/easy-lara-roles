<?php

namespace Silah\LaraRoles\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Silah\LaraRoles\Models\Core\Permissions;
use Silah\LaraRoles\Models\Core\User;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','status'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class);
    }

}
