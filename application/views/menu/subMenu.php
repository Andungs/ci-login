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

            <a href="" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#newSubMenuModal">AddSubMenu Menu</a>
            <table class="table table-hover border-bottom-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">menu_id</th>
                        <th scope="col">title</th>
                        <th scope="col">url</th>
                        <th scope="col">icon</th>
                        <th scope="col">is_active</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['title'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $sm['is_active'] ?></td>
                            <td>
                                <a href="<?= base_url('Menu/editSubMenu') ?>" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <a href="<?= base_url('Menu/deleteSubMenu') ?>" class="btn btn-danger btn-circle btn-sm">
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


<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New SubMenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/SubMenu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="menu" id="menu" class="form-control">
                            <option value="">select Menu</option>
                            <?php foreach ($menu as $m) :  ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Input title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Input url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Input icon">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" checked>
                            <label class="custom-control-label" for="is_active">is_active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add SubMenu</button>
                </div>
            </form>
        </div>
    </div>
</div>