<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container py-5 text-center">
    <h1 class="mb-4">Contact Us</h1>
    <p class="lead">Kalau ada pertanyaan atau butuh bantuan, langsung aja kontak kita lewat WhatsApp:</p>
    <a href="https://wa.me/6287708763253" target="_blank" class="btn btn-success btn-lg mt-3">
        <i class="fab fa-whatsapp"></i> Chat via WhatsApp
    </a>
    <p class="mt-3 text-muted">Nomor WA: +62 877-0876-3253</p>
    
    <div class="rounded">
        <div class="w-100 text-start"><h3>Universitas Pelita Bangsa</h3></div>
        <iframe class="rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65100.86880138445!2d107.0929373486328!3d-6.3246169999999875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b0c08ad8d01%3A0x2b18001d1b1371f9!2sUNIVERSITAS%20PELITA%20BANGSA!5e1!3m2!1sid!2sid!4v1751765202694!5m2!1sid!2sid" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?= $this->endSection(); ?>
