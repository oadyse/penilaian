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
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data siswa</h4>
                            </div>
                            <button type="button" class="btn btn-success rounded-pill iq-icons-list py-0 px-3 mb-0"
                                data-toggle="modal" data-target="#create">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Upload Excel Data Siswa
                            </button>

                            {{-- Modal Create --}}
                            @include('data.data_siswa.create')
                        </div>
                        <div class="input-group mb-3 px-3">
                            <input type="text" class="form-control col-4" placeholder="Search"
                                aria-label="notification" aria-describedby="basic-addon4">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" Height="20px" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="2data.uji.index%">No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>R/N</th>
                                            <th>Kelas</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $initial = request()->query('page') ?? 1;
                                        $no = ($initial-1)*10 + 1;

                                        foreach ($data as $siswa) {
                                            $id = $siswa->id;
                                        ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->gender }}</td>
                                            <td>{{ $siswa->kelas->kelas }}</td>
                                            <td>
                                                <a class="iq-icons-list m-0 text-left" href="" title="Edit"
                                                    data-toggle="modal" data-target="#edit{{ $id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="m-0">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                                <a class="iq-icons-list m-0 text-danger"
                                                    href="{{ route('delete-siswa', base64_encode($id)) }}"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="m-0">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </a>

                                                {{-- Modal Edit --}}
                                                @include('data.data_siswa.edit')
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
