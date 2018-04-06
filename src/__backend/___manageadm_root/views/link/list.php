<?php $level = $this->session->userdata('level'); ?>
<link rel="stylesheet" type="text/css" href="<?= ASSETSADMIN_URL; ?>css/bootstrap-table.css">
<main class="main">
            <br/>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> List Shortcut Link
                                </div>
                                <div class="card-block">
                                <form method="get">
                                <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" name="q" class="form-control" placeholder="Search Your URL" value="<?= $q; ?>">
                                                    <?php if ($q <> "") { ?>
                                                    <span class="input-group-btn">
                                                        <a href="<?= ADMIN_URL."link/list"; ?>">
                                                        <button type="button" class="btn btn-warning"><i class="fa fa-close"></i> Reset</button>
                                                        </a>
                                                    </span>
                                                    <?php } ?>
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <table data-toggle="table" class="table table-striped table-responsive table-hover table-outline">
                                        <thead>
                                            <tr>
                                                <th data-field="original_url" data-sortable="true" style="width: 30%;">Original URL</th>
                                                <?php if ($level == "admin") { echo '<th data-field="user" data-sortable="true">User</th>'; } ?>
                                                <th data-field="created" data-sortable="true">Created</th>
                                                <th data-field="short" data-sortable="true">Short</th>
                                                <th data-field="click" data-sortable="true">Click</th>
                                                <th data-field="act_field" data-sortable="false">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list as $key => $value): ?>
                                            <tr>
                                                <td><?= $value->original_url; ?></td>
                                                <?php if ($level == "admin") { echo '<td>'.$value->nama.'</td>'; } ?>
                                                <td><?= $value->tanggal; ?></td>
                                                <td><a href="http://<?= $value->shortcut; ?>" target="_blank"><?= $value->shortcut; ?></a></td>
                                                <td><?= $value->count; ?></td>
                                                <td>
                                                    <a href="<?= ADMIN_URL . "link/detail/{$value->id}"; ?>"><span class="badge badge-success">Analytics</span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="clearfix" style="margin-bottom:10px;"></div>
                                    <?= $pagination; ?>
                                    <!-- Pagination Here -->
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            <!-- /.conainer-fluid -->
        </main>