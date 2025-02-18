<?php

namespace App\Observers;

use App\Models\HostingReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class HostingReviewActionObserver
{
    public function created(HostingReview $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'HostingReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(HostingReview $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'HostingReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(HostingReview $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'HostingReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
