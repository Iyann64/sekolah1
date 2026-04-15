<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ── Title & Meta SEO ── -->
    <title><?= esc($title ?? 'Beranda') ?> – SD Negeri 56 Prabumulih</title>
    <meta name="description"  content="<?= esc($meta_desc ?? 'Website resmi SD Negeri 56 Prabumulih – Cerdas, Berkarakter, Berprestasi') ?>">
    <meta name="keywords"     content="SD Negeri 56 Prabumulih, sekolah dasar, prabumulih, PPDB 2026, SDN 56">
    <meta name="author"       content="SD Negeri 56 Prabumulih">
    <meta name="robots"       content="index, follow">

    <!-- ── Open Graph (WhatsApp / Facebook preview) ── -->
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?= esc($title ?? 'Beranda') ?> – SD Negeri 56 Prabumulih">
    <meta property="og:description" content="<?= esc($meta_desc ?? 'Website resmi SD Negeri 56 Prabumulih') ?>">
    <meta property="og:image"       content="<?= base_url('assets/img/logo.png') ?>">
    <meta property="og:url"         content="<?= current_url() ?>">
    <meta property="og:site_name"   content="SD Negeri 56 Prabumulih">

    <!-- ── Favicon ── -->
    <link rel="icon"       type="image/png" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon"             href="<?= base_url('assets/img/logo.png') ?>">

    <!-- ── Google Fonts ── -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;0,900;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <!-- ── CSS ── -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">

</head>
<body data-page="<?= esc($page ?? (service('uri')->getSegment(1) ?: 'home')) ?>">

<?= view('partials/ticker') ?>
<?= view('partials/navbar') ?>

<?= view($content_view) ?>

<?= view('partials/footer') ?>

<!-- BACK TO TOP -->
<div class="btt" id="btt">↑</div>

<!-- BOTTOM NAV (mobile only) -->
<?= view('partials/bottom_nav') ?>

<!-- NOTIFICATION SHEET -->
<?= view('partials/notif_sheet') ?>

<!-- JavaScript -->
<script src="<?= base_url('assets/js/script.js') ?>"></script>

</body>
</html>