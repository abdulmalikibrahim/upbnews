<?= $this->extend('templates/index'); ?>

<?= $this->section("addCss"); ?>
<style>
    .cut-content {
        min-height: 30rem;
        max-height: 30rem;
        overflow: hidden;
        position: relative;
    }

    /* Opsional: fade di bawah */
    .cut-content::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background: linear-gradient(to bottom, transparent, white);
    }

    .ff-opensans{
        font-family: "Open Sans",sans-serif;
    }

    .cut-content-new-artikel {
        min-height: 10rem;
        max-height: 10rem;
        overflow: hidden;
        position: relative;
    }

    /* Opsional: fade di bawah */
    .cut-content-new-artikel::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background: linear-gradient(to bottom, transparent, white);
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content');
?>
    <!-- Features Start -->
    <div class="container-fluid features mb-5 d-lg-block d-none">
        <div class="container py-5">
            <div class="row g-4">
                <?php
                if(!empty($article4)){
                    foreach ($article4 as $data) {
                        ?>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="row g-4 align-items-center features-item">
                                <div class="col-4">
                                    <div class="rounded-circle position-relative">
                                        <div class="overflow-hidden rounded-circle">
                                            <img src="thumbnail/<?= $data["thumbnail"]; ?>" class="img-fluid rounded-circle" style="aspect-ratio: 1/1; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="features-content d-flex flex-column">
                                        <p class="text-uppercase mb-2"><?= $data["category"]; ?></p>
                                        <a href="<?= base_url("article/view/".$data["id"]) ?>" class="h6" style="word-wrap: break-word; white-space: normal;">
                                            <?= potongText($data["title"],30); ?>
                                        </a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> <?= date("F d, Y",strtotime($data["created_at"])) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Main Post Section Start -->
    <div class="container-fluid py-lg-2 py-5">
        <div class="container py-0">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <div style="max-height: 480px; overflow: hidden;">
                            <img src="thumbnail/<?= $newsPopular["thumbnail"] ?>" class="img-fluid rounded img-zoomin w-100">
                        </div>
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-heart"></i> <?= hitungAngka($newsPopular["total_likes"]) ?> Likes</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> <?= hitungAngka($newsPopular["total_views"]) ?> Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> <?= hitungAngka($newsPopular["total_comments"]) ?> Comment</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="<?= base_url("article/view/".$newsPopular["id"]) ?>" class="display-4 text-dark mb-0 link-hover"><?= $newsPopular["title"] ?></a>
                    </div>
                    <div class="cut-content">
                        <p class="mt-3 mb-4"><?= $newsPopular["content"] ?></p>
                    </div>
                    <a href="<?= base_url("article/view/".$newsPopular["id"]) ?>" class="btn btn-primary border-0 rounded-pill text-white position-absolute">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0 mt-lg-0 mt-5">
                        <div class="row g-4">
                            <div class="col-12">
                                <h4 class="mb-2 mt-2">Paling Banyak Dilihat</h4>
                            </div>
                            <div class="col-12">
                                <div class="rounded overflow-hidden" style="max-height:360px;">
                                    <img src="<?= "thumbnail/".$news7Popular[0]["thumbnail"] ?>" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="<?= base_url("article/view/".$news7Popular[0]["id"]) ?>" class="h4 mb-2"><?= $news7Popular[0]["title"] ?></a>
                                    <p class="fs-5 mb-0 ff-opensans fw-bold"><i class="fa fa-heart"></i> <?= hitungAngka($news7Popular[0]["total_likes"])." Likes" ?></p>
                                    <p class="fs-5 mb-0 ff-opensans fw-bold"><i class="fa fa-eye"></i> <?= hitungAngka($news7Popular[0]["total_views"])." Views" ?></p>
                                </div>
                            </div>
                            <?php
                            foreach ($news7Popular as $key => $value) {
                                if($key == 0){
                                    continue;
                                }
                                ?>
                                <div class="col-12">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-5">
                                            <div class="overflow-hidden rounded" style="max-height:93px;">
                                                <img src="<?= "thumbnail/".$value["thumbnail"] ?>" class="img-zoomin img-fluid rounded w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="features-content d-flex flex-column">
                                                <a href="<?= base_url("article/view/".$value["id"]) ?>" class="h6"><?= potongText($value["title"],35) ?></a>
                                                <small class="ff-opensans fw-bold"><i class="fa fa-heart"></i> <?= hitungAngka($value["total_likes"])." Likes" ?></small>
                                                <small class="ff-opensans fw-bold"><i class="fa fa-eye"></i> <?= hitungAngka($value["total_views"])." Views" ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Post Section End -->


    <!-- Latest News Start -->
    <div class="container-fluid latest-news py-5">
        <div class="container py-0">
            <h2 class="mb-4">Latest News</h2>
            <div class="latest-news-carousel owl-carousel">
                <?php
                if(!empty($latest_news)){
                    foreach ($latest_news as $data) {
                        ?>
                        <div class="latest-news-item">
                            <div class="bg-light rounded">
                                <div class="rounded-top overflow-hidden">
                                    <img src="thumbnail/<?= $data["thumbnail"]; ?>" class="img-zoomin img-fluid rounded-top w-100" alt="" style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="d-flex flex-column p-4 h-100">
                                    <a href="<?= base_url("article/view/".$data["id"]) ?>" class="h4 d-block">
                                        <?= potongText($data["title"],35); ?>
                                    </a>

                                    <div class="d-flex justify-content-between">
                                        <a href="<?= base_url("article/view/".$data["id"]) ?>" class="small text-body link-hover">by <?= potongText(str_replace(";",", ",$data["writer"]),15) ?></a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> <?= date("M d, Y",strtotime($data["created_at"])); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Latest News End -->


    <!-- Most Populer News Start -->
    <div class="container-fluid populer-news py-3">
        <div class="container py-0">
            <div class="tab-class mb-4">
                <div class="row g-4">
                    <div class="col-lg-8 col-xl-9">
                        <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
                            <h1 class="mb-4">Artikel Baru</h1>
                            <ul class="nav nav-pills d-inline-flex text-center">
                                <?php
                                $data_category = [];
                                $data_news = [];
                                foreach ($newsByCategory as $data) {
                                    $data_category[$data["id_category"]] = $data["category"];
                                    $data_news[$data["id_category"]][] = [
                                        "id" => $data["id"],
                                        "title" => $data["title"],
                                        "thumbnail" => $data["thumbnail"],
                                        "content" => $data["content"],
                                        "created_at" => $data["created_at"],
                                        "writer" => $data["writer"],
                                        "category" => $data["category"],
                                        "total_views" => $data["total_views"],
                                        "total_comments" => $data["total_comments"],
                                        "total_likes" => $data["total_likes"],
                                        "total_shares" => $data["total_shares"],
                                    ];
                                }

                                if(!empty($data_category)){
                                    foreach ($data_category as $key => $value) {
                                        ?>
                                        <li class="nav-item mb-3">
                                            <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-<?= $key; ?>">
                                                <span class="text-dark" style="width: 100px;"><?= $value ?></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="tab-content mb-4">
                            <?php
                            $no = 0;
                            foreach ($data_category as $key => $value) {
                                $active = $no == 0 ? "active" : "";
                                ?>
                                <div id="tab-<?= $key ?>" class="tab-pane fade show p-0 <?= $active; ?>">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="position-relative rounded overflow-hidden">
                                                <img src="<?= "thumbnail/".$data_news[$key][0]["thumbnail"]; ?>" class="img-zoomin img-fluid rounded w-100" alt="" style="height: 400px; object-fit: cover;">
                                                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                                    <?= $value; ?>
                                                </div>
                                            </div>
                                            <div class="my-4">
                                                <a href="<?= base_url("article/view/".$data_news[$key][0]["id"]) ?>" class="h4"><?= potongText($data_news[$key][0]["title"],80); ?></a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <a href="javascript:void(0)" class="text-dark link-hover me-3"><i class="fa fa-heart"></i> 
                                                    <?= hitungAngka($data_news[$key][0]["total_likes"]) ?> likes
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark link-hover me-3"><i class="fa fa-eye"></i>
                                                    <?= hitungAngka($data_news[$key][0]["total_views"]) ?> Views
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i>
                                                    <?= hitungAngka($data_news[$key][0]["total_comments"]) ?> Comment
                                                </a>
                                                <a href="javascript:void(0)" class="text-dark link-hover me-3"><i class="fa fa-arrow-up"></i>
                                                    <?= hitungAngka($data_news[$key][0]["total_shares"]) ?> Share
                                                </a>
                                            </div>
                                            <div class="my-4 cut-content-new-artikel">
                                                <?= $data_news[$key][0]["content"]; ?>
                                            </div>
                                            <a href="<?= base_url("article/view/".$data_news[$key][0]["id"]) ?>" class="btn btn-primary border-0 rounded-pill text-white position-absolute">Read More <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                        <div class="col-lg-4 mt-lg-3 mt-5">
                                            <div class="row g-4">
                                                <?php
                                                foreach ($data_news[$key] as $keynews => $data) {
                                                    if($keynews == 0){
                                                        continue;
                                                    }

                                                    if($keynews > 6){
                                                        continue;
                                                    }

                                                    ?>
                                                    <div class="col-12">
                                                        <div class="row g-4 align-items-center">
                                                            <div class="col-5">
                                                                <div class="overflow-hidden rounded">
                                                                    <img src="<?= "thumbnail/".$data["thumbnail"] ?>" class="img-zoomin img-fluid rounded w-100" alt=""  style="height: 75px; object-fit: cover;">
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="features-content d-flex flex-column">
                                                                    <p class="text-uppercase mb-2"><?= $data["category"]; ?></p>
                                                                    <a href="<?= base_url("article/view/".$data["id"]) ?>" class="h6"><?= potongText($data["title"], 30) ?></a>
                                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> <?= date("M d, Y",strtotime($data["created_at"])) ?></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $no++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-3 rounded border">
                                    <h4 class="my-4">Artikel Populer</h4>
                                    <div class="row g-4">
                                        <?php
                                        foreach ($news5Popular as $data) {
                                            ?>
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center features-item">
                                                    <div class="col-4">
                                                        <div class="rounded-circle position-relative">
                                                            <div class="overflow-hidden rounded-circle">
                                                                <img src="<?= "thumbnail/".$data["thumbnail"]; ?>" class="img-zoomin img-fluid rounded-circle w-100" style="aspect-ratio: 1/1; width: 100%; object-fit: cover;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="text-uppercase mb-2"><?= $data["category"] ?></p>
                                                            <a href="<?= base_url("article/view/".$data["id"]) ?>" class="h6">
                                                                <?= potongText($data["title"], 30); ?>
                                                            </a>
                                                            <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> <?= date("F d, Y",strtotime($data["created_at"])) ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Most Populer News End -->
<?= $this->endSection(); ?>