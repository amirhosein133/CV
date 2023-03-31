@extends('admin.aside.app')
@section('title')
    <title>کامنت ها </title>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">کامنت ها </span>
                {{--                <span class="text-muted mt-1 fw-bold fs-7">Over 500 new products</span>--}}
            </h3>
            <form action="{{route('admin.comment.index')}}">
                <input type="text" class="form-control form-control-lg form-control-solid" name="search"
                       placeholder="عبارت مورد نظر را وارد کنید">
            </form>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-10 gy-4">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="border-0">
                        <th class="p-0 min-w-100px "></th>
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-200px"></th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    @foreach($comments as $comment)
                        <tbody>
                        <tr>
                            <td class="text-end text-right">
                                <a href="#"
                                   class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$comment->user->name}}</a>
                            </td>
                            <td class="text-muted fw-bold text-end text-right">{{$comment->body}}</td>
                            <td class="text-muted fw-bold text-end ">
                                @if($comment->approved == 1)
                                    <span class="badge badge-light-success fs-8 fw-bolder my-2">تایید شده</span>
                                @else
                                    <span class="badge badge-light-danger fs-8 fw-bolder my-2">تایید نشده</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <form action="{{route('admin.comment.destroy' , $comment)}}"
                                      class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                            fill="currentColor"/>
																		<path opacity="0.5"
                                                                              d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                              fill="currentColor"/>
																		<path opacity="0.5"
                                                                              d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                              fill="currentColor"/>
																	</svg>
																</span>
                                    </button>
                                </form>
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->

                                <!--end::Svg Icon-->
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
