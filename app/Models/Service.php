<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function translator(): BelongsTo
	{
		return $this->belongsTo(User::class, 'translator_id');
	}
}
