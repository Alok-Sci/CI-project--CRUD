<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand fs-2 fw-bold" href="<?= base_url() ?>">The Kraftors</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav justify-content-end flex-grow-1 gap-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                       href="<?= base_url('/') ?>"><i class="fa-solid fa-home pe-sm-1 pe-3"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('/user/add') ?>"><i class="fa-solid fa-user-plus pe-sm-1 pe-3"></i>Add
                        User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('/user/list') ?>"><i class="fa-solid fa-file-medical pe-sm-1 pe-3"></i>View
                        Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= base_url('/admin/logout') ?>"><i class="fa-solid fa-right-from-bracket pe-sm-1 pe-3"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>