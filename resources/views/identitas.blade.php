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
                                <h4 class="card-title">Identitas Sekolah</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('add-soal') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form mb-3">
                                    <div class="col-3">
                                        <label for="validationTooltip05">Nama Sekolah</label>
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
                                        <label for="validationTooltip05">Kota</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="validationTooltip05"
                                            name="judul" required>
                                        <div class="invalid-tooltip">
                                            Please Add the Data!
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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
