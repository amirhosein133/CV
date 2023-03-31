<div class="row d-flex flex-wrap flex-stack mb-6">
    <!--begin::Title-->
    <h3 class="fw-bolder my-2 text-right">مقاله ها
        <span class="fs-6 text-gray-400 fw-bold ms-1">{{count($articles)}}</span>
    </h3>
    <div class="separator mb-4 col-10"></div>
    <!--end::Title-->
    @if(!isset($articles) )
        <h3>.....</h3>
    @else
        @foreach($articles as $item)
            <div class="col-md-6 col-xl-5">
                <!--begin::Card-->
                <a href="{{route('admin.article.show' , $item->slug)}}" class="card border-hover-primary">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--end::Card toolbar-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <div class="fs-3 fw-bolder text-dark text-right">{{$item->name}}</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7 text-right">{{substr($item->description , 0, 50).'.....'}}</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div
                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{jdate($item->created_at)}}</div>
                                <div class="fw-bold text-gray-400">تاریخ ایجاد</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{count($item->comments)}}</div>
                                <div class="fw-bold text-gray-400">تعداد نظرات</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                    </div>
                    <!--end:: Card body-->
                </a>
                <!--end::Card-->
            </div>
        @endforeach
    @endif
</div>
