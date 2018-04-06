<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login to Manage Shortcut Link">
    <meta name="author" content="Surya Loe">
    <link rel="shortcut icon" href="<?= ASSETSADMIN_URL; ?>img/favicon.png">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="AdsBot-Google" content="noindex" />
    <meta name="googlebot-news" content="noindex" />

    <title><?= $title; ?></title>

    <!-- Icons -->
    <link href="<?= ASSETSADMIN_URL; ?>bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= ASSETSADMIN_URL; ?>bower_components/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="<?= ASSETSADMIN_URL; ?>css/style.css" rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to manage shortcut apps</p>
                            <form method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="user" placeholder="Username">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" value="login" name="action" class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>This Apps for Private, Sign Up only with Administrator</p>
                                <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($warning)): ?>
    <div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Warning</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?= $warning; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
	<?php endif; ?>
    <!-- Bootstrap and necessary plugins -->
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?= ASSETSADMIN_URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php if (isset($warning)): ?>
    <script>
    $(document).ready(function () {  $('#dangerModal').modal('show');});
    </script>
	<?php endif; ?>


</body>

</html>