<?php
require_once 'includes/ContentService.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$contentService = new ContentService();

$general = $contentService->getGeneral($lang);
$menu = $contentService->getMenu($lang);
$teamGroups = $contentService->getTeamGroups($lang);

include_once "includes/header.php";
?>

<main class="team-page">
    <section class="hero">
        <div class="container">
            <h1><?php echo $menu[3]['label'] ?? 'Our Team'; ?></h1>
            <p><?php echo $general['team_description'] ?? 'Meet our dedicated team of professionals.'; ?></p>
        </div>
    </section>

    <?php foreach ($teamGroups as $group): ?>
    <section class="team-group">
        <div class="container">
            <h2><?php echo $general['team_group_' . $group] ?? ucfirst(str_replace('_', ' ', $group)); ?></h2>
            <div class="team-members">
                <?php 
                $members = $contentService->getTeamMembers($lang, $group);
                foreach ($members as $member): 
                ?>
                <div class="team-member">
                    <img src="<?php echo $member['photo']; ?>" alt="<?php echo $member['name']; ?>" class="member-photo">
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
    </section>
    <?php endforeach; ?>
</main>

<?php include_once "includes/footer.php"; ?>

