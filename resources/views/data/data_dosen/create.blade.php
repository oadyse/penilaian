<div id="create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Form Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-dosen') }}" class="needs-validation">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">NIK</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="nik" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nama</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="nama" required>
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
                                <input type="radio" name="gender" id="radio2" value="L">
                                <label for="radio2">Laki-laki</label>
                            </div>
                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="gender" id="radio2" value="P">
                                <label for="radio2">Perempuan</label>
                            </div>
                            <div class="invalid-tooltip">
                                Please Choose One!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Mata Kuliah yang Diampu</label>
                        </div>
                        <div class="col-9">
                            <select multiple class="form-control choicesjs" id="sel1" name="matkul[]" required>
                                @foreach ($matkul as $x)
                                    <option value="{{ $x->id }}">
                                        {{ $x->matkul }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                Please Select the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Kelas</label>
                        </div>
                        <div class="col-9">
                            <select multiple class="form-control choicesjs" id="sel1" name="kelas[]" required>
                                @foreach ($kelas as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->kelas . ' - ' . $class->tahun }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                Please select the Data!
                            </div>
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
