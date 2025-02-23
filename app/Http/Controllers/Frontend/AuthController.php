<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Hosting;
use App\Models\HostingService;
use App\Models\PetCompanion;
use App\Models\PetType;
use App\Models\Store;
use App\Models\User;
use App\Models\UserPet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ 
    public function login(Request $request){
        $request->validate([
            'login_email' => 'required',
            'login_password' => 'required',
        ]); 
        if(get_setting('recaptcha_active') && app()->isProduction()){
            if (!$request->has('g-recaptcha-response') || $request->input('g-recaptcha-response') == null) {
                return redirect()->route('frontend.home')
                ->withErrors(['invalid_login' => 'خطأ في reCAPTCHA'])
                ->withInput();;
            } 
        } 

        $user = User::where('email', $request->login_email)->first();

        if (!$user) {
            return redirect()->route('frontend.home')
            ->withErrors(['invalid_login' => 'رقم الجوال او كلمة المرور خطأ'])
            ->withInput();;
        } 

        if (auth()->attempt(['email' => $request->login_email, 'password' => $request->login_password],$request->filled('remember'))) { 
            Auth::loginUsingId($user->id,$request->filled('remember'));  
            return redirect()->route('frontend.home');
        }else{ 
            return redirect()->route('frontend.home')
            ->withErrors(['invalid_login' => 'رقم الجوال او كلمة المرور خطأ'])
            ->withInput();;
        } 
    }

    public function register_form($type){ 
        if($type == 'select'){
            return view('frontend.register.register');
        }elseif($type == 'pet-lover'){
            $pet_types = PetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            return view('frontend.register.pet-lover',compact('pet_types'));
        }elseif($type == 'pet-companion'){
            $specializations = PetType::pluck('name', 'id');
            return view('frontend.register.pet-companion',compact('specializations'));
        }elseif($type == 'store'){
            $specializations = PetType::pluck('name', 'id');
            return view('frontend.register.store',compact('specializations'));
        }elseif($type == 'clinic'){
            return view('frontend.register.clinic');
        }elseif($type == 'hosting'){
            $hosting_services = HostingService::pluck('name', 'id');
            return view('frontend.register.hosting',compact('hosting_services')); 
        }else{
            abort(404);
        }
    }
    public function register(Request $request){
        $request->validate([
            'user_type' => 'required|in:'.implode(',',array_keys(User::USER_TYPE_SELECT)), 
            'name' => 'string|required|max:255',
            'email' => 'required|unique:users|max:255', 
            'password' => 'required|max:255', 
            'identity_num' => 'string|nullable|max:255',
            'phone' => 'string|nullable|max:255',
            'user_position' => 'string|nullable|max:255',  
        ]);

        if($request->user_type == 'clinic'){


            $request->validate([ 
                'clinic_name' => 'string|required|max:255', 
                'clinic_phone' => 'string|nullable|max:255', 
                'unified_phone' => 'string|nullable|max:255',  
                'address' => 'string|nullable|max:255', 
                'logo' =>'required|file|max:4096',
                'certification' =>'required|file|max:4096',
            ]);
            $user = $this->createUser($request->all());
            $clinic = Clinic::create([
                'user_id' => $user->id,
                'clinic_name' => $request->clinic_name,
                'clinic_phone' => $request->clinic_phone,
                'unified_phone' => $request->unified_phone, 
                'address' => $request->address,  
            ]);
            if ($request->logo) {
                $clinic->addMedia($request->logo)->toMediaCollection('logo');
            }
    
            if ($request->certification) {
                $clinic->addMedia($request->certification)->toMediaCollection('certification');
            }
            alert(trans('frontend.toast.success'),trans('frontend.register.active_massage'),'success');
            return redirect()->route('frontend.home');


        }elseif($request->user_type == 'store'){


            $request->validate([ 
                'store_name' => 'string|required|max:255', 
                'store_phone' => 'string|nullable|max:255',  
                'address' => 'string|nullable|max:255', 
                'domain' => 'string|nullable|max:255', 
                'logo' =>'required|file|max:4096',
                'specializations.*' =>'integer',
                'specializations' =>'array', 
            ]);

            $user = $this->createUser($request->all());
            
            $store = Store::create([
                'user_id' => $user->id,
                'store_name' => $request->store_name,
                'store_phone' => $request->store_phone,
                'address' => $request->address,   
                'domain' => $request->domain, 
            ]);  
            $store->specializations()->sync($request->input('specializations', []));
            if ($request->logo) {
                $store->addMedia($request->logo)->toMediaCollection('logo');
            }
            alert(trans('frontend.toast.success'),trans('frontend.register.active_massage'),'success');
            return redirect()->route('frontend.home');



        }elseif($request->user_type == 'pet_companion'){


            
            $request->validate([ 
                'nationality' => 'string|required|max:255', 
                'affiliation_link' => 'string|nullable|max:255', 
                'specializations.*' =>'integer',
                'specializations' =>'array',
                'photo' =>'required|file|max:4096',
            ]);

            $user = $this->createUser($request->all());
            $petCompanion = PetCompanion::create([ 
                'user_id' => $user->id,
                'nationality' => $request->nationality,
                'experience' => $request->experience,
                'affiliation_link' => $request->affiliation_link, 
            ]);
            $petCompanion->specializations()->sync($request->input('specializations', []));
            if ($request->photo) {
                $petCompanion->addMedia($request->photo)->toMediaCollection('photo');
            }
            alert(trans('frontend.toast.success'),trans('frontend.register.active_massage'),'success');
            return redirect()->route('frontend.home');



        }elseif($request->user_type == 'host'){


            $request->validate([ 
                'hosting_name' => 'string|required|max:255', 
                'hosting_phone' => 'string|required|max:255', 
                'hosting_type' => 'string|required|max:255',  
                'affiliation_link' => 'string|required|max:255',  
                'address' => 'string|nullable|max:255', 
                'logo' =>'required|file|max:4096',
                'commercial_register_photo' =>'required|file|max:4096', 
                'hosting_services.*' =>'integer',
                'hosting_services' =>'array', 
            ]);
            $user = $this->createUser($request->all());

            $hosting = Hosting::create([    
                'user_id' => $user->id,
                'hosting_name' => $request->hosting_name,
                'hosting_phone' => $request->hosting_phone,
                'hosting_type' => $request->hosting_type, 
                'address' => $request->address,
                'affiliation_link' => $request->affiliation_link, 
            ]);
            $hosting->hosting_services()->sync($request->input('hosting_services', []));
            if ($request->logo) {
                $hosting->addMedia($request->logo)->toMediaCollection('logo');
            }
    
            if ($request->commercial_register_photo) {
                $hosting->addMedia($request->commercial_register_photo)->toMediaCollection('commercial_register_photo');
            }
            
            alert(trans('frontend.toast.success'),trans('frontend.register.active_massage'),'success');
            return redirect()->route('frontend.home');


        }elseif($request->user_type == 'pet_lover'){
            $request->validate([ 
                'pet_name' => 'string|required|max:255', 
                'dob' => 'required|date_format:' . config('panel.date_format'), 
                'gender' => 'string|required|max:255',  
                'pet_type_id' => 'integer|required|exists:user_pets,id',  
                'fasila' => 'string|required|max:255', 
                'photo' =>'required|file|max:4096', 
            ]); 
            $user = $this->createUser($request->all(),1);
            
            $userPet = UserPet::create([
                'name' => $request->pet_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'pet_type_id' => $request->pet_type_id,
                'fasila' => $request->fasila,
                'user_id' => $user->id,
            ]);
            
            if ($request->photo) {
                $userPet->addMedia($request->photo)->toMediaCollection('photo');
            }
            Auth::loginUsingId($user->id);  
            toast(trans('frontend.toast.success'),'success');
            return redirect()->route('frontend.dashboard.info');
        }else{
            toast(trans('frontend.toast.error'),'error');
            return redirect()->back();
        }
    }

    public function createUser($data, $approved = 0){ 
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'approved' => $approved,
            'user_type' => $data['user_type'],
            'identity_num' => $data['identity_num'] ?? '', 
            'user_position' => $data['user_position'] ?? '',
        ]);
    }
}
