@extends('authentication.layout.app')
@section('title')
    <title>اعتبارسنجی</title>
@endsection
@section('content')
    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="/loginPostValid">
            @csrf
            <!--begin::Heading-->
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">وارد شوید</h1>
                <!--begin::Input group-->
                <div class="col-xl-12">
                    <label class="form-label fw-bolder text-dark fs-6">رمز اعتبارسنجی</label>
                    <input class="form-control form-control-lg form-control-solid" type="text"
                           placeholder="لطفا رمز فرستاده شده را وارد کنید"
                           name="token" autocomplete="off"/>
                    <input type="hidden" name="validation" value="on">
                </div>
                <!--end::Col-->
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary">
                    <span class="indicator-label">تایید</span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection
