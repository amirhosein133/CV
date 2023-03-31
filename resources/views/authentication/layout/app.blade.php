<!DOCTYPE html>
<html lang="fa" dir="rtl" direction="rtl">
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
</head>
<body id="kt_body" class="bg-body">
@include('sweetalert::alert')
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div class="d-flex flex-column flex-root">
                <div class="mb-12"></div>
                <div class="mb-12"></div>
                <div class="mb-12"></div>
                <div class="mb-12"></div>
                <div class="mb-12"></div>
                <div class="mb-12"></div>
                <div
                    class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
                    style=" background-image : url('admin_assets/media/regester/14.png')">
                    @yield('content')
                    <!--end::Wrapper-->
                </div>
                <!--end::Authentication - Sign-up-->
            </div>
        </div>
    </div>
</div>
</body>
</html>
