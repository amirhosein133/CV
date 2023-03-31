@extends('layout.app')
@section('title')
    <title> پروژه ها </title>
@endsection
@section('content')
    <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
        <!--begin::Section-->
        <div class="px-md-10 pt-md-10 pb-md-5">
            <!--begin::Block-->
            <div class="text-center mb-20">
                <h1 class="fs-2tx fw-bolder mb-8">لیست تمامیه پروژه ها </h1>
            </div>
            <!--end::Block-->
            <div class="separator separator-dashed mb-9"></div>
            <!--begin::Row-->
            <div class="row g-10">
                @foreach($projects as $project)
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Feature post-->
                    <div class="card-xl-stretch me-md-6">
                        <!--begin::Image-->
                        @if(count($project->medias) > 0)
                            @foreach($project->medias as $media)
                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5"  data-fslightbox="lightbox-video-tutorials" href="{{$media->url}}">
                                <img src="{{$media->url}}" class="img-fluid img-thumbnail" alt="">
                            </a>
                            @endforeach
                        @else
                            <img src="{{url('admin_assets/media/misc/outdoor.png')}}" class="img-fluid"
                                 alt="">
                        @endif

                        <!--end::Image-->
                        <!--begin::Body-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <a href="{{route('project.show' , $project)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$project->name}}</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{$project->description}}</div>
                            <!--end::Text-->
                            <!--begin::Content-->
                            <div class="fs-6 fw-bolder">
                                <!--begin::Author-->
                                <a href="{{route('project.show' , $project)}}" class="text-gray-700 text-hover-primary">{{$project->user->name}}</a>
                                <!--end::Author-->
                                <!--begin::Date-->
                                <span class="text-muted">{{jdate($project->created_at)}}</span>
                                <!--end::Date-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feature post-->
                </div>
                <!--end::Col-->
                @endforeach
            </div>

            <!--end::Row-->
        </div>
        <!--end::Section-->
    </div>
@endsection
