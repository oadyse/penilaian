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
                        <div class="card-header d-flex justify-content-center">
                            <div class="header-title">
                                <h4 class="card-title">Lembar Kerja Peserta Didik</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row m-auto">
                                <div class="col-2  mb-2">
                                    <b>Identitas Siswa</b>
                                </div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-2">NIS/Kelas</div>
                                <div class="col-2">:</div>
                                <div class="col-2"></div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-2">Nama</div>
                                <div class="col-2">:</div>
                                <div class="col-2"></div>
                            </div>
                            <hr>
                            <div class="row m-auto">
                                <div class="col-12 mb-2">
                                    <b>{{ $data->judul }}</b>
                                </div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-12">
                                    {{ $data->soal }}
                                </div>
                            </div>

                            <form method="POST" action="{{ route('send-answer') }}" class="needs-validation mt-3"
                                novalidate>
                                @csrf
                                <div class="form mb-3">
                                    <div class="col-3">
                                        <label for="validationTooltip05"><b>Jawaban</b></label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="soal"></textarea>
                                        <div class="invalid-tooltip">
                                            Please Add the Data!
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
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
