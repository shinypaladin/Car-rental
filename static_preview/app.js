// Static Preview Interactive Logic for Car Airport Morocco

const translations = {
    en: {
        hero_title: "Your journey in Morocco starts here",
        hero_subtitle: "Best prices, new cars and premium service. Free delivery at Marrakech Airport.",
        feat1: "No hidden fees",
        feat2: "Unlimited mileage",
        feat3: "24/7 Support",
        nav_cars: "Featured Cars",
        nav_why: "Why Choose Us",
        nav_reviews: "Reviews",
        lbl_pickup_loc: "PICK-UP LOCATION",
        lbl_pickup_date: "PICK-UP DATE",
        lbl_return_date: "RETURN DATE",
        lbl_driver_age: "DRIVER AGE",
        btn_search: "Search Cars",
        lbl_cancel: "Free cancellation up to 48h before pick-up",
        lbl_best_price: "Best price guarantee",
        sect_cars_title: "Featured Cars",
        lnk_view_all: "View all cars →",
        or_similar: "or similar",
        seats: "Seats",
        manual: "Manual",
        automatic: "Automatic",
        ac: "AC",
        book_now: "Book Online",
        book_whatsapp: "Book via WhatsApp",
        day: "day",
        dh: "DH",
        why_title: "Why choose Car Airport Morocco?",
        r1_title: "Free Airport Delivery",
        r1_desc: "We deliver your car for free at Marrakech Airport.",
        r2_title: "Full Insurance",
        r2_desc: "All our rentals include full insurance.",
        r3_title: "Unlimited Mileage",
        r3_desc: "Drive as much as you want, no extra fees.",
        r4_title: "24/7 Support",
        r4_desc: "We're here for you anytime.",
        r5_title: "No Deposit",
        r5_desc: "No deposit required for most cars.",
        r6_title: "Best Prices",
        r6_desc: "We guarantee the best prices in Morocco.",
        exp_title: "Explore Morocco",
        exp_desc: "From the Atlas Mountains to the Sahara Desert. Your adventure starts with the right car.",
        lnk_disc_more: "Discover More",
        t_title: "What our customers say",
        t_based: "Based on 650+ reviews"
    },
    fr: {
        hero_title: "Votre voyage au Maroc commence ici",
        hero_subtitle: "Meilleurs prix, voitures neuves et service premium. Livraison gratuite à l'aéroport de Marrakech.",
        feat1: "Pas de frais cachés",
        feat2: "Kilométrage illimité",
        feat3: "Assistance 24/7",
        nav_cars: "Voitures Vedettes",
        nav_why: "Pourquoi Nous",
        nav_reviews: "Avis Clients",
        lbl_pickup_loc: "LIEU DE PRISE EN CHARGE",
        lbl_pickup_date: "DATE DE DÉPART",
        lbl_return_date: "DATE DE RETOUR",
        lbl_driver_age: "ÂGE DU CONDUCTEUR",
        btn_search: "Rechercher",
        lbl_cancel: "Annulation gratuite jusqu'à 48h avant la prise en charge",
        lbl_best_price: "Garantie du meilleur prix",
        sect_cars_title: "Voitures Vedettes",
        lnk_view_all: "Voir toutes les voitures →",
        or_similar: "ou similaire",
        seats: "Places",
        manual: "Manuelle",
        automatic: "Automatique",
        ac: "Clim",
        book_now: "Réserver en Ligne",
        book_whatsapp: "Réserver via WhatsApp",
        day: "jour",
        dh: "DH",
        why_title: "Pourquoi choisir Car Airport Morocco ?",
        r1_title: "Livraison Gratuite Aéroport",
        r1_desc: "Nous livrons votre voiture gratuitement à l'aéroport de Marrakech.",
        r2_title: "Assurance Tous Risques",
        r2_desc: "Toutes nos locations incluent une assurance tous risques.",
        r3_title: "Kilométrage Illimité",
        r3_desc: "Roulez autant que vous voulez, sans frais supplémentaires.",
        r4_title: "Assistance 24/7",
        r4_desc: "Nous sommes à votre disposition à tout moment.",
        r5_title: "Sans Caution",
        r5_desc: "Aucune caution requise pour la plupart des voitures.",
        r6_title: "Meilleurs Tarifs",
        r6_desc: "Nous garantissons les meilleurs tarifs au Maroc.",
        exp_title: "Explorez le Maroc",
        exp_desc: "Des montagnes de l'Atlas au désert du Sahara. Votre aventure commence avec la bonne voiture.",
        lnk_disc_more: "Découvrir Plus",
        t_title: "Ce que disent nos clients",
        t_based: "Sur la base de 650+ avis"
    }
};

