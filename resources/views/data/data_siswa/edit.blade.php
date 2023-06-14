<div id="edit{{ $id }}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="createTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('edit-siswa', base64_encode($id)) }}" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">NIS</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="nis"
                                placeholder="NIS" value="{{ $siswa->nis }}" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nama Lengkap</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="nama"
                                placeholder="Nama Lengkap" value="{{ $siswa->nama }}" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Jenis Kelamin</label>
                        </div>
                        <div class="col-9">
                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="gender" id="radio2" value="L"
                                    {{ $siswa->gender == 'L' ? 'checked' : '' }}>
                                <label for="radio2">Laki-laki</label>
                            </div>
                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="gender" id="radio2" value="P"
                                    {{ $siswa->gender == 'P' ? 'checked' : '' }}>
                                <label for="radio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="inputGroupSelect01">Kelas</label>
                        </div>
                        <div class="col-9">
                            <select class="form-control choicesjs" id="inputGroupSelect01" name="id_kelas">
                                <option selected disabled>Search Kelas</option>
                                @foreach ($kelas as $class)
                                    @foreach ($data as $siswa)
                                        <option value="{{ $class->id }}"
                                            {{ $class->id == $siswa->id_kelas ? 'selected' : '' }}>
                                            {{ $class->kelas }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
