<main class="main">
            <br/>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="card card-inverse card-primary">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="icon-pie-chart"></i>
                                    </div>
                                    <div class="h4 mb-0"><?= $click_count; ?></div>
                                    <small class="text-muted text-uppercase font-weight-bold">Total Click</small>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="card">
                            <div class="card-header">
                                Platform
                            </div>
                            <div class="card-block">
                                <div class="chart-wrapper"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="canvas-5" width="494" height="246" class="chartjs-render-monitor" style="display: block; width: 494px; height: 246px;"></canvas>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card">
                            <div class="card-header">
                                Browser
                            </div>
                            <div class="card-block">
                                <div class="chart-wrapper"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas id="canvas-3" width="494" height="246" class="chartjs-render-monitor" style="display: block; width: 494px; height: 246px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Referer &amp; Country
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <ul class="horizontal-bars type-2">
                                            <?php 
                                                foreach ($referer as $r): 
                                                    $val = ($r->count / $referer_count) * 100;
                                            ?>
                                                <li>
                                                    <div class="title">
                                                        <?= $r->referer; ?>
                                                    </div>
                                                    <div class="bars">
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $val; ?>%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-sm-12 col-lg-6">
                                            
                                            <ul class="horizontal-bars type-2">
                                            <?php 
                                                foreach ($countries as $c): 
                                                    $val = round(($c->count / $countries_count) * 100,2);
                                                    if (trim($c->countries) == "") { $c->countries = "unknown"; }
                                            ?>
                                                <li>
                                                    <span class="title"><?= $c->countries; ?></span>
                                                    <span class="value"><?= $val; ?>%</span>
                                                    <div class="bars">
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $val; ?>%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <!--/.col-->
                                        
                                    </div>
                                    <!--/.row-->
                                    <br>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>

                </div>

            </div>
            <!-- /.conainer-fluid -->
        </main>