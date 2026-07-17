<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic SEO Titles and Descriptions -->
    <title>@yield('title', 'Car Airport Morocco - Rent a Car at Marrakech Airport')</title>
    <meta name="description" content="@yield('meta_description', 'Rent a car at Marrakech Airport from 350 DH per day. Free airport delivery, full insurance, unlimited mileage, and direct WhatsApp booking.')">
    
    <!-- Dynamic hreflang Alternate Tags -->
    {!! \App\Helpers\SeoHelper::getAlternateLinks() !!}
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Inline CSS — proxy-safe, zero dependency on asset serving -->
    <style>
:root{--primary-blue:#0f1d36;--primary-blue-light:#1b2f52;--accent-gold:#c5a059;--accent-gold-hover:#b08c48;--text-dark:#222222;--text-muted:#666666;--text-white:#ffffff;--bg-light:#f8fafc;--bg-white:#ffffff;--border-color:#e2e8f0;--shadow-sm:0 2px 4px rgba(0,0,0,0.05);--shadow-md:0 4px 12px rgba(0,0,0,0.08);--shadow-lg:0 10px 25px rgba(15,29,54,0.1);--font-heading:'Outfit',sans-serif;--font-body:'Inter',sans-serif}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:var(--font-body);background-color:var(--bg-light);color:var(--text-dark);line-height:1.6;overflow-x:hidden}
header{background-color:rgba(15,29,54,0.95);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,255,255,0.1);position:sticky;top:0;z-index:1000}
.header-container{max-width:1200px;margin:0 auto;padding:1rem 1.5rem;display:flex;justify-content:space-between;align-items:center}
.logo img{height:45px;object-fit:contain}
nav ul{display:flex;list-style:none;gap:2rem}
nav a{color:var(--text-white);text-decoration:none;font-weight:500;font-size:0.95rem;transition:color 0.3s}
nav a:hover{color:var(--accent-gold)}
.header-actions{display:flex;align-items:center;gap:1.5rem}
.lang-selector{color:var(--text-white);background:transparent;border:1px solid rgba(255,255,255,0.2);padding:0.4rem 0.8rem;border-radius:6px;cursor:pointer;font-size:0.85rem}
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
.section-header h2{font-family:var(--font-heading);font-size:2.2rem;font-weight:700;color:var(--primary-blue)}
.view-all-link{color:var(--primary-blue);text-decoration:none;font-weight:600;font-size:0.95rem;display:flex;align-items:center;gap:0.5rem;transition:color 0.3s}
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
.car-title-row h3{font-family:var(--font-heading);font-size:1.25rem;font-weight:700;color:var(--primary-blue)}
.car-subtitle{font-size:0.8rem;color:var(--text-muted);margin-bottom:1rem}
.car-specs{display:flex;gap:1rem;font-size:0.8rem;color:var(--text-muted);margin-bottom:1.5rem;flex-wrap:wrap}
.spec-item{display:flex;align-items:center;gap:0.25rem}
.car-price-row{display:flex;justify-content:space-between;align-items:center;margin-top:auto;border-top:1px solid var(--border-color);padding-top:1rem;gap:1rem}
.price-box{display:flex;flex-direction:column}
.price-amount{font-size:1.4rem;font-weight:800;color:var(--primary-blue);line-height:1}
.price-amount span{font-size:0.8rem;color:var(--text-muted);font-weight:400}
.action-buttons{display:flex;flex-direction:column;gap:0.5rem;width:100%}
.book-btn{background-color:var(--primary-blue);color:var(--text-white);text-align:center;padding:0.6rem 1rem;border-radius:6px;text-decoration:none;font-size:0.85rem;font-weight:700;transition:background-color 0.3s}
.book-btn:hover{background-color:var(--primary-blue-light)}
.whatsapp-btn{background-color:#25d366;color:var(--text-white);text-align:center;padding:0.6rem 1rem;border-radius:6px;text-decoration:none;font-size:0.85rem;font-weight:700;transition:background-color 0.3s;display:flex;justify-content:center;align-items:center;gap:0.5rem}
.whatsapp-btn:hover{background-color:#20ba5a}
.why-choose{background-color:var(--bg-white);padding:5rem 0;border-top:1px solid var(--border-color);border-bottom:1px solid var(--border-color)}
.why-choose-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2.5rem}
.why-card{text-align:center;padding:1rem}
.why-icon{width:60px;height:60px;border-radius:50%;background-color:#faf7f2;border:1px solid rgba(197,160,89,0.2);display:flex;justify-content:center;align-items:center;margin:0 auto 1.5rem;font-size:1.5rem}
.why-card h3{font-family:var(--font-heading);font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:var(--primary-blue)}
.why-card p{font-size:0.9rem;color:var(--text-muted)}
.promo-testimonials{display:grid;grid-template-columns:1fr 1fr;gap:2.5rem;margin:5rem auto;max-width:1200px;padding:0 1.5rem}
.promo-banner{position:relative;background:linear-gradient(rgba(15,29,54,0.4),rgba(15,29,54,0.85));background-color:var(--primary-blue);border-radius:16px;padding:4rem 3rem;color:var(--text-white);display:flex;flex-direction:column;justify-content:flex-end;min-height:380px}
.promo-banner h2{font-family:var(--font-heading);font-size:2rem;margin-bottom:0.5rem}
.promo-banner p{font-size:0.95rem;margin-bottom:1.5rem;opacity:0.9}
.promo-link{background-color:var(--bg-white);color:var(--primary-blue);padding:0.8rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:700;align-self:flex-start;transition:all 0.3s}
.promo-link:hover{background-color:var(--accent-gold);color:var(--text-white)}
.testimonials{background-color:var(--bg-white);border:1px solid var(--border-color);border-radius:16px;padding:3rem;box-shadow:var(--shadow-sm);display:flex;flex-direction:column;justify-content:space-between}
.testimonials-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem}
.testimonials-header h2{font-family:var(--font-heading);font-size:1.6rem;color:var(--primary-blue)}
.rating-summary{text-align:right}
.rating-number{font-size:2.2rem;font-weight:800;color:var(--primary-blue);line-height:1}
.stars{color:#ffc107;margin:0.25rem 0}
.rating-platforms{display:flex;gap:1rem;font-size:0.75rem;color:var(--text-muted)}
.review-slider{position:relative;border-top:1px solid var(--border-color);padding-top:1.5rem}
.review-text{font-style:italic;color:var(--text-muted);font-size:0.95rem;margin-bottom:1.5rem}
.reviewer-meta{display:flex;align-items:center;gap:1rem}
.reviewer-avatar{width:40px;height:40px;border-radius:50%;background-color:#faf7f2;border:1px solid var(--accent-gold);display:flex;justify-content:center;align-items:center;font-weight:700;color:var(--accent-gold)}
.reviewer-info h4{font-size:0.9rem;font-weight:700;color:var(--primary-blue)}
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
@media(max-width:991px){.search-grid{grid-template-columns:1fr 1fr}.footer-grid{grid-template-columns:1fr 1fr}.promo-testimonials{grid-template-columns:1fr}.hero h1{font-size:2.2rem}}
@media(max-width:767px){.header-container{flex-direction:column;gap:1rem}nav ul{flex-wrap:wrap;justify-content:center;gap:1rem}.search-grid{grid-template-columns:1fr}.hero{padding:3rem 1.5rem 8rem}}
@keyframes pulse{0%{box-shadow:0 0 0 0 rgba(37,211,102,0.5)}70%{box-shadow:0 0 0 15px rgba(37,211,102,0)}100%{box-shadow:0 0 0 0 rgba(37,211,102,0)}}
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
                    <li><a href="#cars">{{ __('messages.featured_cars') }}</a></li>
                    <li><a href="#why-choose">{{ __('messages.why_choose_title') }}</a></li>
                    <li><a href="#testimonials">{{ __('messages.customer_says') }}</a></li>
                </ul>
            </nav>
            
            <div class="header-actions">
                <!-- Lang Selector -->
                <select class="lang-selector" id="lang-select">
                    <option value="en" {{ $locale === 'en' ? 'selected' : '' }}>🇬🇧 English</option>
                    <option value="fr" {{ $locale === 'fr' ? 'selected' : '' }}>🇫🇷 Français</option>
                </select>
                
                <a href="#search" class="booking-btn">My Booking</a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
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
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Information</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4>Popular Locations</h4>
                <ul>
                    <li><a href="#">Marrakech Airport</a></li>
                    <li><a href="#">Casablanca Airport</a></li>
                    <li><a href="#">Agadir Airport</a></li>
                    <li><a href="#">Tanger Airport</a></li>
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
                        Marrakech Airport (RAK), Morocco
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Car Airport Morocco. All rights reserved.</p>
        </div>
    </footer>

    <!-- App Script -->
    <script src="/js/app.js"></script>
</body>
</html>
