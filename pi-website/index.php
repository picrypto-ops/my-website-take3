<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$contentService = new ContentService();

$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);

include_once "includes/header.php";
?>

<main class="home">
    <section class="hero full-page">
        <div class="container">
            <img src="images/logo.svg" alt="<?php echo $general['company_name']; ?>" class="logo">
            <h1><?php echo $general['slogan']; ?></h1>
            <p><?php echo $general['short_description']; ?></p>
            <a href="#content" class="scroll-down">Scroll Down</a>
        </div>
    </section>

    <div id="content">
        <section class="quick-links">
            <div class="container">
                <h2><?php echo $general['our_sectors'] ?? 'Our Sectors'; ?></h2>
                <div class="sectors">
                    <?php foreach ($menu as $item): ?>
                        <?php if ($item['url'] === '/investment-banking' || $item['url'] === '/asset-management'): ?>
                            <a href="<?php echo ltrim($item['url'], '/') . '.php'; ?>" class="sector-card">
                                <h3><?php echo $item['label']; ?></h3>
                                <?php 
                                    $descKey = ltrim($item['url'], '/');
                                    $descKey = str_replace('-', '_', $descKey) . '_description';
                                ?>
                                <p><?php echo $general[$descKey] ?? ''; ?></p>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="featured-products">
            <div class="container">
                <h2><?php echo $general['featured_products'] ?? 'Featured Products'; ?></h2>
                <div class="product-list">
                    <?php
                    $investmentBankingProducts = array_map(function($product) {
                        return array_merge($product, ['type' => 'investment_banking']);
                    }, array_slice($contentService->getProducts($lang, 'investment_banking'), 0, 2));
                    
                    $assetManagementProducts = array_map(function($product) {
                        return array_merge($product, ['type' => 'asset_management']);
                    }, array_slice($contentService->getProducts($lang, 'asset_management'), 0, 2));
                    
                    $featuredProducts = array_merge($investmentBankingProducts, $assetManagementProducts);
                    
                    foreach ($featuredProducts as $product):
                    ?>
                        <div class="product-card">
                            <img src="<?php echo $product['logo']; ?>" alt="<?php echo $product['name']; ?>" class="product-logo">
                            <h3><?php echo $product['name']; ?></h3>
                            <p><?php echo $product['slogan']; ?></p>
                            <a href="product.php?type=<?php echo $product['type']; ?>&name=<?php echo urlencode($product['name']); ?>" class="btn">
                                <?php echo $general['learn_more'] ?? 'Learn More'; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

    <div id="threeJsContainer">
        <div class="animationElement"></div>
    </div>
</main>

<script src="js/smooth-scroll.js"></script>
<script src="js/pi_wave_bg.js"></script>

<?php include_once "includes/footer.php"; ?>

