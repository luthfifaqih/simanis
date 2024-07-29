@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('verifikasi.review') }}" class="btn btn-info me-5">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <!--begin::Form-->
                        <div class="separator separator-dotted separator-content border-dark my-10"><span
                                class="h6">Detail Identitas</span></div>
                        <!--begin::Input group-->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                                    <input type="text" value="{{ $perusahaan->nama_perusahaan }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Direktur</label>
                                    <input type="text" value="{{ $perusahaan->nama_direktur }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Media</label>
                                    <input type="text" value="{{ $perusahaan->nama_media }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Jenis Media</label>
                                    <input type="text" value="{{ $perusahaan->jenis_media }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Url Media</label>
                                    <input type="text" value="{{ $perusahaan->url_media }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Klasifikasi Media</label>
                                    <input type="text" value="{{ $perusahaan->klasifikasi_media }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Domisili Media</label>
                                    <input type="text" value="{{ $perusahaan->domisili_media }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Nama Jurnalis</label>
                                    <input type="text" value="{{ $perusahaan->nama_jurnalis }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Email Jurnalis</label>
                                    <input type="text" value="{{ $perusahaan->email_jurnalis }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="fv-row mb-10">
                                    <label class="required fw-semibold fs-6 mb-2">Nomor Kontak Jurnalis</label>
                                    <input type="text" value="{{ $perusahaan->nomor_kontak_jurnalis }}"
                                        class="form-control form-control-solid mb-3 mb-lg-0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dotted separator-content border-dark my-15"><span
                                class="h6">Berkas-berkas Persyaratan</span></div>
                        <!--end::Input group-->
                        <div class="row">
                            @foreach ($upload as $data)
                                <div class="col-lg-6 mb-5">
                                    <!--begin::Label-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label
                                                class="required fw-semibold fs-6 mb-0 me-2">{{ $data->nama_dokumen }}</label>
                                        </div>
                                        <div class="d-flex align-items-center col-lg-6">
                                            <button type="button" class="btn btn-primary me-2"
                                                onclick='liatberkas("{{ $data->file }}", "{{ $data->nama_dokumen }}", "{{ $data->kode }}")'>
                                                Lihat berkas
                                            </button>
                                        </div>
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
                                                    <iframe id="iframedok"
                                                        src="{{ route('pdf-viewer', ['file' => $data->file]) }}"
                                                        width="100%" height="600"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Reject Catatan-->
                                    <div class="modal fade" tabindex="-1" id="kt_modal_2">
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
                                                <form action="{{ route('verifikasi.reject', $perusahaan->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <textarea class="form-control" id="catatan_penolakan" name="catatan" rows="5" placeholder="Masukan catatan"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-dismiss="modal">Tutup</button>

                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="handleAction('rejected')">Ditolak</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <!--begin::Input group-->
                    <div id="actionButtons" class="d-none d-flex gap-2 mt-5">
                        <form action="{{ route('verifikasi.verify', $perusahaan->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success"
                                onclick="handleAction('accepted')">Diterima</button>
                        </form>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_2">Ditolak</button>
                    </div>

                    <script>
                        const totalDocuments = {{ count($upload) }};
                        let viewedDocuments = 0;

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
                                    title: "Berhasil",
                                    text: "Data berhasil diverifikasi",
                                    icon: "success"
                                });
                            } else if (action === 'rejected') {
                                //handle rejected action
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Data berhasil ditolak",
                                    icon: "success"
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
