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
                                        <th class="min-w-200px">Aksi</th>
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
                url: "{{ route('uploadpersyaratan.index') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'nama_perusahaan',
                    name: 'nama_perusahaan'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        var badgeClass = '';
                        var badgeText = '';

                        switch (data) {
                            case 'menunggu_verifikasi':
                                badgeClass = 'badge badge-light-warning';
                                badgeText = 'Menunggu verifikasi';
                                break;
                            case 'terverifikasi':
                                badgeClass = 'badge badge-light-success';
                                badgeText = 'Terverifikasi';
                                break;
                            case 'ditolak':
                                badgeClass = 'badge badge-light-danger';
                                badgeText = 'Ditolak';
                                break;
                            default:
                                badgeClass = 'badge badge-secondary';
                                badgeText = data;
                        }

                        return '<span class="' + badgeClass + '">' + badgeText + '</span>';
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data) {
                        const date = new Date(data);
                        const dateString = date.toLocaleDateString('id-ID', {
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric',
                        });
                        const timeString = date.toLocaleTimeString('id-ID', {
                            hour: 'numeric',
                            minute: 'numeric',
                            second: 'numeric',
                        });
                        return `${dateString} ${timeString}`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // fungsi search untuk input pencarian
        let table = new DataTable('#kt_datatable_horizontal_scroll');
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });
    </script>
@endsection