// Initial Cars Data
const defaultCars = [
    {
        id: 1,
        brand: "Dacia",
        model: "Logan",
        category: "Economy",
        seats: 5,
        transmission: "Manual",
        ac: true,
        basePrice: 350,
        image: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?q=80&w=400",
        video: "https://assets.mixkit.co/videos/preview/mixkit-car-driving-under-a-bridge-at-sunset-40293-large.mp4"
    },
    {
        id: 2,
        brand: "Hyundai",
        model: "Tucson",
        category: "SUV",
        seats: 5,
        transmission: "Automatic",
        ac: true,
        basePrice: 550,
        image: "https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=400",
        video: "https://assets.mixkit.co/videos/preview/mixkit-modern-car-headlight-detail-41662-large.mp4"
    },
    {
        id: 3,
        brand: "Volkswagen",
        model: "T-Roc",
        category: "Economy",
        seats: 5,
        transmission: "Automatic",
        ac: true,
        basePrice: 650,
        image: "https://images.unsplash.com/photo-1606016159991-dfe4f2746ad5?q=80&w=400",
        video: "https://assets.mixkit.co/videos/preview/mixkit-sports-car-driving-away-fast-41663-large.mp4"
    },
    {
        id: 4,
        brand: "Mercedes",
        model: "Vito",
        category: "Van",
        seats: 9,
        transmission: "Automatic",
        ac: true,
        basePrice: 900,
        image: "https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?q=80&w=400",
        video: "https://assets.mixkit.co/videos/preview/mixkit-interior-view-of-a-car-driving-through-mountains-41641-large.mp4"
    }
];

let currentLang = 'en';

document.addEventListener('DOMContentLoaded', () => {
    initDefaultDates();
    renderCars();
    initLangToggle();
    initWhatsAppBubble();
    
    // Search form submission triggers dynamic pricing updates locally!
    document.getElementById('searchForm').addEventListener('submit', (e) => {
        e.preventDefault();
        renderCars();
        document.getElementById('cars').scrollIntoView({ behavior: 'smooth' });
    });

    // Close Modal listener
    document.getElementById('modalCloseBtn').addEventListener('click', () => {
        document.getElementById('bookingModal').style.display = 'none';
    });
});

/**
 * Pre-fill pickup/return dates to today+1 and today+4
 */
function initDefaultDates() {
    const today = new Date();
    const pickup = new Date(today);
    pickup.setDate(today.getDate() + 1);
    
    const returnDt = new Date(today);
    returnDt.setDate(today.getDate() + 4);

    document.getElementById('pickup_date').value = pickup.toISOString().split('T')[0];
    document.getElementById('return_date').value = returnDt.toISOString().split('T')[0];
}

/**
 * Multi-language Toggles
 */
function initLangToggle() {
    const langSelect = document.getElementById('lang-select');
    langSelect.addEventListener('change', function() {
        currentLang = this.value;
        updateStaticTexts();
        renderCars();
    });
}

