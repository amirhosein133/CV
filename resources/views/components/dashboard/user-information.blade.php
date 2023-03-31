<div class="card-header cursor-pointer">
    <!--begin::Card title-->
    <div class="card-title m-0">
        <h3 class="fw-bolder m-0">اطلاعات هویتی </h3>
    </div>
    <!--end::Card title-->
    <!--begin::Action-->
    <a href="{{route('updateProfile' , $user)}}" class="btn btn-primary align-self-center">تغییر پروفایل</a>
    <!--end::Action-->
</div>

<div class="card-body p-9">
    <!--begin::Row-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">نام کاربری</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-gray-800">{{$user->name ?? '-------'}}</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">ایمیل</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <span class="fw-bold text-gray-800 fs-6">{{$user->email ?? '----'}}</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">شماره موبایل
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
               data-bs-original-title="شماره موبایل باید فعال باشد"
               aria-label="شماره موبایل باید فعال باشد"></i></label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <span class="fw-bolder fs-6 text-gray-800 me-2">{{$user->mobile ?? '--------'}}</span>
            <span class="badge badge-success">فعال</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
{{--    <!--begin::Input group-->--}}
{{--    <div class="row mb-7">--}}
{{--        <!--begin::Label-->--}}
{{--        <label class="col-lg-4 fw-bold text-muted">پسورد</label>--}}
{{--        <!--end::Label-->--}}
{{--        <!--begin::Col-->--}}
{{--        <div class="col-lg-8">--}}
{{--            <a href="#" class="fw-bold fs-6 text-gray-800 text-hover-primary">{{$user->password}}</a>--}}
{{--        </div>--}}
{{--        <!--end::Col-->--}}
{{--    </div>--}}
{{--    <!--end::Input group-->--}}
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">بیوگرافی
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <span class="fw-bolder fs-6 text-gray-800">{{$user->extra_attributes['bio'] ?? '------'}}</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">مقام</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            @if(isset($user->roles))
                @foreach($user->roles as $role)
                    <span class="fw-bolder fs-6 text-gray-800">{{$role->name}} - </span>
                @endforeach
            @else
                <span class="fw-bolder fs-6 text-gray-800">------- </span>
            @endif
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>

