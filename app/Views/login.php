<!-- login form  -->

<section class="bg-light py-3 py-md-5" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-5 shadow-lg">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <p class="fs-1 fw-bold">Admin <br> <span class="fs-4">The Kraftors</span></p>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>

            <form action="<?= site_url('admin/login'); ?>" method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="username" id="username"
                           placeholder="name@example.com"
                           required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value=""
                           placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>

                <!-- display error message  -->
                <?php
                $session = session();
                $error   = $session->getFlashdata('error');
                $success = $session->getFlashdata('success');
                if ($error || $success):
                  $divClass = $error ? 'text-danger border-danger bg-danger-subtle' : 'text-success border-success bg-success-subtle';
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
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-dark btn-lg" type="submit" name="login">Log in</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>