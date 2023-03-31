@extends('admin.aside.app')

@section('title')
    <title>کاربران</title>
@endsection

@section('content')
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="http://127.0.0.1:8000/admin_assets/media/svg/avatars/001-boy.svg" alt="image">
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <div class="col-lg-10 col-xxl-4">
                                <!--begin::Budget-->
                                <div class="card h-100">
                                    <div class="card-body ">
                                        <div class="fs-6 d-flex justify-content-between mb-4">
                                            <div class="fw-bold">نام و نام خانوادگی</div>
                                            <div class="d-flex fw-bolder">{{$user->name}}</div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-bold">شماره تلفن کاربر</div>
                                            <div class="d-flex fw-bolder">{{$user->mobile}}</div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between mt-4">
                                            <div class="fw-bold">ایمیل</div>
                                            <div class="d-flex fw-bolder">{{$user->email ?? '----'}}</div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_1_3" aria-expanded="false">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
																		<rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                <span class="svg-icon toggle-off svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
																		<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
																		<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <div class="fw-bold">مقام های کاربر</div>
                                            <!--end::Title-->
                                        </div>
                                        @if(count($user->roles) > 0)

                                            <div id="kt_job_1_3" class="fs-6 ms-1 collapse" style="">
                                                @foreach($user->roles as $role)
                                                    <!--begin::Item-->
                                                    <div class="mb-4">
                                                        <!--begin::Item-->
                                                        <div class="d-flex align-items-center ps-10 mb-n1">
                                                            <!--begin::Bullet-->
                                                            <span class="bullet me-3"></span>
                                                            <!--end::Bullet-->
                                                            <!--begin::Label-->
                                                            <div
                                                                class="text-gray-600 fw-bold fs-6">{{$role->name}}</div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Item-->
                                                @endforeach
                                                    @else
                                                        <div class="mb-4">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center ps-10 mb-n1">
                                                                <!--begin::Bullet-->
                                                                <span class="bullet me-3"></span>
                                                                <!--end::Bullet-->
                                                                <!--begin::Label-->
                                                                <div
                                                                    class="text-gray-700 fw-bold fs-6">این کاربر مقامی ندارد</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                @endif

                                            </div>
                                    </div>
                                    <!--end::Budget-->
                                </div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <div class="separator mb-4 col-10"></div>
        <x-admin.user.user-articles :user="$user"></x-admin.user.user-articles>
        <div class="separator mb-4 col-10"></div>
        <x-admin.user.user-projects :user="$user"></x-admin.user.user-projects>
        <div class="separator mb-4 col-10"></div>
        <div class="row-md-6 row-lg-6 row-xl-6 row-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 7-->
            <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <h5 class="fw-bolder my-2 text-right">تعداد کامنت های ثبت شده کاربر:
                            <span class="fs-6 text-gray-700 fw-bold ms-1">{{count($user->comments)}}</span>
                        </h5>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <div class="row-md-6 row-lg-6 row-xl-6 row-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 7-->
            <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <h5 class="fw-bolder my-2 text-right">تعداد علاقه مندی های کاربر:
                            <span class="fs-6 text-gray-700 fw-bold ms-1">{{count($user->favorites)}}</span>
                        </h5>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>

@endsection
