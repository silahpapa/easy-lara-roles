<?php

namespace Silah\LaraRoles\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Silah\LaraRoles\Models\Core\Department;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = ['controller','method','name'];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
