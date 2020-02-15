<div class="container-fluid">
    <div style="background-image: url( <?= base_url('assets/img/logo/logo.png') ?>);" class="img page-holder">
        <h1 class="h3 mb-4 text-gray-800 "><?= $title ?></h1>
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 ">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">R2 Sudah Tercetak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($r2sudahCetak) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-motorcycle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 ">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">R2 Belum Tercetak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($r2belumCetak) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-motorcycle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2 ">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">R4 Sudah Tercetak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($r4sudahCetak) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 ">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">R4 Belum Tercetak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($r4belumCetak) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>