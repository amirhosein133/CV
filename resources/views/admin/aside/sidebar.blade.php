<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside menu-->

    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
        <div class="aside-logo flex-column-auto" id="kt_aside_logo">
            <!--begin::Logo-->
            <a href="#">
                <img alt="Logo" src="{{url('admin_assets/media/logos/logo-landing.svg')}}" class="h-25px logo">
            </a>
            <!--end::Logo-->
            <!--begin::Aside toggler-->
            <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
								</svg>
							</span>
            <!--end::Aside toggler-->
        </div>

        <!--end::Svg Icon-->
    </div>
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">کاربران</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.user.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">تمامی کاربران</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.user.have.article')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">کاربران دارای مقاله</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-success fs-base p-0 ms-2 mb-2 collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_aside_menu_collapse" data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">بیشتر</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr082.svg-->
                                    <span class="svg-icon ms-2 svg-icon-3 rotate-180">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.5" d="M12.5657 9.63427L16.75 5.44995C17.1642 5.03574 17.8358 5.03574 18.25 5.44995C18.6642 5.86416 18.6642 6.53574 18.25 6.94995L12.7071 12.4928C12.3166 12.8834 11.6834 12.8834 11.2929 12.4928L5.75 6.94995C5.33579 6.53574 5.33579 5.86416 5.75 5.44995C6.16421 5.03574 6.83579 5.03574 7.25 5.44995L11.4343 9.63427C11.7467 9.94669 12.2533 9.94668 12.5657 9.63427Z" fill="currentColor" />
															<path d="M12.5657 15.6343L16.75 11.45C17.1642 11.0357 17.8358 11.0357 18.25 11.45C18.6642 11.8642 18.6642 12.5357 18.25 12.95L12.7071 18.4928C12.3166 18.8834 11.6834 18.8834 11.2929 18.4928L5.75 12.95C5.33579 12.5357 5.33579 11.8642 5.75 11.45C6.16421 11.0357 6.83579 11.0357 7.25 11.45L11.4343 15.6343C11.7467 15.9467 12.2533 15.9467 12.5657 15.6343Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">مقاله ها</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.article.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">تمامی مقاله ها</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.article.favotite')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">مقاله ها با بیشترین لایک</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.article.admin.create')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">مقاله های ایجاد شده توسط ادمین</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-success fs-base p-0 ms-2 mb-2 collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_aside_menu_collapse" data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">بیشتر</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr082.svg-->
                                    <span class="svg-icon ms-2 svg-icon-3 rotate-180">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.5" d="M12.5657 9.63427L16.75 5.44995C17.1642 5.03574 17.8358 5.03574 18.25 5.44995C18.6642 5.86416 18.6642 6.53574 18.25 6.94995L12.7071 12.4928C12.3166 12.8834 11.6834 12.8834 11.2929 12.4928L5.75 6.94995C5.33579 6.53574 5.33579 5.86416 5.75 5.44995C6.16421 5.03574 6.83579 5.03574 7.25 5.44995L11.4343 9.63427C11.7467 9.94669 12.2533 9.94668 12.5657 9.63427Z" fill="currentColor" />
															<path d="M12.5657 15.6343L16.75 11.45C17.1642 11.0357 17.8358 11.0357 18.25 11.45C18.6642 11.8642 18.6642 12.5357 18.25 12.95L12.7071 18.4928C12.3166 18.8834 11.6834 18.8834 11.2929 18.4928L5.75 12.95C5.33579 12.5357 5.33579 11.8642 5.75 11.45C6.16421 11.0357 6.83579 11.0357 7.25 11.45L11.4343 15.6343C11.7467 15.9467 12.2533 15.9467 12.5657 15.6343Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">پروژه ها</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.project.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">تمامی پروژه ها</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">پروژه های کاربران</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-success fs-base p-0 ms-2 mb-2 collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_aside_menu_collapse" data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">بیشتر</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr082.svg-->
                                    <span class="svg-icon ms-2 svg-icon-3 rotate-180">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.5" d="M12.5657 9.63427L16.75 5.44995C17.1642 5.03574 17.8358 5.03574 18.25 5.44995C18.6642 5.86416 18.6642 6.53574 18.25 6.94995L12.7071 12.4928C12.3166 12.8834 11.6834 12.8834 11.2929 12.4928L5.75 6.94995C5.33579 6.53574 5.33579 5.86416 5.75 5.44995C6.16421 5.03574 6.83579 5.03574 7.25 5.44995L11.4343 9.63427C11.7467 9.94669 12.2533 9.94668 12.5657 9.63427Z" fill="currentColor" />
															<path d="M12.5657 15.6343L16.75 11.45C17.1642 11.0357 17.8358 11.0357 18.25 11.45C18.6642 11.8642 18.6642 12.5357 18.25 12.95L12.7071 18.4928C12.3166 18.8834 11.6834 18.8834 11.2929 18.4928L5.75 12.95C5.33579 12.5357 5.33579 11.8642 5.75 11.45C6.16421 11.0357 6.83579 11.0357 7.25 11.45L11.4343 15.6343C11.7467 15.9467 12.2533 15.9467 12.5657 15.6343Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">دسترسی ها</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.role.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">مقام ها</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.permission.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">ماموریت ها</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.user.userhasrole')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">کاربران دارای مقام</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-success fs-base p-0 ms-2 mb-2 collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_aside_menu_collapse" data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">بیشتر</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr082.svg-->
                                    <span class="svg-icon ms-2 svg-icon-3 rotate-180">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.5" d="M12.5657 9.63427L16.75 5.44995C17.1642 5.03574 17.8358 5.03574 18.25 5.44995C18.6642 5.86416 18.6642 6.53574 18.25 6.94995L12.7071 12.4928C12.3166 12.8834 11.6834 12.8834 11.2929 12.4928L5.75 6.94995C5.33579 6.53574 5.33579 5.86416 5.75 5.44995C6.16421 5.03574 6.83579 5.03574 7.25 5.44995L11.4343 9.63427C11.7467 9.94669 12.2533 9.94668 12.5657 9.63427Z" fill="currentColor" />
															<path d="M12.5657 15.6343L16.75 11.45C17.1642 11.0357 17.8358 11.0357 18.25 11.45C18.6642 11.8642 18.6642 12.5357 18.25 12.95L12.7071 18.4928C12.3166 18.8834 11.6834 18.8834 11.2929 18.4928L5.75 12.95C5.33579 12.5357 5.33579 11.8642 5.75 11.45C6.16421 11.0357 6.83579 11.0357 7.25 11.45L11.4343 15.6343C11.7467 15.9467 12.2533 15.9467 12.5657 15.6343Z" fill="currentColor" />
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">کامنت ها </span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.comment.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">لیست تمام کامنت ها </span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.comment.list')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">تایید کامنت ها</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">ارتباطات</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.connections.index',['type' => 'all'])}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">تمامی ارتباط ها</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.connections.index' , ['type'=>'article'])}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">ارتباطات مربوط به مقاله</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.connections.index',['type'=>'project'])}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">ارتباطات مربوط به پروژه</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.connections.index' , ['type' => 'connection'])}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">ارتباطات مربوط به همکاری</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">دوره ها</span>
										<span class="menu-arrow"></span>
									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                    </div>
                </div>


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>
<!--end::Aside-->