function updateStaticTexts() {
    const dict = translations[currentLang];
    
    document.getElementById('hero-badge').innerText = currentLang === 'en' ? "Marrakech Airport Car Rental" : "Location de voitures Aéroport de Marrakech";
    document.getElementById('hero-title').innerText = dict.hero_title;
    document.getElementById('hero-subtitle').innerText = dict.hero_subtitle;
    document.getElementById('feat-1').innerText = dict.feat1;
    document.getElementById('feat-2').innerText = dict.feat2;
    document.getElementById('feat-3').innerText = dict.feat3;

    document.getElementById('nav-cars').innerText = dict.nav_cars;
    document.getElementById('nav-why').innerText = dict.nav_why;
    document.getElementById('nav-reviews').innerText = dict.nav_reviews;

    document.getElementById('lbl-pickup-loc').innerText = dict.lbl_pickup_loc;
    document.getElementById('lbl-pickup-date').innerText = dict.lbl_pickup_date;
    document.getElementById('lbl-return-date').innerText = dict.lbl_return_date;
    document.getElementById('lbl-driver-age').innerText = dict.lbl_driver_age;
    document.getElementById('btn-search').innerText = dict.btn_search;
    document.getElementById('lbl-cancel').innerText = dict.lbl_cancel;
    document.getElementById('lbl-best-price').innerText = dict.lbl_best_price;

    document.getElementById('sect-cars-title').innerText = dict.sect_cars_title;
    document.getElementById('lnk-view-all').innerText = dict.lnk_view_all;

    document.getElementById('why-title').innerText = dict.why_title;
    document.getElementById('r1-title').innerText = dict.r1_title;
    document.getElementById('r1-desc').innerText = dict.r1_desc;
    document.getElementById('r2-title').innerText = dict.r2_title;
    document.getElementById('r2-desc').innerText = dict.r2_desc;
    document.getElementById('r3-title').innerText = dict.r3_title;
    document.getElementById('r3-desc').innerText = dict.r3_desc;
    document.getElementById('r4-title').innerText = dict.r4_title;
    document.getElementById('r4-desc').innerText = dict.r4_desc;
    document.getElementById('r5-title').innerText = dict.r5_title;
    document.getElementById('r5-desc').innerText = dict.r5_desc;
    document.getElementById('r6-title').innerText = dict.r6_title;
    document.getElementById('r6-desc').innerText = dict.r6_desc;

    document.getElementById('exp-title').innerText = dict.exp_title;
    document.getElementById('exp-desc').innerText = dict.exp_desc;
    document.getElementById('lnk-disc-more').innerText = dict.lnk_disc_more;
    document.getElementById('t-title').innerText = dict.t_title;
    document.getElementById('t-based').innerText = dict.t_based;
}

/**
 * Render Cars Grid dynamically with dynamic pricing calculations.
 */
