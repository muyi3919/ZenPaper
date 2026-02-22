/**
 * ZenPaper Theme JavaScript
 *
 * @package ZenPaper
 */

(function() {
    'use strict';

    // Reading progress bar
    function updateReadingProgress() {
        var progressBar = document.getElementById('reading-progress');
        if (!progressBar) return;

        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        
        if (scrollHeight <= 0) return;
        
        var progress = (scrollTop / scrollHeight) * 100;
        progressBar.style.width = progress + '%';
    }

    // Navigation shadow on scroll
    function updateNavigation() {
        var nav = document.getElementById('site-nav');
        if (!nav) return;

        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }

    // Smooth scroll for anchor links
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                var target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Initialize
    function init() {
        // Scroll event listener with requestAnimationFrame
        var ticking = false;
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateReadingProgress();
                    updateNavigation();
                    ticking = false;
                });
                ticking = true;
            }
        });

        // Initialize smooth scroll
        initSmoothScroll();

        // Initialize on load
        updateReadingProgress();
        updateNavigation();
    }

    // DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();