<div class="flex-lg-row-fluid me-0 me-lg-20 col-10">
    <!--begin::Form-->
    <form action="{{route('create.comment')}}" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post"
          id="kt_careers_form">
        @csrf
        <input type="hidden" name="parent_id" value="0">
        <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
        <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
        <!--begin::Input group-->
        <div class=" d-flex flex-column mb-8">
        <textarea class="form-control form-control-solid" rows="4" name="body"
                  placeholder="متن کامنت"></textarea>
</div>
<!--end::Input group-->
<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->
<!--begin::Submit-->
<button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
    <!--begin::Indicator-->
    <span class="indicator-label">ثبت کامنت</span>
</button>
<!--end::Submit-->
<div></div>
</form>
<!--end::Form-->
</div>
