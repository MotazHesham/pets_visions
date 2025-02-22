<?php

namespace App\Observers;

use App\Models\ClinicReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClinicReviewActionObserver
{
    public function created(ClinicReview $model)
    { 
    }

    public function updated(ClinicReview $model)
    { 
    }

    public function deleting(ClinicReview $model)
    { 
    }
}
