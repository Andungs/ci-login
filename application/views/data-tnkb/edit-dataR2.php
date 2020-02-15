<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb text-gray-800 "><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('flash'); ?>
        </div>

        <div class="col-lg-8 shadow-lg p-5 rounded-lg">

            <form action="<?= base_url('Data/editDataR2/') . $data['id'] ?>" method="POST">
                <div class="form-group row">
                    <input type="hidden" value="<?= $data['id'] ?>">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-capitalize" id="tanggal" name="tanggal" value="<?= $data['Tanggal'] ?>">
                        <small class="text-danger mb-0"> <?= form_error('tanggal'); ?> </small>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="nopol" class="col-sm-2 col-form-label">Nomor Polisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" id="nopol" name="nopol" value="<?= $data['NomorPolisi'] ?>">
                        <small class="text-danger mb-0"> <?= form_error('nopol'); ?> </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <?php if ($data['Keterangan'] == 1) : ?>
                            <input type="checkbox" class="custom-control-input" name="keterangan" id="keterangan" value="1" checked>
                        <?php else : ?>
                            <input type="checkbox" class="custom-control-input" name="keterangan" id="keterangan" value="1">
                        <?php endif; ?>
                        <label class="custom-control-label" for="keterangan">Sudah Tercetak </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-12 ">
                        <button type="submit" class="btn btn-primary float-right"> Edit </button>
                    </div>
                </div>


            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->