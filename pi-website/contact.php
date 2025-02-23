<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
include_once "locales/{$lang}.php";
include_once "includes/header.php";
?>

<main class="contact-page">
    <section class="hero">
        <div class="container">
            <h1><?php echo $translations['contact_us']; ?></h1>
            <p><?php echo $translations['contact_subtitle']; ?></p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="contact-info">
                <h2><?php echo $translations['contact_info']; ?></h2>
                <ul>
                    <li>
                        <strong><?php echo $translations['address_label']; ?>:</strong>
                        <p><?php echo $translations['address']; ?></p>
                    </li>
                    <li>
                        <strong><?php echo $translations['phone_label']; ?>:</strong>
                        <p><?php echo $translations['phone']; ?></p>
                    </li>
                    <li>
                        <strong><?php echo $translations['email_label']; ?>:</strong>
                        <p><?php echo $translations['email']; ?></p>
                    </li>
                </ul>
            </div>
            <div class="contact-form">
                <h2><?php echo $translations['send_message']; ?></h2>
                <form id="contactForm" action="process_form.php" method="POST">
                    <div class="form-group">
                        <label for="name"><?php echo $translations['name']; ?></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo $translations['email']; ?></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject"><?php echo $translations['subject']; ?></label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message"><?php echo $translations['message']; ?></label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn"><?php echo $translations['send']; ?></button>
                </form>
            </div>
        </div>
    </section>
</main>

<script src="js/contact-form-validation.js"></script>

<?php include_once "includes/footer.php"; ?>

