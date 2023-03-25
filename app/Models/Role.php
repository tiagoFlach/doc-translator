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

    protected $fillable = [
        'name',
    ];

    public static function getAdminId(): int
    {
        return self::ADMIN;
    }

    public static function getTranslatorId(): int
    {
        return self::TRANSLATOR;
    }

    public static function getClientId(): int
    {
        return self::CLIENT;
    }

    public function isAdmin(): bool
    {
        return $this->id === self::ADMIN;
    }

    public function isTranslator(): bool
    {
        return $this->id === self::TRANSLATOR;
    }

    public function isClient(): bool
    {
        return $this->id === self::CLIENT;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
