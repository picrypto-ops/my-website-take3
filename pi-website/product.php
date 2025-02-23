<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$type = $_GET['type'] ?? '';
$name = $_GET['name'] ?? '';

$contentService = new ContentService();
$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);

// Get the product details
$product = $contentService->getProduct($lang, $type, $name);

// Get the team members if this product has an associated team
$teamMembers = [];
if (!empty($product['team_group'])) {
    $teamMembers = $contentService->getTeamMembers($lang, $product['team_group']);
}

include_once "includes/header.php";
?>

<main class="product-page">
    <section class="hero">
        <div class="container">
            <?php if ($product): ?>
                <img src="<?php echo $product['logo']; ?>" alt="<?php echo $product['name']; ?> Logo" class="product-logo">
                <h1><?php echo $product['name']; ?></h1>
                <p class="slogan"><?php echo $product['slogan']; ?></p>
            <?php else: ?>
                <h1><?php echo $general['product_not_found'] ?? 'Product Not Found'; ?></h1>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($product): ?>
    <section class="product-details">
        <div class="container">
            <div class="description">
                <h2><?php echo $general['about_product'] ?? 'About'; ?></h2>
                <p><?php echo $product['description']; ?></p>
            </div>

            <?php if (!empty($teamMembers)): ?>
            <div class="team">
                <h2><?php echo $general['team_members'] ?? 'Team Members'; ?></h2>
                <div class="team-list">
                    <?php foreach ($teamMembers as $member): ?>
                        <div class="team-member">
                            <img src="<?php echo $member['photo']; ?>" alt="<?php echo $member['name']; ?>">
                            <h3><?php echo $member['name']; ?></h3>
                            <p class="position"><?php echo $member['position']; ?></p>
                            <p class="bio"><?php echo $member['short_bio']; ?></p>
                            <a href="team-member.php?slug=<?php echo $member['slug']; ?>" class="btn">
                                <?php echo $general['learn_more'] ?? 'Learn More'; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php include_once "includes/footer.php"; ?>

