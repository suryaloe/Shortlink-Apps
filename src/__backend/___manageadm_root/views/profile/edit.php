<?php
$level = $this->session->userdata("level");
if ($level == "admin") { 
    $nama = "ADMIN";
} else {
    $nama = $profile->nama;
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
                            <strong>Update Profile</strong>
                        </div>
                        <form method="post" class="form-horizontal">
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
                                    <label class="col-md-3 form-control-label" for="password-input">Old Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password-input" name="oldpassword" class="form-control" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="password-input">Password New</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password-input" name="password1" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="password-input">Confirmation Password New</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password-input" name="password2" class="form-control" placeholder="Confirmation Password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="action" value="update" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Update Profile</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>