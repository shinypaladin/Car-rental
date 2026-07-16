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
    
    <!-- Custom Style Sheet (No plugins, maximum performance) -->
    <link rel="stylesheet" href="/css/style.css">
    
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
                <a href="{{ route('home', ['locale' => $locale]) }}">
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
    <div class="floating-whatsapp" data-phone="{{ config('app.whatsapp_phone', '+212606520816') }}" title="Chat on WhatsApp">
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
                        {{ config('app.whatsapp_phone', '+212606520816') }}
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
