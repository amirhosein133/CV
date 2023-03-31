@extends('admin.aside.app')
@section('title')
    <title>نمایش مقام</title>
@endsection
@section('content')
    <div class="content d-flex flex-center flex-column  col-12" dir="ltr" id="kt_content">
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto mb-10">
                <!--begin::Card-->
                <div class="card card-flush" style="margin-right: 150px">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="mb-0">{{$role->name}}</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column text-gray-600">
                            @foreach($role->permissions as $per)
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{$per->name}}
                                </div>
                            @endforeach
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer pt-0">
                        <form action="{{route('admin.role.destroy' , $role->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-active-danger"> حذف مقام
                            </button>
                        </form>

                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
                <!--begin::Modal-->
                <!--end::Modal-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-10">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header pt-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="d-flex align-items-center">افراد دارنده این مقام
                                <span class="text-gray-600 fs-6 ms-1">({{count($role->users)}})</span></h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Table-->
                        <div id="kt_roles_view_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer col-12">
                            <div class="table-responsive">
                                <table class="table table-row-dashed fs-6 gy-5 dataTable no-footer"
                                       id="kt_roles_view_table" dir="rtl">
                                    <!--begin::Table head-->
                                    <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_roles_view_table"
                                            rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                            style="width: 267.906px;">نام کاربر
                                        </th>
                                        <th class="min-w-150px sorting text-center"
                                            style="width: 267.906px;">شماره همراه
                                        </th>

                                    </tr>
                                    <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    @foreach($role->users as $user)

                                        <tr class="odd">
                                            <!--begin::User=-->
                                            <td class="d-flex align-items-center">
                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <a href="#"
                                                       class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                                                    <span>{{$user->email ?? '---'}}</span>
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                            <!--end::user=-->
                                            <td class="text-center">
                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <a href="#"
                                                       class="text-gray-800 text-hover-primary mb-1">{{$user->mobile}}</a>
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                        </tr>

                                    @endforeach
                                        </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
    </div>

@endsection











