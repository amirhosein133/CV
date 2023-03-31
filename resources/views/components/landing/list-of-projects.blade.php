<!--begin::Projects Section-->
<div class="mb-lg-n15 position-relative z-index-2">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
            <!--begin::Card body-->
            <div class="card-body p-lg-20">
                <!--begin::Heading-->
                <div class="text-center mb-5 mb-lg-10">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-5" id="portfolio"
                        data-kt-scroll-offset="{default: 100, lg: 150}">پروژه های انجام شده</h3>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Tabs wrapper-->
                <div class="d-flex flex-center mb-5 mb-lg-15">
                    <!--begin::Tabs-->
                    <ul class="nav border-transparent flex-center fs-5 fw-bold">

                        @foreach($categories as $category)
                            @if(count($category->projects) > 0)
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 {{$category->name == 'تکنولوژی' ? 'active' : ''}}"
                                       href="#"
                                       data-bs-toggle="tab"
                                       data-bs-target="#kt_landing_projects_{{$category->id}}">{{$category->name}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!--end::Tabs-->
                </div>
                <!--end::Tabs wrapper-->
                <!--begin::Tabs content-->
                <div class="tab-content">
                    @foreach($categories as $key => $category)
                        @if(count($category->projects) > 0)
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show {{$category->name == 'تکنولوژی' ? 'active' : ''}}"
                                 id="kt_landing_projects_{{$category->id}}">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <!--begin::Item-->
                                    @foreach($category->projects as $project)
                                        @if($project->secret == 0)
                                            @foreach($project->medias as $media)
                                                <div class="col-lg-6">
                                                    @php
                                                        $url = explode("/" , $media->url);
                                                    @endphp
                                                    <a class="d-block card-rounded overlay h-lg-100"
                                                       data-fslightbox="lightbox-projects"
                                                       href="{{url($url[0].'/'.$url[1].'/' . $url[2].'/' . $url[3].'/' . $url[4] ."/300_".$url[5])}}">
                                                        <!--begin::Image-->
                                                        <div
                                                            class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-600px"
                                                            style="background-image:url('{{$url[0].'/'.$url[1].'/' . $url[2].'/' . $url[3].'/' . $url[4] ."/300_".$url[5]}}')"></div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-lg-12">
                                                <strong>به زودی میرسد</strong>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!--end::Item-->

                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                        @endif
                    @endforeach
                </div>
                <!--end::Tabs content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Projects Section-->
