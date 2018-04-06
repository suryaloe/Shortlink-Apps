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
                    <form method="post">
                        <?php
                        $bulan=array(
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'
                        );
                        $dateTime = new DateTime("now", new DateTimeZone('Asia/Makassar'));
                        $thn = $dateTime->format('Y');
                        $bln = $dateTime->format('m');
                        $tgl = $dateTime->format('d');
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User</strong>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="ccmonth">User</label>
                                                <select class="form-control" name="user_id">
                                                    <?php
                                                    foreach($listuser as $l) {
                                                    if (isset($post["user_id"])) {
                                                    if ($post["user_id"] == $l->id) {
                                                    echo '<option value="'.$l->id.'" selected>'.$l->nama.'</option>';
                                                    } else {
                                                    echo '<option value="'.$l->id.'">'.$l->nama.'</option>';
                                                    }
                                                    } else {
                                                    echo '<option value="'.$l->id.'">'.$l->nama.'</option>';
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/.row-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>From Date</strong>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="ccmonth">Day</label>
                                                <select class="form-control" name="day_from">
                                                    <?php
                                                    for($i=1;$i<=31;$i++){
                                                    if (isset($post["day_from"])) {
                                                    if (sprintf("%02d", $i) == $post["day_from"]) {
                                                    echo "<option value='".sprintf("%02d", $i)."' selected>";
                                                        } else {
                                                        echo "<option value='".sprintf("%02d", $i)."'>";
                                                            }
                                                            echo sprintf("%02d", $i);
                                                        echo "</option>";
                                                        } else {
                                                        if (sprintf("%02d", $i) == $tgl) {
                                                        echo "<option value='".sprintf("%02d", $i)."' selected>";
                                                            } else {
                                                            echo "<option value='".sprintf("%02d", $i)."'>";
                                                                }
                                                                echo sprintf("%02d", $i);
                                                            echo "</option>";
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="ccmonth">Month</label>
                                                        <select class="form-control" name="month_from">
                                                            <?php
                                                            foreach($bulan as $b => $nama){
                                                            if (isset($post["month_from"])) {
                                                            if ($post["month_from"] == $b) {
                                                            echo "<option value={$b} selected>{$nama}</option>";
                                                            }
                                                            else {
                                                            echo "<option value={$b}>{$nama}</option>";
                                                            }
                                                            } else {
                                                            if ($bln == $b) {
                                                            echo "<option value={$b} selected>{$nama}</option>";
                                                            }
                                                            else {
                                                            echo "<option value={$b}>{$nama}</option>";
                                                            }
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label for="ccyear">Year</label>
                                                        <select class="form-control" name="year_form">
                                                            <?php
                                                            for($i=2014;$i<=2025;$i++){
                                                            if (isset($post["year_form"])) {
                                                            if ($i == $post["year_form"]) {
                                                            echo "<option value={$i} selected>{$i}</option>";
                                                            } else {
                                                            echo "<option value={$i}>{$i}</option>";
                                                            }
                                                            } else {
                                                            if ($i == $thn) {
                                                            echo "<option value={$i} selected>{$i}</option>";
                                                            } else {
                                                            echo "<option value={$i}>{$i}</option>";
                                                            }
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--/.row-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>From Date</strong>
                                            </div>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="ccmonth">Day</label>
                                                        <select class="form-control" name="day_to">
                                                            <?php
                                                            for($i=1;$i<=31;$i++){
                                                            if (isset($post["day_to"])) {
                                                            if (sprintf("%02d", $i) == $post["day_to"]) {
                                                            echo "<option value='".sprintf("%02d", $i)."' selected>";
                                                                } else {
                                                                echo "<option value='".sprintf("%02d", $i)."'>";
                                                                    }
                                                                    echo sprintf("%02d", $i);
                                                                echo "</option>";
                                                                } else {
                                                                if (sprintf("%02d", $i) == $tgl) {
                                                                echo "<option value='".sprintf("%02d", $i)."' selected>";
                                                                    } else {
                                                                    echo "<option value='".sprintf("%02d", $i)."'>";
                                                                        }
                                                                        echo sprintf("%02d", $i);
                                                                    echo "</option>";
                                                                    }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="ccmonth">Month</label>
                                                                <select class="form-control" name="month_to">
                                                                    <?php
                                                                    foreach($bulan as $b => $nama){
                                                                    if (isset($post["month_to"])) {
                                                                    if ($post["month_to"] == $b) {
                                                                    echo "<option value={$b} selected>{$nama}</option>";
                                                                    }
                                                                    else {
                                                                    echo "<option value={$b}>{$nama}</option>";
                                                                    }
                                                                    } else {
                                                                    if ($bln == $b) {
                                                                    echo "<option value={$b} selected>{$nama}</option>";
                                                                    }
                                                                    else {
                                                                    echo "<option value={$b}>{$nama}</option>";
                                                                    }
                                                                    }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label for="ccyear">Year</label>
                                                                <select class="form-control" name="year_to">
                                                                    <?php
                                                                    for($i=2014;$i<=2025;$i++){
                                                                    if (isset($post["year_to"])) {
                                                                    if ($i == $post["year_to"]) {
                                                                    echo "<option value={$i} selected>{$i}</option>";
                                                                    } else {
                                                                    echo "<option value={$i}>{$i}</option>";
                                                                    }
                                                                    } else {
                                                                    if ($i == $thn) {
                                                                    echo "<option value={$i} selected>{$i}</option>";
                                                                    } else {
                                                                    echo "<option value={$i}>{$i}</option>";
                                                                    }
                                                                    }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/.row-->
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-sm btn-success" name="getreport"><i class="fa fa-dot-circle-o"></i> Get Report</button>
                                                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-7 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Report Team Social Media</strong>
                                        </div>
                                        <div class="card-block">
                                            <div style="margin-bottom:10px;">
                                                Count : <span style="font-weight:bold;font-size:18px;"><?= $count_all; ?></span>
                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
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
                                                        <td><?= $value->user_nama; ?></td>
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