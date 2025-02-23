<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$contentService = new ContentService();

$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);
$about = $contentService->getAbout($lang);

include_once "includes/header.php";
?>

<main class="about-page">
    <section class="hero">
        <div class="container">
            <h1><?php echo $about['title']; ?></h1>
            <p><?php echo $about['subtitle']; ?></p>
        </div>
    </section>

    <section class="history">
        <div class="container">
            <h2><?php echo $about['history']['title']; ?></h2>
            <div class="timeline">
                <?php foreach ($about['history']['items'] as $item): ?>
                    <div class="timeline-item">
                        <div class="year"><?php echo $item['year']; ?></div>
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mission-vision">
        <div class="container">
            <div class="mission">
                <h2><?php echo $about['mission']['title']; ?></h2>
                <p><?php echo $about['mission']['statement']; ?></p>
            </div>

            <div class="vision">
                <h2><?php echo $about['vision']['title']; ?></h2>
                <p><?php echo $about['vision']['statement']; ?></p>
            </div>
        </div>
    </section>

    <section class="values">
        <div class="container">
            <h2><?php echo $about['values']['title']; ?></h2>
            <div class="values-grid">
                <?php foreach ($about['values']['items'] as $value): ?>
                    <div class="value-item">
                        <h3><?php echo $value['title']; ?></h3>
                        <p><?php echo $value['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>

