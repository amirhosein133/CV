<!--begin::Header-->
<div id="kt_header" style="padding-top: 30px;" class="header align-items-stretch ">
    <!--begin::Container-->
    <div class="container d-flex align-items-stretch justify-content-center">
        <div class="d-flex align-items-stretch justify-content-between ">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-center" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="end"
                     data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                     data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <!--who build this house???-->
                    {{--                    ostay banaa--}}
                    <div
                        class="menu menu-lg-rounded menu-column menu-lg-row  menu-title-gray-700  menu-arrow-gray-400  fw-bold my-5 my-lg-0 align-items-stretch "
                        id="#kt_header_menu" data-kt-menu="true">
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item here show menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3 {{request()->is('admin/article', 'admin/article/*') ? ' btn-primary text-white ' : '' }}">
													<span class="menu-title">مقاله ها</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menurounded-0 py-lg-4 w-lg-200px">
                                <div class="menu-item">
                                    <a class="menu-link py-3 " href="{{route('admin.article.index')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                        <span class="menu-title">تمام مقاله ها </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item here show menu-lg-down-accordion me-lg-1" >
												<span class="menu-link py-3  {{request()->is('admin/project', 'admin/project/*') ? ' btn-primary text-white ' : '' }}">
													<span class="menu-title">پروژه ها</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menurounded-0 py-lg-4 w-lg-200px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{route('admin.project.index')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                        <span class="menu-title">تمام پروژه ها </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1  " >
												<span class="menu-link py-3 {{request()->is('/', '/') ? ' btn-primary ' : '' }}">
													<span class="menu-title ">داشبورد</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menurounded-0 py-lg-4 w-lg-200px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{route('home')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                        <span class="menu-title">داشبورد من </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3 {{request()->is('admin/course', 'admin/course/*') ? ' btn-primary text-white ' : '' }}">
													<span class="menu-title  ">دوره ها</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menurounded-0 py-lg-4 w-lg-200px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{route('admin.courses')}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                        <span class="menu-title">تمام دوره ها </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-1 {{request()->is('admin/user', 'admin/user/*') ? ' btn-primary text-white ' : '' }}">
                                                     <a class="menu-link py-3" href="{{route('admin.user.index')}}">
                                                         <span class="menu-title">کاربران</span></a>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                        </div>

                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                             class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3 {{request()->is('admin/connection', 'admin/connection/*') ? ' btn-primary text-white ' : '' }}">
													<span class="menu-title">ارتباطات</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menurounded-0 py-lg-4 w-lg-200px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{route('admin.connections.index' , auth()->id())}}">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
                                        <span class="menu-title">تمام ارتباطات</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->

<div id="kt_toolbar_container" class=" shadow rounded container container-fluid"
     style="background-color: lightgrey; width: 90%;">
    <!--begin::Page title-->
    <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0 ">
        <!--begin::Title-->
        @if(count($breadcrumb) > 0)
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                @foreach($breadcrumb as $item)
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">{{$item}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                @endforeach
            </ul>
        @else
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1" style="padding: 10px;">{{$title}}
                <!--begin::Separator-->
                <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                <!--end::Separator-->
            </h1>
        @endif
        <!--end::Title-->
    </div>
    <!--end::Page title-->
</div>






