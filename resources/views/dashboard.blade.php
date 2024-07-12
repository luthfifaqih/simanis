@extends('master')

@section('dashboard')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                {{-- Card --}}
                <div class="card mb-8">
                    <div class="card-body shadow mw-100 pt-9 pb-0" style="border-radius: 5px">
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <div class="me-7 mb-4 d-flex align-items-center ">
                                <div
                                    class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative d-flex align-items-center ">
                                    <img src="https://ditensi-rd.baleprasutisingaperbangsa.com/assets/avatar/avatar.png"
                                        alt="Avatar" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="fw-light text-dark -900 text-hover-primary  fs-2 fw-bolder me-1">Hi,
                                                {{ Auth::user()->name }}
                                                <br><small class="fw-light">Selamat datang di Aplikasi </small>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-2">
                                            <label class="fs-5">Anda terdaftar pada aplikasi sebagai role : </label>
                                            <br />
                                            <span
                                                class="badge badge-light-primary border border-primary me-2 mb-3 fs-5">{{ Auth::user()->role }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Dashboard untuk kadis, verifikator, kadis dan super admin --}}
                @if (in_array(Auth::user()->role, ['verifikator', 'superadmin', 'kadis']))
                    <div class="d-flex flex-row">
                        <div class="card mb-8" style="max-width: max-content; margin-right: 20px;">
                            <div class="card-body shadow mw-100 pt-9 pb-0" style="border-radius: 6px">
                                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                    {!! $countstatus->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body shadow" style="border-radius: 6px">
                                    <i class="ki-solid ki-profile-user fs-3x text-primary"></i>
                                    <div class="text-gray-900 fs-2 mb-2 mt-5">
                                        <span class="fw-bold">{{ App\Models\User::where('role', 'pers')->count() }}</span>
                                        Pengguna
                                    </div>
                                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Total Pengguna</div>
                                    <div class="fw-semibold text-gray-400 mt-2">Sampai dengan hari ini</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                @endif
                {{-- Dashboard untuk kadis, verifikator, kadis dan super admin --}}
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <script src="{{ $countstatus->cdn() }}"></script>
    {{ $countstatus->script() }}
@endsection
