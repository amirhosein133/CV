@if(count($favorites) == 0)
    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6 text-right">
        <!--begin::Icon-->
        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
															<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
															<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
														</svg>
													</span>
        <!--end::Svg Icon-->
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-grow-1">
            <!--begin::Content-->
            <div class="fw-bold">
                <h4 class="text-gray-900 fw-bolder">شما هیچ علاقه مندی ندارید</h4>
                <div class="fs-6 text-gray-700">یه فکری به حال خودت بکن از یه چیزی خوشت بیاد</div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
@else
    @include('dashboard.favorite-articles' , ['articles' => $articles])
    <div class="separator mb-4 col-10"></div>
    @include('dashboard.favorite-projects' , ['projects' => $projects])
    <div class="separator mb-4 col-10"></div>
@include('dashboard.favorite-comments' , ['comments' => $comments])
@endif
