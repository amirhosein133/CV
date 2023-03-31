@extends('layout.app')
@section('title')
    <title>پروژه</title>
@endsection
@section('content')
    <div class="flex-lg-row-fluid me-xl-15">
        <!--begin::Post content-->
        <div class="mb-17">
            <!--begin::Wrapper-->
            <div class="mb-8">
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-6">
                    <!--begin::Item-->
                    <div class="me-9 my-1">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2"
                                                                              fill="currentColor"></rect>
																		<rect opacity="0.3" x="13" y="2" width="9"
                                                                              height="9" rx="2"
                                                                              fill="currentColor"></rect>
																		<rect opacity="0.3" x="13" y="13" width="9"
                                                                              height="9" rx="2"
                                                                              fill="currentColor"></rect>
																		<rect opacity="0.3" x="2" y="13" width="9"
                                                                              height="9" rx="2"
                                                                              fill="currentColor"></rect>
																	</svg>
																</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Label-->
                        <span
                            class="fw-bolder text-gray-400"> {{\Morilog\Jalali\Jalalian::forge($project->created_at)->format('%A, %d %B %y')}}</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="my-1">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                                              fill="currentColor"></path>
																		<path
                                                                            d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                                            fill="currentColor"></path>
																	</svg>
																</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Label-->
                        <span class="fw-bolder text-gray-400">{{count($project->comments)}} کامنت</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Info-->
                <!--begin::Title-->
                <a href="#" class="text-dark text-hover-primary fs-2 fw-bolder text-right">{{$project->name}}
                    <br>
                <!--end::Title-->
                <!--begin::Container-->
                @if(count($project->medias) > 0 )
                    <div class="overlay mt-8">
                        <!--begin::Image-->
                        <div class="bgi-no-repeat text-center bgi-size-cover card-rounded  row-cols-3 col-12">
                            <img src="{{url($project->medias[0]->url)}}" alt="" width="100%" class="col-4">
                        </div>
                        <!--end::Image-->
                    </div>
                @endif
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Description-->
            <div class="fs-5 fw-bold text-gray-600">
                <!--begin::Text-->
                <p class="mb-8 text-right">{{$project->description}}</p>
                <!--end::Text-->
            </div>
            <!--end::Description-->
            <div class="d-flex align-items-center mb-5">
                <form action="{{route('favorite')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$project->id}}" name="model_id">
                    <input type="hidden" value="{{get_class($project)}}" name="model_type">
                    @php
                        $check =\App\Http\Controllers\Blog\HomeController::chackFavorite($project , auth()->id());
                    @endphp
                    <button type="submit"
                            class="btn btn-sm btn-light {{$check ? 'btn-danger ' : 'btn-active-light-danger'}} px-4 py-2">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg--><span
                            class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none"><path
                                    d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                    fill="currentColor"></path></svg></span>
                        <!--end::Svg Icon-->{{count($project->favorites)}}</button>
                </form>
            </div><!--begin::Block-->
            <div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-10 mb-14 col-10">
                <!--begin::Section-->
                <div class="text-center flex-shrink-0 me-7 me-lg-13"><!--begin::Avatar-->
                    <div class="symbol symbol-70px symbol-circle mb-2"><img src="assets/media/avatars/300-2.jpg"
                                                                            class="" alt=""></div><!--end::Avatar-->
                    <!--begin::Info-->
                    <div class="mb-0"><a href=""
                                         class="text-gray-700 fw-bolder text-hover-primary">{{$project->user->name}}</a>@foreach($project->user->roles as $role)
                            <span class="text-gray-400 fs-7 fw-bold d-block mt-1">{{$role->name}}</span>
                        @endforeach</div><!--end::Info--></div>
                <!--end::Section-->
                <!--begin::Text-->
                <div class="mb-0 fs-8">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>در صورت علاقه مندی به همکاری میتوانید اینجا کلیک کنید</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ایجاد همکاری</h5>
                            <a href="{{route('connection')}}" class="btn btn-primary">هماهنگی</a>
                        </div>
                    </div>
                </div>
                <!--end::Text-->
            </div>
            <!--end::Block-->
        </div>
        <div><h4 class="text-gray-900 text-hover-primary fs-6 fw-bolder text-right">کامنت ها </h4></div>
        <!--begin::Separator-->
        <div class="separator mb-4 col-10"></div>
        <!--end::Separator-->
        @include('comment.comment' , [ 'comments' =>$comment->ManageComment($project) ,'project' => $project]);
        @include('comment.create' , ['subject' => $project])
    </div>
@endsection
