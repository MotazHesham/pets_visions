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
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'user_type'                => 'User Type',
            'user_type_helper'         => ' ',
            'identity_num'             => 'Identity Num',
            'identity_num_helper'      => ' ',
            'phone'                    => 'Phone',
            'phone_helper'             => ' ',
            'user_position'            => 'User Position',
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
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'store' => [
        'title'          => 'Stores',
        'title_singular' => 'Store',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'store_name'             => 'Store Name',
            'store_name_helper'      => ' ',
            'address'                => 'Address',
            'address_helper'         => ' ',
            'logo'                   => 'Logo',
            'logo_helper'            => ' ',
            'cover'                  => 'Cover',
            'cover_helper'           => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'store_phone'            => 'Store Phone',
            'store_phone_helper'     => ' ',
            'domain'                 => 'Domain',
            'domain_helper'          => ' ',
            'specializations'        => 'Specializations',
            'specializations_helper' => ' ',
        ],
    ],
    'storeManagment' => [
        'title'          => 'Store Managment',
        'title_singular' => 'Store Managment',
    ],
    'productCategory' => [
        'title'          => 'Product Category',
        'title_singular' => 'Product Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'current_stock'           => 'Current Stock',
            'current_stock_helper'    => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'details'                 => 'Details',
            'details_helper'          => ' ',
            'main_photo'              => 'Main Photo',
            'main_photo_helper'       => ' ',
            'photos'                  => 'Photos',
            'photos_helper'           => ' ',
            'video_provider'          => 'Video Provider',
            'video_provider_helper'   => ' ',
            'video_link'              => 'Video Link',
            'video_link_helper'       => ' ',
            'added_by'                => 'Added By',
            'added_by_helper'         => ' ',
            'tags'                    => 'Tags',
            'tags_helper'             => ' ',
            'published'               => 'Published',
            'published_helper'        => ' ',
            'featured'                => 'Featured',
            'featured_helper'         => ' ',
            'affiliation_link'        => 'Affiliation Link',
            'affiliation_link_helper' => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_description'        => 'Meta Description',
            'meta_description_helper' => ' ',
            'category'                => 'Category',
            'category_helper'         => ' ',
            'slug'                    => 'Slug',
            'slug_helper'             => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'rating'                  => 'Rating',
            'rating_helper'           => ' ',
            'store'                   => 'Store',
            'store_helper'            => ' ',
        ],
    ],
    'productReview' => [
        'title'          => 'Product Reviews',
        'title_singular' => 'Product Review',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'rate'              => 'Rate',
            'rate_helper'       => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
        ],
    ],
    'productWishlist' => [
        'title'          => 'Product Wishlist',
        'title_singular' => 'Product Wishlist',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'clinicManagment' => [
        'title'          => 'Clinic Managment',
        'title_singular' => 'Clinic Managment',
    ],
    'clinic' => [
        'title'          => 'Clinics',
        'title_singular' => 'Clinic',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'clinic_name'              => 'Clinic Name',
            'clinic_name_helper'       => ' ',
            'clinic_phone'             => 'Clinic Phone',
            'clinic_phone_helper'      => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
            'address'                  => 'Address',
            'address_helper'           => ' ',
            'cover'                    => 'Cover',
            'cover_helper'             => ' ',
            'logo'                     => 'Logo',
            'logo_helper'              => ' ',
            'about_us_image'           => 'About Us Image',
            'about_us_image_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'about_us'                 => 'About Us',
            'about_us_helper'          => ' ',
            'user'                     => 'User',
            'user_helper'              => ' ',
            'rating'                   => 'Rating',
            'rating_helper'            => ' ',
            'unified_phone'            => 'Unified Phone',
            'unified_phone_helper'     => ' ',
            'certification'            => 'Certification',
            'certification_helper'     => ' ',
        ],
    ],
    'clinicService' => [
        'title'          => 'Clinic Services',
        'title_singular' => 'Clinic Service',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'photo'                    => 'Photo',
            'photo_helper'             => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
            'banner'                   => 'Banner',
            'banner_helper'            => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'affiliation_link'         => 'Affiliation Link',
            'affiliation_link_helper'  => ' ',
            'clinic'                   => 'Clinic',
            'clinic_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'clinicReview' => [
        'title'          => 'Clinic Reviews',
        'title_singular' => 'Clinic Review',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'clinic'            => 'Clinic',
            'clinic_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'rate'              => 'Rate',
            'rate_helper'       => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'generalSetting' => [
        'title'          => 'General Settings',
        'title_singular' => 'General Setting',
    ],
    'petType' => [
        'title'          => 'Pet Types',
        'title_singular' => 'Pet Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'hostingService' => [
        'title'          => 'Hosting Services',
        'title_singular' => 'Hosting Service',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paramedic' => [
        'title'          => 'Paramedics',
        'title_singular' => 'Paramedic',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'active'                  => 'Active',
            'active_helper'           => ' ',
            'from_time'               => 'From Time',
            'from_time_helper'        => ' ',
            'to_time'                 => 'To Time',
            'to_time_helper'          => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'affiliation_link'        => 'Affiliation Link',
            'affiliation_link_helper' => ' ',
        ],
    ],
    'hostingManagment' => [
        'title'          => 'Hosting Managment',
        'title_singular' => 'Hosting Managment',
    ],
    'hosting' => [
        'title'          => 'Hostings',
        'title_singular' => 'Hosting',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => ' ',
            'user'                             => 'User',
            'user_helper'                      => ' ',
            'hosting_phone'                    => 'Hosting Phone',
            'hosting_phone_helper'             => ' ',
            'hosting_type'                     => 'Hosting Type',
            'hosting_type_helper'              => ' ',
            'address'                          => 'Address',
            'address_helper'                   => ' ',
            'about_us'                         => 'About Us',
            'about_us_helper'                  => ' ',
            'short_description'                => 'Short Description',
            'short_description_helper'         => ' ',
            'logo'                             => 'Logo',
            'logo_helper'                      => ' ',
            'cover'                            => 'Cover',
            'cover_helper'                     => ' ',
            'affiliation_link'                 => 'Affiliation Link',
            'affiliation_link_helper'          => ' ',
            'photos'                           => 'Photos',
            'photos_helper'                    => ' ',
            'created_at'                       => 'Created at',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => ' ',
            'identity_photo'                   => 'Identity Photo',
            'identity_photo_helper'            => ' ',
            'hosting_services'                 => 'Hosting Services',
            'hosting_services_helper'          => ' ',
            'hosting_name'                     => 'Hosting Name',
            'hosting_name_helper'              => ' ',
            'commercial_register_photo'        => 'Commercial Register Photo',
            'commercial_register_photo_helper' => ' ',
        ],
    ],
    'hostingReview' => [
        'title'          => 'Hosting Reviews',
        'title_singular' => 'Hosting Review',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'hosting'           => 'Hosting',
            'hosting_helper'    => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'rate'              => 'Rate',
            'rate_helper'       => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'adoptionManagment' => [
        'title'          => 'Adoption Managment',
        'title_singular' => 'Adoption Managment',
    ],
    'adoptionPet' => [
        'title'          => 'Adoption Pets',
        'title_singular' => 'Adoption Pet',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'pet_type'          => 'Pet Type',
            'pet_type_helper'   => ' ',
            'fasila'            => 'Fasila',
            'fasila_helper'     => ' ',
            'age'               => 'Age',
            'age_helper'        => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'adoptionRequest' => [
        'title'          => 'Adoption Requests',
        'title_singular' => 'Adoption Request',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'first_name'        => 'First Name',
            'first_name_helper' => ' ',
            'last_name'         => 'Last Name',
            'last_name_helper'  => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'gender'            => 'Gender',
            'gender_helper'     => ' ',
            'age'               => 'Age',
            'age_helper'        => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'experience'        => 'Experience',
            'experience_helper' => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'petCompanion' => [
        'title'          => 'Pet Companions',
        'title_singular' => 'Pet Companion',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'specializations'         => 'Specializations',
            'specializations_helper'  => ' ',
            'photo'                   => 'Photo',
            'photo_helper'            => ' ',
            'nationality'             => 'Nationality',
            'nationality_helper'      => ' ',
            'experience'              => 'Experience',
            'experience_helper'       => ' ',
            'affiliation_link'        => 'Affiliation Link',
            'affiliation_link_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'strayPet' => [
        'title'          => 'Stray Pets',
        'title_singular' => 'Stray Pet',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'first_name'              => 'First Name',
            'first_name_helper'       => ' ',
            'last_name'               => 'Last Name',
            'last_name_helper'        => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'phone'                   => 'Phone',
            'phone_helper'            => ' ',
            'missing_place'           => 'Missing Place',
            'missing_place_helper'    => ' ',
            'receiving_place'         => 'Receiving Place',
            'receiving_place_helper'  => ' ',
            'date'                    => 'Date',
            'date_helper'             => ' ',
            'note'                    => 'Note',
            'note_helper'             => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'pet_type'                => 'Pet Type',
            'pet_type_helper'         => ' ',
            'photo'                   => 'Photo',
            'photo_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'affiliation_link'        => 'Affiliation Link',
            'affiliation_link_helper' => ' ',
        ],
    ],
    'deliveryPet' => [
        'title'          => 'Delivery Pets',
        'title_singular' => 'Delivery Pet',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'from_city'           => 'From City',
            'from_city_helper'    => ' ',
            'to_city'             => 'To City',
            'to_city_helper'      => ' ',
            'date'                => 'Date',
            'date_helper'         => ' ',
            'note'                => 'Note',
            'note_helper'         => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'phone'               => 'Phone',
            'phone_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'pets_details'        => 'Pets Details',
            'pets_details_helper' => ' ',
        ],
    ],
    'slider' => [
        'title'          => 'Sliders',
        'title_singular' => 'Slider',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'sub_title'         => 'Sub Title',
            'sub_title_helper'  => ' ',
            'publish'           => 'Publish',
            'publish_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'Subscriptions',
        'title_singular' => 'Subscription',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'volunteer' => [
        'title'          => 'Volunteers',
        'title_singular' => 'Volunteer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'first_name'         => 'First Name',
            'first_name_helper'  => ' ',
            'last_name'          => 'Last Name',
            'last_name_helper'   => ' ',
            'phone'              => 'Phone',
            'phone_helper'       => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'gender'             => 'Gender',
            'gender_helper'      => ' ',
            'age'                => 'Age',
            'age_helper'         => ' ',
            'experience'         => 'Experience',
            'experience_helper'  => ' ',
            'fields'             => 'Fields',
            'fields_helper'      => ' ',
            'period_time'        => 'Period Time',
            'period_time_helper' => ' ',
            'note'               => 'Note',
            'note_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'news' => [
        'title'          => 'News',
        'title_singular' => 'News',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'added_by'                 => 'Added By',
            'added_by_helper'          => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'photo'                    => 'Photo',
            'photo_helper'             => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'featured'                 => 'Featured',
            'featured_helper'          => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'newsComment' => [
        'title'          => 'News Comments',
        'title_singular' => 'News Comment',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'news'              => 'News',
            'news_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'comment'           => 'Comment',
            'comment_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contactUs' => [
        'title'          => 'Contact Us',
        'title_singular' => 'Contact Us',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'first_name'        => 'First Name',
            'first_name_helper' => ' ',
            'last_name'         => 'Last Name',
            'last_name_helper'  => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userPet' => [
        'title'          => 'User Pets',
        'title_singular' => 'User Pet',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'dob'               => 'Dob',
            'dob_helper'        => ' ',
            'gender'            => 'Gender',
            'gender_helper'     => ' ',
            'pet_type'          => 'Pet Type',
            'pet_type_helper'   => ' ',
            'fasila'            => 'Fasila',
            'fasila_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'petsLoverManagment' => [
        'title'          => 'Pets Lover Managment',
        'title_singular' => 'Pets Lover Managment',
    ],
    'petsLover' => [
        'title'          => 'Pets Lovers',
        'title_singular' => 'Pets Lover',
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'petCompanionManagment' => [
        'title'          => 'Pet Companion Managment',
        'title_singular' => 'Pet Companion Managment',
    ],
    'petCompanionReview' => [
        'title'          => 'Pet Companion Reviews',
        'title_singular' => 'Pet Companion Review',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'pet_companion'        => 'Pet Companion',
            'pet_companion_helper' => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'rate'                 => 'Rate',
            'rate_helper'          => ' ',
            'comment'              => 'Comment',
            'comment_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'affiliationAnalytic' => [
        'title'          => 'Affiliation Analytics',
        'title_singular' => 'Affiliation Analytic',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'model_type'           => 'Model Type',
            'model_type_helper'    => ' ',
            'model'                => 'Model',
            'model_helper'         => ' ',
            'ip'                   => 'Ip',
            'ip_helper'            => ' ',
            'num_of_clicks'        => 'Num Of Clicks',
            'num_of_clicks_helper' => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],

];
