<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 "><?= $title ?></h1>
    <div class="row">

        <div class="col-md-6"><?= $this->session->flashdata('flash'); ?></div>
    </div>
    <div class="card mb-3 border-left-primary col-lg-7 shadow-lg ">
        <div class="row no-gutters">
            <div class="col-md-4 p-2">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img rounded-circle p-2 img-thumbnail" style="max-height:150px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since : <?= date('d-F-Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->