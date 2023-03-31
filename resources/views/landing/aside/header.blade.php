<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-equal"></div>
            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                     data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                    <!--begin::Menu-->
                    <div
                        class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                        id="kt_landing_menu">
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">خانه</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">دوره های آموزشی</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">ارزیابی</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio" data-kt-scroll-toggle="true"
                               data-kt-drawer-dismiss="true">پروژه ها</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#clients"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">مقالات</a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Menu wrapper-->
            @auth()
                <div class="flex-equal text-end ms-1"></div>
            @endauth
            @guest()
                <!--begin::Toolbar-->
                <div class="flex-equal text-end ms-1">
                    <a href="{{route('login')}}" class="btn btn-success">ورود</a>
                </div>
                <!--end::Toolbar-->
            @endguest

        </div>
    </div>
</div>
