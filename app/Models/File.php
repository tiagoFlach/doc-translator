<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
        'extension',
        'size',
        // 'hash',
        // 'disk',
        // 'url',
    ];

    /**
     * Get the services for the file.
     */
    public function service(): HasOne
    {
        return $this->hasOne(Service::class);
    }
}
