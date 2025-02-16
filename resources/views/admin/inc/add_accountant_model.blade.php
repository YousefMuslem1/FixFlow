<div class="modal fade" data-backdrop="static" tabindex="-1" id="addAccountent">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Accountent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addNewAccountent">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                        <div class="text-danger" >
                            <strong id="usernameError"></strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">

                        <div class="text-danger" >
                            <strong id="passwordError"></strong>
                        </div>

                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="store" class="btn btn-primary">Save Data</button>
                </form>

            </div>
        </div>
    </div>
</div>
