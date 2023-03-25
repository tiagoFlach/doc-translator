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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function initialLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'initial_language_id');
    }

    public function finalLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'final_language_id');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
