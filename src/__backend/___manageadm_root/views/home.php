<!-- Main content -->
        <main class="main">

            <br/>


            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card card-inverse card-primary">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="icon-pie-chart"></i>
                                    </div>
                                    <div class="h4 mb-0"><?= $data["count_click"]; ?></div>
                                    <small class="text-muted text-uppercase font-weight-bold">Total Click Today</small>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-sm-12 col-lg-6">
                            <div class="card card-inverse card-danger">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="icon-chart"></i>
                                    </div>
                                    <div class="h4 mb-0"><?= $data["count_url"]; ?></div>
                                    <small class="text-muted text-uppercase font-weight-bold">Shortlink Today</small>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->

                   

                   
                </div>


            </div>
            <!-- /.conainer-fluid -->
        </main>