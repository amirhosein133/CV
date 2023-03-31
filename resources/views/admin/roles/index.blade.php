@extends('admin.aside.app')
@section('title')
    <title>مقام ها</title>
@endsection
@section('content')
    <div class="content d-flex flex-center flex-column  col-12" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">


                @foreach($roles as $role)
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Card-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{$role->name}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-1">
                                <!--begin::Users-->
                                <div class="fw-bolder text-gray-600 mb-5">{{$role->description}}</div>
                                <!--end::Users-->
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">
                                    @foreach($permissions as $permission)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>{{$permission->name}}
                                        </div>
                                    @endforeach
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer flex-wrap pt-0">
                                <a href="{{route('admin.role.show' , $role->id)}}"
                                   class="btn btn-light btn-active-primary my-1 me-2">نمایش مقام</a>
                                <a href="{{route('admin.role.edit' , $role->id)}}"
                                   class="btn btn-light btn-active-light-primary my-1">ویرایش مقام</a>
                            </div>
                            <!--end::Card footer-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                @endforeach
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                <!--begin::Illustration-->
                                <img src="assets/media/illustrations/sketchy-1/4.png" alt=""
                                     class="mw-100 mh-150px mb-7">
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bolder fs-3 text-gray-600 text-hover-primary"><a href="{{route('admin.role.create')}}">نقش جدید</a></div>
                                <!--end::Label-->
                            </button>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Add new card-->
            </div>
            <!--end::Row-->
            <!--begin::Modals-->

            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
@endsection
