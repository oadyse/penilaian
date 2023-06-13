<div id="create" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Form Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add-user') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Nama</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="name" required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Username</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="validationTooltip05" name="username"
                                required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Password</label>
                        </div>
                        <div class="col-9">
                            <input type="password" class="form-control" id="validationTooltip05" name="password"
                                required>
                            <div class="invalid-tooltip">
                                Please Add the Data!
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-3 m-auto">
                            <label for="validationTooltip05">Role</label>
                        </div>
                        <div class="col-9">
                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="role" id="radio2" value="admin">
                                <label for="radio2">Admin</label>
                            </div>
                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="role" id="radio2" value="guru">
                                <label for="radio2">Guru</label>
                            </div>

                            <div class="radio d-inline-block m-2">
                                <input type="radio" name="role" id="radio2" value="siswa">
                                <label for="radio2">Siswa</label>
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
