<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if(!function_exists('currency_symbol')){
    function currency_symbol(){
        return 'ر.س';
    }
}

if(!function_exists('format_price')){
    function format_price($price){
        return $price . currency_symbol();
    }
}

if(!function_exists('currentClinic')){
    function currentClinic(){
        return auth()->user()->clinic;
    }
} 


if (!function_exists('implodeWithQuotes')) {
    function implodeWithQuotes(array $items): string {
        // Wrap each item with double quotes
        $quotedItems = array_map(fn($item) => '"' . $item . '"', $items);
        
        // Implode the array with commas
        return implode(', ', $quotedItems);
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return Setting::all();
        });

        $setting = $settings->where('key', $key)->first();

        return $setting == null ? $default : $setting->value;
    }
}