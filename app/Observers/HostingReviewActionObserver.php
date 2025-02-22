<?php

namespace App\Observers;

use App\Models\HostingReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class HostingReviewActionObserver
{
    public function created(HostingReview $model)
    { 
    }

    public function updated(HostingReview $model)
    { 
    }

    public function deleting(HostingReview $model)
    { 
    }
}
