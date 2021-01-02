<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-dark"><i class="fas fa-tachometer-alt fa-lg"></i></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Visitor Inside</span>
                            <span class="info-box-number">
                                <?= $inside ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Visitor Today</span>
                            <span class="info-box-number">
                                <?= $today ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user-minus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Visitor Yesterday</span>
                            <span class="info-box-number">
                                <?= $yesterday ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Visitor This Week</span>
                            <span class="info-box-number">
                                <?= $thisweek ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-dark"> <b> Visitor Per Month / <?= date('Y') ?> </b></h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="areaChart" style="height:250px; min-height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
</div>