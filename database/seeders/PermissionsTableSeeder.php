<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'store_create',
            ],
            [
                'id'    => 24,
                'title' => 'store_edit',
            ],
            [
                'id'    => 25,
                'title' => 'store_show',
            ],
            [
                'id'    => 26,
                'title' => 'store_delete',
            ],
            [
                'id'    => 27,
                'title' => 'store_access',
            ],
            [
                'id'    => 28,
                'title' => 'store_managment_access',
            ],
            [
                'id'    => 29,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 30,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 31,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 32,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 33,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 34,
                'title' => 'product_create',
            ],
            [
                'id'    => 35,
                'title' => 'product_edit',
            ],
            [
                'id'    => 36,
                'title' => 'product_show',
            ],
            [
                'id'    => 37,
                'title' => 'product_delete',
            ],
            [
                'id'    => 38,
                'title' => 'product_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_review_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_review_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_review_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_review_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_review_access',
            ], 
            [
                'id'    => 45,
                'title' => 'clinic_managment_access',
            ],
            [
                'id'    => 46,
                'title' => 'clinic_create',
            ],
            [
                'id'    => 47,
                'title' => 'clinic_edit',
            ],
            [
                'id'    => 48,
                'title' => 'clinic_show',
            ],
            [
                'id'    => 49,
                'title' => 'clinic_delete',
            ],
            [
                'id'    => 50,
                'title' => 'clinic_access',
            ],
            [
                'id'    => 51,
                'title' => 'clinic_service_create',
            ],
            [
                'id'    => 52,
                'title' => 'clinic_service_edit',
            ],
            [
                'id'    => 53,
                'title' => 'clinic_service_show',
            ],
            [
                'id'    => 54,
                'title' => 'clinic_service_delete',
            ],
            [
                'id'    => 55,
                'title' => 'clinic_service_access',
            ],
            [
                'id'    => 56,
                'title' => 'clinic_review_create',
            ],
            [
                'id'    => 57,
                'title' => 'clinic_review_edit',
            ],
            [
                'id'    => 58,
                'title' => 'clinic_review_show',
            ],
            [
                'id'    => 59,
                'title' => 'clinic_review_delete',
            ],
            [
                'id'    => 60,
                'title' => 'clinic_review_access',
            ],
            [
                'id'    => 61,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 62,
                'title' => 'pet_type_create',
            ],
            [
                'id'    => 63,
                'title' => 'pet_type_edit',
            ],
            [
                'id'    => 64,
                'title' => 'pet_type_show',
            ],
            [
                'id'    => 65,
                'title' => 'pet_type_delete',
            ],
            [
                'id'    => 66,
                'title' => 'pet_type_access',
            ],
            [
                'id'    => 67,
                'title' => 'hosting_service_create',
            ],
            [
                'id'    => 68,
                'title' => 'hosting_service_edit',
            ],
            [
                'id'    => 69,
                'title' => 'hosting_service_show',
            ],
            [
                'id'    => 70,
                'title' => 'hosting_service_delete',
            ],
            [
                'id'    => 71,
                'title' => 'hosting_service_access',
            ],
            [
                'id'    => 72,
                'title' => 'paramedic_create',
            ],
            [
                'id'    => 73,
                'title' => 'paramedic_edit',
            ],
            [
                'id'    => 74,
                'title' => 'paramedic_show',
            ],
            [
                'id'    => 75,
                'title' => 'paramedic_delete',
            ],
            [
                'id'    => 76,
                'title' => 'paramedic_access',
            ],
            [
                'id'    => 77,
                'title' => 'hosting_managment_access',
            ],
            [
                'id'    => 78,
                'title' => 'hosting_create',
            ],
            [
                'id'    => 79,
                'title' => 'hosting_edit',
            ],
            [
                'id'    => 80,
                'title' => 'hosting_show',
            ],
            [
                'id'    => 81,
                'title' => 'hosting_delete',
            ],
            [
                'id'    => 82,
                'title' => 'hosting_access',
            ],
            [
                'id'    => 83,
                'title' => 'hosting_review_create',
            ],
            [
                'id'    => 84,
                'title' => 'hosting_review_edit',
            ],
            [
                'id'    => 85,
                'title' => 'hosting_review_show',
            ],
            [
                'id'    => 86,
                'title' => 'hosting_review_delete',
            ],
            [
                'id'    => 87,
                'title' => 'hosting_review_access',
            ],
            [
                'id'    => 88,
                'title' => 'adoption_managment_access',
            ],
            [
                'id'    => 89,
                'title' => 'adoption_pet_create',
            ],
            [
                'id'    => 90,
                'title' => 'adoption_pet_edit',
            ],
            [
                'id'    => 91,
                'title' => 'adoption_pet_show',
            ],
            [
                'id'    => 92,
                'title' => 'adoption_pet_delete',
            ],
            [
                'id'    => 93,
                'title' => 'adoption_pet_access',
            ],
            [
                'id'    => 94,
                'title' => 'adoption_request_create',
            ],
            [
                'id'    => 95,
                'title' => 'adoption_request_edit',
            ],
            [
                'id'    => 96,
                'title' => 'adoption_request_show',
            ],
            [
                'id'    => 97,
                'title' => 'adoption_request_delete',
            ],
            [
                'id'    => 98,
                'title' => 'adoption_request_access',
            ],
            [
                'id'    => 99,
                'title' => 'pet_companion_create',
            ],
            [
                'id'    => 100,
                'title' => 'pet_companion_edit',
            ],
            [
                'id'    => 101,
                'title' => 'pet_companion_show',
            ],
            [
                'id'    => 102,
                'title' => 'pet_companion_delete',
            ],
            [
                'id'    => 103,
                'title' => 'pet_companion_access',
            ],
            [
                'id'    => 104,
                'title' => 'stray_pet_create',
            ],
            [
                'id'    => 105,
                'title' => 'stray_pet_edit',
            ],
            [
                'id'    => 106,
                'title' => 'stray_pet_show',
            ],
            [
                'id'    => 107,
                'title' => 'stray_pet_delete',
            ],
            [
                'id'    => 108,
                'title' => 'stray_pet_access',
            ],
            [
                'id'    => 109,
                'title' => 'delivery_pet_create',
            ],
            [
                'id'    => 110,
                'title' => 'delivery_pet_edit',
            ],
            [
                'id'    => 111,
                'title' => 'delivery_pet_show',
            ],
            [
                'id'    => 112,
                'title' => 'delivery_pet_delete',
            ],
            [
                'id'    => 113,
                'title' => 'delivery_pet_access',
            ],
            [
                'id'    => 114,
                'title' => 'slider_create',
            ],
            [
                'id'    => 115,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 116,
                'title' => 'slider_show',
            ],
            [
                'id'    => 117,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 118,
                'title' => 'slider_access',
            ],
            [
                'id'    => 119,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 120,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 121,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 122,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 123,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 124,
                'title' => 'volunteer_create',
            ],
            [
                'id'    => 125,
                'title' => 'volunteer_edit',
            ],
            [
                'id'    => 126,
                'title' => 'volunteer_show',
            ],
            [
                'id'    => 127,
                'title' => 'volunteer_delete',
            ],
            [
                'id'    => 128,
                'title' => 'volunteer_access',
            ],
            [
                'id'    => 129,
                'title' => 'news_create',
            ],
            [
                'id'    => 130,
                'title' => 'news_edit',
            ],
            [
                'id'    => 131,
                'title' => 'news_show',
            ],
            [
                'id'    => 132,
                'title' => 'news_delete',
            ],
            [
                'id'    => 133,
                'title' => 'news_access',
            ],
            [
                'id'    => 134,
                'title' => 'news_comment_delete',
            ],
            [
                'id'    => 135,
                'title' => 'news_comment_access',
            ],
            [
                'id'    => 136,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 137,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 138,
                'title' => 'user_pet_create',
            ],
            [
                'id'    => 139,
                'title' => 'user_pet_edit',
            ],
            [
                'id'    => 140,
                'title' => 'user_pet_show',
            ],
            [
                'id'    => 141,
                'title' => 'user_pet_delete',
            ],
            [
                'id'    => 142,
                'title' => 'user_pet_access',
            ],
            [
                'id'    => 143,
                'title' => 'pets_lover_managment_access',
            ],
            [
                'id'    => 144,
                'title' => 'pets_lover_create',
            ],
            [
                'id'    => 145,
                'title' => 'pets_lover_edit',
            ],
            [
                'id'    => 146,
                'title' => 'pets_lover_show',
            ],
            [
                'id'    => 147,
                'title' => 'pets_lover_delete',
            ],
            [
                'id'    => 148,
                'title' => 'pets_lover_access',
            ],
            [
                'id'    => 149,
                'title' => 'setting_create',
            ],
            [
                'id'    => 150,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 151,
                'title' => 'setting_show',
            ],
            [
                'id'    => 152,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 153,
                'title' => 'setting_access',
            ],
            [
                'id'    => 154,
                'title' => 'pet_companion_managment_access',
            ],
            [
                'id'    => 155,
                'title' => 'pet_companion_review_create',
            ],
            [
                'id'    => 156,
                'title' => 'pet_companion_review_edit',
            ],
            [
                'id'    => 157,
                'title' => 'pet_companion_review_show',
            ],
            [
                'id'    => 158,
                'title' => 'pet_companion_review_delete',
            ],
            [
                'id'    => 159,
                'title' => 'pet_companion_review_access',
            ],
            [
                'id'    => 160,
                'title' => 'affiliation_analytic_show',
            ],
            [
                'id'    => 161,
                'title' => 'affiliation_analytic_delete',
            ],
            [
                'id'    => 162,
                'title' => 'affiliation_analytic_access',
            ],
            [
                'id'    => 163,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
