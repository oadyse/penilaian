<div id="create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Upload Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-siswa') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="inputGroupSelect01">* Upload file Excel (.xls)</label>
                        </div>
                        <div class="col-9">
                            <button class="btn btn-success btn-sm" type="submit">Download Template</button>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
