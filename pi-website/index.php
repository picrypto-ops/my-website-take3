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
        <div class="container hero-content">
            <div class="hero-text">
                <h1><?php echo $general['slogan']; ?></h1>
                <p><?php echo $general['short_description']; ?></p>
                <button class="scroll-btn" aria-label="Scroll Down">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                    </svg>
                </button>
            </div>
            <div class="hero-logo">
                <img src="images/logo.svg" alt="<?php echo $general['company_name']; ?>" class="logo">
            </div>
        </div>
        <div class="animationElement">
            <div id="threeJsContainer"></div>
        </div>            
    </section>

    <div class="main-content">
        <section class="about" id="about">
            <div class="container">
                <!-- Content will be loaded from about.php -->
            </div>
        </section>

        <section class="quick-links" id="what-we-do">
            <div class="container">
                <!-- Content will be loaded from investment-banking.php -->
            </div>
        </section>

        <section class="team-preview" id="team">
            <div class="container">
                <!-- Content will be loaded from team.php -->
            </div>
        </section>


        <section class="contact" id="contact">
            <div class="container">
                <!-- Content will be loaded from contact.php -->
            </div>
        </section>
    </div>


</main>

<!-- ======= Background Animation Integration ======= -->

<!-- Vertex Shader -->
<script type="x-shader/x-vertex" id="vertexshader">
    precision mediump float;

    attribute float scale;

    void main() {
        vec4 mvPosition = modelViewMatrix * vec4(position, 1.0);
        gl_PointSize = scale * (450.0 / -mvPosition.z);
        gl_Position = projectionMatrix * mvPosition;
    }
</script>

<!-- Fragment Shader -->
<script type="x-shader/x-fragment" id="fragmentshader">
    precision mediump float;

    uniform sampler2D pointTexture;
    uniform vec3 color;

    varying float vDigitIndex;

    void main() {
        vec4 texColor = texture2D(pointTexture, vec2(gl_PointCoord.x,1.0-gl_PointCoord.y));
        if (texColor.a < 0.1) discard; // Discard transparent pixels
        gl_FragColor = vec4(color, 1.0) * texColor;
    }
</script>


<script src="js/smooth-scroll.js"></script>
<script type="module" src="js/pi_wave_bg.js"></script>

<?php include_once "includes/footer.php"; ?>

