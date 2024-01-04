<?php

namespace Silah\LaraRoles\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	use HasFactory;
	protected $fillable = ["name","description"];

}
