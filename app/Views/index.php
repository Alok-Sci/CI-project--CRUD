<section class="container">
    <?php
    $session = session();
    $error   = $session->getFlashdata('error');
    $success = $session->getFlashdata('success');
    if ($error || $success):
        $divClass  = $error ? 'text-danger border-danger bg-danger-subtle' : 'text-success border-success bg-success-subtle';
        $iconClass = $error ? 'exclamation-circle' : 'check-circle';
        ?>
        <div class="col-12">
            <div
                 class="border border-1 rounded-2 <?= $divClass ?> text-center p-2">
                <i class="fa-solid fa-<?= $iconClass ?> pe-2"></i>
                <?= $error ?? $success ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-12 py-5 align-items-center" style="min-height: 80vh; height: 85vh">
        <div class="row text-center h-100 align-items-center">
            <div class="col-12 col-lg-8 mx-auto">
                <h1 class="fw-bold" style="font-size: 4em">Hi, <?= ucwords($admin_name) ?></h1>
                <p class="fs-1 fw-medium">Welcome to the Admin Panel!</p>
                <p class="fs-5 fw-light">Here in this platform, you can add new users or customers to the CRM database by simply clicking on the 'Create User' tab. <br> Or you may see the list of already registered records by clicking on the 'View Records' tab </p>
                <div class="row justify-content-between">
                    <div class="col-12 g-3">
                        <a href="<?= base_url('/user/add')?>" class="btn btn-dark fs-5 me-4"><i class="fa-solid fa-user-plus  pe-3"></i>Add Users</a>
                        <a href="<?= base_url('/user/list')?>" class="btn btn-dark fs-5"><i class="fa-solid fa-users-line  pe-3"></i>View Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>