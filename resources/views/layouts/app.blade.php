<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Dynamic SEO Titles and Descriptions -->
    <title>@yield('title', 'Car Airport Morocco - Rent a Car at Marrakech Airport')</title>
    <meta name="description" content="@yield('meta_description', 'Rent a car at Marrakech Airport from 350 DH per day. Free airport delivery, full insurance, unlimited mileage, and direct WhatsApp booking.')">
    
    <!-- Automatic Browser / System Dark Mode Detection -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
            } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>
    
    <!-- Dynamic hreflang Alternate Tags -->
    {!! \App\Helpers\SeoHelper::getAlternateLinks() !!}
    
    <!-- OpenGraph Social Media Meta Tags -->
    <meta property="og:title" content="@yield('title', 'Car Airport Morocco - Rent a Car at Marrakech Airport')" />
    <meta property="og:description" content="@yield('meta_description', 'Rent a car at Marrakech Airport from 350 DH per day. Free airport delivery, full insurance, unlimited mileage, and direct WhatsApp booking.')" />
    <meta property="og:image" content="{{ asset('/images/logo.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Car Airport Morocco" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'Car Airport Morocco - Rent a Car at Marrakech Airport')" />
    <meta name="twitter:description" content="@yield('meta_description', 'Rent a car at Marrakech Airport from 350 DH per day. Free airport delivery, full insurance, unlimited mileage, and direct WhatsApp booking.')" />
    <meta name="twitter:image" content="{{ asset('/images/logo.png') }}" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @php
        $googleTracking = \App\Models\Setting::get('google_tracking_code');
        $hotjarCode     = \App\Models\Setting::get('hotjar_code');
    @endphp

    @if($googleTracking)
        {{-- Google Analytics / Tag Manager -- injected from Admin > Tracking & Analytics --}}
        {!! $googleTracking !!}
    @endif

    @if($hotjarCode)
        {{-- Hotjar -- injected from Admin > Tracking & Analytics --}}
        {!! $hotjarCode !!}
    @endif

    <!-- Inline CSS — proxy-safe, zero dependency on asset serving -->
    <style>
:root{
    --primary-blue:#0f1d36;
    --primary-blue-light:#1b2f52;
    --accent-gold:#c5a059;
    --accent-gold-hover:#b08c48;
    --text-dark:#222222;
    --text-muted:#666666;
    --text-white:#ffffff;
    --bg-light:#f8fafc;
    --bg-white:#ffffff;
    --border-color:#e2e8f0;
    --shadow-sm:0 2px 4px rgba(0,0,0,0.05);
    --shadow-md:0 4px 12px rgba(0,0,0,0.08);
    --shadow-lg:0 10px 25px rgba(15,29,54,0.1);
    --font-heading:'Outfit',sans-serif;
    --font-body:'Inter',sans-serif;
}

[data-theme="dark"] {
    --primary-blue:#080f1d;
    --primary-blue-light:#0f1d36;
    --text-dark:#f1f5f9;
    --text-muted:#94a3b8;
    --bg-light:#0f172a;
    --bg-white:#1e293b;
    --border-color:#334155;
    --shadow-sm:0 2px 4px rgba(0,0,0,0.2);
    --shadow-md:0 4px 12px rgba(0,0,0,0.3);
    --shadow-lg:0 10px 25px rgba(0,0,0,0.4);
}

