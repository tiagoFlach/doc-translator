<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    use HasFactory;

	const LEVELS = [
		'beginner',
		'intermediate',
		'advanced',
	];

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class);
	}
}
