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
                                <h4 class="card-title">Tambah Soal Baru</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('add-soal') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form mb-3">
                                    <div class="col-3">
                                        <label for="validationTooltip05">Judul Penilaian</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="validationTooltip05"
                                            name="judul" required>
                                        <div class="invalid-tooltip">
                                            Please Add the Data!
                                        </div>
                                    </div>
                                </div>
                                <div class="form mb-3">
                                    <div class="col-3">
                                        <label for="validationTooltip05">Uraian Soal</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="soal"></textarea>
                                        {{-- <div name="soal" id="editor"></div> --}}
                                        <div class="invalid-tooltip">
                                            Please Add the Data!
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Tambah Kriteria Penilaian</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form mb-3">
                                <div class="col-3">
                                    <label for="validationTooltip05">Kriteria Penilaian 1</label>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="validationTooltip05"
                                            name="judul" required>
                                        <div class="invalid-tooltip">
                                            Please Add the Data!
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success btn-sm" data-toggle="tooltip"
                                            data-placement="bottom" title="Tambah Kriteria Baru">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Tambah</button>
                            </form>
                        </div>
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
