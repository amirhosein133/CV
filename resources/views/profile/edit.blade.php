@extends('layout.app')
@section('title')
    <title>پروفایل کاربر</title>
@endsection
@section('content')
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0 text-right">تغییرات کاربر</h3>
        </div>
        <!--end::Card title-->
    </div>
    <form action="{{route('updateProfilePost' , $user)}}" method="POST">
        @csrf

        <div class="card-body border-top p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">نام کاربری</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid"
                                   placeholder="نام کاربری" value="{{old($user->name , $user->name)}}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">ایمیل</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                           placeholder="ایمیل" value="{{old($user->email , $user->email)}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">
                    <span class="required">شماره تلفن</span>
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="tel" name="mobile" class="form-control form-control-lg form-control-solid"
                           placeholder="+989150001111" value="{{old($user->mobile , $user->mobile)}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
{{--            <!--begin::Input group-->--}}
{{--            <div class="row mb-6">--}}
{{--                <!--begin::Label-->--}}
{{--                <label class="col-lg-4 col-form-label fw-bold fs-6">پسورد--}}
{{--                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""--}}
{{--                   data-bs-original-title="برای خرید دوره های اموزشی نیاز است"--}}
{{--                   aria-label="برای خرید دوره های اموزشی نیاز است"></i></label>--}}
{{--                <!--end::Label-->--}}
{{--                <!--begin::Col-->--}}
{{--                <div class="col-lg-8 fv-row">--}}
{{--                    <input type="password" name="password" class="form-control form-control-lg form-control-solid"--}}
{{--                           placeholder="پسورد" value="{{$user->password}}">--}}
{{--                </div>--}}
{{--                <!--end::Col-->--}}
{{--            </div>--}}
{{--            <!--end::Input group-->--}}
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">
                    <span class="required">بیوگرافی</span>
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" name="bio" class="form-control form-control-lg form-control-solid"
                           placeholder="من ......" value="{{$user->extra_attributes['bio']}}">
                </div>
                <!--end::Input group-->
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a class="btn btn-light btn-active-light-primary me-2" href="{{route('home')}}">انصراف</a>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ثبت تغییرات</button>
            </div>
        </div>
    </form>

@endsection
