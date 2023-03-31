@extends('layout.app')

@section('style')
    class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
@endsection
@section('title')
    <title>ایجاد مقاله</title>
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
    <form class="form col-md-8" id="kt_modal_new_target_form" action="{{route('project.store')}}" method="POST"
          enctype="multipart/form-data">
        <!--begin::Heading-->
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">نام پروژه</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">توضیحات</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <label class="required fs-6 fw-bold mb-2">دسته بندی</label>
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                data-placeholder="Select a Team Member" name="categories[]" multiple>
            <option value="">Select user...</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="secret" value="1" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                شخصی
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="secret" value="0" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                معمولی
            </label>
        </div>
        <div class="form-group">
            <div class="col-sm-6">
                <label for="files" class="control-label">تصویر پروژه</label>
                <input type="file" class="form-control" name="files[]" id="images"
                       placeholder="تصویر مقاله را وارد کنید" multiple>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
    <!--end:Form-->
@endsection
@section('js')
    <script>

    </script>
    <script src="/ckeditor5-build-classic.ckeditor.js"></script>
    <script>
        CkEDITOR.replace('description', {
            filebrowseruploadurl: "/admin/panel/upload-image",
            fileimageuploadurl: "/admin/panel/upload-image"
        });
    </script>
@endsection

