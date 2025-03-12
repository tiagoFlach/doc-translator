<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Determine if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return ! is_null($this->role) && $this->role->id === Role::getAdminId();
    }

    /**
     * Determine if the user is a translator.
     */
    public function isTranslator(): bool
    {
        return ! is_null($this->role) && $this->role->id === Role::getTranslatorId();
    }

    /**
     * Determine if the user is a client.
     */
    public function isClient(): bool
    {
        return ! is_null($this->role) && $this->role->id === Role::getClientId();
    }

    /**
     * Get the role that owns the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the language that owns the user.
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * Determine if the user has a language.
     */
    public function hasLanguage(int $languageId): bool
    {
        return $this->languages->contains($languageId);
    }

    /**
     * Determine if the user has the languages of a service.
     */
    public function hasServiceLanguages(Service $service): bool
    {
        return $this->hasLanguage($service->source_language_id) && $this->hasLanguage($service->target_language_id);
    }

    /**
     * Get the services for the user.
     */
    public function services(): HasMany
    {
        return $this->isTranslator() ? $this->hasMany(Service::class, 'translator_id') : $this->hasMany(Service::class);
    }
}
