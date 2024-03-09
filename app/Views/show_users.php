<section class="rounded-4" style="min-height: 85vh;">
    <div class="row py-3">
        <!-- <h1>Hi, <?php # ucwords($admin_name)       ?></h1> -->
        <h1>Hi, <?= ucwords($admin_name) ?></h1>
        <hr>
        <div class="card widget-card border-light shadow-lg pt-4">
            <!-- back button  -->
            <div class="row position-absolute" style="transform: translate(-10%, -50%);">
                <a href="<?= base_url('/') ?>" class="btn btn-dark "><i class="fa-solid fa-arrow-left pe-3"></i> Go
                    Back</a>
            </div>

            <!-- display error message  -->
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
                        </d>
                    </div>
                <?php endif; ?>
                <div class="card-body p-4">
                    <div class="table-responsive">

                        <table class="table table-borderless bsb-table-xl text-nowrap align-middle m-0">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <!-- <th>Country</th> -->
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $user->name ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->dob ?></td>
                                        <td><?= $user->gender ?></td>
                                        <!-- <td></td> -->
                                        <td><a href="<?= base_url('/user/' . $user->id . '/edit')?>"
                                               class="btn modify-btn"><i class="fa-solid fa-pencil pe-3"></i>Edit</a></td>
                                        <td><a href="<?= base_url('/user/' . $user->id . '/view')?>"
                                               class="btn modify-btn"><i class="fa-solid fa-eye pe-3"></i>View</a></td>
                                        <td><a class="btn btn-danger"
                                               href="<?= base_url('/user/' . $user->id . '/delete')?>"><i class="fa-solid fa-trash-can pe-3"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>