<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetCompanionReview extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'pet_companion_reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pet_companion_id',
        'user_id',
        'name',
        'rate',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\PetCompanionReviewActionObserver);
    }

    public function pet_companion()
    {
        return $this->belongsTo(PetCompanion::class, 'pet_companion_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
