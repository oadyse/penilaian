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
                                <div class="col-10">
                                    {{ ': ' . Auth()->user()->siswa->nis . '/' . Auth()->user()->siswa->kelas->kelas }}
                                </div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-2">Nama</div>
                                <div class="col-10">{{ ': ' . Auth()->user()->siswa->nama }}</div>
                            </div>
                            <hr>
                            @foreach ($soal as $q)
                                <div class="row m-auto">
                                    <div class="col-2 mb-2">
                                        <b>{{ $q->judul }}</b>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <div class="col-10 mb-2">
                                        {{ $q->soal }}
                                    </div>
                                </div>
                            @endforeach
                            <div class="row m-auto">
                                <div class="col-2 mb-2">
                                    <b>Jawaban</b>
                                </div>
                            </div>
                            @if (empty($answer->jawaban))
                                <div class="row m-auto">
                                    <div class="col-10">
                                        <i>Jawaban kosong. Anda belum submit soal.</i>
                                    </div>
                                </div>
                            @else
                                <div class="row m-auto">
                                    <div class="col-10">
                                        {{ $answer->jawaban }}
                                    </div>
                                </div>
                                <hr>

                                @if ($exists)
                                    <div class="row m-auto">
                                        <div class="col-12 mb-2">
                                            <b>Nilai Ketrampilan:
                                                @php
                                                    $ketrampilan = ($answer->penilaian->ketrampilan * 100) / 13;
                                                @endphp
                                                {{ number_format((float) $ketrampilan, 2, '.', '') }}</b>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <b>Nilai Sikap:
                                                @php
                                                    if ($answer->penilaian->sikap == 4) {
                                                        $sikap = 100;
                                                    } elseif ($answer->penilaian->sikap == 3) {
                                                        $sikap = 90;
                                                    } elseif ($answer->penilaian->sikap == 2) {
                                                        $sikap = 80;
                                                    } elseif ($answer->penilaian->sikap == 1) {
                                                        $sikap = 70;
                                                    } elseif (empty($answer->penilaian->sikap)) {
                                                        $sikap = 0;
                                                    }
                                                @endphp
                                                {{ $sikap }}</b>
                                        </div>
                                    </div>
                                    <div class="row m-auto">
                                        <div class="col-10">
                                            <b>Catatan: {{ $answer->penilaian->catatan }} </b>
                                        </div>
                                    </div>
                                @else
                                    <div class="row justify-content-center">
                                        <p>Nilai belum diinput.</p>
                                    </div>
                                @endif
                            @endif
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
