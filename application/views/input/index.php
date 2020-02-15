<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg- col-md-">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col">
                            <div class=" text-center mt-4">
                                <img src="<?= base_url('assets/img/logo/logo.png') ?>" class=" mb-4" style="width: 200px" alt="logo samsat">

                            </div>
                            <div class="pl-5 pr-5 pb-5 ">


                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"> Selamat Datang Pak <?= $user['name'] ?> </h1>
                                </div>
                                <?= $this->session->flashdata('flash'); ?>
                                <hr>
                                <p class="text-center text-capitalize text-primary">Silahkan Pilih opsi Pak/Ibu </p>
                                <a href="#" class="btn bg-secondary btn-block text-white text-uppercase rounded-pill">
                                    <i class="fas fa-fw fa-motorcycle mr-2"></i>
                                    input tnkb roda dua
                                </a>
                                <a href="#" class="btn bg-secondary btn-block text-white text-uppercase rounded-pill">
                                    <i class="fas fa-fw fa-car-side mr-2"></i>
                                    input tnkb roda empat
                                </a>
                                <hr>
                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-user rounded-pill btn-block">Keluar Dari Aplikasi</a>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>