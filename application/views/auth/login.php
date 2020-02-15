<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg- col-md-">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">TNKB SAMSAT</h1>
                                </div>
                                <div class=" text-center">
                                    <img src="<?= base_url('assets/img/logo/logo.png') ?>" class=" mb-4" style="width: 200px" alt="logo samsat">
                                </div>
                                <?php if ($this->session->flashdata('flash')) : ?>
                                    <?= $this->session->flashdata('flash'); ?>
                                <?php endif; ?>
                                <form class="user" action="<?= base_url('Auth'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="" placeholder="Masukkan Username" value="<?= set_value('email'); ?>">
                                        <small class="text-danger"> <?= form_error('email'); ?> </small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password">
                                        <small class="text-danger"> <?= form_error('password'); ?> </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Datar Akun klik Disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>