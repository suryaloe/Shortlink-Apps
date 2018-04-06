<?php $level = $this->session->userdata('level'); ?>
<link rel="stylesheet" type="text/css" href="<?= ASSETSADMIN_URL; ?>css/bootstrap-table.css">
<main class="main">
    <br/>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6">
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
                        <?php if ($level == "admin"): ?>
                        <!-- S:Level Admin -->
                        <div class="col-sm-12">
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
                        <!-- E:Level Admin -->
                        <?php endif; ?>
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
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Get Report</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Report Shortcut Link
                        </div>
                        <div class="card-block">
                            <div style="margin-bottom:10px;">
                            Count Visitor : <span style="font-weight:bold;font-size:18px;"><?= $count; ?></span>
                            </div>
                            <table data-toggle="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-field="shortcut" data-sortable="true">Short</th>
                                        <th data-field="visitor" data-sortable="true">Visitor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($list)) { foreach($list as $key => $value): ?>
                                    <tr>
                                        <td><?= str_replace("http://","",base_url($value->shortcut)); ?></td>
                                        <td><?= $value->count; ?></td>
                                    </tr>
                                    <?php endforeach; }?>
                                </tbody>
                            </table>
                            <?php //$pagination; ?>
                            <!-- Pagination Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.conainer-fluid -->
    </main>