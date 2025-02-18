<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingReview extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'hosting_reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hosting_id',
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
        self::observe(new \App\Observers\HostingReviewActionObserver);
    }

    public function hosting()
    {
        return $this->belongsTo(Hosting::class, 'hosting_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
