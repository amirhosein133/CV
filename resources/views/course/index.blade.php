@extends('layout.app')
@section('title')
    <title>دوره ها</title>
@endsection
@section('content')

    <div class="d-flex flex-column flex-center p-10 p-lg-20">
        <!--begin::Coming soon-->
        <div class="d-flex flex-column flex-center">
            <!--begin::Title-->
            <h3 class="fw-bolder fs-2qx text-dark m-0 pb-10">به زودی اضافه میشود</h3>
            <!--end::Title-->
            <!--begin::Counter-->
            <div class="d-flex text-center mb-10 mb-lg-15">
                <div class="w-65px rounded-3 bg-body shadow-sm py-4 px-5 mx-3">
                    <div class="fs-2 fw-bolder text-gray-800" id="kt_coming_soon_counter_days">15</div>
                    <div class="fs-7 fw-bold text-muted">روز</div>
                </div>
                <div class="w-65px rounded-3 bg-body shadow-sm py-4 px-5 mx-3">
                    <div class="fs-2 fw-bolder text-gray-800" id="kt_coming_soon_counter_hours">10</div>
                    <div class="fs-7 text-muted">ساعت</div>
                </div>
                <div class="w-65px rounded-3 bg-body shadow-sm py-4 px-5 mx-3">
                    <div class="fs-2 fw-bolder text-gray-800" id="kt_coming_soon_counter_minutes">14</div>
                    <div class="fs-7 text-muted">دقیقه</div>
                </div>
                <div class="w-65px rounded-3 bg-body shadow-sm py-4 px-5 mx-3">
                    <div class="fs-2 fw-bolder text-gray-800" id="kt_coming_soon_counter_seconds">41</div>
                    <div class="fs-7 text-muted">ثانیه</div>
                </div>
            </div>
            <!--end::Counter-->
            <!--begin::Description-->
            <div class="fw-bolder fs-2 text-muted mb-5">اماده شد حتما خبرت میکنم</div>
            <!--end::Description-->
        </div>
        <!--end::Coming soon-->
    </div>
@endsection
