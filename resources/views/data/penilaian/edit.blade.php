<div id="edit{{ $id }}" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
    aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gridModalLabel">Edit Data Penilaian Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form id="save" method="POST"
                    action="{{ route('edit-penilaian', base64_encode($penilaian->id_siswa)) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6" style="border-style: outset;">
                            <div class=" mt-2 mb-1">
                                <b>A. Penilaian Ketrampilan</b>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-11">
                                    <ol>
                                        <li>Orientasi adalah latar dalam sebuah cerita</li>
                                        <ul>
                                            <li>Terdapat tempat berlangsungnya peristiwa <input class="float-right"
                                                    type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->a == 'on' ? 'checked' : '' }}></li>
                                            <li>Peristiwa digambarkan dalam dimensi waktu tertentu <input
                                                    class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->b == 'on' ? 'checked' : '' }}></li>
                                            <li>Terdapat dimensi waktu tertentu dalam sebuah
                                                peristiwa <input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->c == 'on' ? 'checked' : '' }}></li>
                                            <li>Terdapat pengenalan tokoh cerita <input class="float-right"
                                                    type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->d == 'on' ? 'checked' : '' }}></li>
                                        </ul>
                                        <li>Komplikasi: menggambarkan kejadian yang
                                            memuncak dalam sebuah cerita</li>
                                        <ul>
                                            <li>Cerita menyajikan jalan cerita (alur) secara
                                                kronologis <input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->e == 'on' ? 'checked' : '' }}></li>
                                            <li>Cerita memiliki alur klimaks yang jelas sehingga
                                                dapat memengaruhi dan menarik pembaca
                                                <input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->f == 'on' ? 'checked' : '' }}>
                                            </li>
                                        </ul>
                                        <li>Evaluasi, merupakan rangkaian kejadian dalam
                                            komplikasi</li>
                                        <ul>
                                            <li>Tergambarnya emosi, perasaan, pemikiran, dan
                                                tanggapan tokoh terhadap masalah<input class="float-right"
                                                    type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->g == 'on' ? 'checked' : '' }}></li>
                                            <li>Emosi, perasaan, pemikiran, dan tanggapan tokoh
                                                memiliki argumen yang masuk akal
                                                <input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->h == 'on' ? 'checked' : '' }}>
                                            </li>
                                        </ul>
                                        <li>Resolusi adalah penyelesaian masalah</li>
                                        <ul>
                                            <li>Menggambarkan usaha tokoh untuk memecahkan
                                                masalah<input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->i == 'on' ? 'checked' : '' }}></li>
                                            <li>Pemecahan masalah berdasarkan alasan-alasan
                                                yang terdapat dalam evaluasi <input class="float-right" type="checkbox"
                                                    name="k[]" onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->j == 'on' ? 'checked' : '' }}></li>
                                        </ul>
                                        <li>Koda, merupakan bagian akhir cerita </li>
                                        <ul>
                                            <li>Menyampaikan simpulan cerita<input class="float-right" type="checkbox"
                                                    name="k[]" onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->k == 'on' ? 'checked' : '' }}></li>
                                            <li>Menyampaikan pesan yang mengandung unsur
                                                moral<input class="float-right" type="checkbox" name="k[]"
                                                    onchange="ketrampilan{{ $id }}()"
                                                    {{ $penilaian->l == 'on' ? 'checked' : '' }}></li>
                                        </ul>
                                    </ol>
                                    <label for="inputGroupSelect01"><b>Nilai:
                                            <span id="nilai_ketrampilan{{ $id }}"></span></b>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <b>B. Penilaian Sikap</b>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-11">
                                    <ol>
                                        <li>Mengikuti pembelajaran dengan fokus <input class="float-right"
                                                type="checkbox" name="s[]" onchange="sikap{{ $id }}()"
                                                {{ $penilaian->aa == 'on' ? 'checked' : '' }}>
                                        </li>
                                        <li>Mengerjakan tugas tepat waktu <input class="float-right" type="checkbox"
                                                name="s[]" onchange="sikap{{ $id }}()"
                                                {{ $penilaian->bb == 'on' ? 'checked' : '' }}>
                                        </li>
                                        <li>Mengajukan pertanyaan <input class="float-right" type="checkbox"
                                                name="s[]" onchange="sikap{{ $id }}()"
                                                {{ $penilaian->cc == 'on' ? 'checked' : '' }}></li>
                                        <li>Menjawab pertanyaan guru <input class="float-right" type="checkbox"
                                                name="s[]" onchange="sikap{{ $id }}()"
                                                {{ $penilaian->dd == 'on' ? 'checked' : '' }}></li>
                                    </ol>
                                    <label for="inputGroupSelect01"><b>Nilai:
                                            <span id="nilai_sikap{{ $id }}"></span></b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="border-style: outset;">
                            <div class="mb-3 mt-2">
                                <b>Identitas Siswa</b>
                            </div>
                            <div class="row m-auto">
                                <div class="col-3">NIS/Kelas</div>
                                <div class="col-1">:</div>
                                <div class="col-8">
                                    {{ $penilaian->nis . '/' . $penilaian->kelas }}</div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-3">Nama</div>
                                <div class="col-1">:</div>
                                <div class="col-8">{{ $penilaian->nama }}</div>
                            </div>
                            <hr>
                            <div class="row m-auto">
                                <div class="col-12 mb-2">
                                    <b>{{ $penilaian->judul }}</b>
                                </div>
                            </div>
                            <div class="row m-auto">
                                <div class="col-12">
                                    {{ $penilaian->soal }}
                                </div>
                            </div>
                            @if (empty($penilaian->jawaban))
                                <div class="row justify-content-center">
                                    <span>Siswa belum submit jawaban.</span>
                                </div>
                            @else
                                <div class="col-3 mt-3">
                                    <label for="validationTooltip05"><b>Jawaban</b></label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="soal" disabled>{{ $penilaian->jawaban }}</textarea>
                                    <div class="invalid-tooltip">
                                        Please Add the Data!
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-style: outset;">
                        <div class="col-12 mb-3">
                            <label for=""><b>Catatan: </b></label>
                            <textarea class="form-control" rows="3" name="catatan">{{ $penilaian->catatan }}</textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                @if (empty($penilaian->jawaban))
                    <div></div>
                @else
                    <button type="submit" class="btn btn-primary"
                        onclick="$('#edit{{ $id }} #save').submit()">Save</button>
                @endif
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function ketrampilan{{ $id }}() {
        var A = $('#edit{{ $id }} input[name="k[]"]:checked').length;
        nilai_ketrampilan{{ $id }}();
    }

    function nilai_ketrampilan{{ $id }}() {
        var A = $('#edit{{ $id }} input[name="k[]"]:checked').length;
        var nilai_A = A * 100 / 12;
        var total = $('#nilai_ketrampilan{{ $id }}').html(nilai_A.toFixed(2));
    }

    function sikap{{ $id }}() {
        var B = $('#edit{{ $id }} input[name="s[]"]:checked').length;
        nilai_sikap{{ $id }}();
    }

    function nilai_sikap{{ $id }}() {
        var B = $('#edit{{ $id }} input[name="s[]"]:checked').length;
        if (B == 4) {
            nilai = 100;
        } else if (B == 3) {
            nilai = 90;
        } else if (B == 2) {
            nilai = 80;
        } else if (B == 1) {
            nilai = 70;
        } else if (B == 0) {
            nilai = 0;
        }
        var total = $('#nilai_sikap{{ $id }}').html(nilai);
    }

    document.addEventListener("DOMContentLoaded", () => {
        ketrampilan{{ $id }}();
        sikap{{ $id }}();
    });
</script>
