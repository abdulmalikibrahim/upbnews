<!-- Navbar start -->
<div class="container-fluid sticky-top px-0">
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <a href="<?= base_url(); ?>" class="navbar-brand mt-3">
                    <p class="text-primary display-6 mb-3" style="line-height: 0;">UPB News</p>
                    <small class="text-body fw-normal">Universitas Pelita Bangsa</small>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                    <div class="navbar-nav mx-auto border-top">
                        <a href="<?= base_url(); ?>" class="nav-item nav-link active">Home</a>
                        <!-- <a href="detail-page.html" class="nav-item nav-link">Detail  Page</a> -->
                        <!-- <a href="404.html" class="nav-item nav-link">404 Page</a> -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <?php
                                if(!empty($category)){
                                    foreach ($category as $data) {
                                        ?>
                                        <a href="<?= base_url("article/category/".$data["id"]) ?>" class="dropdown-item"><?= $data["category"]; ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <a href="<?= base_url("contact") ?>" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span class="text-body">Cikarang,</span>
                                    <small><?= date("D, d M Y") ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->