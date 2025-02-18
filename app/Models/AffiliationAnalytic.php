<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliationAnalytic extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'affiliation_analytics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'model_type',
        'model',
        'ip',
        'num_of_clicks',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MODEL_TYPE_SELECT = [
        'App\Models\Product'       => 'منتج',
        'App\Models\ClinicService' => 'خدمة عيادة',
        'App\Models\Paramedic'     => 'خدمة اسعافات',
        'App\Models\Hosting'       => 'خدمة استضافة',
        'App\Models\PetCompanion'  => 'مرافق حيوان',
        'App\Models\StrayPet'      => 'حيوان ضال',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
