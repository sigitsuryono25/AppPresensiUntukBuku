<div class="modal fade" tabindex="-1" role="dialog" id="modal-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formUser" action="<?= site_url('user/proses_user')?>" method="POST">
                    <input type="hidden" name="mode" />
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <label class="password">Password</label>
                        <input type="password" name="password" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Simpan" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>