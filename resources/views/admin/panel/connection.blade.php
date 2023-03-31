<div class="row g-5 g-xl-8">
    <div class="card-body pt-5 text-right">
        <!--begin::Carousel-->
        <div id="kt_security_recent_alerts" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="2000">
            <!--begin::Heading-->
            <div class="d-flex flex-stack align-items-center flex-wrap">
                <h4 class="text-gray-700 fw-bold mb-0 pe-2">درخواست کاربران</h4>
                <!--begin::Carousel Indicators-->
                <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                    <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="0" class="ms-1"></li>
                    <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="1" class="ms-1"></li>
                    <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="2" class="ms-1 active" aria-current="true"></li>
                </ol>
                <!--end::Carousel Indicators-->
            </div>
            <!--end::Heading-->
            <!--begin::Carousel inner-->
            <div class="carousel-inner pt-6">
                @php
                    $count = 1;
                @endphp
                @foreach($connections as $connect)
                    <!--begin::Item-->
                    <div class="carousel-item {{$count == 1 ? 'active' : ''}} ">
                        <!--begin::Wrapper-->
                        <div class="carousel-wrapper">
                            <!--begin::Description-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#" class="fs-5 fw-bolder text-dark text-hover-primary">{{$connect->name}}</a>
                                <p class="text-gray-600 fs-6 fw-bold pt-3 mb-0">{{$connect->message}}</p>
                            </div>
                            <!--end::Description-->
                            <!--begin::Summary-->
                            <div class="d-flex flex-stack pt-8">
                                <span class="badge badge-light-primary fs-7 fw-bolder me-2">{{jdate($connect->created_at)}}</span>
                                <a href="#" class="btn btn-sm btn-light">رسیدگی</a>
                            </div>
                            <!--end::Summary-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    @php
                        $count++;
                    @endphp
                @endforeach
            </div>
            <!--end::Carousel inner-->
        </div>
        <!--end::Carousel-->
    </div>


</div>
