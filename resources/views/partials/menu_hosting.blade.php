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
            <a href="{{ route("hosting.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>    
        <li class="c-sidebar-nav-item">
            <a href="{{ route("hosting.hosting-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("hosting/hosting-reviews") || request()->is("hosting/hosting-reviews/*") ? "c-active" : "" }}">
                <i class="fa-fw far fa-star c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.hostingReview.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('hosting/profile') || request()->is('hosting/profile/*') ? 'c-active' : '' }}" href="{{ route('hosting.profile.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.edit_info') }}
            </a>
        </li> 
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>