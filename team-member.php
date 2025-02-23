<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$slug = $_GET['slug'] ?? '';

$contentService = new ContentService();
$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);
$member = $contentService->getTeamMember($lang, $slug);

if (!$member) {
    header("Location: team.php");
    exit;
}

include_once "includes/header.php";
?>

<main class="team-member-page">
    <section class="hero">
        <div class="container">
            <img src="<?php echo $member['photo']; ?>" alt="<?php echo $member['name']; ?>" class="member-photo">
            <h1><?php echo $member['name']; ?></h1>
            <p class="position"><?php echo $member['position']; ?></p>
        </div>
    </section>

    <section class="member-bio">
        <div class="container">
            <h2><?php echo $general['team_member_biography'] ?? 'Biography'; ?></h2>
            <p><?php echo $member['bio']; ?></p>
        </div>
    </section>

    <?php if ($member['is_founder']): ?>
    <section class="founder-info">
        <div class="container">
            <h2><?php echo $general['founder_role'] ?? 'Founder Role'; ?></h2>
            <p><?php echo $member['founder_bio'] ?? $member['bio']; ?></p>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php include_once "includes/footer.php"; ?>

