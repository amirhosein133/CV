@extends('admin.aside.app')

@section('title')
    <title>پروژه</title>
@endsection

@section('content')
    <div class="card-body p-lg-17">
        <!--begin::Hero-->
        @if(count($project->medias) > 0 )
            <div class="position-relative mb-17">
                <!--begin::Overlay-->

                <div class="overlay overlay-show">
                    <!--begin::Image-->

                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-500px"
                         style="background-image: url('{{ asset($project->medias[0]->url)}}')">
                    </div>
                    <!--end::Image-->
                    <!--begin::layer-->
                    <div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
                    <!--end::layer-->
                </div>

                <!--end::Overlay-->
                <!--begin::Heading-->
                <div class="position-absolute text-white mb-8 ms-10 bottom-0">
                    <!--begin::Title-->
                    <h3 class="text-white fs-2qx fw-bolder mb-3 m">{{$project->name}}</h3>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
            </div>
        @endif
        <!--end::-->
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row mb-17">
            <!--begin::Sidebar-->
            <div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-350px">
                <!--begin::Careers about-->
                <div class="card bg-light">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="mb-7">
                            <!--begin::Title-->
                            <h2 class="fs-1 text-gray-800 w-bolder mb-6 text-right">توضیحات</h2>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <p class="fw-bold fs-6 text-gray-600 text-right">{{$project->description}}</p>
                            <!--end::Text-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Item-->
                        <div class="mb-8">
                            <!--begin::Title-->
                            <h4 class="text-gray-700 w-bolder mb-0 text-right">اطلاعات سازنده</h4>
                            <!--end::Title-->
                            <!--begin::Section-->
                            <div class="my-2">
                                <!--begin::Row-->
                                <div class="d-flex align-items-center mb-3">
                                    <!--begin::Bullet-->
                                    <span class="bullet me-3"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="text-gray-600 fw-bold fs-6">نام سازنده : {{$project->user->name}}</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="d-flex align-items-center mb-3">
                                    <!--begin::Bullet-->
                                    <span class="bullet me-3"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="text-gray-600 fw-bold fs-6">شماره همراه نویسنده
                                        : {{$project->user->mobile}}</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="d-flex align-items-center mb-3">
                                    <!--begin::Bullet-->
                                    <span class="bullet me-3"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="text-gray-600 fw-bold fs-6">ایمیل نویسنده
                                        : {{$project->user->email}}</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-8">
                            <!--begin::Title-->
                            <h4 class="text-gray-700 w-bolder mb-0 text-right">اطلاعات پروژه</h4>
                            <!--end::Title-->
                            <!--begin::Section-->
                            <div class="my-2">
                                <!--begin::Row-->
                                <div class="m-0">
                                    <!--begin::Heading-->
                                    <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed"
                                         data-bs-toggle="collapse" data-bs-target="#kt_job_1_3" aria-expanded="false">
                                        <!--begin::Icon-->
                                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                            <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20"
                                                                              height="20" rx="5"
                                                                              fill="currentColor"></rect>
																		<rect x="6.0104" y="10.9247" width="12"
                                                                              height="2" rx="1"
                                                                              fill="currentColor"></rect>
																	</svg>
																</span>
                                            <!--end::Svg Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                            <span class="svg-icon toggle-off svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" x="2" y="2" width="20"
                                                                              height="20" rx="5"
                                                                              fill="currentColor"></rect>
																		<rect x="10.8891" y="17.8033" width="12"
                                                                              height="2" rx="1"
                                                                              transform="rotate(-90 10.8891 17.8033)"
                                                                              fill="currentColor"></rect>
																		<rect x="6.01041" y="10.9247" width="12"
                                                                              height="2" rx="1"
                                                                              fill="currentColor"></rect>
																	</svg>
																</span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">دسته بندی پروژه</h4>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    @if(count($project->categories) > 0 )
                                        <!--begin::Body-->
                                        <div id="kt_job_1_3" class="fs-6 ms-1 collapse" style="">
                                            @foreach($project->categories as $category)
                                                <!--begin::Item-->
                                                <div class="mb-4">
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center ps-10 mb-n1">
                                                        <!--begin::Bullet-->
                                                        <span class="bullet me-3"></span>
                                                        <!--end::Bullet-->
                                                        <!--begin::Label-->
                                                        <div
                                                            class="text-gray-600 fw-bold fs-6">{{$category->name}}</div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Item-->
                                            @endforeach

                                        </div>
                                        <!--end::Content-->
                                    @else
                                        <div id="kt_job_1_3" class="fs-6 ms-1 collapse" style="">
                                            <div class="mb-4">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center ps-10 mb-n1">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet me-3"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <div
                                                        class="text-gray-600 fw-bold fs-6">هیچ دسته بندی ندارد</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            </div>
                                                @endif


                                                <div class="d-flex align-items-center mb-3">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet me-3"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Label-->
                                                    <div class="text-gray-600 fw-bold fs-6">تعداد لایک های
                                                        پروژه: {{count($project->favorites)}}</div>
                                                    <!--end::Label-->
                                                </div>
                                                <div class="separator separator-dashed"></div>

                                                <h4 class="text-gray-700 w-bolder mb-0 text-right">عملیات حذف</h4>


                                                <form action="{{route('admin.project.destroy' , $project)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>

                                            </div>
                                            <!--end::Sidebar-->
                                        </div>
                                        <!--end::Layout-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
