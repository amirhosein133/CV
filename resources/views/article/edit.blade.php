@extends('layout.app')
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
    <div class="content d-flex flex-center flex-column  col-12 shadow rounded" id="kt_content"
         style="background-color: #f8f8f8">
        <form class="form col-md-12" id="kt_modal_new_target_form" action="{{route('article.update' , $article->slug)}}"
              method="POST"   enctype="multipart/form-data">
            <!--begin::Heading-->
            @method('PATCH')
            @csrf
            <div class="mb-13 text-center">
                <!--begin::Title-->
                <h1 class="mb-3">ویرایش مقاله</h1>
                <!--end::Title-->
                <!--begin::Description-->
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group-->
            <div class="d-flex flex-row mb-8 col-12 fv-row">
{{--                <!--begin::Label-->--}}
{{--                <label class="d-flex align-items-center fs-6 fw-bold mb-4">--}}
{{--                    <span class="required">نام مقاله</span>--}}
{{--                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"--}}
{{--                       title="پر کردن این فیلد اجباری است"></i>--}}
{{--                </label>--}}
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" placeholder="نام مقاله"
                       name="name" value="{{$article->name}}"/>
                <div class="col-2 fv-row flex-row">
                </div>
{{--                <label class="required fs-6 fw-bold mb-2">دسته بندی</label>--}}
                @if(count($article->categories)>0)
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="دسته بندی" name="categories[]" multiple>
                        @foreach($categoriess as $key => $category)
                            @foreach($article->categories as $key => $ar)
                                <option
                                    value="{{$category->id}}" {{$ar->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                @else
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                            data-placeholder="دسته بندی" name="categories[]" multiple>
                        @foreach($categoriess as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-12">
{{--                <label class="fs-6 fw-bold mb-2">--}}
{{--                    <span class="required">متن مقاله</span>--}}
{{--                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"--}}
{{--                       title="پر کردن این فیلد اجباری است"></i>--}}
{{--                </label>--}}
{{--                </label>--}}
                <textarea class="form-control form-control-solid" rows="3" name="description"
                          placeholder="توضیحات"> {{$article->description }}</textarea>
            </div>
            <div class="d-flex flex-row col-4">
                @foreach($article->medias as $media)
                    <img src="{{$media->url}}" class="img-fluid img-thumbnail" alt="">
                @endforeach
            </div>
            <div class="d-flex flex-column mb-12">
                {{--                <label for="" class="fs-6 fw-bolder mb-2">آپلود تصویر مقاله</label>--}}
                <input type="file" class="form-control" name="files[]" id="images"
                       placeholder="تصویر مقاله را وارد کنید" multiple>
            </div>
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
            <!--end::Actions-->
        </form>
    </div>
    <!--end:Form-->
@endsection
