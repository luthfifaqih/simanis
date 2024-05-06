@extends('master')

@section('dashboard')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body bg-white" style="border-radius: 5px">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search" id="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                        </div>
                        <!--end::Search-->
                        <div class="d-flex justify-content-end mb-3">
                            <!--begin::Add customer-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="Coming Soon">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah User
                            </button>
                            <!--end::Add customer-->
                        </div>
                        <div class="table-responsive">
                            <table id="kt_datatable_horizontal_scroll"
                                class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800">
                                        <th class="min-w-200px">Name</th>
                                        <th class="min-w-150px">Email</th>
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
                url: "{{ route('users.index') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endsection
