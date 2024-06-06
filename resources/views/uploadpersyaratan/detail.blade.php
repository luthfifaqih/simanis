@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <!--begin::Form-->
                        <form id="kt_docs_formvalidation_text" class="form" action="" autocomplete="off"
                            method="POST">
                            @csrf
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="nama_perusahaan" value="{{ $upload->nama_perusahaan }}"
                                    class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Akta Pendirian</label>
                                <!--end::Label-->
                                <a href="{{ route('pdf.viewer', ['id' => $upload->id, 'type' => 'akta_pendirian']) }}"
                                    target="_blank">
                                    <button type="button" class="btn btn-primary">Lihat berkas</button>
                                </a>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            {{-- <button id="kt_docs_formvalidation_text_submit" type="submit" class="btn btn-primary"
                                onclick="simpan()">
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
                            </a> --}}
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <script>
                            function simpan() {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Berhasil menambah data",
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
