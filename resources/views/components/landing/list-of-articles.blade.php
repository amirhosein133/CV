<!--begin::Testimonials Section-->
<div class="mt-20 mb-n20 position-relative z-index-2">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Heading-->
        <div class="text-center mb-17">
            <!--begin::Title-->
            <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">اخرین مقاله ها</h3>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="fs-5 text-muted fw-bold">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </div>
            <!--end::Description-->
        </div>
        <!--end::Heading-->
        <!--begin::Row-->
        <div class="row g-lg-10 mb-10 mb-lg-20">
            @foreach($articles as $article)
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div
                        class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Rating-->
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <!--end::Rating-->
                            <!--begin::Title-->
                            <div class="fs-2 fw-bolder text-dark mb-3">{{$article->name}}

                            </div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-bold fs-4">{{$article->description}}
                            </div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{url('admin_assets/media/svg/avatars/001-boy.svg')}}" class="" alt=""/>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$article->user->name}}</a>
                                <span class="text-muted d-block fw-bold">..</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
            @endforeach

        </div>
        <!--end::Row-->
        <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
            <!--begin::Content-->
            <div class="my-2 me-5">
                <!--begin::Title-->
                <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2 text-right">لورم ایپسوم
                    <span class="fw-normal"></span></div>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">چاپگرها و متون بلکه روزنامه و مجله درنامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</div>
                <!--end::Description-->
            </div>
            <!--end::Content-->
            <!--begin::Link-->
            <a href="{{route('login')}}" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">ایجاد تجربه جدید </a>
            <!--end::Link-->
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Testimonials Section-->
