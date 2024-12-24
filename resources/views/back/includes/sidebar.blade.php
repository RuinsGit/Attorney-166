<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('back/assets/images/logo.png') }}" width="80" alt="">
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
                        <i class="ri-home-line"></i>
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

                        <li>
                    <a href="{{ route('admin.home-cart.index') }}" class="waves-effect">
                        <i class="ri-settings-2-line"></i>
                                <span>Home Cart</span>
                            </a>        
                        </li>

                        <li>
                    <a href="{{ route('admin.home-includes.index') }}" class="waves-effect">
                        <i class="ri-settings-2-line"></i>
                                <span>Home Includes</span>
                            </a>        
                        </li>

                    </ul>
                    <li>
                        <a href="{{ route('admin.translations.index') }}" class="waves-effect">
                            <i class="ri-translate"></i>
                            <span>Tərcümələr</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.social.index') }}" class="waves-effect">
                            <i class="ri-share-line"></i>
                            <span>Sosial Media</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-message-line"></i>
                            <span>Əlaqə</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                        <li>
                        <a href="{{ route('admin.comment.index') }}" class="waves-effect">
                            <i class="ri-message-line"></i>
                            <span>Yorumlar</span>
                        </a>
                    </li>
                    <li>
                    <a href="{{ route('admin.comment_chat.index') }}" class="waves-effect">
                        <i class="ri-message-line"></i>
                        <span>Yorumlar Müraciətləri</span>
                    </a>
                </li>

                    <li>
                        <a href="{{ route('admin.contact-message.index') }}" class="waves-effect">
                            <i class="ri-message-line"></i>
                            <span>Əlaqə müraciətləri</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.contact-messages-data.index') }}" class="waves-effect">
                            <i class="ri-message-line"></i>
                            <span>Əlaqə Data</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.subscribe.index') }}" class="waves-effect">
                            <i class="ri-message-line"></i>
                            <span>Abunəlik</span>
                        </a>
                    </li>




                        </ul>


                    </li>




                </li>

                <li>
                    <a href="{{ route('admin.services.index') }}" class="waves-effect">
                        <i class="ri-service-line"></i>
                        <span>Xidmətlər</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.about.index') }}" class="waves-effect">
                        <i class="ri-information-line"></i>
                        <span>Haqqımızda</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.courses.index') }}" class="waves-effect">
                        <i class="ri-book-line"></i>
                        <span>Təcrübələr</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.leaders.index') }}" class="waves-effect">
                        <i class="ri-user-line"></i>
                        <span>Komandamız</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-message-line"></i>
                        <span>Bloglar</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li>
                    <a href="{{ route('admin.blogs.index') }}" class="waves-effect">
                        <i class="ri-message-line"></i>
                        <span>Bloglar</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.blog_types.index') }}" class="waves-effect">
                        <i class="ri-message-line"></i>
                        <span>Blog Türləri</span>
                    </a>
                </li>
                    </ul>

                </li>

               

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
