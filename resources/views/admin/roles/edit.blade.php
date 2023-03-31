@extends('admin.aside.app')
@section('title')
    <title>ویرایش مقام</title>
@endsection
@section('content')
    <div class="content d-flex flex-center flex-column  col-12" id="kt_content">
        <form class="form col-12" id="kt_modal_new_target_form" action="{{route('admin.role.update',$role->id)}}"
              method="POST"
              enctype="multipart/form-data">
            <!--begin::Heading-->
            @csrf
            @method('PATCH')
            <div class="mb-13 text-center">
                <!--begin::Title-->
                <h1 class="mb-3">ویرایش مقام</h1>
                <!--end::Title-->
                <!--begin::Description-->
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group-->
            <div class="d-flex flex-row mb-8 col-6 fv-row">
                {{--                <!--begin::Label-->--}}
                {{--                <label class="d-flex align-items-center fs-6 fw-bold mb-4">--}}
                {{--                    <span class="required">نام مقاله</span>--}}
                {{--                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"--}}
                {{--                       title="پر کردن این فیلد اجباری است"></i>--}}
                {{--                </label>--}}
                {{--                <!--end::Label-->--}}
                <input type="text" class="form-control form-control-solid" placeholder="نام مقام"
                       name="name" value="{{$role->name}}"/>
            </div>
            <div class="d-flex flex-row mb-8 col-12 fv-row">
                @if(count($role->permissions) > 0 )
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="وظایف " name="permissions[]" multiple>
                        @foreach($permissions as $per)
                            <option value="{{ $per->id }}"
                                    @if($role->permissions->contains($per->id)) selected @endif >
                                {{ $per->name }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="وظایف " name="permissions[]" multiple>
                        @foreach($permissions as $permission)
                            <option
                                value="{{$permission->id}}" {{$role->$permission->id}}>{{$permission->name}}</option>
                        @endforeach
                    </select>
                @endif

                <div class="col-2 fv-row flex-row">
                </div>

                @if(count($role->users) == 0)
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="افراد " name="users[]" multiple>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                @else
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="افراد " name="users[]" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                    @if($role->users->contains($user->id)) selected @endif >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                @endif

            </div>
            <div class="d-flex flex-column mb-12">
                {{--                <label class="fs-6 fw-bold mb-2">--}}
                {{--                    <span class="required">متن مقاله</span>--}}
                {{--                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"--}}
                {{--                       title="پر کردن این فیلد اجباری است"></i>--}}
                {{--                </label>--}}
                {{--                </label>--}}
                <textarea class="form-control form-control-solid" rows="3" name="description"
                          placeholder="توضیحات مقام">{{$role->description}}</textarea>
            </div>
            <!--end::Input group-->
            <div class="text-center">
                <a href="{{route('admin.role.index')}}" class="btn btn-light me-3">منصرف شدن</a>
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">ویرایش مقاله</span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
    </div>
@endsection
