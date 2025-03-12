<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    private const RANDOM = 1;

    private const MEDIC = 2;

    private const STUDY = 3;

    protected $fillable = [
        'name',
    ];

    public static function getRandomId(): int
    {
        return self::RANDOM;
    }

    public static function getMedicId(): int
    {
        return self::MEDIC;
    }

    public static function getStudyId(): int
    {
        return self::STUDY;
    }

    public function isRandom(): bool
    {
        return $this->id === self::RANDOM;
    }

    public function isMedic(): bool
    {
        return $this->id === self::MEDIC;
    }

    public function isStudy(): bool
    {
        return $this->id === self::STUDY;
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
