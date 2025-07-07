<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
    <!-- Single Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-8" style="white-space: normal; overflow-wrap: break-word; word-break: break-word;">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5"><?= $detail["title"] ?></a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3" style="max-height: 565px; overflow: hidden;">
                        <img src="<?= base_url("thumbnail/".$detail["thumbnail"]); ?>" class="img-zoomin img-fluid rounded w-100" alt="">
                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                            <?= $detail["category"] ?>
                        </div>
                    </div>
                    <p><i class="fas fa-clock"></i> <?= date("D, d F Y",strtotime($detail["updated_at"])) ?></p>
                    <div class="d-flex justify-content-between mb-3">
                        <a href="javascript:void(0)" class="text-dark link-hover me-3">
                            <i class="me-1 fa fa-heart"></i> <?= hitungAngka($detail["total_likes"]) ?> likes
                        </a>
                        <a href="javascript:void(0)" class="text-dark link-hover me-3">
                            <i class="me-1 fa fa-eye"></i><?= hitungAngka($detail["total_views"]) ?> Views
                        </a>
                        <a href="javascript:void(0)" class="text-dark link-hover me-3">
                            <i class="me-1 fa fa-comment-dots"></i><?= hitungAngka($detail["total_comments"]) ?> Comment
                        </a>
                        <a href="javascript:void(0)" class="text-dark link-hover me-3">
                            <i class="me-1 fa fa-arrow-up"></i><?= hitungAngka($detail["total_shares"]) ?> Share
                        </a>
                    </div>
                    <div class="content mt-2">
                        <?= $detail["content"]; ?>
                    </div>
                    <div class="tab-class mt-4 mb-4">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <ul class="nav nav-pills d-inline-flex text-start">
                                    <li class="nav-item mb-3">
                                        <?php
                                        $data_penulis = explode(",",$detail["writer"]);
                                        ?>
                                        <h6 class="mt-2 me-3 mb-0">Penulis :</h6>
                                        <ul class="text-dark">
                                            <?php
                                            foreach ($data_penulis as $key => $penulis) {
                                                ?>
                                                <li><?= trim($penulis); ?></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-4 text-lg-center">
                                <button class="btn btn-outline-danger" onclick="likeArticle('<?= $detail['id']; ?>')">
                                    ❤️ Like
                                </button>
                            </div>
                            <div class="col-lg-4 col-8 d-flex justify-content-end">
                                <div class="d-flex">
                                    <a href="javascript:void(0)" onclick="shareArticle('facebook', `<?= $detail['id'] ?>`)">
                                        <i class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="shareArticle('twitter', `<?= $detail['id'] ?>`)">
                                        <i class="btn fab bi-twitter link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="shareArticle('whatsapp', `<?= $detail['id'] ?>`)">
                                        <i class="btn fab fa-whatsapp link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="shareArticle('instagram', `<?= $detail['id'] ?>`)">
                                        <i class="btn fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="shareArticle('linkedin', `<?= $detail['id'] ?>`)">
                                        <i class="btn fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-bottom mb-4">
                            
                        </div>
                    </div>
                    <!-- <div class="bg-light rounded my-4 p-4">
                        <h4 class="mb-4">You Might Also Like</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center p-3 bg-white rounded">
                                    <img src="img/chatGPT.jpg" class="img-fluid rounded" alt="">
                                    <div class="ms-3">
                                        <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center p-3 bg-white rounded">
                                    <img src="img/chatGPT-1.jpg" class="img-fluid rounded" alt="">
                                    <div class="ms-3">
                                        <a href="#" class="h5 mb-2">Lorem Ipsum is simply dummy text of the printing</a>
                                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="bg-light rounded p-4">
                        <h4 class="mb-4">Comments</h4>
                        <div class="p-4 bg-white rounded mb-4">
                            <div class="row g-4">
                                <?php
                                if(!empty($comment)){
                                    foreach ($comment as $comment) {
                                        ?>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <h5><?= $comment["name"]; ?></h5>
                                            </div>
                                            <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> <?= date("M d, Y",strtotime($comment["created_at"])) ?></small>
                                            <p class="mb-0"><?= str_replace("\n","<br>",$comment["comment"]) ?></p>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <h5>Belum ada komentar</h5>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded p-4 my-4">
                        <h4 class="mb-4">Leave A Comment</h4>
                        <form id="commentForm">
                            <input type="hidden" name="id_article" value="<?= $detail['id']; ?>">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control py-3" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control py-3" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="comment" cols="30" rows="7" placeholder="Write Your Comment Here" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="form-control btn btn-primary py-3" type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
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