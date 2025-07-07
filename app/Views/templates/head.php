
<meta charset="utf-8">
<title><?= $title ?? 'UPB Article News' ?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Open Graph / Facebook / WhatsApp -->
<meta property="og:type" content="article">
<meta property="og:url" content="<?= current_url() ?>">
<meta property="og:title" content="<?= $detail['title'] ?? 'UPB News - Artikel Terbaru' ?>">
<meta property="og:description" content="<?= !empty($detail['content']) ? potongText($detail['content'],45) : 'Baca artikel menarik hanya di UPB News' ?>">
<meta property="og:image" content="<?= !empty($detail["thumbnail"]) ? base_url('thumbnail/' . ($detail['thumbnail'])) : "https://i.ytimg.com/vi/l87l9TYmbyE/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDmXaTwnhu19D4uZNHRaBTkw-A52A" ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?= current_url() ?>">
<meta name="twitter:title" content="<?= $detail['title'] ?? 'UPB News - Artikel Terbaru' ?>">
<meta name="twitter:description" content="<?= !empty($detail['content']) ? potongText($detail['content'],45) : 'Baca artikel menarik hanya di UPB News' ?>">
<meta name="twitter:image" content="<?= !empty($detail["thumbnail"]) ? base_url('thumbnail/' . ($detail['thumbnail'])) : "https://i.ytimg.com/vi/l87l9TYmbyE/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDmXaTwnhu19D4uZNHRaBTkw-A52A" ?>">


<link href="<?= base_url("img/logoPelita.ico"); ?>" rel="shortcut icon">
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="<?= base_url('lib/animate/animate.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">


<!-- Customized Bootstrap Stylesheet -->
<link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">