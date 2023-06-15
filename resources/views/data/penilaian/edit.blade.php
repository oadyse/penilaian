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
            <form id="save" method="POST"
                action="{{ route('edit-penilaian', base64_encode($matkul->penilaian($siswa->id)->id ?? 0)) }}">
                <div class="modal-body mx-3">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nilai</label>
                        </div>
                        <div class="col-9">
                            <input type="hidden" value="{{ $matkul->id }}" class="form-control" id="validationTooltip05" name="id_matkul" required>
                            <input type="hidden" value="{{ $siswa->id }}" class="form-control" id="validationTooltip05" name="id_siswa" required>
                            <input type="text" value="{{ $matkul->penilaian($siswa->id)?->nilai }}" class="form-control" id="validationTooltip05" name="nilai" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Index</label>
                        </div>
                        <div class="col-9">
                            <input type="text" value="{{ $matkul->penilaian($siswa->id)?->index }}" class="form-control" id="validationTooltip05" name="index"
                                required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"
                        onclick="$('#edit{{ $id }} #save').submit()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
</script>
