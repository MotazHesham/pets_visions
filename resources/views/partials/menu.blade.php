<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background: {{ get_setting("sidemenu_background","#212631") }}">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            @if(get_setting('logo'))
                <div class="p-4">    
                    <img src="{{asset(get_setting('logo'))}}" width="50" alt="">
                    {{ get_setting('site_name') }}
                </div>
            @else 
                {{ get_setting('site_name') }}
            @endif
        </a>
    </div>

    <ul class="c-sidebar-nav" style="background: {{ get_setting("sidemenu_background","#212631") }}"> 
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items"> 
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('store_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/stores*") ? "c-show" : "" }} {{ request()->is("admin/product-categories*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/product-reviews*") ? "c-show" : "" }} {{ request()->is("admin/product-wishlists*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-store c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.storeManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('store_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stores.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stores") || request()->is("admin/stores/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-store-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.store.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-reviews") || request()->is("admin/product-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productReview.title') }}
                            </a>
                        </li>
                    @endcan 
                </ul>
            </li>
        @endcan
        @can('clinic_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clinics*") ? "c-show" : "" }} {{ request()->is("admin/clinic-services*") ? "c-show" : "" }} {{ request()->is("admin/clinic-reviews*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clinicManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('clinic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinics") || request()->is("admin/clinics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('clinic_service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinic-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinic-services") || request()->is("admin/clinic-services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinicService.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('clinic_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinic-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinic-reviews") || request()->is("admin/clinic-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinicReview.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('paramedic_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.paramedics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/paramedics") || request()->is("admin/paramedics/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-medkit c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.paramedic.title') }}
                </a>
            </li>
        @endcan
        @can('hosting_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/hostings*") ? "c-show" : "" }} {{ request()->is("admin/hosting-reviews*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hostingManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('hosting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hostings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hostings") || request()->is("admin/hostings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-medal c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hosting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hosting_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hosting-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hosting-reviews") || request()->is("admin/hosting-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hostingReview.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('adoption_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/adoption-pets*") ? "c-show" : "" }} {{ request()->is("admin/adoption-requests*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-burn c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.adoptionManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('adoption_pet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.adoption-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/adoption-pets") || request()->is("admin/adoption-pets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.adoptionPet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('adoption_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.adoption-requests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/adoption-requests") || request()->is("admin/adoption-requests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-jedi-order c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.adoptionRequest.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('pet_companion_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/pet-companions*") ? "c-show" : "" }} {{ request()->is("admin/pet-companion-reviews*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-blind c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.petCompanionManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pet_companion_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pet-companions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pet-companions") || request()->is("admin/pet-companions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-accessible-icon c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petCompanion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pet_companion_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pet-companion-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pet-companion-reviews") || request()->is("admin/pet-companion-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petCompanionReview.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('stray_pet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.stray-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stray-pets") || request()->is("admin/stray-pets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.strayPet.title') }}
                </a>
            </li>
        @endcan
        @can('delivery_pet_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.delivery-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delivery-pets") || request()->is("admin/delivery-pets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.deliveryPet.title') }}
                </a>
            </li>
        @endcan
        @can('pets_lover_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/pets-lovers*") ? "c-show" : "" }} {{ request()->is("admin/user-pets*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-heart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.petsLoverManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pets_lover_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pets-lovers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pets-lovers") || request()->is("admin/pets-lovers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petsLover.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_pet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-pets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-pets") || request()->is("admin/user-pets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userPet.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('affiliation_analytic_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.affiliation-analytics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/affiliation-analytics") || request()->is("admin/affiliation-analytics/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.affiliationAnalytic.title') }}
                </a>
            </li>
        @endcan
        @can('news_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.newss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newss") || request()->is("admin/newss/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.news.title') }}
                </a>
            </li>
        @endcan
        @can('news_comment_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.news-comments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/news-comments") || request()->is("admin/news-comments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.newsComment.title') }}
                </a>
            </li>
        @endcan
        @can('volunteer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.volunteers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/volunteers") || request()->is("admin/volunteers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.volunteer.title') }}
                </a>
            </li>
        @endcan
        @can('contact_us_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contact-uss.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contact-uss") || request()->is("admin/contact-uss/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contactUs.title') }}
                </a>
            </li>
        @endcan
        @can('subscription_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-envelope c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subscription.title') }}
                </a>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/user-alerts*") ? "c-show" : "" }} {{ request()->is("admin/pet-types*") ? "c-show" : "" }} {{ request()->is("admin/hosting-services*") ? "c-show" : "" }} {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pet_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pet-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pet-types") || request()->is("admin/pet-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paw c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hosting_service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hosting-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hosting-services") || request()->is("admin/hosting-services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-servicestack c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hostingService.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>