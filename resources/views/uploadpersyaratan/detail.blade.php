@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <!--begin::Form-->
                        {{-- <form id="kt_docs_formvalidation_text" class="form" action="" autocomplete="off"
                            method="POST"> --}}
                        {{-- @csrf --}}
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->nama_perusahaan }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Direktur</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->nama_direktur }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Media</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->nama_media }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Jenis Media</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->jenis_media }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Jenis Media</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->url_media }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Klasifikasi Media</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->klasifikasi_media }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Domisili Media</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->domisili_media }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Jurnalis</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->nama_jurnalis }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Email Jurnalis</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->email_jurnalis }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nomor Kontak Jurnalis</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <input type="text" value="{{ $perusahaan->nomor_kontak_jurnalis }}"
                                class="form-control form-control-solid mb-3 mb-lg-0" readonly>

                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        @foreach ($upload as $data)
                            {{-- {{ dd($data) }} --}}
                            <div class="fv-row mb-10 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-0 me-5">{{ $data->nama_dokumen }}</label>
                                <!--end::Label-->
                                <button type="button" class="btn btn-primary"
                                    onclick='liatberkas("{{ $data->file }}", "{{ $data->nama_dokumen }}", "{{ $data->kode }}")'>
                                    Lihat berkas
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1">
                                                    <span class="path1"></span><span class="path2"></span>
                                                </i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            <iframe id="iframedok" src="{{ route('pdf-viewer', ['file' => $data->file]) }}"
                                                width="100%" height="600"></iframe>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div id="actionButtons" class="d-none d-flex gap-2">
                            <form action="{{ route('verifikasi.verify', $perusahaan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success"
                                    onclick="handleAction('accepted')">Diterima</button>
                            </form>
                            <form action="{{ route('verifikasi.reject', $perusahaan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="handleAction('rejected')">Ditolak</button>
                            </form>
                        </div>



                        <script>
                            const totalDocuments = {{ count($upload) }};
                            let viewedDocuments = 0;
                            // function simpan() {
                            //     Swal.fire({
                            //         title: "Berhasil",
                            //         text: "Berhasil menambah data",
                            //         icon: "success"
                            //     });
                            // }

                            function liatberkas(file, nama_dokumen, kode) {
                                $("#kt_modal_1").modal('show')
                                var path = `{{ Storage::disk('public')->url('${kode}/${file}') }}`
                                var url = `{{ url('pdf-viewer') }}?file=${path}`
                                console.log(path);
                                $("#iframedok").attr("src", url)

                                viewedDocuments++;
                                if (viewedDocuments === totalDocuments) {
                                    document.getElementById('actionButtons').classList.remove('d-none');
                                }
                            }

                            function handleAction(action) {
                                if (action === 'accepted') {
                                    //handle acepted action
                                    Swal.fire({
                                        title: "Diterima",
                                        text: "Data telah diterima",
                                        icon: "success"
                                    });
                                } else if (action === 'rejected') {
                                    //handle rejected action
                                    Swal.fire({
                                        title: "Ditolak",
                                        text: "Data telah ditolak",
                                        icon: "error"
                                    });
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
