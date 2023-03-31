@extends('admin.aside.app')

@section('title')
    <title>کاربران</title>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8 text-right">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">کاربران دارای مقاله</span>
                <span class="text-muted mt-1 fw-bold fs-7">تعداد کاربرها : {{count($users)}}</span>
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
                        <th class="ps-4 min-w-200px rounded-start">نام کاربر</th>
                        <th class="min-w-200px">شماره همراه کاربر</th>
                        <th class="min-w-200px">تعداد مقاله ها</th>
                        <th class="min-w-100px">ایمیل</th>
                        <th class="min-w-100px">نقش کاربر در سیستم</th>

                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="{{route('admin.user.show' , $user->id)}}"
                                       class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$user->name}}</a>
                                </div>
            </div>
            </td>
            <td>
                <a href="" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$user->mobile}}</a>
            </td>
            <td>
                <a href="" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{count($user->articles)}}</a>
            </td>
            <td>
                <a href="{{route('admin.user.show' , $user->id)}}"
                   class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$user->email ?? '---'}}</a>
            </td>
            <td>
                @if(count($user->roles) >0)
                    @foreach($user->roles as $role)
                        <span class="badge badge-light-warning fs-8 fw-bolder my-2">{{$role->name}}</span>-
                    @endforeach
                @else
                    <div class="timeline-content fw-mormal text-muted ps-3">بدون نقش</div>

                @endif
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
