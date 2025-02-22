<?php

namespace App\Observers;

use App\Models\HostingReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class HostingReviewActionObserver
{
    public function created(HostingReview $model)
    { 
        $hosting = $model->hosting;
        if($hosting){
            $averageRating = round($hosting->hostingHostingReviews()->avg('rate'));
            $hosting->update(['rating' => $averageRating]);
        }
    }

    public function updated(HostingReview $model)
    { 
        $hosting = $model->hosting;
        if($hosting){
            $averageRating = round($hosting->hostingHostingReviews()->avg('rate'));
            $hosting->update(['rating' => $averageRating]);
        }
    }

    public function deleting(HostingReview $model)
    { 
        $hosting = $model->hosting;
        if($hosting){
            $averageRating = round($hosting->hostingHostingReviews()->avg('rate'));
            $hosting->update(['rating' => $averageRating]);
        }
    }
}