function renderCars() {
    const dict = translations[currentLang];
    const carsList = document.getElementById('cars-list');
    carsList.innerHTML = '';

    // Calculate dates
    const pickupVal = document.getElementById('pickup_date').value;
    const returnVal = document.getElementById('return_date').value;
    const pickupLoc = document.getElementById('pickup_location').value;
    
    let days = 3;
    let priceMultiplier = 1.0;

    if (pickupVal && returnVal) {
        const d1 = new Date(pickupVal);
        const d2 = new Date(returnVal);
        const diffTime = Math.abs(d2 - d1);
        days = Math.max(1, Math.ceil(diffTime / (1000 * 60 * 60 * 24)));
        
        // Mock seasonal pricing multiplier based on month:
        // June, July, August (High Season) +30%
        const month = d1.getMonth();
        if (month >= 5 && month <= 7) {
            priceMultiplier = 1.30;
        }
    }

    defaultCars.forEach(car => {
        const finalDailyRate = Math.round(car.basePrice * priceMultiplier);
        const finalTotal = finalDailyRate * days;
        
        // Build pre-populated WhatsApp message template
        const whatsAppMsg = `Hello Car Airport Morocco!\n\n` +
                             `I would like to inquire about booking a *${car.brand} ${car.model}*:\n` +
                             `• Pick-up: ${pickupLoc} on ${pickupVal}\n` +
                             `• Return: on ${returnVal}\n` +
                             `• Duration: ${days} days\n` +
                             `• Estimated Price: ${finalTotal} DH\n\n` +
                             `Is this vehicle available?`;
                             
        const whatsappUrl = `https://wa.me/212606520816?text=${encodeURIComponent(whatsAppMsg)}`;

        const card = document.createElement('div');
        card.className = 'car-card';
        card.innerHTML = `
            <div class="car-image-container">
                ${car.brand === 'Volkswagen' ? '<div class="car-badge">Top Choice</div>' : ''}
                <button class="wishlist-btn" title="Add to favorites">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="color: #666;">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                </button>
                <img src="${car.image}" alt="${car.brand} ${car.model}">
                <video muted loop playsinline src="${car.video}"></video>
            </div>
            
            <div class="car-details">
                <div class="car-title-row">
                    <h3>${car.brand} ${car.model}</h3>
                </div>
                <div class="car-subtitle">${dict.or_similar}</div>
                
                <div class="car-specs">
                    <div class="spec-item">👥 ${car.seats} ${dict.seats}</div>
                    <div class="spec-item">⚙️ ${car.transmission === 'Manual' ? dict.manual : dict.automatic}</div>
                    <div class="spec-item">❄️ ${dict.ac}</div>
                </div>
                
                <div class="car-price-row">
                    <div class="price-box">
                        <div class="price-amount">${finalDailyRate} ${dict.dh} <span>/ ${dict.day}</span></div>
                        <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Total: ${finalTotal} DH (${days} days)</div>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="book-btn" onclick="openBookingModal('${car.brand} ${car.model}')">
                            ${dict.book_now}
                        </a>
                        <a href="${whatsappUrl}" target="_blank" class="whatsapp-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.977h.004c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.33-5.615zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.69-4.98c-.202-.101-1.194-.588-1.378-.653-.185-.066-.32-.099-.455.101-.134.2-.522.653-.64.789-.118.135-.235.15-.437.05-.202-.101-.85-.313-1.619-.998-.598-.534-1.002-1.195-1.12-1.395-.118-.2-.012-.307.088-.407.09-.09.202-.234.302-.35.1-.117.135-.198.202-.33.067-.133.034-.25-.017-.35-.05-.1-.455-1.096-.622-1.498-.163-.393-.328-.34-.456-.34-.117-.006-.252-.008-.387-.008-.135 0-.355.05-.54.254-.185.2-.705.688-.705 1.68 0 1 .725 1.966.827 2.1 0 .135 1.425 2.18 3.453 3.06.48.21.854.336 1.146.429.482.153.92.13 1.27.077.39-.058 1.194-.488 1.362-.958.168-.47.168-.872.118-.957-.05-.084-.186-.135-.388-.236z"/>
                            </svg>
                            ${dict.book_whatsapp}
                        </a>
                    </div>
                </div>
            </div>
        `;
        
        carsList.appendChild(card);
    });

    initHoverVideos();
    initMobileAutoplayVideos();
}

/**
 * Desktop Video Play Hover Triggers
 */
function initHoverVideos() {
    if (window.matchMedia('(hover: hover)').matches) {
        const carCards = document.querySelectorAll('.car-card');
        carCards.forEach(card => {
            const video = card.querySelector('video');
            if (!video) return;

            card.addEventListener('mouseenter', () => {
                video.currentTime = 0;
                video.play().catch(e => console.log('Autoplay blocked', e));
            });

            card.addEventListener('mouseleave', () => {
                video.pause();
            });
        });
    }
}

/**
 * Mobile Scroll Video Autoplay (Intersection Observer)
 */
function initMobileAutoplayVideos() {
    if (!window.matchMedia('(hover: hover)').matches && 'IntersectionObserver' in window) {
        const videos = document.querySelectorAll('.car-image-container video');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const video = entry.target;
                if (entry.isIntersecting) {
                    video.style.opacity = 1;
                    video.play().catch(e => console.log('Mobile play blocked', e));
                } else {
                    video.style.opacity = 0;
                    video.pause();
                }
            });
        }, { threshold: 0.6 });

        videos.forEach(v => observer.observe(v));
    }
}

function initWhatsAppBubble() {
    const bubble = document.getElementById('whatsapp-bubble');
    bubble.addEventListener('click', () => {
        const message = `Hello Car Airport Morocco! I am visiting your site and would like to ask a general question about car rentals.`;
        window.open(`https://wa.me/212606520816?text=${encodeURIComponent(message)}`, '_blank');
    });
}

function openBookingModal(carName) {
    document.getElementById('modalCarTitle').innerText = 'Book ' + carName;
    document.getElementById('bookingModal').style.display = 'flex';
}
