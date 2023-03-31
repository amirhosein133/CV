@foreach($comments as $comment)
        <div class="card mb-5 mb-xxl-8 col-10 text-right ">
            <!--begin::Body-->

            <div class="card-body pb-0">
                <!--begin::Header-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::User-->
                    <div class="d-flex align-items-center flex-grow-1">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5">
                            <img src="assets/media/avatars/300-23.jpg" alt="">
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <a href="#"
                               class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{$comment->user->name}}</a>
                            <span
                                class="text-gray-400 fw-bold">{{\Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A, %d %B %y')}}</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Header-->
                <!--begin::Post-->
                <div class="mb-5">
                    <!--begin::Text-->
                    <p class="text-gray-800 fw-normal mb-5">{{$comment->body}}</p>
                    <!--end::Text-->
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center mb-5">
                        <form action="{{route('favorite')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" name="model_id">
                            <input type="hidden" value="{{get_class($comment)}}" name="model_type">
                            @php
                                $check =\App\Http\Controllers\Blog\HomeController::chackFavorite($comment , auth()->id());
                            @endphp
                            <button type="submit"
                                    class="btn btn-sm btn-light {{$check == true ? 'btn-danger ' : 'btn-active-light-danger'}} px-4 py-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path
                                                                    d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                                                    fill="currentColor"></path>
															</svg>
														</span>
                                <!--end::Svg Icon-->{{count($comment->favorites)}}
                            </button>
                        </form>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Post-->
                <!--begin::Separator-->
                <div class="separator mb-4"></div>
                <!--end::Separator-->
                <!--begin::Reply input-->
                @include('comment.replayComment' , ['comment' => $comment , 'subject' => $article ])
            </div>
            <!--end::Body-->
            @include('comment.comment' , ['comments'=>$comment->ParentComment($comment)])
        </div>
    <!--end::Post content-->
@endforeach
