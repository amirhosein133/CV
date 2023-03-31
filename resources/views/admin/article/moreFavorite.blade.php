@extends('admin.aside.app')

@section('title')
    <title>مقاله های کاربران</title>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8 text-right">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">بیشترین علاقه مندی ها</span>
                <span class="text-muted mt-1 fw-bold fs-7">تعداد مقاله ها : {{count($articles)}}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 min-w-200px rounded-start">نام مقاله</th>
                        <th class="min-w-200px">نام تنظیم کننده</th>
                        <th class="min-w-325px">توضیحات</th>
                        <th class="min-w-100px">تعداد کامنت</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if(count($article->medias) > 0 )
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{url($article->medias[0]->url)}}" class="" alt="">
                                </div>
                                @endif
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="{{route('admin.article.show' , $article->slug)}}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$article->name}}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('admin.article.show' , $article->slug)}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$article->user->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.article.show' , $article->slug)}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$article->description}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.article.show' , $article->slug)}}" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{count($article->comments)}}</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
