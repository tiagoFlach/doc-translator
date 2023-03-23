<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    private const ADMIN = 1;
    private const TRANSLATOR = 2;
    private const CLIENT = 3;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
