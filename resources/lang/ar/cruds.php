<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'name'                     => 'الاسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الإلكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'تاريخ التحقق من البريد',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الأدوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'رمز التذكر',
            'remember_token_helper'    => ' ',
            'created_at'               => 'تاريخ الإنشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التحديث',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'الموافقة',
            'approved_helper'          => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'identity_num'             => 'رقم الهوية',
            'identity_num_helper'      => ' ',
            'phone'                    => 'رقم الهاتف',
            'phone_helper'             => ' ',
            'user_position'            => 'المنصب الوظيفي',
            'user_position_helper'     => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'تنبيهات المستخدم',
        'title_singular' => 'تنبيه المستخدم',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'alert_text'        => 'نص التنبيه',
            'alert_text_helper' => ' ',
            'alert_link'        => 'رابط التنبيه',
            'alert_link_helper' => ' ',
            'user'              => 'المستخدمين',
            'user_helper'       => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
        ],
    ],
    'store' => [
        'title'          => 'المتاجر',
        'title_singular' => 'متجر',
        'fields'         => [
            'id'                     => 'id',
            'id_helper'              => ' ',
            'store_name'             => 'اسم المتجر',
            'store_name_helper'      => ' ',
            'address'                => 'العنوان',
            'address_helper'         => ' ',
            'logo'                   => 'الشعار',
            'logo_helper'            => ' ',
            'cover'                  => 'صورة الغلاف',
            'cover_helper'           => ' ',
            'user'                   => 'المستخدم',
            'user_helper'            => ' ',
            'created_at'             => 'تاريخ الإنشاء',
            'created_at_helper'      => ' ',
            'updated_at'             => 'تاريخ التحديث',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'تاريخ الحذف',
            'deleted_at_helper'      => ' ',
            'store_phone'            => 'هاتف المتجر',
            'store_phone_helper'     => ' ',
            'domain'                 => 'Domain',
            'domain_helper'          => ' ',
            'specializations'        => 'التخصصات',
            'specializations_helper' => ' ',
            'commercial_register_photo'        => 'صورة السجل التجاري',
            'commercial_register_photo_helper' => ' ',
        ],
    ],
    'storeManagment' => [
        'title'          => 'إدارة المتاجر',
        'title_singular' => 'إدارة المتجر',
    ],
    'productCategory' => [
        'title'          => 'فئات المنتجات',
        'title_singular' => 'فئة المنتج',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'المنتجات',
        'title_singular' => 'منتج',
        'fields'         => [
            'id'                      => 'id',
            'id_helper'               => ' ',
            'name'                    => 'الاسم',
            'name_helper'             => ' ',
            'price'                   => 'السعر',
            'price_helper'            => ' ',
            'created_at'              => 'تاريخ الإنشاء',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تاريخ التحديث',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تاريخ الحذف',
            'deleted_at_helper'       => ' ',
            'current_stock'           => 'المخزون الحالي',
            'current_stock_helper'    => ' ',
            'description'             => 'الوصف',
            'description_helper'      => ' ',
            'details'                 => 'التفاصيل',
            'details_helper'          => ' ',
            'main_photo'              => 'الصورة الرئيسية',
            'main_photo_helper'       => ' ',
            'photos'                  => 'الصور',
            'photos_helper'           => ' ',
            'video_provider'          => 'مزود الفيديو',
            'video_provider_helper'   => ' ',
            'video_link'              => 'رابط الفيديو',
            'video_link_helper'       => ' ',
            'added_by'                => 'أضيف بواسطة',
            'added_by_helper'         => ' ',
            'tags'                    => 'الدلالات البحثية',
            'tags_helper'             => ' ',
            'published'               => 'منشور',
            'published_helper'        => ' ',
            'featured'                => 'مميز',
            'featured_helper'         => ' ',
            'affiliation_link'        => 'رابط الشراكة',
            'affiliation_link_helper' => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_description'        => 'Meta Description',
            'meta_description_helper' => ' ',
            'category'                => 'الفئة',
            'category_helper'         => ' ',
            'slug'                    => 'slug',
            'slug_helper'             => ' ',
            'user'                    => 'المستخدم',
            'user_helper'             => ' ',
            'rating'                  => 'التقييم',
            'rating_helper'           => ' ',
            'store'                   => 'المتجر',
            'store_helper'            => ' ',
        ],
    ],
    'productReview' => [
        'title'          => 'تقييمات المنتجات',
        'title_singular' => 'تقييم المنتج',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'product'           => 'المنتج',
            'product_helper'    => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'rate'              => 'التقييم',
            'rate_helper'       => ' ',
            'comment'           => 'التعليق',
            'comment_helper'    => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
        ],
    ],
    'productWishlist' => [
        'title'          => 'قائمة رغبات المنتجات',
        'title_singular' => 'قائمة رغبات المنتج',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'product'           => 'المنتج',
            'product_helper'    => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'clinicManagment' => [
        'title'          => 'إدارة العيادات',
        'title_singular' => 'إدارة العيادة',
    ],
    'clinic' => [
        'title'          => 'العيادات',
        'title_singular' => 'العيادة',
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'clinic_name'              => 'اسم العيادة',
            'clinic_name_helper'       => ' ',
            'clinic_phone'             => 'هاتف العيادة',
            'clinic_phone_helper'      => ' ',
            'short_description'        => 'وصف قصير',
            'short_description_helper' => ' ',
            'address'                  => 'العنوان',
            'address_helper'           => ' ',
            'cover'                    => 'صورة الغلاف',
            'cover_helper'             => ' ',
            'logo'                     => 'الشعار',
            'logo_helper'              => ' ',
            'about_us_image'           => 'صورة من نحن',
            'about_us_image_helper'    => ' ',
            'created_at'               => 'تاريخ الإنشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التحديث',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
            'about_us'                 => 'معلومات عنا',
            'about_us_helper'          => ' ',
            'user'                     => 'المستخدم',
            'user_helper'              => ' ',
            'rating'                   => 'التقييم',
            'rating_helper'            => ' ',
            'unified_phone'            => 'الهاتف الموحد',
            'unified_phone_helper'     => ' ',
            'certification'            => 'الشهادة',
            'certification_helper'     => ' ',
        ],
    ],
    'clinicService' => [
        'title'          => 'خدمات العيادة',
        'title_singular' => 'خدمة العيادة',
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'name'                     => 'الاسم',
            'name_helper'              => ' ',
            'photo'                    => 'الصورة',
            'photo_helper'             => ' ',
            'short_description'        => 'وصف قصير',
            'short_description_helper' => ' ',
            'banner'                   => 'البانر',
            'banner_helper'            => ' ',
            'description'              => 'الوصف',
            'description_helper'       => ' ',
            'affiliation_link'         => 'رابط الشراكة',
            'affiliation_link_helper'  => ' ',
            'clinic'                   => 'العيادة',
            'clinic_helper'            => ' ',
            'created_at'               => 'تاريخ الإنشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التحديث',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'clinicReview' => [
        'title'          => 'تقييمات العيادات',
        'title_singular' => 'تقييم العيادة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'clinic'            => 'العيادة',
            'clinic_helper'     => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'rate'              => 'التقييم',
            'rate_helper'       => ' ',
            'comment'           => 'التعليق',
            'comment_helper'    => ' ',
            'created_at'        => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'generalSetting' => [
        'title'          => 'الإعدادات العامة',
        'title_singular' => 'الإعدادات العامة',
    ],
    'petType' => [
        'title'          => 'أنواع الحيوانات الأليفة',
        'title_singular' => 'نوع الحيوان الأليف',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'hostingService' => [
        'title'          => 'خدمات الاستضافة',
        'title_singular' => 'خدمة الاستضافة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paramedic' => [
        'title'          => 'المسعفون',
        'title_singular' => 'المسعف',
        'fields'         => [
            'id'                      => 'id',
            'id_helper'               => ' ',
            'name'                    => 'الاسم',
            'name_helper'             => ' ',
            'active'                  => 'نشط',
            'active_helper'           => ' ',
            'from_time'               => 'من الوقت',
            'from_time_helper'        => ' ',
            'to_time'                 => 'إلى الوقت',
            'to_time_helper'          => ' ',
            'created_at'              => 'تم الإنشاء في',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تم التحديث في',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تم الحذف في',
            'deleted_at_helper'       => ' ',
            'affiliation_link'        => 'رابط التواصل',
            'affiliation_link_helper' => ' ',
        ],
    ],
    'hostingManagment' => [
        'title'          => 'إدارة الاستضافة',
        'title_singular' => 'إدارة الاستضافة',
    ],
    'hosting' => [
        'title'          => 'الاستضافات',
        'title_singular' => '(فندق / فرد)',
        'fields'         => [
            'id'                               => 'id',
            'id_helper'                        => ' ',
            'user'                             => 'المستخدم',
            'user_helper'                      => ' ',
            'hosting_phone'                    => 'هاتف الاستضافة',
            'hosting_phone_helper'             => ' ',
            'hosting_type'                     => 'نوع الاستضافة',
            'hosting_type_helper'              => ' ',
            'address'                          => 'العنوان',
            'address_helper'                   => ' ',
            'about_us'                         => 'معلومات عنا',
            'about_us_helper'                  => ' ',
            'short_description'                => 'وصف قصير',
            'short_description_helper'         => ' ',
            'logo'                             => 'الشعار',
            'logo_helper'                      => ' ',
            'cover'                            => 'الغلاف',
            'cover_helper'                     => ' ',
            'affiliation_link'                 => 'رابط التواصل',
            'affiliation_link_helper'          => ' ',
            'photos'                           => 'الصور',
            'photos_helper'                    => ' ',
            'created_at'                       => 'تم الإنشاء في',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'تم التحديث في',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'تم الحذف في',
            'deleted_at_helper'                => ' ',
            'identity_photo'                   => 'صورة الهوية',
            'identity_photo_helper'            => ' ',
            'hosting_services'                 => 'خدمات الاستضافة',
            'hosting_services_helper'          => ' ',
            'hosting_name'                     => 'اسم الاستضافة',
            'hosting_name_helper'              => ' ',
            'commercial_register_photo'        => 'صورة السجل التجاري',
            'commercial_register_photo_helper' => ' ',
        ],
    ],
    'hostingReview' => [
        'title'          => 'تقييمات الاستضافة',
        'title_singular' => 'مراجعة الاستضافة',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'hosting'           => 'الاستضافة',
            'hosting_helper'    => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'rate'              => 'التقييم',
            'rate_helper'       => ' ',
            'comment'           => 'التعليق',
            'comment_helper'    => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'adoptionManagment' => [
        'title'          => 'إدارة التبني',
        'title_singular' => 'إدارة التبني',
    ],
    'adoptionPet' => [
        'title'          => 'حيوانات التبني',
        'title_singular' => 'حيوان التبني',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'pet_type'          => 'نوع الحيوان الأليف',
            'pet_type_helper'   => ' ',
            'fasila'            => 'الفصيلة',
            'fasila_helper'     => ' ',
            'age'               => 'العمر',
            'age_helper'        => ' ',
            'photo'             => 'الصورة',
            'photo_helper'      => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'adoptionRequest' => [
        'title'          => 'طلبات التبني',
        'title_singular' => 'طلب التبني',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'first_name'        => 'الاسم الأول',
            'first_name_helper' => ' ',
            'last_name'         => 'اسم العائلة',
            'last_name_helper'  => ' ',
            'phone'             => 'الهاتف',
            'phone_helper'      => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'gender'            => 'الجنس',
            'gender_helper'     => ' ',
            'age'               => 'العمر',
            'age_helper'        => ' ',
            'address'           => 'العنوان',
            'address_helper'    => ' ',
            'experience'        => 'الخبرة',
            'experience_helper' => ' ',
            'note'              => 'ملاحظة',
            'note_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'petCompanion' => [
        'title'          => 'رفاق الحيوانات الأليفة',
        'title_singular' => 'رفيق الحيوان الأليف',
        'fields'         => [
            'id'                      => 'id',
            'id_helper'               => ' ',
            'user'                    => 'المستخدم',
            'user_helper'             => ' ',
            'specializations'         => 'التخصصات',
            'specializations_helper'  => ' ',
            'photo'                   => 'الصورة',
            'photo_helper'            => ' ',
            'nationality'             => 'الجنسية',
            'nationality_helper'      => ' ',
            'experience'              => 'الخبرة',
            'experience_helper'       => ' ',
            'affiliation_link'        => 'رابط التواصل',
            'affiliation_link_helper' => ' ',
            'created_at'              => 'تم الإنشاء في',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تم التحديث في',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تم الحذف في',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'strayPet' => [
        'title'          => 'الحيوانات الضالة',
        'title_singular' => 'حيوان ضال',
        'fields'         => [
            'id'                      => 'id',
            'id_helper'               => ' ',
            'first_name'              => 'الاسم الأول',
            'first_name_helper'       => ' ',
            'last_name'               => 'الاسم الأخير',
            'last_name_helper'        => ' ',
            'email'                   => 'البريد الإلكتروني',
            'email_helper'            => ' ',
            'phone'                   => 'الهاتف',
            'phone_helper'            => ' ',
            'missing_place'           => 'مكان الفقدان',
            'missing_place_helper'    => ' ',
            'receiving_place'         => 'مكان الاستلام',
            'receiving_place_helper'  => ' ',
            'date'                    => 'التاريخ',
            'date_helper'             => ' ',
            'note'                    => 'ملاحظة',
            'note_helper'             => ' ',
            'user'                    => 'المستخدم',
            'user_helper'             => ' ',
            'pet_type'                => 'نوع الحيوان',
            'pet_type_helper'         => ' ',
            'photo'                   => 'الصورة',
            'photo_helper'            => ' ',
            'created_at'              => 'تم الإنشاء في',
            'created_at_helper'       => ' ',
            'updated_at'              => 'تم التحديث في',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'تم الحذف في',
            'deleted_at_helper'       => ' ',
            'affiliation_link'        => 'رابط التواصل',
            'affiliation_link_helper' => ' ',
        ],
    ],
    'deliveryPet' => [
        'title'          => 'حيوانات التوصيل',
        'title_singular' => 'حيوان توصيل',
        'fields'         => [
            'id'                  => 'id',
            'id_helper'           => ' ',
            'from_city'           => 'من المدينة',
            'from_city_helper'    => ' ',
            'to_city'             => 'إلى المدينة',
            'to_city_helper'      => ' ',
            'date'                => 'التاريخ',
            'date_helper'         => ' ',
            'note'                => 'ملاحظة',
            'note_helper'         => ' ',
            'name'                => 'الاسم',
            'name_helper'         => ' ',
            'email'               => 'البريد الإلكتروني',
            'email_helper'        => ' ',
            'phone'               => 'الهاتف',
            'phone_helper'        => ' ',
            'created_at'          => 'تم الإنشاء في',
            'created_at_helper'   => ' ',
            'updated_at'          => 'تم التحديث في',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'تم الحذف في',
            'deleted_at_helper'   => ' ',
            'pets_details'        => 'تفاصيل الحيوانات',
            'pets_details_helper' => ' ',
        ],
    ],
    'slider' => [
        'title'          => 'الشريط الأعلاني',
        'title_singular' => 'شريط أعلاني',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'image'             => 'الصورة',
            'image_helper'      => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'sub_title'         => 'العنوان الفرعي',
            'sub_title_helper'  => ' ',
            'publish'           => 'النشر',
            'publish_helper'    => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'الاشتراكات',
        'title_singular' => 'اشتراك',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'volunteer' => [
        'title'          => 'المتطوعون',
        'title_singular' => 'متطوع',
        'fields'         => [
            'id'                 => 'id',
            'id_helper'          => ' ',
            'first_name'         => 'الاسم الأول',
            'first_name_helper'  => ' ',
            'last_name'          => 'الاسم الأخير',
            'last_name_helper'   => ' ',
            'phone'              => 'الهاتف',
            'phone_helper'       => ' ',
            'email'              => 'البريد الإلكتروني',
            'email_helper'       => ' ',
            'gender'             => 'الجنس',
            'gender_helper'      => ' ',
            'age'                => 'العمر',
            'age_helper'         => ' ',
            'experience'         => 'الخبرة',
            'experience_helper'  => ' ',
            'fields'             => 'المجالات',
            'fields_helper'      => ' ',
            'period_time'        => 'فترة العمل',
            'period_time_helper' => ' ',
            'note'               => 'ملاحظة',
            'note_helper'        => ' ',
            'created_at'         => 'تم الإنشاء في',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تم التحديث في',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تم الحذف في',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'news' => [
        'title'          => 'الأخبار',
        'title_singular' => 'خبر',
        'fields'         => [
            'id'                       => 'id',
            'id_helper'                => ' ',
            'added_by'                 => 'تم إضافته بواسطة',
            'added_by_helper'          => ' ',
            'title'                    => 'العنوان',
            'title_helper'             => ' ',
            'short_description'        => 'الوصف المختصر',
            'short_description_helper' => ' ',
            'description'              => 'الوصف',
            'description_helper'       => ' ',
            'photo'                    => 'الصورة',
            'photo_helper'             => ' ',
            'published'                => 'تم النشر',
            'published_helper'         => ' ',
            'featured'                 => 'مميز',
            'featured_helper'          => ' ',
            'created_at'               => 'تم الإنشاء في',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تم التحديث في',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تم الحذف في',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'newsComment' => [
        'title'          => 'تعليقات الأخبار',
        'title_singular' => 'تعليق خبر',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'news'              => 'الخبر',
            'news_helper'       => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'comment'           => 'التعليق',
            'comment_helper'    => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contactUs' => [
        'title'          => 'اتصل بنا',
        'title_singular' => 'اتصال بنا',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'first_name'        => 'الاسم الأول',
            'first_name_helper' => ' ',
            'last_name'         => 'الاسم الأخير',
            'last_name_helper'  => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'message'           => 'الرسالة',
            'message_helper'    => ' ',
            'phone'             => 'الهاتف',
            'phone_helper'      => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userPet' => [
        'title'          => 'الحيوانات',
        'title_singular' => 'حيوان مستخدم',
        'fields'         => [
            'id'                => 'id',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'photo'             => 'الصورة',
            'photo_helper'      => ' ',
            'dob'               => 'تاريخ الميلاد',
            'dob_helper'        => ' ',
            'gender'            => 'الجنس',
            'gender_helper'     => ' ',
            'pet_type'          => 'نوع الحيوان',
            'pet_type_helper'   => ' ',
            'fasila'            => 'الفصيلة',
            'fasila_helper'     => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
            'created_at'        => 'تم الإنشاء في',
            'created_at_helper' => ' ',
            'updated_at'        => 'تم التحديث في',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تم الحذف في',
            'deleted_at_helper' => ' ',
        ],
    ],
    'petsLoverManagment' => [
        'title'          => 'إدارة محبي الحيوانات',
        'title_singular' => 'إدارة محبي الحيوانات',
    ],
    'petsLover' => [
        'title'          => 'محبو الحيوانات',
        'title_singular' => 'محب للحيوانات',
    ],
    'setting' => [
        'title' => 'الإعدادات',
        'title_singular' => 'الإعداد',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'site_name' => 'اسم الموقع',
            'site_name_helper' => ' ',
            'logo' => 'الشعار',
            'logo_helper' => ' ',
            'phone' => 'الهاتف',
            'phone_helper' => ' ',
            'email' => 'البريد الإلكتروني',
            'email_helper' => ' ',
            'address' => 'العنوان',
            'address_helper' => ' ',
            'twitter' => 'تويتر',
            'twitter_helper' => ' ',
            'cart_activation' => 'Cart Activation',
            'cart_activation_helper' => ' ',
            'facebook' => 'فيسبوك',
            'facebook_helper' => ' ',
            'googleplus' => 'جوجل بلس',
            'googleplus_helper' => ' ',
            'instagram' => 'انستجرام',
            'instagram_helper' => ' ',
            'description' => 'الوصف',
            'description_helper' => ' ',
            'keywords_seo' => 'كلمات البحث SEO',
            'keywords_seo_helper' => ' ',
            'author_seo' => 'المؤلف SEO',
            'author_seo_helper' => ' ',
            'sitemap_link_seo' => 'رابط خريطة الموقع SEO',
            'sitemap_link_seo_helper' => ' ',
            'description_seo' => 'وصف SEO',
            'description_seo_helper' => ' ',
            'count_stores' => 'عدد المتاجر',
            'count_stores_helper' => ' ',
            'count_pets' => 'عدد الحيوانات الأليفة',
            'count_pets_helper' => ' ',
            'count_tweets' => 'عدد التغريدات',
            'count_tweets_helper' => ' ',
            'count_products' => 'عدد المنتجات',
            'count_products_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'description_2' => 'الوصف 2',
            'description_2_helper' => ' ',
            'adoption_text' => 'شروط التبني',
            'adoption_text_helper' => ' ',
            'hosting_text' => 'نص الاستضافة',
            'hosting_text_helper' => ' ',
            'about' => 'عنا',
            'about_helper' => ' ',
            'copy_right' => 'Copy Right',
            'copy_right_helper' => ' ',
            'services_text' => 'نص الخدمات',
            'services_text_helper' => ' ',
            'rescuecase_text' => 'نص الاسعافات الاولية',
            'rescuecase_text_helper' => ' ',
        ],
    ],
    'petCompanionManagment' => [
        'title'          => 'إدارة رفقاء الحيوانات',
        'title_singular' => 'إدارة رفيق للحيوانات',
    ],
    'petCompanionReview' => [
        'title'          => 'تقييمات رفقاء الحيوانات',
        'title_singular' => 'مراجعة رفيق الحيوان',
        'fields'         => [
            'id'                   => 'id',
            'id_helper'            => ' ',
            'pet_companion'        => 'رفيق الحيوان',
            'pet_companion_helper' => ' ',
            'user'                 => 'المستخدم',
            'user_helper'          => ' ',
            'name'                 => 'الاسم',
            'name_helper'          => ' ',
            'rate'                 => 'التقييم',
            'rate_helper'          => ' ',
            'comment'              => 'التعليق',
            'comment_helper'       => ' ',
            'created_at'           => 'تم الإنشاء في',
            'created_at_helper'    => ' ',
            'updated_at'           => 'تم التحديث في',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'تم الحذف في',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'affiliationAnalytic' => [
        'title'          => 'الأحصائيات',
        'title_singular' => 'الأحصائيات',
        'fields'         => [
            'id'                   => 'id',
            'id_helper'            => ' ',
            'model_type'           => 'نوع النموذج',
            'model_type_helper'    => ' ',
            'model_id'                => 'النموذج',
            'model_id_helper'         => ' ',
            'ip'                   => 'عنوان الآي بي',
            'ip_helper'            => ' ',
            'num_of_clicks'        => 'عدد النقرات',
            'num_of_clicks_helper' => ' ',
            'user'                 => 'المستخدم',
            'user_helper'          => ' ',
            'created_at'           => 'تم الإنشاء في',
            'created_at_helper'    => ' ',
            'updated_at'           => 'تم التحديث في',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'تم الحذف في',
            'deleted_at_helper'    => ' ',
        ],
    ],

];
