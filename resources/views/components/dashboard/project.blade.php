@if(count($projects) == 0)
    <div class="card text-center">
        <div class="text-center p-2">
            <h5> با نام شما پروژه ای به ثبت نرسیده</h5>
        </div>
        @if(auth()->user()->IsAdmin() || str_contains(auth()->user()->roles , 'Write-Project'))
            <div class="card-body">
                <a href="{{route('project.create')}}" class="btn btn-primary">ایجاد پروژه جدید</a>
            </div>
        @else
            <div class="card-body">
                <h5 class="card-title">ایجاد پروژه</h5>
                <p class="card-text">اگر علاقه به ایجاد پروژه در زمینه های مختلف دارید میتوانید به کلیک کردن دکمه اجازه
                    دسترسی را بگیرید.</p>
                <a href="{{route('connection')}}" class="btn btn-primary">اجازه دسترسی</a>
            </div>
        @endif
    </div>
@else
    <div class="row g-6 g-xl-9 ">
        @foreach($projects as $project)
            <!--begin::Col-->
            <div class="col-md-6 col-xl-5">
                <!--begin::Card-->
                <a href="{{route('project.show' , $project)}}" class="card border-hover-primary">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        <a href="#" class="btn btn-light  btn-active-light-primary" data-kt-menu-trigger="click"
                           data-kt-menu-placement="bottom-end" role="button">تغییرات
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon  svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="10" viewBox="0 0 24 24" fill="none">
																<path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor"></path>
															</svg>
														</span>
                            <!--end::Svg Icon--></a>
                        <!--begin::Menu-->
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true" style="">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('project.edit' , $project)}}" class="menu-link px-5 border-0">ویرایش</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <form action="{{route('project.destroy' , $project)}}" method="POST">
                                    <button type="submit" class="menu-link px-5 border-0  ">حذف</button>
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Card toolbar-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <div class="fs-3 fw-bolder text-dark text-right">{{$project->name}}</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7 text-right">{{substr($project->description , 0, 50).'.....'}}</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{jdate($project->created_at)}}</div>
                                <div class="fw-bold text-gray-400">تاریخ ایجاد</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{count($project->comments)}}</div>
                                <div class="fw-bold text-gray-400">تعداد نظرات</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        @if(count($project->favorites) > 0)
                            <!--begin::Progress-->
                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title=""
                                 data-bs-original-title="تعداد افراد علاقه مند به این پست">
                                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--end::Progress-->
                            <!--begin::Users-->
                            <div class="symbol-group symbol-hover">
                                @foreach($project->favorites as $favorite)
                                    @php
                                        $user = \App\Models\User::whereId($favorite->user_id)->first();
                                    @endphp

                                        <!--begin::User-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title=""
                                         data-bs-original-title="{{$user->name}}">
                                        <span
                                            class="symbol-label bg-primary text-inverse-primary fw-bolder">{{mb_substr($user->name, 0, 1)}}</span>
                                    </div>
                                    <!--begin::User-->

                                @endforeach
                                <!--end::Users-->
                            </div>
                        @endif

                    </div>
                    <!--end:: Card body-->
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        @endforeach
    </div>
@endif
