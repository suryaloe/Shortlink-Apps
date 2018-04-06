<main class="main">
    <br/>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Short URL</strong>
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" id="input2-group2" name="input2-group2" class="url-original form-control" placeholder="Enter Original URL">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn-short btn btn-primary">Shorten URL</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">URL</label>
                                    <input type="text" class="form-control" id="name" name="url" placeholder="Enter Original URL">
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="loading text-center"></div>
                                <div class="form-group outputurl">
                                    <label for="shorturl">Link Shortcut</label>
                                    <input type="text" id="shorturl" readonly class="form-control" placeholder="Output Short URL">
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                    <!--
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Shorten URL</button>
                    </div>
                    -->
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Last 5 URL Short</strong>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Original URL</th>
                                    <th>Created</th>
                                    <th>Short</th>
                                    <th>Click</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="listshorturl">
                            <?php foreach ($list_url as $key => $value): ?>
                                <tr>
                                    <td><?= $value->original_url; ?></td>
                                    <td><?= $value->tanggal; ?></td>
                                    <td><?= $value->shortcut; ?></td>
                                    <td><?= $value->count; ?></td>
                                    <td>
                                        <a href="<?= ADMIN_URL."link/detail/".$value->id; ?>"><span class="badge badge-success">Analytics Data</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
<script>
    var asset_url = "<?= ASSETSADMIN_URL; ?>";
    var adminurl = "<?= ADMIN_URL; ?>";
</script>