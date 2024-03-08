<section class="rounded-4" style="min-height: 100vh;">
    <div class="row py-3">
        <h1>Hi, <?= ucwords($admin_name) ?></h1>
        <hr>
        <div class="col-12">

            <form class="card border border-light-subtle rounded-3 shadow-lg pt-3"
                  action="<?= base_url('/user/edit/') . $edit_id ?>"
                  method="post" enctype="multipart/form-data">
                <!-- back button  -->
                <div class="row position-absolute" style="transform: translate(-10%, -50%);">
                    <a href="<?= base_url('/user/list') ?>" class="btn btn-dark "><i class="fa-solid fa-arrow-left pe-3"></i> Go
                        Back</a>
                </div>
                <div class="row">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <!-- form title  -->
                        <div class="text-center mb-3">
                            <p class="fs-1 fw-bold">Update User Information</p>
                        </div>
                        <hr>
                        <!-- display error message  -->
                        <div class="row mb-3">
                            <?php
                            $session = session();
                            $error   = $session->getFlashdata('error');
                            $success = $session->getFlashdata('success');
                            if ($error || $success):
                                $divClass  = $error ? 'text-danger border-danger bg-danger-subtle' : 'text-success border-success bg-success-subtle';
                                $iconClass = $error ? 'exclamation-circle' : 'check-circle';
                                ?>
                                <div class="col-12 text-center">
                                    <div
                                         class="border border-1 rounded-2 mx-auto <?= $divClass ?> text-center p-2">
                                        <i class="fa-solid fa-<?= $iconClass ?> pe-2"></i>
                                        <?= $error ?? $success ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- form main content -->
                        <div class="row gy-2 overflow-hidden">
                            <!-- first and last name  -->
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="form-floating">
                    <input type="text" class="form-control" placeholder="firstname" aria-label="firstname" name="firstname" value="<?php $name = explode(" ", $user[0]->name);
                    echo $name[0] ?? NULL ?>">
                    <label for="firstname" class="form-label">First Name</label>
                  </span>
                                    <span class="input-group-text"><i class="fa-solid fa-user px-2"></i></span>
                                    <span class="form-floating">
                    <input type="text" class="form-control" placeholder="lastname" aria-label="lastname" name="lastname" value="<?php echo $name[1] ?? NULL ?>">
                    <label for="lastname" class="form-label">Last Name</label>
                  </span>
                                </div>
                            </div>

                            <!-- father name  -->
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="fathername" id="fathername"
                                           placeholder="John Doe"
                                           value="<?= $user[0]->father ?? NULL ?>"
                                           required>
                                    <label for="fathername" class="form-label">Father's Name</label>
                                </div>
                            </div>

                            <!-- mother name -->
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="mothername" id="mothername"
                                           placeholder="John Doe"
                                           value="<?= $user[0]->mother ?? NULL ?>"
                                           required>
                                    <label for="mothername" class="form-label">Mother's Name</label>
                                </div>
                            </div>

                            <!-- email -->
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="john@doe.com" value="<?= $user[0]->email ?? NULL ?>" required>
                                    <label for="email" class="form-label">Email</label>
                                </div>
                            </div>

                            <!-- gender -->
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12 fs-5 fw-medium">Gender</div>
                                </div>
                                <div class="row ps-4">
                                    <span class="col-auto form-check mb-3">
                                        <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?= $user[0]->gender === "male" ? "checked" : NULL ?>>
                                        <label for="male" class="form-check-label">Male</label>
                                    </span>
                                    <span class="col-auto form-check mb-3">
                                        <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?= $user[0]->gender == "female" ? "checked" : NULL ?>>
                                        <label for="female" class="form-check-label">Female</label>
                                    </span>
                                </div>
                            </div>

                            <!-- dob -->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="dob" class="form-label fw-medium fs-5">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                       value="<?= $user[0]->dob ?? NULL ?>">
                            </div>

                            <!-- qualification -->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="qualification" class="form-label fw-medium fs-5">Highest
                                    Qualification</label>
                                <select class="form-select" aria-label="qualification" name="qualification">
                                    <option disabled>-- Select Highest Qualification --</option>
                                    <option value="high_school" <?= $user[0]->qualification === 'high_school' ? 'selected' : NULL ?>>High School Diploma</option>
                                    <option value="associates" <?= $user[0]->qualification === 'associates' ? 'selected' : NULL ?>>Associate's Degree</option>
                                    <option value="bachelors" <?= $user[0]->qualification === 'bachelors' ? 'selected' : NULL ?>>Bachelor's Degree</option>
                                    <option value="masters" <?= $user[0]->qualification === 'masters' ? 'selected' : NULL ?>>
                                        Master's Degree</option>
                                    <option value="doctorate" <?= $user[0]->qualification === 'doctorate' ? 'selected' : NULL ?>>Doctorate/Ph.D.</option>
                                    <option value="professional" <?= $user[0]->qualification === 'professional' ? 'selected' : NULL ?>>Professional Certification</option>
                                </select>
                            </div>

                            <!-- Country of Residence-->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="country" class="form-label fw-medium fs-5">Country</label>
                                <select class="form-select" aria-label="country" name="country"
                                        onchange="loadState(this.value)">
                                    <option selected disabled>-- Select Highest Qualification --</option>
                                    <!-- load your country options here  -->
                                    <?php if (isset($countries)): ?>
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country->id ?>" <?= $user[0]->country_id === $country->id ? 'selected' : NULL ?>><?= $country->name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- State of Residence-->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="state" class="form-label fw-medium fs-5">State of Residence</label>
                                <select id="stateDropdown" class="form-select" aria-label="state" name="state" disabled
                                        onchange="loadCity(this.value)">
                                    <option selected disabled>-- Select state --</option>
                                    <!-- load your state options here  -->
                                    <?php if (isset(session()->states)): ?>
                                        <?php foreach (session()->states as $state): ?>
                                            <option value="<? # $state[0]->id    ?>" <?# $user[0]->country_id === $country ? 'selected' : NULL    ?>><? #$country[0]->name    ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- City of Residence-->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="city" class="form-label fw-medium fs-5">City of Residence</label>
                                <select class="form-select" aria-label="city" name="city" disabled>
                                    <option selected disabled>-- Select Highest Qualification --</option>
                                    <!-- load your city options here  -->
                                </select>
                            </div>

                            <!-- pincode -->
                            <div class="col-12 col-lg-6 my-2">
                                <label for="piccode" class="form-label fw-medium fs-5">Pincode</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-map-pin px-3"></i></span>
                                    <input type="number" name="pincode" maxlength="6" id="pincode" class="form-control"
                                           value="<?= $user[0]->pincode ?? NULL ?>"
                                           placeholder="Enter your pincode">
                                </div>
                            </div>

                            <!-- tech skills  -->
                            <div class="col-12 my-2">
                                <label for="techSkillsGroup" class="fw-medium fs-5">Tech Skills</label>
                                <div id="techSkillsGroup" class="row ps-3 bg-blue">
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="html"
                                               value="html" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'html' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="html" class="form-check-label">HTML</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="css"
                                               value="css" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'css' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="css" class="form-check-label">CSS</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="js"
                                               value="js" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'js' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="js" class="form-check-label">JavaScript</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="php"
                                               value="php" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'php' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="php" class="form-check-label">PHP</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="git"
                                               value="git" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'git' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="git" class="form-check-label">Git</label>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]"
                                               id="tailwind" value="tailwind" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'tailwind' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="tailwind" class="form-check-label">Tailwind CSS</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="json"
                                               value="json" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'json' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="json" class="form-check-label">JSON</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="sql"
                                               value="sql" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'sql' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="sql" class="form-check-label">MySQL</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="react"
                                               value="react" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'react' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="react" class="form-check-label">React.js</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]"
                                               id="angular" value="angular" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'angular' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="angular" class="form-check-label">Angular.js</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="jquery"
                                               value="jquery" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'jquery' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="jquery" class="form-check-label">JQuery</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="nodejs"
                                               value="nodejs" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'nodejs' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="nodejs" class="form-check-label">Node.js</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]"
                                               id="laravel" value="laravel" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'laravel' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="laravel" class="form-check-label">Laravel PHP framework</label>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="tech_skills[]" id="ci"
                                               value="ci" <?php foreach ($tech_skills as $tech_skill) {
                                                   echo $tech_skill === 'ci' ? 'checked' : NULL;
                                               } ?>>
                                        <label for="ci" class="form-check-label">CodeIgniter PHP framework</label>
                                    </div>
                                </div>
                            </div>

                            <!-- description  -->
                            <div class="col-12 my-2">
                                <label for="description" class="form-label fw-medium fs-5">Users' Bio</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="4"
                                          placeholder="Write some remarks about the user..."><?= $user[0]->description ?? NULL ?></textarea>
                            </div>

                            <!-- profile pic  -->
                            <div class="col-12 col-lg-6">
                                <span class="fs-5 fw-medium">Upload a Profile Picture</span>
                                <div class="input-group">
                                    <span class="input-group-text fs-4 px-3"><i class="fa-solid fa-id-badge"></i></span>
                                    <input class="form-control" type="file" name="profile_pic" id="profile_pic"
                                           value="<?= $user[0]->pic_name ?? NULL ?>">
                                </div>
                            </div>

                            <!-- sign pic  -->
                            <div class="col-12 col-lg-6">
                                <span class="fs-5 fw-medium">Upload a Signature Picture</span>
                                <div class="input-group">
                                    <span class="input-group-text fs-4 px-3"><i class="fa-solid fa-signature"></i></span>
                                    <input class="form-control" type="file" name="sign_pic" id="sign_pic"
                                           value="<?= $user[0]->sign_pic_name ?? NULL ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-grid my-3">
                                <button class="btn btn-dark btn-lg" type="submit"
                                        name="login"><i class="fa-solid fa-user-plus pe-3"></i>Update User
                                    Record</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</section>