<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paramedic extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'paramedics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'active',
        'from_time',
        'to_time',
        'affiliation_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsActiveAttribute()
    {
        $now = Carbon::now(); 
        return $now->between(Carbon::parse($this->from_time), Carbon::parse($this->to_time));
    }
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
