@extends('admin.aside.app')
@section('title')
    <title>پنل ادمین</title>
@endsection
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <h3 class="fw-bolder my-2 text-right">کاربران
        </h3>
        <div class="separator mb-4 col-10"></div>
      @include('admin.panel.usersInformation' , ['users' => $users])
        <!--end::Row-->
        <br>  <br>  <br>
        <h3 class="fw-bolder my-2 text-right">درخواست ها
        </h3>
        <div class="separator mb-4 col-10"></div>

      @include('admin.panel.connection' , ['connections' => $connections])
        <br>  <br>  <br>
        <h3 class="fw-bolder my-2 text-right">کامنت ها </h3>
        <div class="separator mb-4 col-10"></div>

     @include('admin.panel.comment' , ['comments' => $comments])



    </div>
@endsection
