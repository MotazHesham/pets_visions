<?php

namespace App\Observers;

use App\Models\ProductReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductReviewActionObserver
{
    public function created(ProductReview $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ProductReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ProductReview $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ProductReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ProductReview $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ProductReview'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
