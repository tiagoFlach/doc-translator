<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

	const ADMIN = 1;
	const TRADUTOR = 2;
	const CLIENTE = 3;

	function users(): HasMany
	{
		return $this->hasMany(User::class);
	}
}
