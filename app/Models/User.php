<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Vite;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{

    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes, Impersonate, InteractsWithMedia;

    protected $table = 'users';

    protected $fillable = [
        'locale_id',
        'name',
        'last_name',
        'email',
        'password',
        'email_verified_at',
        'photo',
        'is_active',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active'         => 'boolean',
        'is_admin'          => 'boolean',
        'email_verified_at' => 'datetime',
        'deleted_at'        => 'datetime',
    ];

    protected $appends = [
        'photo_url',
        'photo_thumbnail_url',
        'email_verified_at_formatted'
    ];

    public function locale(): BelongsTo
    {
        return $this->belongsTo(Locale::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', true);
    }

    public function getPhotoUrlAttribute(): string
    {
        $photoExists = $this->getMedia('users')->first();

        if ($photoExists) return $photoExists->getUrl();

        return Vite::asset(resource_path('backend/img/photo-placeholder.svg'));
    }

    public function getPhotoThumbnailUrlAttribute(): string
    {
        $photoExists = $this->getMedia('users')->first();

        if ($photoExists) return $photoExists->getUrl('thumbnail');

        return Vite::asset(resource_path('backend/img/photo-placeholder.svg'));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users')
            ->useFallbackUrl(resource_path('backend/img/photo-placeholder.svg'))
            ->useFallbackPath(resource_path('backend/img/photo-placeholder.svg'))
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 500, 500)
            ->nonQueued();
    }
}
