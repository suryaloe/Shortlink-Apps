<?php $level = $this->session->userdata('level'); ?>
<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="javascript:void(0);">Welcome
                            <p><h4><?= $this->session->userdata("nama"); ?></h4></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ADMIN_URL; ?>"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-title">
                        Manage
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Link</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>link/list">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>link/add">Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>link/report">Report</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Profile</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>profile">View Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>profile/edit">Edit Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ADMIN_URL; ?>report"><i class="icon-notebook"></i> Report Daily</a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-bullhorn"></i> Tools</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>tools/fbgroup">Facebook Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>tools/postfb">Post to Group FB</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>tools/linkads">Recomeded for Ads</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($level == "admin"): ?>
                    <li class="divider"></li>
                    <li class="nav-title">
                        Admin
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> User</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>admin/user" target="_top">Level Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ADMIN_URL; ?>admin/user/add" target="_top">Level User</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>