<!--begin::Form-->
<form action="{{route('connection')}}" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework"
      method="post" id="kt_contact_form">
    @csrf
    <h1 class="fw-bolder text-dark mb-9 text-right">ارتباط با ما </h1>
    <!--begin::Input group-->
    <div class="row mb-5">
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="fs-5 fw-bold mb-2 text-dark text-right">نام و نام خانوادگی</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                   value="{{auth()->user()->name}}" disabled>
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class="fs-5 fw-bold mb-2 text-dark text-right">ایمیل</label>
            <!--end::Label-->
            <!--end::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="email">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-5 fv-row">
        <!--begin::Label-->
        <label class="fs-5 fw-bold mb-2 text-dark text-right">موضوع</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input class="form-control form-control-solid" placeholder="" name="subject">
        <!--end::Input-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-bold mb-2 text-dark text-right">متن پیام</label>
        <textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Submit-->
    <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
        <!--begin::Indicator-->
        <span class="indicator-label">ارسال نظر</span>
        <span class="indicator-progress">Please wait...
														<span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        <!--end::Indicator-->
    </button>
    <!--end::Submit-->
    <div></div>
</form>
<!--end::Form-->
