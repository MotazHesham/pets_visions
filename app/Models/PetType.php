<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetType extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'pet_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function petTypeAdoptionPets()
    {
        return $this->hasMany(AdoptionPet::class, 'pet_type_id', 'id');
    }

    public function petTypeStrayPets()
    {
        return $this->hasMany(StrayPet::class, 'pet_type_id', 'id');
    }

    public function petTypeUserPets()
    {
        return $this->hasMany(UserPet::class, 'pet_type_id', 'id');
    }

    public function specializationsStores()
    {
        return $this->belongsToMany(Store::class);
    }

    public function specializationsPetCompanions()
    {
        return $this->belongsToMany(PetCompanion::class);
    }
}
