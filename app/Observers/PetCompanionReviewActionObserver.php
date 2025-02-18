<?php

namespace App\Observers;

use App\Models\PetCompanionReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PetCompanionReviewActionObserver
{
    public function created(PetCompanionReview $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PetCompanionReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PetCompanionReview $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PetCompanionReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PetCompanionReview $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PetCompanionReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
