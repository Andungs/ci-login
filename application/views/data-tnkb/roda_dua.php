<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800 ">Data TNKB Roda Dua</h1>

    <?php if (validation_errors()) :  ?>
        <div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
            <?= validation_errors() ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-11">
            <?= $this->session->flashdata('flash'); ?>

            <a href="" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#tambahData">Tambah Data</a>

            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nomor Polisi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $d) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $d['Tanggal']  ?></td>
                                        <td class="text-uppercase"><?= $d['NomorPolisi'] ?></td>
                                        <?php if ($d['Keterangan'] == 1) : ?>
                                            <td> <span class="badge badge-success">Sudah Tercetak</span></td>
                                        <?php else : ?>
                                            <td> <span class="badge badge-danger">Belum Tercetak</span></td>

                                        <?php endif ?>
                                        <td>
                                            <a href="<?= base_url('Data/hapusDataR2/') . $d['id'] ?>" class="btn btn-danger btn-sm float-right ml-2" onclick=" return confirm('Hapus: <?= $d['NomorPolisi']  ?>?'); ">
                                                hapus
                                                <i class="fas fa-fw fa-trash"></i>
                                            </a>
                                            <a href="<?= base_url('Data/editDataR2/') . $d['id'] ?>" class="btn btn-success btn-sm float-right">
                                                edit
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Roda Dua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('data/tambahData/') . 'roda_dua' ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan : Tgl/Bulan/Tahun">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nomorPolisi" name="nomorPolisi" placeholder="Masukkan Nomor Polisi(Tanpa Spasi) ">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="keterangan" id="keterangan" value="1">
                            <label class="custom-control-label" for="keterangan">Sudah Tercetak ?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>