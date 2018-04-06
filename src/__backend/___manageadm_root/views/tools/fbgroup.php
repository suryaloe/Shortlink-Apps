<link rel="stylesheet" href="<?= ASSETSADMIN_URL; ?>js/jQueryUI/jquery-ui.css">
<main class="main">
    <br/>
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
                    <strong>Success!</strong> <?= $this->session->userdata('message'); ?>
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
                <?php if ($this->session->userdata('warning') <> ''): ?>
                <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                    </button>
                    <strong>Warning!</strong> <?= $this->session->userdata('warning'); ?>
                </div>
                <?php endif; if ( $this->session->userdata('postdata') ) { $postdata = $this->session->userdata('postdata'); }?>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Facebook Group</strong>
                    </div>
                    <form method="post">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="loading text-center"></div>
                                <div class="form-group outputurl">
                                    <label for="shorturl">Category</label>
                                    <input type="text" name="cat" id="cat_fbgroup" class="form-control" placeholder="Category Group">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="loading text-center"></div>
                                <div class="form-group outputurl">
                                    <label for="shorturl">Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="Link Group">
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i> &nbsp; Add Group to Database</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <strong>List Facebook Group</strong>
                    </div>
                    <div class="card-block">
                    <form method="get">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search Your URL" value="<?= $q; ?>">
                                    <?php if ($q <> "") { ?>
                                    <span class="input-group-btn">
                                        <a href="<?= ADMIN_URL."tools/fbgroup"; ?>">
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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Link</th>
                                    <th>User Add</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="listfbgroup">
                                <?php foreach($list as $key => $value): ?>
                                    <tr>
                                    <td><?= $value->name; ?></td>
                                    <td><a href="<?= $value->link; ?>" target="_blank"><?= $value->link; ?></a></td>
                                    <td><?= $value->user; ?></td>
                                    <td>
                                        <a onclick="javascript: return confirm('Are You Sure Delete It?')" href="<?= ADMIN_URL . "tools/fbgroup/delete/{$value->id}"; ?>"><span class="badge badge-danger">Delete</span></a>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="clearfix" style="margin-bottom:10px;"></div>
                        <?= $pagination; ?>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
    </div>
</div>
<!-- /.conainer-fluid -->
</main>
<script>
    var asset_url = "<?= ASSETSADMIN_URL; ?>";
    var adminurl = "<?= ADMIN_URL; ?>";
</script>