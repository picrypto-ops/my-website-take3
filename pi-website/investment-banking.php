<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$contentService = new ContentService();

$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);
$products = $contentService->getProducts($lang, 'investment_banking');

include_once "includes/header.php";
?>

<main class="sector-page investment-banking">
    <section class="hero">
        <div class="container">
            <h1><?php echo $menu[1]['label'] ?? 'Investment Banking'; ?></h1>
            <p><?php echo $general['investment_banking_description'] ?? ''; ?></p>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <h2><?php echo $general['featured_products'] ?? 'Our Products'; ?></h2>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo $product['logo']; ?>" alt="<?php echo $product['name']; ?>" class="product-logo">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['slogan']; ?></p>
                        <a href="product.php?type=investment_banking&name=<?php echo urlencode($product['name']); ?>" class="btn">
                            <?php echo $general['learn_more'] ?? 'Learn More'; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>

