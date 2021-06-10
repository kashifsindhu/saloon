{{-- sidebar --}}
<div class="left_sidebar">
    <nav class="sidebar">

        <ul id="main-menu" class="metismenu">
            {{-- Dashboard --}}
            <li class="{{ $navItem == 'dashboard' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/dashboard') }}">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- categories --}}
            <li class="{{ $navItem == 'categories' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/categories') }}">
                    <i class="ti-home"></i>
                    <span>Categories</span>
                </a>
            </li>
            {{-- services --}}
            <li class="{{ $navItem == 'services' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/services') }}">
                    <i class="ti-home"></i>
                    <span>Services</span>
                </a>
            </li>
            {{-- workers --}}
            <li class="{{ $navItem == 'workers' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/workers') }}">
                    <i class="ti-home"></i>
                    <span>Workers</span>
                </a>
            </li>
            {{-- locations --}}
            <li class="{{ $navItem == 'locations' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/locations') }}">
                    <i class="ti-home"></i>
                    <span>Locations</span>
                </a>
            </li>
            {{-- bookings --}}
            <li class="{{ $navItem == 'bookings' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/bookings') }}">
                    <i class="ti-home"></i>
                    <span>Bookings</span>
                </a>
            </li>
            {{-- products --}}
            <li class="{{ $navItem == 'products' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/products') }}">
                    <i class="ti-home"></i>
                    <span>Products</span>
                </a>
            </li>
            {{-- blogs --}}
            <li class="{{ $navItem == 'blogs' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/blogs') }}">
                    <i class="ti-home"></i>
                    <span>Blogs</span>
                </a>
            </li>
            {{-- referral --}}
            <li class="{{ $navItem == 'referrals' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/referrals') }}">
                    <i class="ti-home"></i>
                    <span>Referral</span>
                </a>
            </li>
            {{-- promotions --}}
            <li class="{{ $navItem == 'promotions' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/promotions') }}">
                    <i class="ti-home"></i>
                    <span>Promotions</span>
                </a>
            </li>
            {{-- faqs --}}
            <li class="{{ $navItem == 'faqs' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/faqs') }}">
                    <i class="ti-home"></i>
                    <span>Faqs</span>
                </a>
            </li>
            {{-- settings --}}
            <li class="{{ $navItem == 'settings' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/settings') }}">
                    <i class="ti-home"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
