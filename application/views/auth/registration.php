<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-xl-6 mx-auto ">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create Account!</h1>
                        </div>
                        <form action="" method="POST" class="user">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                <small class="text-danger"> <?= form_error('name');  ?> </small>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <small class="text-danger"> <?= form_error('email');  ?> </small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                                    <small class="text-danger"> <?= form_error('password1');  ?> </small>

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>