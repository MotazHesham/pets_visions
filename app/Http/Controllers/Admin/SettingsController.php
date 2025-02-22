<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;  
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.index');
    } 

    public function update(Request $request)
    {
        if($request->setting_type == 'setting_1'){ 
            Setting::updateOrCreate(['key' => 'site_name'], ['value' => $request->site_name]);
            Setting::updateOrCreate(['key' => 'phone'], ['value' => $request->phone]);
            Setting::updateOrCreate(['key' => 'email'], ['value' => $request->email]);
            Setting::updateOrCreate(['key' => 'address'], ['value' => $request->address]);
            Setting::updateOrCreate(['key' => 'description'], ['value' => $request->description]);
            Setting::updateOrCreate(['key' => 'description_2'], ['value' => $request->description_2]);
            Setting::updateOrCreate(['key' => 'rescuecase_text'], ['value' => $request->rescuecase_text]);
            Setting::updateOrCreate(['key' => 'hosting_text'], ['value' => $request->hosting_text]);
            Setting::updateOrCreate(['key' => 'adoption_text'], ['value' => $request->adoption_text]); 
            Setting::updateOrCreate(['key' => 'copy_right'], ['value' => $request->copy_right]); 
            Setting::updateOrCreate(['key' => 'services_text'], ['value' => $request->services_text]); 
            Setting::updateOrCreate(['key' => 'delivery_text'], ['value' => $request->delivery_text]); 
            Setting::updateOrCreate(['key' => 'missing_pet_text'], ['value' => $request->missing_pet_text]); 
            Setting::updateOrCreate(['key' => 'found_pet_text'], ['value' => $request->found_pet_text]); 

            if ($request->has('logo')) {
                if( $request->input('logo') != "undefined"){ 
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('logo')))); 
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name =  time() . '_logo_settings.'. $extension;
                    $file->move('public/settings',$file_name); 
                    Setting::updateOrCreate(['key' => 'logo'], ['value' => 'settings/' . $file_name]);
                }
            }else{
                Setting::updateOrCreate(['key' => 'logo'], ['value' => null]);
            }
            if ($request->has('about')) {
                if( $request->input('about') != "undefined"){ 
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('about')))); 
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name =  time() . '_about_settings.'. $extension;
                    $file->move('public/settings',$file_name);
                    Setting::updateOrCreate(['key' => 'about'], ['value' => 'settings/' . $file_name]);
                }
            }else{
                Setting::updateOrCreate(['key' => 'about'], ['value' => null]);
            }

        }elseif($request->setting_type == 'setting_2'){
            Setting::updateOrCreate(['key' => 'facebook'], ['value' => $request->facebook]);
            Setting::updateOrCreate(['key' => 'twitter'], ['value' => $request->twitter]);
            Setting::updateOrCreate(['key' => 'instagram'], ['value' => $request->instagram]);
            Setting::updateOrCreate(['key' => 'googleplus'], ['value' => $request->googleplus]); 
        }elseif($request->setting_type == 'setting_3'){ 
            Setting::updateOrCreate(['key' => 'meta_title'], ['value' => $request->meta_title]);
            Setting::updateOrCreate(['key' => 'meta_description'], ['value' => $request->meta_description]);
            Setting::updateOrCreate(['key' => 'meta_keywords'], ['value' => implode(',',$request->meta_keywords)]); 
            if ($request->has('metaimage')) { 
                if($request->input('metaimage') != "undefined"){ 
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('metaimage')))); 
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name =  time() . '_metaimage_settings.'. $extension;
                    $file->move('public/settings',$file_name);
                    Setting::updateOrCreate(['key' => 'metaimage'], ['value' => 'settings/' . $file_name]);
                }
            }else{
                Setting::updateOrCreate(['key' => 'metaimage'], ['value' => null]);
            }
        }elseif($request->setting_type == 'setting_4'){
            Setting::updateOrCreate(['key' => 'count_stores'], values: ['value' => $request->count_stores]);
            Setting::updateOrCreate(['key' => 'count_pets'], ['value' => $request->count_pets]); 
            Setting::updateOrCreate(['key' => 'count_tweets'], ['value' => $request->count_tweets]); 
            Setting::updateOrCreate(['key' => 'count_products'], ['value' => $request->count_products]); 
        }elseif($request->setting_type == 'setting_5'){
            Setting::updateOrCreate(['key' => 'font_size'], ['value' => $request->font_size]); 
            Setting::updateOrCreate(['key' => 'sidemenu_background'], ['value' => $request->sidemenu_background]); 
            Setting::updateOrCreate(['key' => 'sidemenu_font_color'], ['value' => $request->sidemenu_font_color]); 
            Setting::updateOrCreate(['key' => 'sidemenu_icon_color'], ['value' => $request->sidemenu_icon_color]);  
            Setting::updateOrCreate(['key' => 'font_link'], ['value' => implode(',',$request->font_link)]); 
            Setting::updateOrCreate(['key' => 'font_name'], ['value' => implode(',',$request->font_name)]); 
        }elseif($request->setting_type == 'setting_6'){
            
            if($request->important_links != null && count($request->important_links) > 0){
                Setting::updateOrCreate(['key' => 'important_links'], ['value' => json_encode($request->important_links)]); 
            }else{
                Setting::updateOrCreate(['key' => 'important_links'], ['value' => null]); 
            }
        }elseif($request->setting_type == 'setting_7'){ 
            Setting::updateOrCreate(['key' => 'recaptcha_active'], ['value' => $request->recaptcha_active]); 
            Setting::updateOrCreate(['key' => 'recaptcha_site_key'], ['value' => $request->recaptcha_site_key]); 
            Setting::updateOrCreate(['key' => 'recaptcha_secret_key'], ['value' => $request->recaptcha_secret_key]);  
        }
        

        Artisan::call('cache:clear');
        
        return redirect()->route('admin.settings.index',['setting_type' => $request->setting_type]);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Setting();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
