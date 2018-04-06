<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Link Shortcut Apps">
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
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= ASSETSADMIN_URL; ?>img/avatars/avatar.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none"><?= $this->session->userdata("nama"); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div>

                    <a class="dropdown-item" href="<?= ADMIN_URL; ?>profile"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="<?= ADMIN_URL; ?>profile/edit"><i class="fa fa-wrench"></i> Settings</a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="<?= ADMIN_URL; ?>logout"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
            <li class="nav-item d-md-down-none">
                &nbsp;
            </li>

        </ul>
    </header>

    <div class="app-body">
    <script>
    var base_url = '<?= ADMIN_URL; ?>';
    </script>
