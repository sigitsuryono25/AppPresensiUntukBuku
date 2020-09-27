<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-default-info message">
                <?= $this->session->flashdata("message") ?>
            </div>
            <script>
                setTimeout(function () {
                    $(".message").fadeOut();
                }, 3000);
            </script>
        <?php } ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <button type="button" data-target="#modal-user" data-toggle="modal" class="btn btn-primary btn-sm mb-3" id="tambah-user"><i class="fa fa-plus"></i> Tambah User</button>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Terdafttar Pada</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user->result() as $key => $u) { ?>
                                <tr>
                                    <td class="align-middle"><?= $key + 1 ?></td>
                                    <td class="align-middle"><?= $u->username ?></td>
                                    <td class="align-middle"><?= $u->nama ?></td>
                                    <td class="align-middle"><?= date_format(date_create($u->terdaftar_pada), "d/m/Y") ?></td>
                                    <td width="15%" class="align-middle">
                                        <a class="btn btn-warning btn-block btn-sm" id="edit-user" href="javascript:void(0)" 
                                           data-target="#modal-user" 
                                           data-user="<?= $u->username ?>"
                                           data-nama="<?= $u->nama ?>"
                                           data-toggle="modal"><i class="fa fa-edit"></i> Edit Data</a>
                                        <a class="btn btn-danger btn-block btn-sm" onclick="return confirm('Hapus data ini ?')" href="<?= site_url('user/hapus_data?username=' . $u->username) ?>"><i class="fa fa-trash"></i> Hapus Data</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<script>
    $("#edit-user").click(function () {
        var user = $(this).data('user');
        var nama = $(this).data('nama');
        var modal = $("#modal-user");

        modal.find('[name="username"]').val(user);
        modal.find('[name="nama"]').val(nama);
        modal.find(".modal-title").text("Edit User");
        modal.find(".password").text("Password Baru");
        modal.find('[name="mode"]').val("edit");
    });

    $("#tambah-user").click(function () {
        var modal = $("#modal-user");
        modal.find(".modal-title").text("Tambah User");
        modal.find('[name="mode"]').val("add");
    });
</script>