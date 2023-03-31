@extends('landing.layout.app')
@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                 style="background-image: {{public_path("admin_assets/media/svg/illustrations/landing.svg")}}">
                <!--begin::Header-->
                @include('landing.aside.header')
                <!--end::Header-->
                <!--begin::Landing hero-->
                @include('landing.aside.landing')
                <!--end::Curve bottom-->
            </div>
        </div>
        <!--end::Header Section-->
        @include('landing.aside.ListOfCourses')
        @include('landing.aside.Statistics')

        <x-landing.list-of-projects/>

        <x-landing.list-of-articles/>

        @include('aside.footer')
    </div>
@endsection

