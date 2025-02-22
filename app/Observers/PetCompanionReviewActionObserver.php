<?php

namespace App\Observers;

use App\Models\PetCompanionReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PetCompanionReviewActionObserver
{
    public function created(PetCompanionReview $model)
    { 
        $petCompanion = $model->petCompanion;
        if($petCompanion){
            $averageRating = round($petCompanion->petCompanionPetCompanionReviews()->avg('rate'));
            $petCompanion->update(['rating' => $averageRating]);
        }
    }

    public function updated(PetCompanionReview $model)
    { 
        $petCompanion = $model->petCompanion;
        if($petCompanion){
            $averageRating = round($petCompanion->petCompanionPetCompanionReviews()->avg('rate'));
            $petCompanion->update(['rating' => $averageRating]);
        }
    }

    public function deleting(PetCompanionReview $model)
    { 
        $petCompanion = $model->petCompanion;
        if($petCompanion){
            $averageRating = round($petCompanion->petCompanionPetCompanionReviews()->avg('rate'));
            $petCompanion->update(['rating' => $averageRating]);
        }
    }
}
