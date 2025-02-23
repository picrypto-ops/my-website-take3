document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('header');
    const hero = document.querySelector('.hero');
    const scrollBtn = document.querySelector('.scroll-btn');
    const mainContent = document.querySelector('.main-content');

    // Load page content
    async function loadPageContent(url) {
        try {
            const response = await fetch(url);
            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            return doc.querySelector('main').innerHTML;
        } catch (error) {
            console.error('Error loading page:', error);
            return null;
        }
    }

    // Initialize page content
    async function initializeContent() {
        const sections = [
            { url: 'about.php', target: '.about' },
            { url: 'investment-banking.php', target: '.quick-links' },
            { url: 'team.php', target: '.team-preview' },
            { url: 'contact.php', target: '.contact' }
        ];

        for (const section of sections) {
            const content = await loadPageContent(section.url);
            if (content) {
                const targetSection = document.querySelector(section.target);
                if (targetSection) {
                    targetSection.innerHTML = content;
                }
            }
        }
    }

    // Initialize content
    initializeContent();

    // Smooth scroll function
    scrollBtn.addEventListener('click', () => {
        const aboutSection = document.querySelector('.about');
        if (aboutSection) {
            aboutSection.scrollIntoView({ behavior: 'smooth' });
        }
    });

    // Header visibility and scroll snapping
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        const heroHeight = hero.offsetHeight;

        // Header visibility
        if (currentScroll > heroHeight) {
            header.classList.add('visible');
        } else {
            header.classList.remove('visible');
        }

        lastScroll = currentScroll;
    });
}); 