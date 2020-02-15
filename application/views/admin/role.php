<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 "><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>')  ?>
            <?= $this->session->flashdata('flash'); ?>

            <a href="" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">Role</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($userRole as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['role'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleAccess/') . $u['id'] ?>" class="badge badge-warning">
                                    <i class="fas fa-fw fa-vote-yea mr-1"></i>Access
                                </a>
                                <a href="<?= base_url('admin/editRole/') . $u['id'] ?>" class="badge badge-success ">
                                    <i class="fas fa-fw fa-edit mr-1"></i>Edit
                                </a>
                                <a href="<?= base_url('admin/deleteRole/') . $u['id'] ?>" class="badge badge-danger">
                                    <i class="fas fa-fw fa-trash mr-1"></i>Delete
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


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addRole') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="Role" name="Role" placeholder="Input New Role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Role</button>
                </div>
            </form>
        </div>
    </div>
</div>