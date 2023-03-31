@extends('layout.app')

@section('title')
    <title>ثبت درخواست ها</title>
@endsection

@section('content')
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
         data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0 text-right">ایجاد درخواست برای ادمین</h3>
        </div>
        <!--end::Card title-->
    </div>
    <form action="{{route('connectionPost')}}" method="POST">
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
                                   placeholder="نام کاربری" value="{{$user->name}}" disabled>
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
                    <span class="required">موضوع ارتباط</span>
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" name="subject" class="form-control form-control-lg form-control-solid"
                           placeholder="موضوع ارتباط">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">
                    <span class="required">نوع پیام</span>
                </label>
                <!--end::Label-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <select name="type" aria-label="Select a Country" data-control="select2" data-placeholder="نوع پیام را انتخاب کنید" class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible" data-select2-id="select2-data-10-8qh9" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-12-g3m4">نوع پیام را انتخاب کنید</option>
                        <option  value="{{\App\Models\BaseModel::TYPE_ARTICLE}}">درخواست مقاله</option>
                        <option  value="{{\App\Models\BaseModel::TYPE_PROJECT}}">درخواست پروژه</option>
                        <option  value="{{\App\Models\BaseModel::TYPE_CONNECTION}}">درخواست همکاری</option>
                    </select>
                </div>
                <!--begin::Col-->
                <!--end::Input group-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">
                    <span class="required">متن پیام</span>
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" name="message" class="form-control form-control-lg form-control-solid"
                           placeholder="پیام شما......">
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
