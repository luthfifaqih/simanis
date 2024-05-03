<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.8
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>SIMANIS</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('frontend/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('frontend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-white position-relative">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(frontend/assets/media/svg/illustrations/landing.svg)">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="{{ url('/') }}">
                                    <img alt="Logo" src="{{ asset('frontend/assets/media/logos/logo.png') }}"
                                        class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo" src="{{ asset('frontend/assets/media/logos/logo.png') }}"
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pengumuman"
                                                data-kt-scroll-toggle="true"
                                                data-kt-drawer-dismiss="true">Pengumuman</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#tentangkami"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang
                                                Kami</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#kontak"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kontak</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->
                            <div class="flex-equal text-end ms-1">
                                <a href="{{ route('login') }}" class="btn btn-success">Masuk Aplikasi</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <!--begin::Heading-->
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <!--begin::Title-->
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-2">
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">SIMANIS</span>
                            </span>
                        </h1>
                        <h1 class="text-white lh-base fw-bold fs-1x fs-lg-2x">
                            Sistem Manajemen Kemitraan Perusahaan Pers
                        </h1>

                        <img src="https://diskominfokarawang.github.io/assetapp/bupati/a_2_compres.png"
                            class="img-fluid" style="max-height: 350px;" alt="bupati_logo">
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Landing hero-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
        <!--end::Header Section-->

        <!--begin::How It Works Section-->
        <div class="mb-10 mb-lg-20 z-index-2" style="margin-top:0px;">
            <div class="container" style="max-width:850px">
                <!--begin::Card-->
                <div class="card" id="pengumuman" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <!--begin::Card body-->
                    <div class="card-body p-lg-20 card shadow mw-100">
                        <!--begin::Heading-->
                        <div class="text-center mb-5 mb-lg-10">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-primary fw-bold">Pengumuman</h3>
                            <div class="separator separator-dotted separator-content border-primary my-5">
                                <i class="bi bi-patch-exclamation text-primary fs-2"></i>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Row 1-->
                        <div class="row mb-5">
                            <!-- Pengumuman 1 -->
                            <div class="col-lg-4">
                                <div class="text-center mb-3">
                                    <h4 class="fs-3 text-dark mb-3">Judul Pengumuman 1</h4>
                                    <p class="text-gray-700">Isi pengumuman yang relevan dan informatif untuk
                                        Pengumuman 1.</p>
                                </div>
                            </div>
                            <!-- Pengumuman 2 -->
                            <div class="col-lg-4">
                                <div class="text-center mb-3">
                                    <h4 class="fs-3 text-dark mb-3">Judul Pengumuman 2</h4>
                                    <p class="text-gray-700">Isi pengumuman yang relevan dan informatif untuk
                                        Pengumuman 2.</p>
                                </div>
                            </div>
                            <!-- Pengumuman 3 -->
                            <div class="col-lg-4">
                                <div class="text-center mb-3">
                                    <h4 class="fs-3 text-dark mb-3">Judul Pengumuman 3</h4>
                                    <p class="text-gray-700">Isi pengumuman yang relevan dan informatif untuk
                                        Pengumuman 3.</p>
                                </div>
                            </div>
                        </div>
                        <!--end::Row 1-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <div class="container" id="tentangkami">
                    <!--begin::Heading-->
                    <div class="text-center mb-6 mt-12">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-dark mb-5 mt-12" data-kt-scroll-offset="{default: 100, lg: 150}">
                            Tentang Kami</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Row-->
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-lg-4 text-center mb-4 mb-lg-0">
                            <img src="{{ asset('frontend/assets/media/logos/logo.png') }}" alt="Logo"
                                class="img-fluid">
                        </div>
                        <!-- Text Isi Konten -->
                        <div class="col-lg-8">
                            <p style="text-align: justify;">
                                Sistem Manajemen Kemitraan Perusahaan Pers (SIMANIS) merupakan sebuah aplikasi berbasis
                                digital untuk mempermudah bidang informasi dan komunikasi publik di Diskominfo Karawang
                                dalam menjalankan
                                monitoring media di Kabupaten Karawang. Aplikasi ini digunakan untuk penertiban
                                administrasi
                                kerjasama antara media dan pemerintah kabupaten Karawang yang dikoordinir oleh
                                Diskominfo
                                Karawang, juga menjadi alat filter dalam proses monitoring isu konten media terkait
                                pemberitaan di Kabupaten Karawang.
                            </p>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->

            </div>
        </div>

        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
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
        <div class="landing-dark-bg pt-5" id="kontak">

            <!--begin::Container-->
            <div class="container">
                <!--begin::Row-->
                <div class="row py-5 py-lg-5">
                    <!--begin::Col-->
                    <div class="col-md-8">
                        <!--begin::Block-->
                        <div class="rounded">
                            <!--begin::Text-->
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?q=Dinas+Komunikasi+dan+Informatika+Kab+Karawang,+Jalan+Jenderal+Ahmad+Yani,+Nagasari,+Karawang,+West+Java,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                                width="100%" height="350" style="border:0; border-radius: 8px;"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!--end::Text-->
                        </div>
                        <!--end::Block-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Navs-->
                        <div class="rounded">
                            <!--begin::Text-->
                            <h4 class="text-primary mb-5" id="clients">DINAS KOMUNIKASI DAN INFORMATIKA <br>
                                KABUPATEN
                                KARAWANG</h4>
                            <div class="position-relative ps-6 pe-3 py-2">
                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-info"></div>
                                <a href="#" class="mb-1 text-white text-hover-primary fw-bolder">Email</a>
                                <div class="fs-7 text-muted fw-bolder">diskominfo@karawangkab.go.id</div>
                            </div>
                            <div class="position-relative ps-6 pe-3 py-2 mt-2">
                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                <a href="#" class="mb-1 text-white text-hover-primary fw-bolder">Telephone</a>
                                <div class="fs-7 text-muted fw-bolder">(0267)8450633</div>
                            </div>
                            <div class="position-relative ps-6 pe-3 py-2 mt-2">
                                <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                <a href="#" class="mb-1 text-white text-hover-primary fw-bolder">Alamat</a>
                                <div class="fs-7 text-muted fw-bolder">Jl. Jenderal Ahmad Yani No.1, Nagasari, Kec.
                                    Karawang Bar., Karawang, Jawa Barat
                                    41314</div>
                            </div>

                            <!--end::Text-->
                        </div>
                        <!--end::Navs-->
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
                <div class="row py-7 py-lg-10">
                    <div class="col-12 col-md-3">
                        <div class="d-flex justify-content-center">
                            <a href="https://diskominfo.karawangkab.go.id/" class="mx-5">
                                <img alt="Logo" src="{{ asset('frontend/assets/media/logos/logo.png') }}"
                                    class="logo-default h-40px h-lg-40px" />
                            </a>
                            {{-- <a href="https://siriska.karawangkab.go.id">
                                <img alt="Logo" src="https://siriska.karawangkab.go.id/images/logo-bse.png"
                                    class="logo-default h-40px h-lg-40px" />
                            </a> --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="d-flex justify-content-start">
                            <span class="mx-5 fs-6 fw-semibold text-warning pt-5"
                                href="https://diskominfo.karawangkab.go.id/">&copy; 2024
                                Diskominfo Kabupaten Karawang.</span>
                        </div>
                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Footer Section-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('frontend/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('frontend/assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom/pages/pricing/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
