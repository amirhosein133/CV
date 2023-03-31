@extends('authentication.layout.app')
@section('title')
    <title>ثبت نام</title>
@endsection
@section('content')
    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $key => $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="/RegisterValid">
            @csrf
            <!--begin::Heading-->
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">حساب خود را ایجاد کنید</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">قبلا حسابی داشتی ؟
                    <a href="{{route('login')}}"
                       class="link-primary fw-bolder">ورود</a></div>
                {{-- {{route('login')}}--}}
                <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6">نام کاربری</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                           name="name" autocomplete="off"/>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6">
                    <label class="form-label fw-bolder text-dark fs-6">شماره تلفن </label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                           name="mobile" autocomplete="off"/>
                </div>
                <div class="col-xl-12">
                    <label class="form-label fw-bolder text-dark fs-6">ایمیل(اختیاری)</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                           name="email" autocomplete="off"/>
                </div>
                <div>
                    <input type="hidden" name="validation" value="off">
                </div>
                <!--end::Col-->
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary">
                    <span class="indicator-label">ثبت نام</span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection
