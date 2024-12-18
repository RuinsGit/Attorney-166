<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('back/assets/images/logo-eneraz.webp') }}" width="80" alt="">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->guard('admin')->user()->name }}</h4>
                <span class="text-muted">
                    <i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online
                </span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

               

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-application-cog"></i>
                        <span>Ana Səhifə</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                    <li>
                    <a href="{{ route('admin.header.edit') }}" class="waves-effect">
                        <i class="ri-settings-2-line"></i>
                                <span>Header</span>
                            </a>        
                        </li>

                        <li>
                    <a href="{{ route('admin.home-hero.index') }}" class="waves-effect">
                        <i class="ri-settings-2-line"></i>
                                <span>Home Hero</span>
                            </a>        
                        </li>

                    </ul>
                    <li>
                        <a href="{{ route('admin.translations.index') }}" class="waves-effect">
                            <i class="ri-translate"></i>
                            <span>Tərcümələr</span>
                        </a>
                    </li>




                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
