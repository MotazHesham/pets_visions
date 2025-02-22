<?php

namespace App\Observers;

use App\Models\ProductReview;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductReviewActionObserver
{
    public function created(ProductReview $model)
    { 
        $product = $model->product;
        if($product){
            $averageRating = round($product->productProductReviews()->avg('rate'));
            $product->update(['rating' => $averageRating]);
        }
    }

    public function updated(ProductReview $model)
    { 
        $product = $model->product;
        if($product){
            $averageRating = round($product->productProductReviews()->avg('rate'));
            $product->update(['rating' => $averageRating]);
        }
    }

    public function deleting(ProductReview $model)
    { 
        $product = $model->product;
        if($product){
            $averageRating = round($product->productProductReviews()->avg('rate'));
            $product->update(['rating' => $averageRating]);
        }
    }
}
