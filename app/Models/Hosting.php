<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Hosting extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'hostings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const HOSTING_TYPE_SELECT = [
        'hotel'  => 'فندق',
        'person' => 'فرد',
    ];

    protected $appends = [
        'logo',
        'cover',
        'photos',
        'identity_photo',
        'commercial_register_photo',
    ];

    protected $fillable = [
        'user_id',
        'hosting_name',
        'hosting_phone',
        'hosting_type',
        'address',
        'about_us',
        'rating',
        'short_description',
        'affiliation_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getCoverAttribute()
    {
        $file = $this->getMedia('cover')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getIdentityPhotoAttribute()
    {
        $file = $this->getMedia('identity_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function hosting_services()
    {
        return $this->belongsToMany(HostingService::class);
    }

    public function hostingHostingReviews()
    {
        return $this->hasMany(HostingReview::class, 'hosting_id', 'id');
    }

    public function getCommercialRegisterPhotoAttribute()
    {
        return $this->getMedia('commercial_register_photo')->last();
    }
}
