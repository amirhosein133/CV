<!DOCTYPE html>
<html lang="fa" dir="rtl">
<!--begin::Head-->
<head>
    <base href="../../../">
    @yield('title')
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" href="admin_assets/media/regester/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/admin_assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <link href="/admin_assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css"/>
    <link href="/admin_assets/css/fonts.css" rel="stylesheet" type="text/css"/>
    <link href="/admin_assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<!--end::Head-->
<body id="kt_body"
      class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
@include('sweetalert::alert')
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        @include('admin.aside.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('admin.aside.header' , ['breadcrumb' => Request::segments() , 'title' => 'صفحه داشبورد'])
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div class="container" id="vue-app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('js')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="/admin_assets/plugins/global/plugins.bundle.js"></script>
<script src="/admin_assets/js/scripts.bundle.js"></script>
<script src="/admin_assets/js/widgets.bundle.js"></script>
<script src="/admin_assets/js/proajax_admin.js"></script>
<script src="/admin_assets/js/validation.js"></script>
<script src="/js/app.js"></script>
<script src="/admin_assets/js/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    jQuery(document).ready(function () {
        console.log(window.location.hostname);
        window.Echo.private('test-event.1')
            .listen('TestEvent', function (e) {
                console.log(e);
            });

        const showLoading = function () {
            swal("لطفا منتظر بمانید...", {
                closeOnClickOutside: false,
                closeOnEsc: false,
                buttons: {
                    cancel: false,
                    confirm: false,
                },
            });
        };

        $(".table").on("click", ".sa-warning", function (e) {
            e.preventDefault();
            f = $(this).closest('form');
            Swal.fire({
                title: "آیا از حذف این مورد اطمینان دارید؟",
                text: "با حذف این مورد دیگر امکان بازگشت وجود ندارد.",
                icon: "question",
                showDenyButton: true,
                confirmButtonText: 'حذف کن',
                denyButtonText: `انصراف`,
            }).then((result) => {
                if (result.isConfirmed) {
                    f.submit();
                } else {
                    Swal.fire('عملیات حذف لغو شد.')
                }
            });
        });

        $(document).on("click", ".openDialog", function () {
            Swal.fire(
                $(this).data('title'),
                $(this).data('content'),
                $(this).data('type') ?? null
            )
        });

        $("#form").submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            var err_Input = $(this).find('input[aria-invalid=true]');
            if (!$(this)[0].checkValidity() || err_Input.length > 0) {
                Swal.fire("اخطار", 'لطفا به دقت فرم مد نظر را پر کنید', 'error');
                return false;
            }
            $(this)[0].submit();
            showLoading();
            return true;
        });

        !function (window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);


        try {
            var input = document.querySelector('input[id=tagify]');
            new Tagify(input);
        } catch (e) {
        }

    });
</script>
</body>
<!--begin::Body-->
</html>
