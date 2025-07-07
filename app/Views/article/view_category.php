<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
    <!-- Single Product Start -->
    <div class="container-fluid py-2">
        <div class="container py-3">
            <div class="row g-4">
                <div class="col-12">
                    <h1 style="font-size: 3.5rem;"><?= strtoupper($category_name["category"]) ?></h1>
                </div>
                <div class="col-lg-8" style="white-space: normal; overflow-wrap: break-word; word-break: break-word;">
                    <?php
                    if(!empty($listArticle)){
                        foreach ($listArticle as $data) {
                            ?>
                            <div class="row g-4 align-items-center mb-5">
                                <div class="col-lg-5">
                                    <div class="overflow-hidden rounded" style="max-height:15rem;">
                                        <a href="<?= base_url("article/view/".$data["id"]) ?>">
                                            <img src="<?= base_url("thumbnail/".$data["thumbnail"]) ?>" class="img-zoomin img-fluid rounded w-100" style="height: 100%;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="features-content d-flex flex-column mb-3">
                                        <a href="<?= base_url("article/view/".$data["id"]) ?>" class="h6"><?= potongText(strip_tags($data["title"]),60) ?></a>
                                        <a href="<?= base_url("article/view/".$data["id"]) ?>" class="text-dark">
                                            <?= potongText(strip_tags($data["content"]),200) ?>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-row mb-2">
                                        <small class="ff-opensans fw-bold me-3"><i class="me-1 fa fa-heart"></i> <?= hitungAngka($data["total_likes"])." Likes" ?></small>
                                        <small class="ff-opensans fw-bold me-3"><i class="me-1 fa fa-eye"></i> <?= hitungAngka($data["total_views"])." Views" ?></small>
                                        <small class="ff-opensans fw-bold"><i class="me-1 fa fa-comment-dots"></i> <?= hitungAngka($data["total_comments"])." Comments" ?></small>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <small class="text-body d-block"><i class="me-1 fas fa-user"></i> <?= potongText($data["writer"],30) ?></small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <small class="text-body d-block"><i class="me-1 fas fa-calendar"></i> <?= date("F d, Y",strtotime($data["created_at"])) ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-4">
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
                                                            <img src="<?= base_url("thumbnail/".$data["thumbnail"]); ?>" class="img-zoomin img-fluid rounded-circle w-100" style="aspect-ratio: 1/1; width: 100%; object-fit: cover;">
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
    <!-- Single Product End -->
<?= $this->endSection(); ?>

<?= $this->section("addJS"); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	function shareArticle(platform, articleId) {
		console.log(platform, articleId);

		$.ajax({
			url: "<?= base_url('article/share') ?>",
			method: "POST",
			contentType: "application/json",
			data: JSON.stringify({
				platform: platform,
				id_article: articleId
			}),
			success: function (res) {
				if (res.status === 'ok') {
					const url = window.location.href;
					const title = document.title;

					switch (platform) {
						case 'facebook':
							window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
							break;
						case 'twitter':
							window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
							break;
						case 'whatsapp':
							window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(title + ' ' + url)}`, '_blank');
							break;
						case 'telegram':
							window.open(`https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
							break;
						case 'linkedin':
							window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`, '_blank');
							break;
					}
				}
			},
			error: function () {
                Swal.fire("Error","Gagal menyimpan data share","error");
			}
		});
	}
</script>
<script>
    $(document).ready(function () {
        $('#commentForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "<?= base_url('comment/submit') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === 'ok') {
                        Swal.fire({
                            title:"Sukses",
                            html:"Komentar berhasil dikirim!",
                            icon:"success",
                        }).then((result) => {
                            if(result.isConfirmed){
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire("Error","Gagal mengirim komentar.","error");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    Swal.fire("Error","Terjadi kesalahan saat mengirim komentar.","error");
                }
            });
        });
    });
</script>
<script>
    function likeArticle(articleId) {
        Swal.fire({
            title: 'Masukkan Email Kamu',
            input: 'email',
            inputLabel: 'Email',
            inputPlaceholder: 'contoh@email.com',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            inputValidator: (value) => {
                if (!value) return 'Email tidak boleh kosong!';
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('article/like') ?>",
                    method: "POST",
                    data: {
                        id_article: articleId,
                        email: result.value
                    },
                    success: function (res) {
                        if (res.status === 'ok') {
                            Swal.fire('Berhasil!', 'Like kamu sudah disimpan.', 'success');
                        } else {
                            Swal.fire('Gagal', 'Gagal menyimpan like.', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Terjadi kesalahan server.', 'error');
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection(); ?>