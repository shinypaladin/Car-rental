// Frontend Interactions for Car Airport Morocco

document.addEventListener('DOMContentLoaded', function () {
    initHoverVideos();
    initMobileAutoplayVideos();
    initWhatsAppLinks();
    initLanguageSelector();
});

/**
 * Desktop Hover-to-Play Looping Video Previews
 */
function initHoverVideos() {
    // Only apply hover logic on screens that support hover (non-touch devices)
    if (window.matchMedia('(hover: hover)').matches) {
        const carCards = document.querySelectorAll('.car-card');
        
        carCards.forEach(card => {
            const video = card.querySelector('video');
            if (!video) return;

            card.addEventListener('mouseenter', () => {
                // Play and let CSS handle the transition
                video.currentTime = 0;
                const playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(error => {
                        console.log("Autoplay was prevented:", error);
                    });
                }
            });

            card.addEventListener('mouseleave', () => {
                video.pause();
            });
        });
    }
}

/**
 * Mobile Viewport Autoplay (Intersection Observer)
 * Autoplays car videos when they enter the viewport on mobile devices.
 */
function initMobileAutoplayVideos() {
    if (!window.matchMedia('(hover: hover)').matches && 'IntersectionObserver' in window) {
        const videos = document.querySelectorAll('.car-image-container video');
        
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.6 // Trigered when 60% of card is in screen
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const video = entry.target;
                if (entry.isIntersecting) {
                    video.style.opacity = 1;
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.catch(error => {
                            console.log("Mobile autoplay prevented:", error);
                        });
                    }
                } else {
                    video.style.opacity = 0;
                    video.pause();
                }
            });
        }, observerOptions);

        videos.forEach(video => observer.observe(video));
    }
}

/**
 * Dynamic WhatsApp Link Generators
 * Formats WhatsApp query strings with dates, times, and vehicle selections.
 */
function initWhatsAppLinks() {
    const whatsappButtons = document.querySelectorAll('.whatsapp-btn, .floating-whatsapp');
    
    // Read current search inputs from DOM
    const pickupLoc = document.getElementById('pickup_location')?.value || 'Marrakech Airport';
    const pickupDate = document.getElementById('pickup_date')?.value || '';
    const pickupTime = document.getElementById('pickup_time')?.value || '10:00';
    const returnDate = document.getElementById('return_date')?.value || '';
    const returnTime = document.getElementById('return_time')?.value || '10:00';

    whatsappButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            
            const carName = this.getAttribute('data-car') || '';
            const price = this.getAttribute('data-price') || '';
            const phone = this.getAttribute('data-phone') || '+2126000988632';
            
            let message = '';
            
            if (carName) {
                // Card-specific WhatsApp click
                message = `Hello Car Airport Morocco!\n\n` +
                          `I would like to inquire about booking a *${carName}*:\n` +
                          `• Pick-up: ${pickupLoc} on ${pickupDate} at ${pickupTime}\n` +
                          `• Return: ${returnDate} at ${returnTime}\n` +
                          `• Estimated Price: ${price} DH\n\n` +
                          `Is this vehicle available for these dates?`;
            } else {
                // Floating bubble/general click
                message = `Hello Car Airport Morocco!\n\n` +
                          `I am visiting your website and would like to ask about availability for renting a car from ${pickupDate} to ${returnDate}.`;
            }
            
            const whatsappUrl = `https://wa.me/${phone.replace('+', '')}?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        });
    });
}

/**
 * Handle Lang toggles in the header
 */
function initLanguageSelector() {
    const langSelect = document.getElementById('lang-select');
    if (langSelect) {
        langSelect.addEventListener('change', function () {
            const locale = this.value;
            const currentPath = window.location.pathname;
            
            // Re-route to appropriate language segment
            // e.g. /en/cars -> /fr/cars
            const segments = currentPath.split('/');
            if (segments.length > 1 && (segments[1] === 'en' || segments[1] === 'fr')) {
                segments[1] = locale;
            } else {
                segments.unshift(locale);
            }
            
            window.location.href = segments.join('/');
        });
    }
}
