@include('layout.header')
<!-- Wrapper Start -->
<div class="wrapper">
    @include('layout.sidebar')
    @include('layout.topnav')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center mb-3">
                            <div class="header-title">
                                <h5 class="card-title text-center">
                                    DAFTAR NILAI<br>
                                    Mahasiswa S1 Sistem Informasi<br>
                                    Institut Teknologi Nasional<br>
                                    2023<br>
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="10%">NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th width="15%">Nilai Akhir</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $initial = request()->query('page') ?? 1;
                                        $no = ($initial-1)*10 + 1;
                                        foreach ($data as $penilaian) {
                                            $id = $penilaian->id_2;
                                        ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $penilaian->nis }}</td>
                                            <td>{{ $penilaian->nama }}</td>
                                            <td></td>
                                            <td>
                                                <a class="iq-icons-list m-0 text-left"
                                                    href="{{ route('detail-penilaian', base64_encode($id)) }}"
                                                    title="Detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="m-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no += 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Wrapper End-->
@include('layout.footer')

<!-- Backend Bundle JavaScript -->
@include('layout.script')

<!-- Add alert -->
@if (session('successAdd'))
    <script>
        swal({
            icon: 'success',
            title: "Add Success!",
            text: "{{ session('successAdd') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('successUpdate'))
    <script>
        swal({
            icon: "success",
            title: "Update Success!",
            text: "{{ session('successUpdate') }}",
            button: false,
            timer: 3500
        })
    </script>
@elseif (session('delete'))
    <script>
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ session('delete') }}", {
                        icon: "success",
                        button: false,
                        timer: 3500
                    });
                } else {
                    swal("Your data is safe!");
                }
            });
    </script>
@endif
<!-- /Alert -->

</body>

</html>
