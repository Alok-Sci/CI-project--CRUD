<section class="rounded-4" style="min-height: 100vh;">
    <div class="row py-3">
        <div class="col-12">

            <form class="card border border-light-subtle rounded-3 shadow-lg" action="<?= base_url('user/add'); ?>"
                  method="post" enctype="multipart/form-data">

                <!-- back button  -->
                <div class="row position-absolute">
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>"
                       class="btn btn-dark "><i class="fa-solid fa-arrow-left pe-3"></i> Go Back</a>
                </div>
                <div class="row">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <!-- form title  -->
                        <div class="text-center mb-3">
                            <p class="fs-1 fw-bold">User Information
                                <span class="d-none d-lg-inline-block">: <?= $user[0]->name ?></span>
                            </p>
                        </div>
                        <hr>
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

                            <!-- form main content -->
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <img class="border border-dark rounded-3 shadow-sm img-fluid mx-auto"
                                             src="<?= base_url('/uploads/') . $user[0]->pic_name ?>" alt="User Avatar"
                                             width="200px" height="270px" style="max-width: 300px;">
                                    </div>
                                    <div class="row mt-2">
                                        <img class="border border-dark rounded-3 shadow-sm img-fluid mx-auto"
                                             src="<?= base_url('/uploads/') . $user[0]->sign_pic_name ?>"
                                             alt="User Avatar"
                                             width="200px" height="100px" style="max-width: 300px;">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8 fs-6 fs-lg-4">

                                    <table class="table table-stripped">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold">Name</td>
                                                <td><?= $user[0]->name ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Father's Name</td>
                                                <td><?= $user[0]->father ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Mother's Name</td>
                                                <td><?= $user[0]->mother ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Email</td>
                                                <td><?= $user[0]->email ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Gender</td>
                                                <td><?= $user[0]->gender ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">DOB</td>
                                                <td><?= $user[0]->dob ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Country of residence</td>
                                                <td><?= $user_country ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">State of residence</td>
                                                <td><?= $user_state ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">City of residence</td>
                                                <td><?= $user_city ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Pincode</td>
                                                <td><?= $user[0]->pincode ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Qualification</td>
                                                <td><?= $user[0]->qualification ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Technical Skills</td>
                                                <td><?= $user[0]->tech_skills ?></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Description</td>
                                                <td><?= $user[0]->description ?></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>


                        </div>
                    </div>

            </form>
        </div>

    </div>
</section>