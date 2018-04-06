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
                <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Edit User</strong>
                                </div>
                                <form method="post" class="form-horizontal">
                                <div class="card-block">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="username" class="form-control" placeholder="Username" value="<?= $user->username; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="nama" class="form-control" placeholder="Name" value="<?= $user->nama; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="email-input">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email-input" name="email" class="form-control" placeholder="Enter Email" value="<?= $user->email; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="password-input">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="password-input" name="password1" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="password-input">Confirmation Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="password-input" name="password2" class="form-control" placeholder="Confirmation Password">
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="action" value="edit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Update User</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                                </form>
                            </div>
                        </div>
                <!--/.col-->
                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header">
                            <strong>List User</strong>
                        </div>
                        <div class="card-block">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="listshorturl">
                                    <?php foreach ($list as $l): ?>
                                    <tr>
                                        <td><?= $l->username; ?></td>
                                        <td><?= $l->nama; ?></td>
                                        <td><?= $l->email; ?></td>
                                        <td><span class="badge badge-success">User</span></td>
                                        <td><div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?= ADMIN_URL . "admin/user/edit/{$l->id}"; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                            <a class="dropdown-item" onclick="javascript: return confirm('Are You Sure ?')" href="<?= ADMIN_URL . "admin/user/delete/{$l->id}"; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?= $pagination; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>