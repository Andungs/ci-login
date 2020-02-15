<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 "><?= $title ?></h1>
    <div class="row">
        <div class="col">
            <?php if (validation_errors()) :  ?>
                <div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('flash'); ?>


            <table class="table table-hover border-bottom-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role_id</th>
                        <th scope="col">is_Active</th>
                        <th scope="col">date_created</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dataUser as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $u['name'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td><?= $u['role_id'] ?></td>
                            <td><?= $u['is_active'] ?></td>
                            <td><?= date('D-FY', $u['date_created'])  ?></td>
                            <td>
                                <a href="<?= base_url('Menu/editUser') ?>" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <a href="<?= base_url('Menu/deleteUser') ?>" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-fw fa-trash"></i>
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