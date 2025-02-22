<?php

namespace App\Observers;

use App\Models\ClinicReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClinicReviewActionObserver
{
    public function created(ClinicReview $model)
    {  
        $clinic = $model->clinic;
        if($clinic){
            $averageRating = round($clinic->clinicClinicReviews()->avg('rate'));
            $clinic->update(['rating' => $averageRating]);
        }
    }

    public function updated(ClinicReview $model)
    { 
        $clinic = $model->clinic;
        if($clinic){
            $averageRating = round($clinic->clinicClinicReviews()->avg('rate'));
            $clinic->update(['rating' => $averageRating]);
        }
    }

    public function deleting(ClinicReview $model)
    { 
        $clinic = $model->clinic;
        if($clinic){
            $averageRating = round($clinic->clinicClinicReviews()->avg('rate'));
            $clinic->update(['rating' => $averageRating]);
        }
    }
}
