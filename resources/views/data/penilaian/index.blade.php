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
                                    PENILAIAN AUTENTIK <br>
                                    Mata Pelajaran Bahasa Indonesia <br>
                                    MTs Ma'had Al Zaytun <br>
                                    2023-2024 <br>
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="2%">No</th>
                                            <th>Soal</th>
                                            <th>Tanggal Dibuat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $initial = request()->query('page') ?? 1;
                                        $no = ($initial - 1) * 10 + 1;
                                        ?>
                                        <tr>
                                            <td>{{ 1 }}</td>
                                            <td>Soal Teks Narasi</td>
                                            <td>12 Maret 2022</td>
                                            <td>
                                                <button class="btn btn-info btn-sm">Detail</button>
                                                <button class="btn btn-success btn-sm">Download Excel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ 2 }}</td>
                                            <td>Soal Teks Berita</td>
                                            <td>12 Maret 2022</td>
                                            <td>
                                                <button class="btn btn-info btn-sm">Detail</button>
                                                <button class="btn btn-success btn-sm">Download Excel</button>
                                            </td>
                                        </tr>
                                        <?php
                                        $no += 1;
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
