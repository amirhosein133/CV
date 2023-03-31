<!--begin::Footer Section-->
<div class="mb-0">
    <!--begin::Curve top-->
    <div class="landing-curve landing-dark-color">
        <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                fill="currentColor"></path>
        </svg>
    </div>
    <!--end::Curve top-->
    <!--begin::Wrapper-->
    <div class="landing-dark-bg pt-20">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row py-10 py-lg-20">
                <!--begin::Col-->
                <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                    <!--begin::Navs-->
                    <div class="d-flex justify-content-center">
                        <!--begin::Links-->
                        <div class="d-flex fw-bold flex-column me-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bolder text-gray-400 mb-6">لینک های مفید</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="https://keenthemes.com/faqs"
                               class="text-white opacity-50 text-hover-primary fs-5 mb-6">درباره ما </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="../../demo1/dist/documentation/getting-started.html"
                               class="text-white opacity-50 text-hover-primary fs-5 mb-6">پروژه ها </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://www.youtube.com/c/KeenThemesTuts/videos"
                               class="text-white opacity-50 text-hover-primary fs-5 mb-6">دوره های اموزشی</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="../../demo1/dist/documentation/getting-started/changelog.html"
                               class="text-white opacity-50 text-hover-primary fs-5 mb-6">دسته بندی ها </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://devs.keenthemes.com/"
                               class="text-white opacity-50 text-hover-primary fs-5 mb-6">ارتباط با ما </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://keenthemes.com/blog"
                               class="text-white opacity-50 text-hover-primary fs-5">مقالات</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                        <!--begin::Links-->
                        <div class="d-flex fw-bold flex-column ms-lg-20">
                            <!--begin::Subtitle-->
                            <h4 class="fw-bolder text-gray-400 mb-6">راه های ارتباطی بیشتر</h4>
                            <!--end::Subtitle-->
                            <!--begin::Link-->
                            <a href="https://www.facebook.com/keenthemes" class="mb-6">
                                <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-2"
                                     alt=""/>
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://github.com/KeenthemesHub" class="mb-6">
                                <img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2" alt=""/>
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://twitter.com/keenthemes" class="mb-6">
                                <img src="assets/media/svg/brand-logos/twitter.svg" class="h-20px me-2" alt=""/>
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://dribbble.com/keenthemes" class="mb-6">
                                <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="h-20px me-2"
                                     alt=""/>
                                <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                            </a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a href="https://www.instagram.com/keenthemes" class="mb-6">
                                <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2"
                                     alt=""/>
                                <span
                                    class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Navs-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                   <div class="col-md-6 pe-lg-10">
                        <!--begin::Form-->
                        <form action="{{route('connection')}}" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_contact_form">
                            @csrf
                            <h1 class="fw-bolder text-white mb-9">ارتباط با ما </h1>
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2 text-white">نام و نام خانوادگی</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="name">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-bold mb-2 text-white">ایمیل</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="email">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2 text-white">موضوع</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="subject">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
                                <label class="fs-6 fw-bold mb-2 text-white">متن پیام</label>
                                <textarea class="form-control form-control-solid" rows="6" name="message" placeholder=""></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Submit-->
                            <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                <!--begin::Indicator-->
                                <span class="indicator-label">ارسال نظر</span>
                                <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator-->
                            </button>
                            <!--end::Submit-->
                            <div></div></form>
                        <!--end::Form-->
                    </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        <!--begin::Separator-->
        <div class="landing-dark-separator"></div>
        <!--end::Separator-->
        <!--begin::Container-->
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                <!--begin::Copyright-->
                <div class="d-flex align-items-center order-2 order-md-1">
                    <!--begin::Logo-->
                    <a href="../../demo1/dist/landing.html">
                        <img alt="Logo" src="assets/media/logos/logo-landing.svg" class="h-15px h-md-20px"/>
                    </a>
                    <!--end::Logo image-->
                    <!--begin::Logo image-->
                    <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="https://keenthemes.com">کليه حقوق محصولات و محتوای اين سایت متعلق به راکت می باشد و هر گونه کپی برداری از محتوا و محصولات سایت غیر مجاز و بدون رضایت ماست</span>
                    <!--end::Logo image-->
                </div>
                <!--end::Copyright-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Footer Section-->
