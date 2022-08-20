<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url($setting->logo) }}" class="rounded-circle" width="35" height="35" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ $setting->merchant }}</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Main</li>
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-pie-chart-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Data Management</li>
        <li>
            <a href="{{ route('categories.index') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-store"></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
        </li>
        <li>
            <a href="{{ route('schedules.index') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-calendar-check"></i>
                </div>
                <div class="menu-title">Schedule</div>
            </a>
        </li>
        <li class="menu-label">Setting</li>
        <li>
            <a href="{{ route('settings.index') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-sync"></i>
                </div>
                <div class="menu-title">General</div>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.index') }}">
                <div class="font-22">
                    <i class="fadeIn animated bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        <li class="menu-label">Session</li>
        <li>
            <form action="{{ route('logout') }}" method="post" class="d-inline" id="logoutForm">
                @csrf
                <a href="#" onclick="$('#logoutForm').submit()">
                    <div class="font-22">
                        <i class="fadeIn animated bx bx-log-out-circle"></i>
                    </div>
                    <div class="menu-title">Log Out</div>
                </a>
            </form>
        </li>
    </ul>
    <!--end navigation-->
</aside>
