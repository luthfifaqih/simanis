@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <!--begin::Form-->
                        <form id="kt_docs_formvalidation_text" class="form" action="{{ url('users', $user->id) }}"
                            autocomplete="off" method="POST">
                            @csrf
                            @method('PUT')
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Masukan Nama" value="{{ $user->name }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="Masukan Email" value="{{ $user->email }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group--->
                            <div class="fv-row mb-10">
                                <label class="required form-label fs-6 mb-2">Password</label>

                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="Masukan Password" name="password" autocomplete="off" />
                            </div>
                            <!--end::Input group--->

                            <!--begin::Input group--->
                            <div class="fv-row mb-10">
                                <label class="required form-label fs-6 mb-2">Konfirmasi Password</label>

                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="Masukan Password" name="password_confirm" autocomplete="off" />
                            </div>
                            <!--end::Input group--->

                            <!--begin::Actions-->
                            <button id="kt_docs_formvalidation_text_submit" type="submit" class="btn btn-primary"
                                onclick="edit()">
                                <span class="indicator-label">
                                    Simpan
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Actions-->
                            <!--begin::Actions-->
                            <a href="{{ url('users') }}" id="kt_docs_formvalidation_text_submit" type="submit"
                                class="btn btn-danger">
                                <span class="indicator-label">
                                    Batal
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </a>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <script>
                            function edit() {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Berhasil mengubah data",
                                    icon: "success"
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
