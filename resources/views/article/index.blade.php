@extends('layout.app')
@section('title')
    <title> مقاله ها</title>
@endsection
@section('content')
    <div class="content d-flex flex-center flex-column  col-12" id="kt_content">
        <div class="card mb-5 mb-xl-8 col-12 shadow rounded" style="background-color: whitesmoke">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">مقاله ها </span>
                    {{--                <span class="text-muted mt-1 fw-bold fs-7">Over 500 new products</span>--}}
                </h3>
                <form action="{{route('article.index')}}">
                    <input type="text" class="form-control form-control-lg form-control-solid text-dark border-dark " name="search"
                           placeholder="عبارت مورد نظر را وارد کنید">
                </form>
            </div>
            <!--end::Header-->
            <div class="mb-17">

                <div class="separator separator-dashed mb-9"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-10">
                    @foreach($articles as $item)
                        <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Feature post-->
                            <div class="card-xl-stretch me-md-6">
                                <!--begin::Image-->
                                <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5"
                                   data-fslightbox="lightbox-video-tutorials" href="{{route('article.show' , $item->slug)}}">
                                    @if(count($item->medias) >0)
                                            <div id="slides" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{$item->medias[0]->url}}" class="d-block w-100">
                                                    </div>
                                                    @foreach($item->medias as $media)
                                                    <div class="carousel-item">
                                                        <img src="{{$media->url}}" class="d-block w-100">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-next" type="button" data-bs-target="#slides" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                    @else
                                        <img src="{{url('admin_assets/media/misc/outdoor.png')}}" class="img-fluid"
                                             alt="">
                                    @endif

                                </a>
                                <!--end::Image-->
                                <!--begin::Body-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <a href="{{route('article.show' , $item->slug)}}"
                                       class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->name}}</a>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div
                                        class="fw-bold fs-5 text-gray-600 text-dark my-4">{{substr($item->description , 0, 20).'.....'}}</div>
                                    <!--end::Text-->
                                    <!--begin::Content-->
                                    <div class="fs-6 fw-bolder">
                                        <!--begin::Author-->
                                        <a href="{{route('article.show',$item->slug)}}"
                                           class="text-gray-700 text-hover-primary">{{$item->user->name}}</a>
                                        <!--end::Author-->
                                        <!--begin::Date-->
                                        <span class="text-muted">{{jdate($item->created_at)}}</span>
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
        </div>
    </div>
@endsection
