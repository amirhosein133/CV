@extends('layout.app')
@section('style')
    class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
@endsection
@section('title')
    <title> مقاله ها</title>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form col-md-8" id="kt_modal_new_target_form" action="{{route('project.update' , $project)}}"
          method="POST" enctype="multipart/form-data">
        <!--begin::Heading-->
        @method('PATCH')
        @csrf
        <div class="mb-13 text-center">
            <!--begin::Title-->
            <h1 class="mb-3">تغییرات پروژه</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <!--end::Description-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="d-flex flex-row mb-8 col-12 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-4">
                <span class="required">نام پروژه</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                   title="پر کردن این فیلد اجباری است"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="نام مقاله"
                   name="name" value="{{$project->name}}"/>

        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-12">
            <label class="fs-6 fw-bold mb-2">
                <span class="required">متن مقاله</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                   title="پر کردن این فیلد اجباری است"></i>
            </label>
            </label>
            <textarea class="form-control form-control-solid" rows="3" name="description"
                      placeholder="description"> {{$project->description }}</textarea>
        </div>
        @foreach($media as $m)
            <div>
                <img src="{{asset($m->url)}}" width="100%">
            </div>
        @endforeach
        <div class="form-group">
            <div class="col-sm-6">
                <label for="files" class="control-label">تصویر پروژه</label>
                <input type="file" class="form-control" name="files[]" id="images"
                       placeholder="تصویر مقاله را وارد کنید" multiple>
            </div>
            <label class="required fs-6 fw-bold mb-2">دسته بندی</label>
            @if(count($project->categories)>0)
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                        data-placeholder="Select a Team Member" name="categories[]" multiple>
                    <option value="">Select user...</option>
                    @foreach($categories as $key => $category)
                        @foreach($project->categories as $key => $ar)
                            <option
                                value="{{$category->id}}" {{$ar->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    @endforeach
                </select>
            @else
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                        data-placeholder="Select a Team Member" name="categories[]" multiple>
                    <option value="">Select user...</option>
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            @endif

            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
                <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">منصرف شدن</button>
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">تغییر مقاله</span>
                    <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>

        </div> <!--end::Actions-->
    </form>
    <!--end:Form-->
@endsection
