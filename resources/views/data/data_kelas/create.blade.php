<div id="create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Form Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-kelas') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Semester</label>
                        </div>
                        <div class="col-9">
                            <select class="form-control choicesjs" id="inputGroupSelect01" name="semester">
                                <option selected disabled>Choose Semester</option>
                                @for ($i = 1; $i < 9; $i++)
                                    <option value="{{ $i }}">
                                        {{ 'Semester ' . $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Kelas</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="kelas" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Tahun</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="tahun" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
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