*{margin:0;padding:0;box-sizing:border-box}
html,body{font-family:var(--font-body);background-color:var(--bg-light);color:var(--text-dark);line-height:1.6;overflow-x:hidden;width:100%;position:relative;transition:background-color 0.3s, color 0.3s;}
header{background-color:rgba(15,29,54,0.95);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,255,255,0.1);position:sticky;top:0;z-index:1000}
.header-container{max-width:1200px;margin:0 auto;padding:1rem 1.5rem;display:flex;justify-content:space-between;align-items:center}
.logo img{height:45px;object-fit:contain}
nav ul{display:flex;list-style:none;gap:2rem}
nav a{color:var(--text-white);text-decoration:none;font-weight:500;font-size:0.95rem;transition:color 0.3s}
nav a:hover{color:var(--accent-gold)}
.header-actions{display:flex;align-items:center;gap:1.5rem}
.lang-selector{color:var(--text-white);background:transparent;border:1px solid rgba(255,255,255,0.2);padding:0.4rem 0.8rem;border-radius:6px;cursor:pointer;font-size:0.85rem}
.lang-selector option{background-color: #0f1d36; color: #ffffff;}
[data-theme="dark"] .lang-selector option {background-color: #0f172a; color: #f1f5f9;}
.booking-btn{background-color:transparent;border:1px solid var(--accent-gold);color:var(--text-white);padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-size:0.9rem;font-weight:600;transition:all 0.3s}
.booking-btn:hover{background-color:var(--accent-gold);color:var(--primary-blue)}
.hero{position:relative;background:linear-gradient(rgba(0,0,0,0.45),rgba(15,29,54,0.85)),url('/images/marrakech_bg.jpg') no-repeat center center;background-size:cover;min-height:480px;padding:5rem 1.5rem 10rem;color:var(--text-white);text-align:center;background-color:var(--primary-blue)}
.hero-badge{color:var(--accent-gold);text-transform:uppercase;font-weight:700;font-size:0.9rem;letter-spacing:2px;margin-bottom:1rem;display:inline-block}
.hero h1{font-family:var(--font-heading);font-size:3rem;font-weight:800;margin-bottom:1rem;line-height:1.2}
.hero p{font-size:1.1rem;max-width:600px;margin:0 auto 2.5rem;opacity:0.9}
.hero-features{display:flex;justify-content:center;gap:2rem;flex-wrap:wrap}
.hero-feature-item{display:flex;align-items:center;gap:0.5rem;font-size:0.95rem;font-weight:500}
.hero-feature-item svg{color:var(--accent-gold)}
.search-widget-container{max-width:1000px;margin:-6rem auto 4rem;padding:0 1.5rem;position:relative;z-index:10}
.search-widget{background:var(--bg-white);border-radius:16px;padding:2rem;box-shadow:var(--shadow-lg);border:1px solid var(--border-color)}
.search-grid{display:grid;grid-template-columns:2fr 1.5fr 1.5fr 1fr;gap:1.5rem;align-items:flex-end}
.form-group{display:flex;flex-direction:column;gap:0.5rem}
.form-group label{font-size:0.75rem;font-weight:700;color:var(--text-muted);letter-spacing:1px}
.input-wrapper{position:relative}
.input-wrapper select,.input-wrapper input{width:100%;padding:0.8rem 1rem;border:1px solid var(--border-color);border-radius:8px;font-family:var(--font-body);font-size:0.9rem;background-color:var(--bg-light);color:var(--text-dark);outline:none;transition:border-color 0.3s}
.input-wrapper select:focus,.input-wrapper input:focus{border-color:var(--accent-gold)}
.search-btn{background-color:var(--primary-blue);color:var(--text-white);border:none;padding:0.8rem 1.5rem;border-radius:8px;font-size:0.95rem;font-weight:700;cursor:pointer;transition:background-color 0.3s;width:100%;display:flex;justify-content:center;align-items:center;gap:0.5rem}
.search-btn:hover{background-color:var(--primary-blue-light)}
.search-widget-footer{display:flex;justify-content:space-between;margin-top:1.5rem;font-size:0.85rem;color:var(--text-muted)}
.search-widget-footer div{display:flex;align-items:center;gap:0.5rem}
.section-container{max-width:1200px;margin:0 auto 5rem;padding:0 1.5rem}
.section-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem}
.section-header h2{font-family:var(--font-heading);font-size:2.2rem;font-weight:700;color:var(--text-dark)}
.view-all-link{color:var(--text-dark);text-decoration:none;font-weight:600;font-size:0.95rem;display:flex;align-items:center;gap:0.5rem;transition:color 0.3s}
.view-all-link:hover{color:var(--accent-gold)}
.cars-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:2rem}
.car-card{background-color:var(--bg-white);border-radius:12px;overflow:hidden;box-shadow:var(--shadow-sm);border:1px solid var(--border-color);transition:transform 0.3s,box-shadow 0.3s;display:flex;flex-direction:column}
.car-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-md)}
.car-image-container{position:relative;width:100%;height:180px;background-color:#eee;overflow:hidden}
.car-image-container img,.car-image-container video{width:100%;height:100%;object-fit:cover;transition:opacity 0.4s ease-in-out}
.car-image-container video{position:absolute;top:0;left:0;opacity:0}
.car-card:hover .car-image-container video{opacity:1}
.car-badge{position:absolute;top:10px;left:10px;background-color:#0066cc;color:var(--text-white);padding:0.25rem 0.6rem;border-radius:4px;font-size:0.7rem;font-weight:700;z-index:5}
.wishlist-btn{position:absolute;top:10px;right:10px;background-color:rgba(255,255,255,0.8);border:none;width:30px;height:30px;border-radius:50%;display:flex;justify-content:center;align-items:center;cursor:pointer;z-index:5}
.car-details{padding:1.5rem;flex-grow:1;display:flex;flex-direction:column}
.car-title-row{margin-bottom:0.25rem}
.car-title-row h3{font-family:var(--font-heading);font-size:1.25rem;font-weight:700;color:var(--text-dark)}
.car-subtitle{font-size:0.8rem;color:var(--text-muted);margin-bottom:1rem}
.car-specs{display:flex;gap:1rem;font-size:0.8rem;color:var(--text-muted);margin-bottom:1.5rem;flex-wrap:wrap}
.spec-item{display:flex;align-items:center;gap:0.25rem}
.car-price-row{display:flex;justify-content:space-between;align-items:center;margin-top:auto;border-top:1px solid var(--border-color);padding-top:1rem;gap:1rem}
.price-box{display:flex;flex-direction:column}
.price-amount{font-size:1.4rem;font-weight:800;color:var(--text-dark);line-height:1}
.price-amount span{font-size:0.8rem;color:var(--text-muted);font-weight:400}
.action-buttons{display:flex;flex-direction:column;gap:0.5rem;width:100%}
.book-btn{background-color:var(--primary-blue);color:var(--text-white);text-align:center;padding:0.6rem 1rem;border-radius:6px;text-decoration:none;font-size:0.85rem;font-weight:700;transition:background-color 0.3s}
.book-btn:hover{background-color:var(--primary-blue-light)}
.whatsapp-btn{background-color:#25d366;color:var(--text-white);text-align:center;padding:0.6rem 1rem;border-radius:6px;text-decoration:none;font-size:0.85rem;font-weight:700;transition:background-color 0.3s;display:flex;justify-content:center;align-items:center;gap:0.5rem}
.whatsapp-btn:hover{background-color:#20ba5a}
.why-choose{background-color:var(--bg-light);padding:5rem 0;border-top:1px solid var(--border-color);border-bottom:1px solid var(--border-color)}
.why-choose-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2.5rem}
.why-card{text-align:center;padding:1rem}
.why-icon{width:60px;height:60px;border-radius:50%;background-color:rgba(197,160,89,0.1);border:1px solid rgba(197,160,89,0.2);display:flex;justify-content:center;align-items:center;margin:0 auto 1.5rem;font-size:1.5rem}
.why-card h3{font-family:var(--font-heading);font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--text-dark)}
.why-card p{font-size:0.9rem;color:var(--text-muted)}
.promo-testimonials{display:grid;grid-template-columns:1fr 1fr;gap:2.5rem;margin:5rem auto;max-width:1200px;padding:0 1.5rem}
.promo-banner{position:relative;background:linear-gradient(rgba(15,29,54,0.4),rgba(15,29,54,0.85));background-color:var(--primary-blue);border-radius:16px;padding:4rem 3rem;color:var(--text-white);display:flex;flex-direction:column;justify-content:flex-end;min-height:380px}
.promo-banner h2{font-family:var(--font-heading);font-size:2rem;margin-bottom:0.5rem}
.promo-banner p{font-size:0.95rem;margin-bottom:1.5rem;opacity:0.9}
.promo-link{background-color:var(--bg-white);color:var(--text-dark);padding:0.8rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:700;align-self:flex-start;transition:all 0.3s}
.promo-link:hover{background-color:var(--accent-gold);color:var(--text-white)}
.testimonials{background-color:var(--bg-white);border:1px solid var(--border-color);border-radius:16px;padding:3rem;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;justify-content:space-between}
.testimonials-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem}
.testimonials-header h2{font-family:var(--font-heading);font-size:1.6rem;color:var(--text-dark)}
.rating-summary{text-align:right;color:var(--text-dark)}
.rating-number{font-size:2.2rem;font-weight:800;color:var(--text-dark);line-height:1}
.stars{color:#ffc107;margin:0.25rem 0}
.rating-platforms{display:flex;gap:1rem;font-size:0.75rem;color:var(--text-muted)}
.review-slider{position:relative;border-top:1px solid var(--border-color);padding-top:1.5rem}
.review-text{font-style:italic;color:var(--text-muted);font-size:0.95rem;margin-bottom:1.5rem}
.reviewer-meta{display:flex;align-items:center;gap:1rem}
.reviewer-avatar{width:40px;height:40px;border-radius:50%;background-color:var(--bg-light);border:1px solid var(--accent-gold);display:flex;justify-content:center;align-items:center;font-weight:700;color:var(--accent-gold)}
.reviewer-info h4{font-size:0.9rem;font-weight:700;color:var(--text-dark)}
.reviewer-info span{font-size:0.75rem;color:var(--text-muted)}
footer{background-color:var(--primary-blue);color:var(--text-white);padding:5rem 1.5rem 2rem}
.footer-top{max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:3rem;flex-wrap:wrap;gap:2rem}
.footer-newsletter{display:flex;gap:1rem;flex-wrap:wrap;max-width:500px;width:100%}
.footer-newsletter input{flex-grow:1;padding:0.8rem 1.2rem;border-radius:8px;border:1px solid rgba(255,255,255,0.1);background-color:rgba(255,255,255,0.05);color:var(--text-white);outline:none}
.footer-newsletter button{background-color:var(--accent-gold);color:var(--primary-blue);border:none;padding:0.8rem 2rem;border-radius:8px;font-weight:700;cursor:pointer;transition:background-color 0.3s}
.footer-grid{max-width:1200px;margin:4rem auto;display:grid;grid-template-columns:2fr 1fr 1fr 1fr 1.5fr;gap:2.5rem}
.footer-col h4{font-family:var(--font-heading);font-size:1.1rem;margin-bottom:1.5rem;color:var(--accent-gold);font-weight:600}
.footer-col ul{list-style:none}
.footer-col li{margin-bottom:0.8rem}
.footer-col a{color:rgba(255,255,255,0.7);text-decoration:none;font-size:0.9rem;transition:color 0.3s}
.footer-col a:hover{color:var(--accent-gold)}
.footer-contact li{display:flex;align-items:center;gap:0.8rem;font-size:0.9rem;color:rgba(255,255,255,0.7)}
.footer-contact svg{color:var(--accent-gold)}
.footer-bottom{text-align:center;font-size:0.8rem;color:rgba(255,255,255,0.4);border-top:1px solid rgba(255,255,255,0.05);padding-top:2rem;max-width:1200px;margin:0 auto}
.floating-whatsapp{position:fixed;bottom:30px;right:30px;width:60px;height:60px;background-color:#25d366;border-radius:50%;display:flex;justify-content:center;align-items:center;box-shadow:0 4px 10px rgba(0,0,0,0.3);z-index:999;cursor:pointer;transition:transform 0.3s;animation:pulse 2s infinite}
.floating-whatsapp:hover{transform:scale(1.1)}
@media(max-width:991px){
    .search-grid{grid-template-columns:1fr 1fr}
    .footer-grid{grid-template-columns:1fr 1fr}
    .promo-testimonials{grid-template-columns:1fr}
    .hero h1{font-size:2.2rem}
}
@media(max-width:767px){
    .header-container{flex-direction:row;justify-content:space-between;padding:0.6rem 1rem;gap:0.5rem}
    nav{display:none}
    .header-actions{width:auto;justify-content:flex-end;gap:0.4rem;flex-wrap:nowrap}
    .lang-selector{padding:0.3rem 0.5rem;font-size:0.75rem}
    .booking-btn{padding:0.4rem 0.8rem;font-size:0.75rem}
    .logo img{height:32px}
    .search-grid{grid-template-columns:1fr}
    .hero{padding:4rem 1rem 6rem;min-height:auto}
    .hero h1{font-size:1.9rem;line-height:1.3}
    .hero p{font-size:1rem;margin-bottom:1.5rem}
    .search-widget-container{margin:-3rem auto 3rem;padding:0 1rem}
    .search-widget{padding:1.5rem 1.25rem}
    .section-container{padding:0 1rem;margin-bottom:3.5rem}
    .section-header{flex-direction:row;justify-content:space-between;align-items:center;margin-bottom:1.25rem}
    .section-header h2{font-size:1.4rem}
    .testimonials{padding:1.5rem 1.25rem}
    .promo-banner{padding:2.5rem 1.5rem;min-height:300px}
    .footer-grid{grid-template-columns:1fr;gap:2rem}
    .footer-top{flex-direction:column;align-items:stretch;text-align:center}
    .footer-newsletter{max-width:100%}
    .floating-whatsapp{width:50px;height:50px;bottom:20px;right:20px}
    .floating-whatsapp svg{width:26px;height:26px}
    
    .filter-toolbar{overflow-x:auto;white-space:nowrap;padding-bottom:8px;-webkit-overflow-scrolling:touch;width:100%}
    .filter-toolbar::-webkit-scrollbar{height:4px}
    .filter-toolbar::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:2px}
    .filter-toolbar .filter-group{flex-wrap:nowrap}
    .filter-toolbar .filter-divider{display:none}
}
@media(max-width:576px){
    .cars-grid{grid-template-columns:1fr 1fr;gap:0.75rem}
    .car-card{border-radius:8px}
    .car-image-container{height:110px}
    .car-details{padding:0.75rem}
    .car-title-row h3{font-size:0.95rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .car-subtitle{font-size:0.7rem;margin-bottom:0.5rem}
    .car-specs{display:none} /* Hide specs on mobile list view to keep it compact */
    .car-price-row{flex-direction:column;align-items:stretch;gap:0.5rem;padding-top:0.5rem}
    .price-box{flex-direction:row;justify-content:space-between;align-items:center}
    .price-amount{font-size:1.05rem}
    .price-amount span{font-size:0.65rem}
    .action-buttons{flex-direction:row;gap:0.35rem;width:100%;align-items:center;margin-top:0.5rem}
    .action-buttons .book-btn{flex-grow:1;font-size:0.75rem;padding:0.55rem 0.25rem;text-align:center}
    .action-buttons .whatsapp-btn{width:34px;height:32px;padding:0;display:inline-flex;justify-content:center;align-items:center;flex-shrink:0;font-size:0;border-radius:6px}
    .action-buttons .whatsapp-btn svg{width:16px;height:16px;margin:0}
    
    .testimonials-header{flex-direction:column;align-items:flex-start;gap:1rem}
    .rating-summary{text-align:left}
}
@keyframes pulse{0%{box-shadow:0 0 0 0 rgba(37,211,102,0.5)}70%{box-shadow:0 0 0 15px rgba(37,211,102,0)}100%{box-shadow:0 0 0 0 rgba(37,211,102,0)}}
/* ---- Filter Toolbar ---- */
.filter-toolbar{display:flex;flex-wrap:wrap;gap:0.5rem;align-items:center;margin-bottom:2rem;padding:0.5rem 0}
.filter-toolbar .filter-group{display:flex;gap:0.4rem;flex-wrap:wrap;align-items:center}
.filter-toolbar .filter-divider{width:1px;height:24px;background:var(--border-color);margin:0 0.5rem}
.filter-btn{appearance:none;-webkit-appearance:none;display:inline-flex;align-items:center;background:#f1f5f9;border:1.5px solid #e2e8f0;color:#475569;padding:0.38rem 1rem;border-radius:30px;font-size:0.82rem;font-family:var(--font-body);font-weight:600;cursor:pointer;transition:all 0.2s ease;line-height:1.4;letter-spacing:0.01em;box-shadow:none;text-decoration:none;white-space:nowrap}
.filter-btn:hover{background:#e0eaff;border-color:#94a3b8;color:var(--primary-blue)}
.filter-btn.active{background:var(--primary-blue);color:#fff;border-color:var(--primary-blue);font-weight:700;box-shadow:0 3px 10px rgba(15,29,54,0.25)}
    #manageBookingModal input, #manageBookingModal select, #bookingModal input, #bookingModal select {
    background-color: var(--bg-light) !important;
    color: var(--text-dark) !important;
    border: 1px solid var(--border-color) !important;
}
#manageBookingModal input::placeholder, #bookingModal input::placeholder {
    color: var(--text-muted) !important;
}
</style>
    
    <!-- JSON-LD Structured Schema Markup for Search Snippets -->
    <script type="application/ld+json">
        {!! \App\Helpers\SeoHelper::getSchemaMarkup() !!}
    </script>
</head>
<body>

    <!-- Header Navigation -->
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="/{{ $locale }}">
                    <!-- Placeholder logo or user's logo -->
                    <img src="/images/logo.png" alt="Car Airport Morocco Logo" onerror="this.src='https://placehold.co/200x50/0f1d36/c5a059?text=CAR+AIRPORT'">
                </a>
            </div>
            
            <nav>
                <ul>
                    <li><a href="/{{ $locale }}#cars">{{ __('messages.featured_cars') }}</a></li>
                    <li><a href="/{{ $locale }}#why-choose">{{ __('messages.why_choose_title') }}</a></li>
                    <li><a href="/{{ $locale }}#testimonials">{{ __('messages.customer_says') }}</a></li>
                    <li><a href="/{{ $locale }}/blog">Blog & Guides</a></li>
                </ul>
            </nav>
            
            <div class="header-actions">
                <!-- Currency Selector -->
                <select class="lang-selector" id="currency-select" style="margin-right: 0.5rem;">
                    <option value="EUR">💶 EUR (€)</option>
                    <option value="MAD">🇲🇦 MAD (DH)</option>
                    <option value="USD">💵 USD ($)</option>
                    <option value="GBP">💷 GBP (£)</option>
                </select>

                <!-- Lang Selector -->
                <select class="lang-selector" id="lang-select">
                    <option value="en" {{ $locale === 'en' ? 'selected' : '' }}>🇬🇧 English</option>
                    <option value="fr" {{ $locale === 'fr' ? 'selected' : '' }}>🇫🇷 Français</option>
                    <option value="de" {{ $locale === 'de' ? 'selected' : '' }}>🇩🇪 Deutsch</option>
                </select>

                <!-- Theme Toggle Button -->
                <button class="lang-selector" id="theme-toggle-btn" title="Toggle Theme" style="font-size: 1.1rem; padding: 0.35rem 0.65rem;">🌓</button>
                
                <a href="#" onclick="openManageBookingModal(); return false;" class="booking-btn">{{ __('messages.my_booking') }}</a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @if(session('success'))
            <div style="max-width: 1200px; margin: 1.5rem auto 0 auto; padding: 1rem 1.5rem; background-color: #d1fae5; border-left: 4px solid #10b981; color: #065f46; border-radius: 6px; font-weight: 600; box-shadow: var(--shadow-sm);">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="max-width: 1200px; margin: 1.5rem auto 0 auto; padding: 1rem 1.5rem; background-color: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; border-radius: 6px; font-weight: 600; box-shadow: var(--shadow-sm);">
                ✗ {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Floating WhatsApp Action -->
    <div class="floating-whatsapp" data-phone="{{ config('app.whatsapp_phone', '+212600988632') }}" title="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16" style="color: white;">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.977h.004c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.33-5.615zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.69-4.98c-.202-.101-1.194-.588-1.378-.653-.185-.066-.32-.099-.455.101-.134.2-.522.653-.64.789-.118.135-.235.15-.437.05-.202-.101-.85-.313-1.619-.998-.598-.534-1.002-1.195-1.12-1.395-.118-.2-.012-.307.088-.407.09-.09.202-.234.302-.35.1-.117.135-.198.202-.33.067-.133.034-.25-.017-.35-.05-.1-.455-1.096-.622-1.498-.163-.393-.328-.34-.456-.34-.117-.006-.252-.008-.387-.008-.135 0-.355.05-.54.254-.185.2-.705.688-.705 1.68 0 1 .725 1.966.827 2.1 0 .135 1.425 2.18 3.453 3.06.48.21.854.336 1.146.429.482.153.92.13 1.27.077.39-.058 1.194-.488 1.362-.958.168-.47.168-.872.118-.957-.05-.084-.186-.135-.388-.236z"/>
        </svg>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-top">
            <div>
                <h3>CAR AIRPORT</h3>
                <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">Get the best deals in your inbox. Subscribe to our newsletter.</p>
            </div>
            <div class="footer-newsletter">
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </div>
        </div>
        
        <div class="footer-grid">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('about', ['locale' => $locale]) }}">About Us</a></li>
                    <li><a href="{{ route('blog.index', ['locale' => $locale]) }}">Blog & Travel Guides</a></li>
                    <li><a href="{{ url($locale . '#contact-form') }}">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Information</h4>
                <ul>
                    <li><a href="{{ route('faq', ['locale' => $locale]) }}">FAQ</a></li>
                    <li><a href="{{ route('terms', ['locale' => $locale]) }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy', ['locale' => $locale]) }}">Privacy Policy</a></li>
                    <li><a href="{{ route('cookie', ['locale' => $locale]) }}">Cookie Policy</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Popular Locations</h4>
                <ul>
                    <li><a href="{{ url($locale . '?pickup_location=Marrakech+Airport+(RAK)#cars') }}">Marrakech Airport</a></li>
                    <li><a href="{{ url($locale . '?pickup_location=Casablanca+Airport+(CMN)#cars') }}">Casablanca Airport</a></li>
                    <li><a href="{{ url($locale . '?pickup_location=Agadir+Airport+(AGA)#cars') }}">Agadir Airport</a></li>
                </ul>
            </div>
            
            <div class="footer-col footer-contact" style="grid-column: span 2;">
                <h4>Contact</h4>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        {{ config('app.whatsapp_phone', '+212600988632') }}
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        info@carairportmorocco.com
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        <a href="https://maps.app.goo.gl/CBibZyc5L4ioDqkH7" target="_blank" rel="noopener" style="color: inherit; text-decoration: underline;">Marrakech Airport (RAK), Morocco</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Car Airport Morocco. All rights reserved.</p>
        </div>
    </footer>

    <!-- Manage Booking Modal (Public View) -->
    <div id="manageBookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 10000; justify-content: center; align-items: center; padding: 1.5rem; backdrop-filter: blur(4px);">
        <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; max-width: 500px; width: 100%; position: relative; box-shadow: var(--shadow-lg); max-height: 90vh; overflow-y: auto; border: 1px solid var(--border-color);">
            <button onclick="closeManageBookingModal()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-muted);">&times;</button>
            
            <!-- lookup view -->
            <div id="bookingLookupSection">
                <h3 style="font-family: var(--font-heading); margin-bottom: 0.5rem; color: var(--text-dark); font-size: 1.5rem; font-weight: 700;">Manage Your Booking</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">Enter your booking reference code to view or modify your reservation.</p>
                
                <div style="margin-bottom: 1rem; display: flex; flex-direction: column; gap: 0.5rem;">
                    <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Booking Reference</label>
                    <input type="text" id="lookupReference" placeholder="e.g. CAM-A1B2C3" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; outline: none; text-transform: uppercase; background-color: var(--bg-light); color: var(--text-dark);">
                </div>

                <!-- Booking History List -->
                <div id="bookingHistoryContainer" style="margin-bottom: 1.25rem; display: none;">
                    <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block; margin-bottom: 0.4rem;">Recent Bookings on this Device</label>
                    <div id="bookingHistoryList" style="display: flex; flex-direction: column; gap: 0.5rem; max-height: 120px; overflow-y: auto; background: var(--bg-light); border: 1px solid var(--border-color); border-radius: 8px; padding: 0.5rem;">
                        <!-- populated via JS -->
                    </div>
                </div>
                
                <div id="lookupError" style="color: #dc3545; font-size: 0.85rem; margin-bottom: 1rem; display: none;"></div>
                
                <button onclick="retrieveBookingDetails()" style="background-color: var(--primary-blue); color: white; border: none; width: 100%; padding: 0.8rem; border-radius: 8px; font-weight: 700; cursor: pointer;">Retrieve Reservation</button>
            </div>
            
            <!-- edit view -->
            <div id="bookingEditSection" style="display: none;">
                <h3 style="font-family: var(--font-heading); margin-bottom: 0.25rem; color: var(--primary-blue); font-size: 1.5rem; font-weight: 700;">Modify Booking</h3>
                <div style="font-size: 0.85rem; color: var(--accent-gold); font-weight: 600; margin-bottom: 1.25rem;" id="editRefDisplay">Reference: CAM-XXXXXX</div>
                
                <form id="publicBookingEditForm" onsubmit="submitPublicBookingUpdate(event)">
                    <input type="hidden" id="editBookingRef">
                    
                    <div style="margin-bottom: 1rem; display: flex; flex-direction: column; gap: 0.35rem;">
                        <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Selected Car</label>
                        <select id="editCarSelect" onchange="triggerPriceRecalculation()" style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                            <!-- populated dynamically -->
                        </select>
                    </div>

                    <div style="margin-bottom: 1rem; display: flex; flex-direction: column; gap: 0.35rem;">
                        <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Your Name</label>
                        <input type="text" id="editCustomerName" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                    </div>

                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Email</label>
                            <input type="email" id="editCustomerEmail" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                        </div>
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Phone</label>
                            <input type="tel" id="editCustomerPhone" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Pickup Location</label>
                            <input type="text" id="editPickupLocation" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                        </div>
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Return Location</label>
                            <input type="text" id="editReturnLocation" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px;">
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Pickup Date/Time</label>
                            <input type="datetime-local" id="editPickupDatetime" onchange="triggerPriceRecalculation()" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px; font-size: 0.8rem;">
                        </div>
                        <div style="flex:1; display: flex; flex-direction: column; gap: 0.35rem;">
                            <label style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted);">Return Date/Time</label>
                            <input type="datetime-local" id="editReturnDatetime" onchange="triggerPriceRecalculation()" required style="width:100%; padding:0.6rem; border:1px solid var(--border-color); border-radius:8px; font-size: 0.8rem;">
                        </div>
                    </div>

                    <!-- Accessories / Extras Section -->
                    @php
                        $layoutExtras = \App\Models\Extra::all();
                    @endphp
                    <div style="margin-bottom: 1rem; background: #faf7f2; padding: 0.85rem; border-radius: 8px; border: 1px solid rgba(197,160,89,0.2); color: #333;">
                        <h4 style="margin: 0 0 0.5rem 0; font-size: 0.85rem; font-weight: 700; color: var(--primary-blue);">Optional Extras & Add-ons</h4>
                        <div style="display: flex; flex-direction: column; gap: 0.4rem;" id="publicEditExtrasContainer">
                            @foreach($layoutExtras as $extra)
                            <label style="display: flex; justify-content: space-between; align-items: center; font-size: 0.78rem; font-weight: 600; cursor: pointer; color: #475569; margin: 0;">
                                <span>
                                    @if($extra->slug == 'insurance') 🛡️ @elseif($extra->slug == 'gps') 🗺️ @elseif($extra->slug == 'child_seat') 👶 @else 👤 @endif
                                    {{ $extra->name }} (+{{ round($extra->price) }} DH/{{ $extra->type == 'per_day' ? 'day' : 'flat' }})
                                </span>
                                <input type="checkbox" id="publicEditExtra_{{ $extra->slug }}" data-slug="{{ $extra->slug }}" onchange="triggerPriceRecalculation()" style="width: auto; cursor: pointer;">
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Pricing Info Display -->
                    <div style="background: #faf7f2; padding: 1rem; border-radius: 8px; border: 1px solid rgba(197,160,89,0.2); margin-bottom: 1.5rem; text-align: center;">
                        <span style="font-size: 0.8rem; color: var(--text-muted); font-weight:500;">Estimated Total Price:</span>
                        <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-blue);"><span id="editEstimatedPrice" class="price-val" data-base-mad="0">Calculating...</span> <span class="currency-label">DH</span> <span id="editEstimatedDays" style="font-size: 0.8rem; color: var(--text-muted); font-weight: normal; margin-left: 0.25rem;"></span></div>
                    </div>

                    <div id="editError" style="color: #dc3545; font-size: 0.85rem; margin-bottom: 1rem; display: none;"></div>
                    <div id="editSuccess" style="color: #28a745; font-size: 0.85rem; margin-bottom: 1rem; display: none;"></div>

                    <div style="display: flex; gap: 1rem;">
                        <button type="button" onclick="backToLookup()" style="flex: 1; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: 8px; background: white; cursor: pointer; font-weight: 600;">Back</button>
                        <button type="submit" id="savePublicEditBtn" style="flex: 2; padding: 0.75rem; border: none; border-radius: 8px; background: var(--accent-gold); color: white; cursor: pointer; font-weight: 700;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- App Script -->
    <script src="/js/app.js"></script>

    <script>
        // Language Select Redirect Helper
        document.getElementById('lang-select')?.addEventListener('change', function() {
            const newLocale = this.value;
            const currentPath = window.location.pathname;
            const segments = currentPath.split('/');
            if (segments[1] === 'en' || segments[1] === 'fr' || segments[1] === 'de') {
                segments[1] = newLocale;
            } else {
                segments.splice(1, 0, newLocale);
            }
            window.location.pathname = segments.join('/');
        });

        // Manage Booking Modal logic
        function openManageBookingModal() {
            // Reset to lookup screen
            document.getElementById('bookingLookupSection').style.display = 'block';
            document.getElementById('bookingEditSection').style.display = 'none';
            document.getElementById('lookupReference').value = '';
            document.getElementById('lookupError').style.display = 'none';
            
            // Populate and show local booking history
            loadBookingHistory();

            document.getElementById('manageBookingModal').style.display = 'flex';
        }

        function loadBookingHistory() {
            const container = document.getElementById('bookingHistoryContainer');
            const list = document.getElementById('bookingHistoryList');
            if (!container || !list) return;

            const history = JSON.parse(localStorage.getItem('booking_history') || '[]');
            if (history.length === 0) {
                container.style.display = 'none';
                return;
            }

            list.innerHTML = '';
            history.forEach(item => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.style.display = 'flex';
                btn.style.justifyContent = 'space-between';
                btn.style.width = '100%';
                btn.style.padding = '0.5rem';
                btn.style.border = '1px solid var(--border-color)';
                btn.style.background = 'var(--bg-white)';
                btn.style.borderRadius = '6px';
                btn.style.cursor = 'pointer';
                btn.style.textAlign = 'left';
                btn.style.fontSize = '0.8rem';
                btn.style.fontWeight = '600';
                btn.style.color = 'var(--text-dark)';
                
                btn.innerHTML = `<span>🔑 <strong style="color: var(--text-dark);">${item.reference}</strong> <span style="color: var(--text-muted); font-weight: normal;">(${item.carName})</span></span> <span style="color:var(--accent-gold); font-size:0.75rem;">Select ➔</span>`;
                btn.onclick = function() {
                    document.getElementById('lookupReference').value = item.reference;
                    retrieveBookingDetails();
                };
                list.appendChild(btn);
            });
            container.style.display = 'block';
        }

        function saveToBookingHistory(reference, carName) {
            let history = JSON.parse(localStorage.getItem('booking_history') || '[]');
            // Avoid duplicates
            history = history.filter(item => item.reference !== reference);
            // Prepend new item
            history.unshift({ reference: reference, carName: carName });
            // Cap history at 5 items
            if (history.length > 5) history.pop();
            localStorage.setItem('booking_history', JSON.stringify(history));
        }

        function closeManageBookingModal() {
            document.getElementById('manageBookingModal').style.display = 'none';
        }

        function backToLookup() {
            document.getElementById('bookingLookupSection').style.display = 'block';
            document.getElementById('bookingEditSection').style.display = 'none';
            loadBookingHistory();
        }

        async function retrieveBookingDetails() {
            const ref = document.getElementById('lookupReference').value.trim();
            const errDiv = document.getElementById('lookupError');
            errDiv.style.display = 'none';

            if (!ref) {
                errDiv.innerText = 'Please enter your booking reference.';
                errDiv.style.display = 'block';
                return;
            }

            try {
                const response = await fetch(`/${document.documentElement.lang || 'en'}/booking/retrieve?reference=${ref}`);
                const data = await response.json();

                if (data.status === 'error') {
                    errDiv.innerText = data.message;
                    errDiv.style.display = 'block';
                    return;
                }

                // Populating edit view
                const booking = data.booking;
                document.getElementById('editBookingRef').value = booking.booking_reference;
                document.getElementById('editRefDisplay').innerText = `Reference: ${booking.booking_reference} [${booking.status.toUpperCase()}]`;
                document.getElementById('editCustomerName').value = booking.customer_name;
                document.getElementById('editCustomerEmail').value = booking.customer_email;
                document.getElementById('editCustomerPhone').value = booking.customer_phone;
                document.getElementById('editPickupLocation').value = booking.pickup_location;
                document.getElementById('editReturnLocation').value = booking.return_location || booking.pickup_location;
                document.getElementById('editPickupDatetime').value = booking.pickup_datetime;
                document.getElementById('editReturnDatetime').value = booking.return_datetime;

                // Save to device history on successful lookup
                saveToBookingHistory(booking.booking_reference, data.car_name || 'Car Rental');

                // Populate checkboxes dynamically
                document.querySelectorAll('#publicEditExtrasContainer input[type="checkbox"]').forEach(cb => cb.checked = false);
                const extras = booking.extras || [];
                extras.forEach(slug => {
                    const el = document.getElementById('publicEditExtra_' + slug);
                    if (el) el.checked = true;
                });

                // Populate car select dropdown
                const select = document.getElementById('editCarSelect');
                select.innerHTML = '';
                data.cars.forEach(car => {
                    const opt = document.createElement('option');
                    opt.value = car.id;
                    opt.innerText = car.name;
                    if (car.id === booking.car_id) opt.selected = true;
                    select.appendChild(opt);
                });

                // Clear feedback messages
                document.getElementById('editError').style.display = 'none';
                document.getElementById('editSuccess').style.display = 'none';

                // Display estimated price initially
                const ep = document.getElementById('editEstimatedPrice');
                ep.setAttribute('data-base-mad', booking.total_price);
                ep.innerText = booking.total_price;
                document.getElementById('editEstimatedDays').innerText = '';
                if (typeof window.applyCurrency === 'function') {
                    window.applyCurrency(localStorage.getItem('selected_currency') || 'EUR');
                }

                // Switch section views
                document.getElementById('bookingLookupSection').style.display = 'none';
                document.getElementById('bookingEditSection').style.display = 'block';

            } catch (err) {
                errDiv.innerText = 'Failed to load booking. Please try again.';
                errDiv.style.display = 'block';
            }
        }

        async function triggerPriceRecalculation() {
            const carId = document.getElementById('editCarSelect').value;
            const pickup = document.getElementById('editPickupDatetime').value;
            const returnDt = document.getElementById('editReturnDatetime').value;
            const priceDiv = document.getElementById('editEstimatedPrice');

            if (!carId || !pickup || !returnDt) return;

            priceDiv.innerText = 'Calculating...';

            const extras = [];
            document.querySelectorAll('#publicEditExtrasContainer input[type="checkbox"]').forEach(cb => {
                if (cb.checked) {
                    extras.push(cb.getAttribute('data-slug'));
                }
            });
            
            const extrasParam = extras.length > 0 ? `&extras=${extras.join(',')}` : '';

            try {
                const response = await fetch(`/${document.documentElement.lang || 'en'}/booking/recalculate?car_id=${carId}&pickup_datetime=${pickup}&return_datetime=${returnDt}${extrasParam}`);
                const data = await response.json();
                if (data.status === 'success') {
                    priceDiv.setAttribute('data-base-mad', data.total_price);
                    priceDiv.innerText = data.total_price;
                    document.getElementById('editEstimatedDays').innerText = `(${data.days} days)`;
                    if (typeof window.applyCurrency === 'function') {
                        window.applyCurrency(localStorage.getItem('selected_currency') || 'EUR');
                    }
                } else {
                    priceDiv.innerText = 'Invalid dates';
                    document.getElementById('editEstimatedDays').innerText = '';
                }
            } catch (err) {
                priceDiv.innerText = 'Error';
                document.getElementById('editEstimatedDays').innerText = '';
            }
        }

        async function submitPublicBookingUpdate(event) {
            event.preventDefault();
            const ref = document.getElementById('editBookingRef').value;
            const carId = document.getElementById('editCarSelect').value;
            const name = document.getElementById('editCustomerName').value;
            const email = document.getElementById('editCustomerEmail').value;
            const phone = document.getElementById('editCustomerPhone').value;
            const location = document.getElementById('editPickupLocation').value;
            const returnLoc = document.getElementById('editReturnLocation').value;
            const pickup = document.getElementById('editPickupDatetime').value;
            const returnDt = document.getElementById('editReturnDatetime').value;

            const extras = [];
            document.querySelectorAll('#publicEditExtrasContainer input[type="checkbox"]').forEach(cb => {
                if (cb.checked) {
                    extras.push(cb.getAttribute('data-slug'));
                }
            });

            const errDiv = document.getElementById('editError');
            const succDiv = document.getElementById('editSuccess');
            const submitBtn = document.getElementById('savePublicEditBtn');

            errDiv.style.display = 'none';
            succDiv.style.display = 'none';
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                  '{{ csrf_token() }}';

                const response = await fetch(`/${document.documentElement.lang || 'en'}/booking/update-public`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        reference: ref,
                        car_id: carId,
                        customer_name: name,
                        customer_email: email,
                        customer_phone: phone,
                        pickup_location: location,
                        return_location: returnLoc,
                        pickup_datetime: pickup,
                        return_datetime: returnDt,
                        extras: extras
                    })
                });

                const data = await response.json();

                if (data.status === 'error') {
                    errDiv.innerText = data.message;
                    errDiv.style.display = 'block';
                } else if (response.ok) {
                    succDiv.innerText = data.message;
                    succDiv.style.display = 'block';
                    document.getElementById('editEstimatedPrice').innerText = `${data.total_price} DH`;
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    errDiv.innerText = 'Something went wrong. Please check your dates.';
                    errDiv.style.display = 'block';
                }
            } catch (err) {
                errDiv.innerText = 'Connection error. Please try again.';
                errDiv.style.display = 'block';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerText = 'Save Changes';
            }
        }

        // Currency conversion code with live API fetch & static local cache fallback
        const staticRates = {
            'MAD': 1.0,
            'EUR': 0.091,  // 1 MAD = 0.091 EUR
            'USD': 0.10,   // 1 MAD = 0.10 USD
            'GBP': 0.078   // 1 MAD = 0.078 GBP
        };

        const currencySymbols = {
            'MAD': 'DH',
            'EUR': '€',
            'USD': '$',
            'GBP': '£'
        };

        let liveRates = { ...staticRates };

        // Fetch live exchange rates from a free API
        async function fetchExchangeRates() {
            try {
                // Using open exchange rate api relative to MAD
                const response = await fetch('https://open.er-api.com/v6/latest/MAD');
                if (response.ok) {
                    const data = await response.json();
                    if (data && data.rates) {
                        liveRates['EUR'] = data.rates['EUR'] || staticRates['EUR'];
                        liveRates['USD'] = data.rates['USD'] || staticRates['USD'];
                        liveRates['GBP'] = data.rates['GBP'] || staticRates['GBP'];
                        
                        // Re-apply current selection with fresh rates
                        const current = localStorage.getItem('selected_currency') || 'EUR';
                        window.applyCurrency(current);
                    }
                }
            } catch(e) {
                console.log("Could not load live rates, using fallback: ", e);
            }
        }

        window.applyCurrency = function(currency) {
            const elements = document.querySelectorAll('.price-val');
            elements.forEach(el => {
                const baseMad = parseFloat(el.getAttribute('data-base-mad'));
                if (!isNaN(baseMad)) {
                    const rate = liveRates[currency] || staticRates[currency] || 1.0;
                    el.innerText = Math.round(baseMad * rate);
                }
            });

            const labels = document.querySelectorAll('.currency-label');
            labels.forEach(el => {
                el.innerText = currencySymbols[currency] || 'DH';
            });
        };

        // Fetch live rates on load
        fetchExchangeRates();

        // Initialize currency selector
        const curSelect = document.getElementById('currency-select');
        if (curSelect) {
            const savedCurrency = localStorage.getItem('selected_currency') || 'EUR';
            curSelect.value = savedCurrency;
            window.applyCurrency(savedCurrency);

            curSelect.addEventListener('change', function() {
                const selected = this.value;
                localStorage.setItem('selected_currency', selected);
                window.applyCurrency(selected);
            });
        }

        // Initialize Theme Toggle (Dark/Light mode)
        const themeToggleBtn = document.getElementById('theme-toggle-btn');
        if (themeToggleBtn) {
            const currentTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', currentTheme);

            themeToggleBtn.addEventListener('click', function() {
                let theme = document.documentElement.getAttribute('data-theme');
                let newTheme = theme === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });
        }

        // Auto-launch WhatsApp redirect if present in session
        @if(session('whatsapp_redirect_url'))
            setTimeout(function() {
                window.open("{{ session('whatsapp_redirect_url') }}", '_blank');
            }, 1000);
        @endif

        // Save fresh bookings done in this session to device history
        @if(session('last_booking_reference'))
            saveToBookingHistory("{{ session('last_booking_reference') }}", "{{ session('last_booking_car_name', 'Car Rental') }}");
        @endif
    </script>

    <!-- ===== GDPR Cookie Consent Banner ===== -->
    <div id="cookieConsentBanner" style="
        display: none;
        position: fixed;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 3rem);
        max-width: 780px;
        background: var(--bg-white);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        padding: 1.25rem 1.5rem;
        z-index: 99999;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        animation: cookieSlideUp 0.4s cubic-bezier(0.16,1,0.3,1) both;
    " role="dialog" aria-label="Cookie consent" aria-live="polite">
        <!-- Cookie icon -->
        <span style="font-size: 2rem; flex-shrink: 0;">🍪</span>

        <!-- Text -->
        <div style="flex: 1; min-width: 200px;">
            <p style="margin: 0 0 0.2rem 0; font-size: 0.92rem; font-weight: 700; color: var(--text-dark);">We use cookies</p>
            <p style="margin: 0; font-size: 0.82rem; color: var(--text-muted); line-height: 1.5;">
                We use essential cookies to make our site work, and optional analytics cookies to understand how you use it.
                <a href="{{ route('privacy', ['locale' => app()->getLocale()]) }}" style="color: var(--accent-gold); font-weight: 600; text-decoration: underline; white-space: nowrap;">Privacy Policy ↗</a>
            </p>
        </div>

        <!-- Buttons -->
        <div style="display: flex; gap: 0.6rem; flex-shrink: 0; flex-wrap: wrap;">
            <button id="cookieDeclineBtn" onclick="handleCookieConsent('declined')" style="
                padding: 0.55rem 1.1rem;
                border: 1.5px solid var(--border-color);
                border-radius: 8px;
                background: transparent;
                color: var(--text-muted);
                font-size: 0.82rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s;
                font-family: var(--font-body);
                white-space: nowrap;
            " onmouseover="this.style.borderColor='var(--accent-gold)';this.style.color='var(--text-dark)'" onmouseout="this.style.borderColor='var(--border-color)';this.style.color='var(--text-muted)'">
                Decline
            </button>
            <button id="cookieAcceptBtn" onclick="handleCookieConsent('accepted')" style="
                padding: 0.55rem 1.4rem;
                border: none;
                border-radius: 8px;
                background: var(--accent-gold);
                color: white;
                font-size: 0.82rem;
                font-weight: 700;
                cursor: pointer;
                transition: background 0.2s;
                font-family: var(--font-body);
                white-space: nowrap;
                box-shadow: 0 2px 8px rgba(197,160,89,0.35);
            " onmouseover="this.style.background='var(--accent-gold-hover)'" onmouseout="this.style.background='var(--accent-gold)'">
                Accept All ✓
            </button>
        </div>
    </div>

    <style>
    @keyframes cookieSlideUp {
        from { opacity: 0; transform: translateX(-50%) translateY(24px); }
        to   { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    @media (max-width: 600px) {
        #cookieConsentBanner {
            bottom: 0 !important;
            left: 0 !important;
            transform: none !important;
            width: 100% !important;
            max-width: 100% !important;
            border-radius: 16px 16px 0 0 !important;
            animation: cookieSlideUpMobile 0.4s cubic-bezier(0.16,1,0.3,1) both !important;
        }
        @keyframes cookieSlideUpMobile {
            from { opacity: 0; transform: translateY(100%); }
            to   { opacity: 1; transform: translateY(0); }
        }
    }
    </style>

    <script>
    (function() {
        var consent = localStorage.getItem('cookie_consent');
        if (!consent) {
            var banner = document.getElementById('cookieConsentBanner');
            if (banner) {
                banner.style.display = 'flex';
            }
        }
    })();

    function handleCookieConsent(choice) {
        localStorage.setItem('cookie_consent', choice);
        var banner = document.getElementById('cookieConsentBanner');
        if (banner) {
            banner.style.transition = 'opacity 0.3s, transform 0.3s';
            banner.style.opacity = '0';
            banner.style.transform = 'translateX(-50%) translateY(20px)';
            setTimeout(function() { banner.style.display = 'none'; }, 320);
        }
    }
    </script>

</body>
</html>
