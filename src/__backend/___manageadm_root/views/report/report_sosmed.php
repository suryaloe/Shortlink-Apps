<main class="main">
    <br/>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-lg-12 col-sm-12">
        <?php if (isset($warning)) { ?>
            <div class="alert alert-block alert-danger fadeIn">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Peringatan !!!</strong> <?php echo $warning; ?>
            </div>
        <?php }
        if (isset($sukses)) { ?>
            <div class="alert alert-success alert-block fadeIn">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <h4>
                    <i class="fa fa-ok-sign"></i>
                    Success!
                </h4>
                <p><?php echo $sukses; ?></p>
            </div>
        <?php } if ($this->session->userdata('message') <> '') {?>
            <div class="alert alert-info fadeIn">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>INFO!</strong> <?php echo $this->session->userdata('message'); ?>
            </div>
        <?php } ?>
        </div>
            <div class="col-lg-5 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Send Report</strong>
                    </div>
                    <form method="post" class="form-horizontal">
                    <div class="card-block">
                        <div class="card-block">
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-email">Facebook</label>
                                    <input type="text" name="fb_count" class="form-control" placeholder="Jumlah Post Facebook">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Twitter</label>
                                    <input type="text" name="twitter_count" class="form-control" placeholder="Jumlah Post Twitter">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Instagram Story</label>
                                    <input type="text" name="instastory_count" class="form-control" placeholder="Jumlah Post Instagram Story">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Instagram Timeline</label>
                                    <input type="text" name="insta_count" class="form-control" placeholder="Jumlah Post Instagram">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Line Broadcast</label>
                                    <input type="text" name="linebc_count" class="form-control" placeholder="Jumlah Line Broadcast">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Line Post</label>
                                    <input type="text" name="line_count" class="form-control" placeholder="Jumlah Post Line">
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Youtube</label>
                                    <input type="text" name="youtube_count" class="form-control" placeholder="Jumlah Upload Youtube">
                                </div>
                                <hr/>
                                <div class="form-group row">
                                    <label class="form-control-label" for="hf-password">Link Attach Screenshot</label>
                                    <input type="text" name="link_attach" class="form-control" placeholder="Link Screenshot">
                                </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary" name="sendreport"><i class="fa fa-dot-circle-o"></i> Send Report</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--/.col-->
            <div class="col-lg-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Last Send Report</strong>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>FB</th>
                                    <th>Twitter</th>
                                    <th>Insta</th>
                                    <th>Line</th>
                                    <th>YT</th>
                                    <th>Link</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="listshorturl">
                            <?php foreach ($list as $value): ?>
                                <tr>
                                    <td><?= $value->tanggal; ?></td>
                                    <td><?= $value->facebook; ?></td>
                                    <td><?= $value->twitter; ?></td>
                                    <td><?= $value->instagram; ?></td>
                                    <td><?= $value->line; ?></td>
                                    <td><?= $value->youtube; ?></td>
                                    <td><a href="<?= $value->link_attach; ?>" target="_blank">Attach</a></td>
                                    <td>
                                    <a onclick="javascript: return confirm('Are You Sure Delete It?')" href="<?= ADMIN_URL . "report/delete/{$value->id}"; ?>"><span class="badge badge-danger"><i class="fa fa-close"></i> Delete</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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