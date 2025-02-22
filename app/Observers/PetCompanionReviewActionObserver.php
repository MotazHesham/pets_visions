<?php

namespace App\Observers;

use App\Models\PetCompanionReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PetCompanionReviewActionObserver
{
    public function created(PetCompanionReview $model)
    { 
    }

    public function updated(PetCompanionReview $model)
    { 
    }

    public function deleting(PetCompanionReview $model)
    { 
    }
}
