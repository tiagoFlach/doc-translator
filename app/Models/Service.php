<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'source_file',
        'target_file',
        'source_language_id',
        'target_language_id',
        'translator_id',
    ];

    public function isPaid(): bool
    {
        return $this->is_paid;
    }

    public function isCompleted(): bool
    {
        return $this->is_completed;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isAuthor(): bool
    {
        return $this->user_id === Auth::id();
    }

    public function translator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'translator_id');
    }

    public function hasTranslator(): bool
    {
        return $this->translator_id !== null;
    }

    public function hasSourceFile(): bool
    {
        return $this->source_file !== null;
    }

    public function isTranslator(): bool
    {
        return $this->translator_id === Auth::id();
    }

    public function isCompletedAndPaid(): bool
    {
        return $this->isCompleted() && $this->isPaid();
    }

    public function isCompletedAndNotPaid(): bool
    {
        return $this->isCompleted() && ! $this->isPaid();
    }

    public function isNotCompletedAndNotPaid(): bool
    {
        return ! $this->isCompleted() && ! $this->isPaid();
    }

    public function isNotCompletedAndPaid(): bool
    {
        return ! $this->isCompleted() && $this->isPaid();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sourceLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'source_language_id');
    }

    public function targetLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'target_language_id');
    }
}
