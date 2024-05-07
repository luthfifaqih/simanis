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
                            <div class="d-flex justify-content-end mb-3">
                                <!--begin::Add user-->
                                <a href="{{ route('users.create') }}" class="btn btn-success" data-bs-toggle="tooltip">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah User
                                </a>
                                <!--end::Add user-->
                            </div>
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

        // fungsi search untuk input pencarian
        let table = new DataTable('#kt_datatable_horizontal_scroll');

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });


        $(document).ready(function() {
            $('#kt_datatable_horizontal_scroll').on('click', '.delete-btn', function() {
                var userId = $(this).data('id');

                // Tampilkan SweetAlert konfirmasi penghapusan
                Swal.fire({
                    title: 'Yakin menghapus data?',
                    text: "Data akan hilang permanen dan tidak dapat mengembalikannya",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Iya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('users.destroy', '') }}/" + userId,
                            success: function(data) {
                                window.location.reload();
                                Swal.fire(
                                    'Berhasil!',
                                    'Data telah dihapus.',
                                    'success'
                                );
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
