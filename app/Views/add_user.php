<section class="rounded-4" style="min-height: 100vh;">
  <div class="row py-3">
    <h1>Hi, <?= ucwords($admin_name) ?></h1>
    <hr>
    <div class="col-12">

      <form class="card border border-light-subtle rounded-3 shadow-lg p-3" action="<?= base_url('user/add'); ?>"
            method="post" enctype="multipart/form-data">
        <!-- back button  -->
        <div class="row position-absolute d-none d-lg-block">
          <a href="<?= base_url('/') ?>" class="btn btn-dark "><i class="fa-solid fa-arrow-left pe-3"></i> Go
            Back</a>
        </div>
        <div class="row">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <!-- form title  -->
            <div class="text-center mb-3">
              <p class="fs-1 fw-bold">Register New User</p>
            </div>
            <hr>
            <!-- display error message  -->
            <div class="row">
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
              </div>

              <!-- form main content -->
              <div class="row gy-2 overflow-hidden">

                <!-- first and last name  -->
                <div class="col-12">
                  <div class="d-flex justify-content-between">
                    <span class="<?= isset($errors['firstname']) ? 'text-danger' : NULL ?>"><?= $errors['firstname'] ?? NULL ?></span><span class="<?= isset($errors['lastname']) ? 'text-danger' : NULL ?>"><?= $errors['lastname'] ?? NULL ?></span>
                  </div>
                  <div class="input-group mb-3">
                    <span class="form-floating">
                    <input type="text" class="form-control <?= isset($errors['firstname']) ? 'border border-danger text-danger' : NULL ?>" placeholder="firstname" aria-label="firstname" name="firstname">
                    <label for="firstname" class="form-label <?= isset($errors['firstname']) ? 'text-danger' : NULL ?>">First Name</label>
                  </span>
                    <span class="input-group-text"><i class="fa-solid fa-user px-2"></i></span>
                    <span class="form-floating">
                    <input type="text" class="form-control <?= isset($errors['lastname']) ? 'border border-danger text-danger' : NULL ?>" placeholder="lastname" aria-label="lastname" name="lastname">
                    <label for="lastname" class="form-label <?= isset($errors['lastname']) ? 'text-danger' : NULL ?>">Last Name</label>
                  </span>
                  </div>
                </div>

                <!-- father name  -->
                <div class="col-12 col-lg-6">
                  <span class="text-danger"><?= $errors['fathername'] ?? NULL ?></span>
                  <div class="form-floating mb-3">
                    <input type="text"
                           class="form-control <?= isset($errors['fathername']) ? 'border border-danger text-danger' : NULL ?>"
                           name="fathername" id="fathername"
                           placeholder="John Doe"
                           required>
                    <label for="fathername"
                           class="form-label <?= isset($errors['fathername']) ? 'text-danger' : NULL ?>">Father's
                      Name</label>
                  </div>

                </div>

                <!-- mother name -->
                <div class="col-12 col-lg-6">
                  <div class="d-flex text-end">
                    <span class="text-danger text-right"><?= $errors['mothername'] ?? NULL ?></span></div>
                  <div class="form-floating mb-3">
                    <input type="text"
                           class="form-control <?= isset($errors['mothername']) ? 'border border-danger text-danger' : NULL ?>"
                           name="mothername" id="mothername"
                           placeholder="John Doe"
                           required>
                    <label for="mothername"
                           class="form-label <?= isset($errors['mothername']) ? 'text-danger' : NULL ?>">Mother's
                      Name</label>

                  </div>

                </div>

                <!-- email -->
                <div class="col-12 col-lg-6">
                  <span class="text-danger"><?= $errors['email'] ?? NULL ?></span></label>
                  <div class="form-floating mb-3">
                    <input type="email"
                           class="form-control <?= isset($errors['email']) ? 'border border-danger text-danger' : NULL ?>"
                           name="email" id="email" value=""
                           placeholder="john@doe.com" required>
                    <label for="email"
                           class="form-label <?= isset($errors['email']) ? 'text-danger' : NULL ?> me-auto">Email
                  </div>

                </div>

                <!-- gender -->
                <div class="col-12 col-lg-6">
                  <div class="row <?= isset($errors['gender']) ? 'text-danger' : NULL ?>">
                    <div class="col-12 d-flex justify-content-between">
                      <span class="fs-5 fw-medium ">Gender </span><span class="text-danger"><?= $errors['gender'] ?? NULL ?></span>
                    </div>

                  </div>
                  <div class="row ps-4 ">
                    <span class="col-auto form-check mb-3">
                    <input type="radio" class="form-check-input <?= isset($errors['gender']) ? 'border border-danger' : NULL ?>" name="gender" id="male" value="male">
                    <label for="male" class="form-check-label">Male</label>
                  </span>
                    <span class="col-auto form-check mb-3">
                    <input type="radio" class="form-check-input <?= isset($errors['gender']) ? 'border border-danger' : NULL ?>" name="gender" id="female" value="female">
                    <label for="female" class="form-check-label">Female</label>
                  </span>
                  </div>
                </div>

                <!-- dob -->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="dob"
                           class="form-label fw-medium fs-5 <?= isset($errors['dob']) ? 'text-danger' : NULL ?>">Date of
                      Birth</label>
                    <span class="text-danger"><?= $errors['dob'] ?? NULL ?></span>
                  </div>
                  <input type="date"
                         class="form-control <?= isset($errors['dob']) ? 'border border-danger' : NULL ?>"
                         name="dob" id="dob">
                </div>

                <!-- qualification -->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="qualification"
                           class="form-label fw-medium fs-5 <?= isset($errors['qualification']) ? 'text-danger' : NULL ?>">Highest
                      Qualification</label>
                    <span class="text-danger"><?= $errors['qualification'] ?? NULL ?></span>
                  </div>
                  <select class="form-select <?= isset($errors['qualification']) ? 'border border-danger' : NULL ?>"
                          aria-label="qualification" name="qualification">
                    <option selected disabled>-- Select Highest Qualification --</option>
                    <option value="high_school">High School Diploma</option>
                    <option value="associates">Associate's Degree</option>
                    <option value="bachelors">Bachelor's Degree</option>
                    <option value="masters">Master's Degree</option>
                    <option value="doctorate">Doctorate/Ph.D.</option>
                    <option value="professional">Professional Certification</option>
                  </select>
                </div>


                <!-- Country of Residence-->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="country"
                           class="form-label fw-medium fs-5 <?= isset($errors['country']) ? 'text-danger' : NULL ?>">Country</label>
                    <span class="text-danger"><?= $errors['country'] ?? NULL ?></span>
                  </div>
                  <select id="countryDropdown"
                          class="form-select <?= isset($errors['country']) ? 'border border-danger' : NULL ?>"
                          aria-label="country" name="country">
                    <option value="" selected disabled>-- Select Highest Qualification --</option>
                    <!-- load your country options here  -->
                    <?php if (isset($countries)): ?>
                      <?php foreach ($countries as $country): ?>
                        <option value="<?= $country->id ?>"><?= $country->name ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>



                <!-- State of Residence-->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="state"
                           class="form-label fw-medium fs-5 <?= isset($errors['state']) ? 'text-danger' : NULL ?>">State
                      of Residence</label>
                    <span class="text-danger" ><?= $errors['state'] ?? NULL ?></span>
                  </div>
                  <select id="stateDropdown"
                          class="form-select <?= isset($errors['state']) ? 'border border-danger text-danger' : NULL ?>"
                          aria-label="state" name="state">
                    <option value="" disabled selected>-- Select state --</option>
                  </select>
                </div>

                <!-- City of Residence-->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="city"
                           class="form-label fw-medium fs-5 <?= isset($errors['city']) ? 'text-danger' : NULL ?>">City
                      of
                      Residence</label>
                    <span class="text-danger" ><?= $errors['city'] ?? NULL ?></span>
                  </div>
                  <select id="cityDropdown"
                          class="form-select <?= isset($errors['city']) ? 'border border-danger text-danger' : NULL ?>"
                          aria-label="city" name="city">
                    <option value="" disabled selected>-- Select city --</option>
                  </select>
                </div>

                <!-- pincode -->
                <div class="col-12 col-lg-6 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="qualification"
                           class="form-label fw-medium fs-5 <?= isset($errors['pincode']) ? 'text-danger' : NULL ?>">Pincode</label>
                    <span class="text-danger" ><?= $errors['pincode'] ?? NULL ?></span>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-map-pin px-3"></i></span>
                    <input type="number" name="pincode" maxlength="6" id="pincode"
                           class="form-control <?= isset($errors['pincode']) ? 'border border-danger text-danger' : NULL ?>"
                           placeholder="Enter your pincode">
                  </div>
                </div>

                <!-- tech skills  -->
                <div class="col-12 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="techSkillsGroup"
                           class="fw-medium fs-5 <?= isset($errors['tech_skills']) ? 'text-danger' : NULL ?>">Tech
                      Skills</label>
                    <span class="text-danger" ><?= $errors['tech_skills'] ?? NULL ?></span>
                  </div>
                  <div id="techSkillsGroup"
                       class="row ps-3 bg-blue ">
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="html" value="html">
                      <label for="html" class="form-check-label">HTML</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="css" value="css">
                      <label for="css" class="form-check-label">CSS</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="js" value="js">
                      <label for="js" class="form-check-label">JavaScript</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="php" value="php">
                      <label for="php" class="form-check-label">PHP</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="git" value="git">
                      <label for="git" class="form-check-label">Git</label>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="tailwind"
                             value="tailwind">
                      <label for="tailwind" class="form-check-label">Tailwind CSS</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="json" value="json">
                      <label for="json" class="form-check-label">JSON</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="sql" value="sql">
                      <label for="sql" class="form-check-label">MySQL</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="react" value="react">
                      <label for="react" class="form-check-label">React.js</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="angular" value="angular">
                      <label for="angular" class="form-check-label">Angular.js</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="jquery" value="jquery">
                      <label for="jquery" class="form-check-label">JQuery</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="nodejs" value="nodejs">
                      <label for="nodejs" class="form-check-label">Node.js</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="laravel" value="laravel">
                      <label for="laravel" class="form-check-label">Laravel PHP framework</label>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-check">
                      <input type="checkbox" class="form-check-input" name="tech_skills[]" id="ci" value="ci">
                      <label for="ci" class="form-check-label">CodeIgniter PHP framework</label>
                    </div>
                  </div>
                </div>

                <!-- description  -->
                <div class="col-12 my-2">
                  <div class="d-flex justify-content-between">
                    <label for="description"
                           class="form-label fw-medium fs-5 <?= isset($errors['description']) ? 'text-danger' : NULL ?>">Users'
                      Bio</label>
                    <span class="text-danger" ><?= $errors['description'] ?? NULL ?></span>
                  </div>
                  <textarea class="form-control <?= isset($errors['description']) ? 'border border-danger' : NULL ?>"
                            name="description" id="" cols="30" rows="4"
                            placeholder="Write some remarks about the user..."></textarea>
                </div>

                <!-- profile pic  -->
                <div class="col-12 col-lg-6">
                  <div class="d-flex justify-content-between">
                    <span class="fs-5 fw-medium <?= isset($errors['profile_pic']) ? 'text-danger' : NULL ?>">Upload a Profile Picture</span>
                    <span class="text-danger" ><?= $errors['tech_skills'] ?? NULL ?></span>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text fs-4 px-3"><i class="fa-solid fa-id-badge"></i></span>
                    <input class="form-control <?= isset($errors['profile_pic']) ? 'border border-danger text-danger' : NULL ?>"
                           type="file" name="profile_pic" id="profile_pic">
                  </div>
                </div>

                <!-- sign pic  -->
                <div class="col-12 col-lg-6">
                  <div class="d-flex justify-content-between">
                    <span class="fs-5 fw-medium <?= isset($errors['sign_pic']) ? 'text-danger' : NULL ?>">Upload a Signature Picture</span>
                    <span class="text-danger" ><?= $errors['tech_skills'] ?? NULL ?></span>
                  </div>
                  <div class="input-group">
                    <span class="input-group-text fs-4 px-3"><i class="fa-solid fa-signature"></i></span>
                    <input class="form-control <?= isset($errors['sign_pic']) ? 'border border-danger text-danger' : NULL ?>"
                           type="file" name="sign_pic" id="sign_pic">
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="d-grid mt-5">
                  <button class="btn btn-dark btn-lg py-2" type="submit"
                          name="login"><i class="fa-solid fa-user-plus pe-3"></i>Add User Record</button>
                </div>
              </div>
            </div>
          </div>

      </form>
    </div>

  </div>
</section>