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
                                <div class="stepper-nav">
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

                                    </div>
                                    <!--end::Step 3-->
                                </div>
                                <!--end::Nav-->
                            </div>

                            <!--begin::Content-->
                            <div class="flex-row-fluid">
                                <!--begin::Form-->
                                <form action="{{ route('uploadpersyaratan.store') }}" method="POST" class="form mx-auto"
                                    novalidate="novalidate">
                                    @csrf
                                    <!--begin::Group-->
                                    <div class="container">
                                        <div class="row">
                                            <!-- Step 1 -->
                                            <div class="flex-column current col-12" data-kt-stepper-element="content">
                                                <div class="row">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Nama Perusahaan</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="nama_perusahaan" placeholder="Masukan nama perusahaan" />
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Nama Direktur</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="nama_direktur" placeholder="Masukan nama direktur" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach ($perusahaan as $value)
                                                        <div class="col-md-6 mb-10">
                                                            <label
                                                                class="{{ $value->required == 1 ? 'required' : '' }} form-label">{{ $value->nama_dokumen }}</label>
                                                            <input type="file" class="form-control form-control-solid"
                                                                name="{{ $value->kode }}" accept="application/pdf"
                                                                {{ $value->required == 1 ? 'required' : '' }} />
                                                            <span class="text-danger">* format PDF, ukuran maksimal 2
                                                                MB</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Step 1 -->

                                            <!-- Step 2 -->
                                            <div class="flex-column col-12" data-kt-stepper-element="content">
                                                <div class="row">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Nama Media</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="nama_media" placeholder="Masukan nama media" />
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Jenis Media</label>
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="form-check form-check-custom form-check-solid mb-5 me-3">
                                                                <input class="form-check-input me-3" name="jenis_media"
                                                                    type="radio" value="online" id="jenis_media_online" />
                                                                <label class="form-check-label" for="jenis_media_online">
                                                                    <div class="fw-semibold text-gray-800">Online</div>
                                                                </label>
                                                            </div>
                                                            <div class="d-none flex-grow-1" id="url_media_group">
                                                                <input type="url"
                                                                    class="form-control form-control-solid" name="url_media"
                                                                    placeholder="Masukan URL media" />
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input me-3" name="jenis_media"
                                                                type="radio" value="cetak" id="jenis_media_cetak" />
                                                            <label class="form-check-label" for="jenis_media_cetak">
                                                                <div class="fw-semibold text-gray-800">Cetak</div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-none" id="klasifikasi_media_group">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Klasifikasi Media</label>
                                                        <div class="d-flex">
                                                            <div
                                                                class="form-check form-check-custom form-check-solid mb-5 me-5">
                                                                <input class="form-check-input me-3"
                                                                    name="klasifikasi_media" type="radio"
                                                                    value="lokal" id="klasifikasi_media_lokal" />
                                                                <label class="form-check-label"
                                                                    for="klasifikasi_media_lokal">
                                                                    <div class="fw-semibold text-gray-800">Lokal</div>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="form-check form-check-custom form-check-solid mb-5 me-5">
                                                                <input class="form-check-input me-3"
                                                                    name="klasifikasi_media" type="radio"
                                                                    value="regional" id="klasifikasi_media_regional" />
                                                                <label class="form-check-label"
                                                                    for="klasifikasi_media_regional">
                                                                    <div class="fw-semibold text-gray-800">Regional
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="form-check form-check-custom form-check-solid mb-5">
                                                                <input class="form-check-input me-3"
                                                                    name="klasifikasi_media" type="radio"
                                                                    value="nasional" id="klasifikasi_media_nasional" />
                                                                <label class="form-check-label"
                                                                    for="klasifikasi_media_nasional">
                                                                    <div class="fw-semibold text-gray-800">Nasional
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Domisili Media</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="domisili_media" placeholder="Masukan domisili media" />
                                                    </div>

                                                    @foreach ($media as $value)
                                                        <div class="col-md-6 mb-10">
                                                            <label
                                                                class="{{ $value->required == 1 ? 'required' : '' }} form-label">{{ $value->nama_dokumen }}</label>
                                                            <input type="file" class="form-control form-control-solid"
                                                                name="{{ $value->kode }}" accept="application/pdf"
                                                                {{ $value->required == 1 ? 'required' : '' }} />
                                                            <span class="text-danger">* format PDF, ukuran maksimal 2
                                                                MB</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Step 2 -->

                                            <!-- Step 3 -->
                                            <div class="flex-column col-12" data-kt-stepper-element="content">
                                                <div class="row">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Nama Jurnalis</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="nama_jurnalis" placeholder="Masukan nama lengkap" />
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Email Jurnalis</label>
                                                        <input type="email" class="form-control form-control-solid"
                                                            name="email_jurnalis" placeholder="Masukan email" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-10">
                                                        <label class="required form-label">Nomor Kontak
                                                            Jurnalis</label>
                                                        <input type="text" class="form-control form-control-solid"
                                                            name="nomor_kontak_jurnalis" placeholder="Masukan nomor" />
                                                    </div>
                                                    @foreach ($jurnalis as $value)
                                                        <div class="col-md-6 mb-10">
                                                            <label
                                                                class="{{ $value->required == 1 ? 'required' : '' }} form-label">{{ $value->nama_dokumen }}</label>
                                                            <input type="file" class="form-control form-control-solid"
                                                                name="{{ $value->kode }}" accept="application/pdf"
                                                                {{ $value->required == 1 ? 'required' : '' }} />
                                                            <span class="text-danger">* format PDF, ukuran maksimal 2
                                                                MB</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Step 3 -->
                                        </div>
                                    </div>


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
                            // Element to indecate
                            var button = document.querySelector("#btn-simpan");

                            // Handle button click event
                            button.addEventListener("click", function() {
                                // Activate indicator
                                button.setAttribute("data-kt-indicator", "on");

                                // Disable indicator after 3 seconds
                                setTimeout(function() {
                                    button.removeAttribute("data-kt-indicator");
                                }, 3000);
                            });
                        </script>

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

                            //ajax fungsi simpan
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
                                            text: "Berhasil mengajukan persyaratan",
                                            icon: "success"
                                        }).then(function() {
                                            window.location.href = "{{ route('uploadpersyaratan.index') }}";
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        Swal.fire({
                                            title: "Gagal",
                                            text: "Gagal menambah data, form harap diisi",
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
