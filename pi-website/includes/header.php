<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'he' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $general['site_title']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <a href="index.php" class="logo">
                <img src="images/logo.svg" alt="<?php echo $general['company_name']; ?>" height="40">
            </a>
            <nav>
                <ul class="main-menu">
                    <?php foreach ($menu as $item): ?>
                        <li>
                            <a href="<?php echo ltrim($item['url'], '/') . '.php'; ?>">
                                <?php echo $item['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="lang-selector">
                    <li>
                        <a href="?lang=<?php echo $lang === 'en' ? 'he' : 'en'; ?>">
                            <?php echo $lang === 'en' ? 'עברית' : 'English'; ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

