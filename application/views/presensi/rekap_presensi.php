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
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h4>Rekap Hari Ini</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('presensi/rekap_hari_ini')?>" method="POST" target="_blank">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal</span>
                            </div>
                            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" readonly="" required=""/>
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-sm btn-primary" value="Proses"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Rekap Per Range Tanggal</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('presensi/rekap_range') ?>" method="POST" target="_blank">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Dari</span>
                                    </div>
                                    <input type="date" name="dari" value="<?= date('Y-m-d') ?>" class="form-control" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Sampai</span>
                                    </div>
                                    <input type="date" name="sampai" value="<?= date('Y-m-d') ?>" class="form-control" required=""/>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Proses"/>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Rekap Bulanan</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('presensi/rekap_bulanan')?>" method="POST" target="_blank">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pilih Bulan</span>
                            </div>
                            <select class="form-control" name="bulan" required="">
                                <option value="">--Wajib pilih Satu--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pilih Tahun</span>
                            </div>
                            <select class="form-control" name="tahun" required="">
                                <option value="">--Wajib pilih Satu--</option>
                                <?php for ($i = 2018; $i <= date('Y'); $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" value="Proses"/>
                    </div>
                </form>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4>Rekap Tahunan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?= site_url('presensi/rekap_tahunan') ?>" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tahun Ini</span>
                                    </div>
                                    <input type="text" name="tahun" value="<?= date('Y') ?>" class="form-control" required="" readonly=""/>
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Proses"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Masukkan Tahun</span>
                                    </div>
                                    <input type="number" name="tahun" value="<?= date('Y') ?>" class="form-control" required="" />
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Proses"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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