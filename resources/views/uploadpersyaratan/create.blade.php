@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <!--begin::Stepper-->
                        <!--begin::Stepper-->
                        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row"
                            id="kt_stepper_example_vertical">
                            <!--begin::Aside-->
                            <div class="d-flex flex-row-auto w-100 w-lg-300px">
                                <!--begin::Nav-->
                                <div class="stepper-nav flex-cente">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Data Perusahaan
                                                </h3>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 1-->

                                    <!--begin::Step 2-->
                                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>
                                            <!--begin::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Data Media
                                                </h3>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 2-->

                                    <!--begin::Step 3-->
                                    <div class="stepper-item me-5" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>
                                            <!--begin::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    Data Jurnalis
                                                </h3>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 3-->
                                </div>
                                <!--end::Nav-->
                            </div>

                            <!--begin::Content-->
                            <div class="flex-row-fluid">
                                <!--begin::Form-->
                                <form action="{{ route('uploadpersyaratan.store') }}" method="POST"
                                    class="form w-lg-500px mx-auto" novalidate="novalidate">
                                    @csrf
                                    <!--begin::Group-->
                                    <div class="mb-5">
                                        <!--begin::Step 1-->
                                        <div class="flex-column current" data-kt-stepper-element="content">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Nama Perusahaan</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="nama_perusahaan" placeholder="Masukan nama perusahaan" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Akta Pendirian</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="akta_pendirian" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">NIB / SIUP</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="nib_siup" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">NPWP Perusahaan</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="npwp_perusahaan" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Nomor PKP</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="nomor_pkp" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">SPT Tahunan</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="spt_tahunan" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Domisili Perusahaan</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="domisili_perusahaan" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Nama Direktur</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="nama_direktur" placeholder="Masukan nama direktur" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">KTP Direktur</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="ktp_direktur" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Surat Penawaran Kerjasama</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="surat_penawaran_kerjasama" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Surat Kuasa Pimpinan</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="surat_kuasa_pimpinan" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Step 1-->

                                        <!--begin::Step 1-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Nama Media</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="nama_media" placeholder="Masukan nama media" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Jenis Media</label>
                                                <!--end::Label-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid mb-5 me-3">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="jenis_media"
                                                            type="radio" value="online" id="jenis_media_online" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label" for="jenis_media_online">
                                                            <div class="fw-semibold text-gray-800">Online</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                    <!--begin::Input (for Online)-->
                                                    <div class="d-none flex-grow-1" id="url_media_group">
                                                        <input type="url" class="form-control form-control-solid"
                                                            name="url_media" placeholder="Masukan URL media" />
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="jenis_media"
                                                        type="radio" value="cetak" id="jenis_media_cetak" />
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="jenis_media_cetak">
                                                        <div class="fw-semibold text-gray-800">Cetak</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group (for Cetak)-->
                                            <div class="fv-row mb-10 d-none" id="klasifikasi_media_group">
                                                <!--begin::Label-->
                                                <label class="required form-label">Klasifikasi Media</label>
                                                <!--end::Label-->
                                                <!--begin::Radio Group-->
                                                <div class="d-flex">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid mb-5 me-5">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="klasifikasi_media"
                                                            type="radio" value="lokal" id="klasifikasi_media_lokal" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label" for="klasifikasi_media_lokal">
                                                            <div class="fw-semibold text-gray-800">Lokal</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid mb-5 me-5">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="klasifikasi_media"
                                                            type="radio" value="regional"
                                                            id="klasifikasi_media_regional" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label" for="klasifikasi_media_regional">
                                                            <div class="fw-semibold text-gray-800">Regional</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="klasifikasi_media"
                                                            type="radio" value="nasional"
                                                            id="klasifikasi_media_nasional" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label" for="klasifikasi_media_nasional">
                                                            <div class="fw-semibold text-gray-800">Nasional</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Radio Group-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Domisili Media</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="domisili_media" placeholder="Masukan domisili media" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Sertifikat Dewan Pers</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="sertifikat_dewan_pers" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Organisasi Kewartanan</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="organisasi_kewartanan" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">Surat Pernyataan aktif melakukan
                                                    penerbitan Media 2 Tahun terakhir</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="surat_pernyataan_aktif" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Step 1-->

                                        <!--begin::Step 1-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">
                                                    Nama Jurnalis
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="nama_jurnalis" placeholder="Masukan nama lengkap" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">
                                                    Email Jurnalis
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    name="email_jurnalis" placeholder="Masukan email" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">
                                                    Nomor Kontak Jurnalis
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="nomor_kontak_jurnalis" placeholder="Masukan nomor" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">
                                                    Kartu Pers
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="kartu_pers" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required form-label">
                                                    Sertifikat UKW
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" class="form-control form-control-solid"
                                                    name="sertifikat_ukw" accept="application/pdf" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Step 1-->
                                    </div>
                                    <!--end::Group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Wrapper-->
                                        <div class="me-2">
                                            <button type="button" class="btn btn-light btn-active-light-primary"
                                                data-kt-stepper-action="previous">
                                                Kembali
                                            </button>
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Wrapper-->
                                        <div>
                                            <button type="submit" class="btn btn-primary"
                                                data-kt-stepper-action="submit" id="btn-simpan">
                                                <span class="indicator-label">
                                                    Simpan
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>

                                            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                                Selanjutnya
                                            </button>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                        <!--end::Stepper-->
                        <!--end::Stepper-->
                        {{-- <script>
                            function simpan() {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Berhasil menambah data",
                                    icon: "success"
                                });
                            }
                        </script> --}}
                        <script>
                            // document.addEventListener('DOMContentLoaded', function() {
                            // Stepper lement
                            var element = document.querySelector("#kt_stepper_example_vertical");

                            // Initialize Stepper
                            var stepper = new KTStepper(element);

                            // Handle next step
                            stepper.on("kt.stepper.next", function(stepper) {
                                stepper.goNext(); // go next step
                            });

                            // Handle previous step
                            stepper.on("kt.stepper.previous", function(stepper) {
                                stepper.goPrevious(); // go previous step
                            });
                            $('#btn-simpan').on('click', function(e) {
                                e.preventDefault();
                                $.ajax({
                                    url: "{{ route('uploadpersyaratan.store') }}",
                                    type: 'POST',
                                    data: new FormData($('form')[0]),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function(response) {
                                        Swal.fire({
                                            title: "Berhasil",
                                            text: "Berhasil menambah data",
                                            icon: "success"
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        Swal.fire({
                                            title: "Gagal",
                                            text: "Gagal menambah data",
                                            icon: "error"
                                        });
                                    }
                                });
                            });
                            // stepper.on("kt.stepper.submit", function() {
                            //     console.log("kt.stepper.changed event is fired");
                            // });
                            // });
                        </script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Get elements
                                const jenisMediaOnline = document.getElementById('jenis_media_online');
                                const jenisMediaCetak = document.getElementById('jenis_media_cetak');
                                const urlMediaGroup = document.getElementById('url_media_group');
                                const klasifikasiMediaGroup = document.getElementById('klasifikasi_media_group');

                                // Function to show/hide inputs based on selection
                                function handleJenisMediaChange() {
                                    if (jenisMediaOnline.checked) {
                                        urlMediaGroup.classList.remove('d-none');
                                        klasifikasiMediaGroup.classList.add('d-none');
                                    } else if (jenisMediaCetak.checked) {
                                        urlMediaGroup.classList.add('d-none');
                                        klasifikasiMediaGroup.classList.remove('d-none');
                                    }
                                }

                                // Add event listeners
                                jenisMediaOnline.addEventListener('change', handleJenisMediaChange);
                                jenisMediaCetak.addEventListener('change', handleJenisMediaChange);

                                // Initial call to set the correct visibility
                                handleJenisMediaChange();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
