<footer>
        <div class="container">
            <div class="footer-section">
                <h3><?php echo $general['footer']['quick_links']; ?></h3>
                <ul>
                    <?php foreach ($menu as $item): ?>
                        <li>
                            <a href="<?php echo ltrim($item['url'], '/') . '.php'; ?>">
                                <?php echo $item['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="footer-section">
                <h3><?php echo $general['footer']['contact_info']; ?></h3>
                <p><?php echo $general['address']; ?></p>
                <p><?php echo $general['phone']; ?></p>
                <p><?php echo $general['email']; ?></p>
            </div>
        </div>
        <div class="container">
            <p><?php echo $general['footer']['copyright']; ?></p>
        </div>
    </footer>
    <script  type="module" src="js/pi_wave_bg.js"></script>
</body>
</html>

