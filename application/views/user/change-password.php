<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb text-gray-800 "><?= $title ?></h1>
    <div class="row">

        <div class="col-lg-8 shadow-lg pt-4 rounded-lg">

            <?=
                form_open('user/changePassword');
            ?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                    <small class="text-danger mb-0"> <?= form_error('oldpassword'); ?> </small>

                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password Baru </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password1" name="password1">
                    <small class="text-danger mb-0"> <?= form_error('password1'); ?> </small>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Konfirmasi Password </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password2" name="password2">
                    <small class="text-danger mb-0"> <?= form_error('password2'); ?> </small>
                </div>
            </div>

            <div class="col-sm-12">
                <hr>
            </div>
            <div class="form-group row ">
                <div class="col-sm-12 ">
                    <button type="submit" class="btn btn-primary float-right"> Ganti </button>
                </div>
            </div>


            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->