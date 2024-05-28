@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Search" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <div class="table-responsive">
                            <table id="kt_datatable_horizontal_scroll"
                                class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
                                        <th class="min-w-200px">Nama Perusahaan</th>
                                        <th class="min-w-150px">Status</th>
                                        <th class="min-w-150px">Tanggal Unggah</th>
                                        <th class="min-w-200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //CSRF token pada header
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        // Inisialisasi DataTable
        $('#kt_datatable_horizontal_scroll').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('verifikasi.review') }}",
                type: 'GET'
            }
            columns: [{
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endsection
