<?php

namespace App\Observers;

use App\Models\ClinicReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClinicReviewActionObserver
{
    public function created(ClinicReview $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ClinicReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ClinicReview $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ClinicReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ClinicReview $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ClinicReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
