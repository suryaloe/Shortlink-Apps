<?php
$level = $this->session->userdata("level");
if ($level == "admin") { 
    $nama = "ADMIN";
    $tipe = "Admin";
} else {
    $nama = $profile->nama;
    $tipe = "User";
}
?>
<main class="main">
    <br>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($success)): ?>
                    <div class="alert alert-success">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                        </button>
                        <strong>Success!</strong> <?= $success; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('message') <> ''): ?>
                    <div class="alert alert-success">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                        </button>
                        <strong>Success!</strong> <?= $success; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($warning)): ?>
                    <div class="alert alert-danger">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                        </button>
                        <strong>Warning!</strong> <?= $warning; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Profile</strong>
                        </div>
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" id="text-input" name="nama" class="form-control" placeholder="Name" value="<?= $nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" id="email-input" name="email" class="form-control" placeholder="Enter Email" value="<?= $profile->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Tipe User</label>
                                    <div class="col-md-9">
                                        <input type="text" id="text-input" name="nama" class="form-control" placeholder="Tipe Profile" value="<?= $tipe; ?>">
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>