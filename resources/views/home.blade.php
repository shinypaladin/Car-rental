@extends('layouts.app')

@section('title')
{{ __('messages.hero_title') }} | Car Airport Morocco
@endsection

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-badge">Marrakech Airport Car Rental</div>
    <h1>{{ __('messages.hero_title') }}</h1>
    <p>{{ __('messages.hero_subtitle') }}</p>
    
    <div class="hero-features">
        <div class="hero-feature-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.736 14c.044-.146.07-.301.07-.465V5.465c0-.164-.026-.319-.07-.465h.334c.044.146.07.301.07.465v8.07c0 .164-.026.319-.07.465h-.334zM11.5 13.5V5a.5.5 0 0 0-.5-.5H5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V7H3.5a.5.5 0 0 0 0 1H7v3.5a.5.5 0 0 0 1 0V8h3.5a.5.5 0 0 0 0-1H8V3.5z"/>
            </svg>
            {{ __('messages.no_hidden_fees') }}
        </div>
        <div class="hero-feature-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.736 14c.044-.146.07-.301.07-.465V5.465c0-.164-.026-.319-.07-.465h.334c.044.146.07.301.07.465v8.07c0 .164-.026.319-.07.465h-.334zM11.5 13.5V5a.5.5 0 0 0-.5-.5H5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V7H3.5a.5.5 0 0 0 0 1H7v3.5a.5.5 0 0 0 1 0V8h3.5a.5.5 0 0 0 0-1H8V3.5z"/>
            </svg>
            {{ __('messages.unlimited_mileage') }}
        </div>
        <div class="hero-feature-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.736 14c.044-.146.07-.301.07-.465V5.465c0-.164-.026-.319-.07-.465h.334c.044.146.07.301.07.465v8.07c0 .164-.026.319-.07.465h-.334zM11.5 13.5V5a.5.5 0 0 0-.5-.5H5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5z"/>
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V7H3.5a.5.5 0 0 0 0 1H7v3.5a.5.5 0 0 0 1 0V8h3.5a.5.5 0 0 0 0-1H8V3.5z"/>
            </svg>
            {{ __('messages.support_24_7') }}
        </div>
    </div>
</section>

<!-- Search Widget -->
<div class="search-widget-container" id="search">
    <form class="search-widget" method="GET" action="/{{ $locale }}#cars">
        <div class="search-grid">
            <div class="form-group">
                <label for="pickup_location">{{ __('messages.pickup_location') }}</label>
                <div class="input-wrapper">
                    <select name="pickup_location" id="pickup_location">
                        <option value="Marrakech Airport (RAK)" {{ $searchParams['pickup_location'] == 'Marrakech Airport (RAK)' ? 'selected' : '' }}>Marrakech Airport (RAK)</option>
                        <option value="Casablanca Airport (CMN)" {{ $searchParams['pickup_location'] == 'Casablanca Airport (CMN)' ? 'selected' : '' }}>Casablanca Airport (CMN)</option>
                        <option value="Agadir Airport (AGA)" {{ $searchParams['pickup_location'] == 'Agadir Airport (AGA)' ? 'selected' : '' }}>Agadir Airport (AGA)</option>
                        <option value="Tanger Airport (TNG)" {{ $searchParams['pickup_location'] == 'Tanger Airport (TNG)' ? 'selected' : '' }}>Tanger Airport (TNG)</option>
                    </select>
                </div>
                <div style="margin-top: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" id="different_return" style="width: auto; cursor: pointer; margin: 0;" onchange="toggleReturnLocation(this)">
                    <label for="different_return" style="font-size: 0.75rem; font-weight: 600; color: var(--text-muted); cursor: pointer; display: inline; margin: 0;">Return to different location</label>
                </div>
            </div>

            <div class="form-group" id="return_location_container" style="display: none;">
                <label for="return_location">Return Location</label>
                <div class="input-wrapper">
                    <select name="return_location" id="return_location">
                        <option value="Marrakech Airport (RAK)">Marrakech Airport (RAK)</option>
                        <option value="Casablanca Airport (CMN)">Casablanca Airport (CMN)</option>
                        <option value="Agadir Airport (AGA)">Agadir Airport (AGA)</option>
                        <option value="Tanger Airport (TNG)">Tanger Airport (TNG)</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pickup_date">{{ __('messages.pickup_date') }}</label>
                <div class="input-wrapper" style="display: flex; gap: 0.5rem;">
                    <input type="date" name="pickup_date" id="pickup_date" value="{{ $searchParams['pickup_date'] }}" style="flex: 2;">
                    <input type="time" name="pickup_time" id="pickup_time" value="{{ $searchParams['pickup_time'] }}" style="flex: 1; min-width: 80px;">
                </div>
            </div>
            
            <div class="form-group">
                <label for="return_date">{{ __('messages.return_date') }}</label>
                <div class="input-wrapper" style="display: flex; gap: 0.5rem;">
                    <input type="date" name="return_date" id="return_date" value="{{ $searchParams['return_date'] }}" style="flex: 2;">
                    <input type="time" name="return_time" id="return_time" value="{{ $searchParams['return_time'] }}" style="flex: 1; min-width: 80px;">
                </div>
            </div>
            
            <div class="form-group">
                <label for="driver_age">{{ __('messages.driver_age') }}</label>
                <div class="input-wrapper">
                    <select name="driver_age" id="driver_age">
                        <option value="25+" {{ $searchParams['driver_age'] == '25+' ? 'selected' : '' }}>25+</option>
                        <option value="21-24" {{ $searchParams['driver_age'] == '21-24' ? 'selected' : '' }}>21-24</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 1.5rem; display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <div style="flex-grow: 1;">
                <button type="submit" class="search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    {{ __('messages.search_cars') }}
                </button>
            </div>
        </div>

        <div class="search-widget-footer">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" style="color: #28a745;">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                {{ __('messages.free_cancellation') }}
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" style="color: #c5a059;">
                    <path d="M4 15h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1zM2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2z"/>
                </svg>
                {{ __('messages.best_price_guarantee') }}
            </div>
        </div>
    </form>
</div>

<!-- Featured Cars Grid -->
<section class="section-container" id="cars">
    <div class="section-header">
        <h2>{{ __('messages.featured_cars') }}</h2>
        <a href="#cars" class="view-all-link">
            {{ __('messages.view_all') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </a>
    </div>


    <!-- Filters Toolbar -->
    <div class="filter-toolbar">
        <span style="font-weight: 700; color: #334155; font-size: 0.82rem; letter-spacing: 0.02em; text-transform: uppercase;">Class:</span>
        <div class="filter-group">
            <button class="filter-btn active" data-filter-type="category" data-filter-val="all" onclick="setFilter(this)">All Classes</button>
            <button class="filter-btn" data-filter-type="category" data-filter-val="Economy" onclick="setFilter(this)">Economy</button>
            <button class="filter-btn" data-filter-type="category" data-filter-val="SUV" onclick="setFilter(this)">SUV</button>
            <button class="filter-btn" data-filter-type="category" data-filter-val="Van" onclick="setFilter(this)">Van</button>
            <button class="filter-btn" data-filter-type="category" data-filter-val="Luxury" onclick="setFilter(this)">Luxury</button>
        </div>

        <div class="filter-divider"></div>

        <span style="font-weight: 700; color: #334155; font-size: 0.82rem; letter-spacing: 0.02em; text-transform: uppercase;">Transmission:</span>
        <div class="filter-group">
            <button class="filter-btn active" data-filter-type="trans" data-filter-val="all" onclick="setFilter(this)">All</button>
            <button class="filter-btn" data-filter-type="trans" data-filter-val="Manual" onclick="setFilter(this)">Manual</button>
            <button class="filter-btn" data-filter-type="trans" data-filter-val="Automatic" onclick="setFilter(this)">Automatic</button>
        </div>
    </div>
    
    <div class="cars-grid">
        @foreach($cars as $car)
        <div class="car-card" data-category="{{ $car->category }}" data-trans="{{ $car->transmission }}" style="transition: opacity 0.3s ease, transform 0.3s ease;">
            <div class="car-image-container">
                @if($car->brand === 'Volkswagen')
                <div class="car-badge">Top Choice</div>
                @endif
                <button class="wishlist-btn" title="Add to favorites">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="color: #666;">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                </button>
                
                <!-- Static car photo -->
                <img src="{{ $car->image_path }}" alt="{{ $car->brand }} {{ $car->model }}" onerror="this.src='https://placehold.co/400x250/0f1d36/c5a059?text={{ $car->brand }}+{{ $car->model }}'">
                
                <!-- Hover Loop Muted Video / GIF preview -->
                @if($car->video_path)
                <video muted loop playsinline src="{{ $car->video_path }}"></video>
                @endif
            </div>
            
            <div class="car-details">
                <div class="car-title-row">
                    <h3>{{ $car->brand }} {{ $car->model }}</h3>
                </div>
                <div class="car-subtitle">{{ __('messages.or_similar') }}</div>
                
                <div class="car-specs">
                    <div class="spec-item">
                        👥 {{ $car->seats }} {{ __('messages.seats') }}
                    </div>
                    <div class="spec-item">
                        ⚙️ {{ $car->transmission == 'Manual' ? __('messages.manual') : __('messages.automatic') }}
                    </div>
                    <div class="spec-item">
                        ❄️ {{ __('messages.ac') }}
                    </div>
                    <div class="spec-item">
                        🚪 5 Doors
                    </div>
                    <div class="spec-item">
                        🧳 {{ $car->category === 'SUV' ? '4' : ($car->category === 'Van' ? '5' : ($car->category === 'Luxury' ? '3' : '2')) }} Bags
                    </div>
                </div>
                
                <div class="car-price-row">
                    <div class="price-box">
                        <div class="price-amount"><span class="price-val" data-base-mad="{{ $car->display_price }}">{{ round($car->display_price) }}</span> <span class="currency-label">DH</span> <span>/ {{ __('messages.day') }}</span></div>
                        @if(isset($car->total_price) && $car->days > 1)
                        <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Total: <span class="price-val" data-base-mad="{{ $car->total_price }}">{{ round($car->total_price) }}</span> <span class="currency-label">DH</span> ({{ $car->days }} days)</div>
                        @endif
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="book-btn" onclick="openBookingModal('{{ $car->id }}', '{{ $car->brand }} {{ $car->model }}', '{{ $car->display_price }}')">
                            {{ __('messages.book_now') }}
                        </a>
                        <!-- WHATSAPP CTA - Formats prefilled request automatically -->
                        <a href="#" class="whatsapp-btn" data-car="{{ $car->brand }} {{ $car->model }}" data-price="{{ $car->display_price }}" data-phone="{{ config('app.whatsapp_phone', '+212600988632') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.977h.004c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.33-5.615zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.69-4.98c-.202-.101-1.194-.588-1.378-.653-.185-.066-.32-.099-.455.101-.134.2-.522.653-.64.789-.118.135-.235.15-.437.05-.202-.101-.85-.313-1.619-.998-.598-.534-1.002-1.195-1.12-1.395-.118-.2-.012-.307.088-.407.09-.09.202-.234.302-.35.1-.117.135-.198.202-.33.067-.133.034-.25-.017-.35-.05-.1-.455-1.096-.622-1.498-.163-.393-.328-.34-.456-.34-.117-.006-.252-.008-.387-.008-.135 0-.355.05-.54.254-.185.2-.705.688-.705 1.68 0 1 .725 1.966.827 2.1 0 .135 1.425 2.18 3.453 3.06.48.21.854.336 1.146.429.482.153.92.13 1.27.077.39-.058 1.194-.488 1.362-.958.168-.47.168-.872.118-.957-.05-.084-.186-.135-.388-.236z"/>
                            </svg>
                            {{ __('messages.book_whatsapp') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose" id="why-choose">
    <div class="section-container">
        <h2 style="text-align: center; font-family: var(--font-heading); font-size: 2.2rem; color: var(--primary-blue); margin-bottom: 3rem;">
            {{ __('messages.why_choose_title') }}
        </h2>
        
        <div class="why-choose-grid">
            <div class="why-card">
                <div class="why-icon">🚚</div>
                <h3>{{ __('messages.reason_1_title') }}</h3>
                <p>{{ __('messages.reason_1_desc') }}</p>
            </div>
            
            <div class="why-card">
                <div class="why-icon">🛡️</div>
                <h3>{{ __('messages.reason_2_title') }}</h3>
                <p>{{ __('messages.reason_2_desc') }}</p>
            </div>
            
            <div class="why-card">
                <div class="why-icon">🔄</div>
                <h3>{{ __('messages.reason_3_title') }}</h3>
                <p>{{ __('messages.reason_3_desc') }}</p>
            </div>
            
            <div class="why-card">
                <div class="why-icon">📞</div>
                <h3>{{ __('messages.reason_4_title') }}</h3>
                <p>{{ __('messages.reason_4_desc') }}</p>
            </div>
            
            <div class="why-card">
                <div class="why-icon">💳</div>
                <h3>{{ __('messages.reason_5_title') }}</h3>
                <p>{{ __('messages.reason_5_desc') }}</p>
            </div>
            
            <div class="why-card">
                <div class="why-icon">🏷️</div>
                <h3>{{ __('messages.reason_6_title') }}</h3>
                <p>{{ __('messages.reason_6_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Exploration & Testimonials -->
<section class="promo-testimonials" id="testimonials">
    <div class="promo-banner">
        <h2>{{ __('messages.explore_title') }}</h2>
        <p>{{ __('messages.explore_desc') }}</p>
        <a href="#search" class="promo-link">{{ __('messages.discover_more') }}</a>
    </div>
    
    <div class="testimonials">
        <div class="testimonials-header">
            <div>
                <h2>{{ __('messages.customer_says') }}</h2>
                <div class="rating-platforms">
                    <a href="{{ $reviews['url'] }}" target="_blank" rel="noopener" style="color: inherit; text-decoration: underline; font-weight: 600;">
                        Google ({{ $reviews['rating'] }}/5 · {{ $reviews['count'] }} reviews)
                    </a>
                </div>
            </div>
            <a href="{{ $reviews['url'] }}" target="_blank" rel="noopener" style="text-decoration: none; color: inherit; text-align: right;" class="rating-summary">
                <div class="rating-number">{{ $reviews['rating'] }}</div>
                <div class="stars">★★★★★</div>
                <div style="font-size: 0.72rem; color: var(--text-muted); text-decoration: underline;">{{ __('messages.based_on') }}</div>
            </a>
        </div>

        <div class="review-slider" style="position:relative;">
            @foreach($reviews['reviews'] as $idx => $review)
            <div class="review-slide" style="{{ $idx > 0 ? 'display:none;' : '' }}">
                <div style="display:flex; gap:0.25rem; margin-bottom:0.6rem;">
                    @for($s = 1; $s <= 5; $s++)
                        <span style="color:{{ $s <= ($review['rating'] ?? 5) ? '#ffc107' : '#e2e8f0' }}; font-size:1rem;">★</span>
                    @endfor
                </div>
                <p class="review-text">"{{ $review['text'] }}"</p>
                <div class="reviewer-meta">
                    <div class="reviewer-avatar">{{ $review['avatar_initial'] }}</div>
                    <div class="reviewer-info">
                        <h4>{{ $review['author'] }}</h4>
                        <span>{{ $review['time'] }} · Google</span>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($reviews['reviews']) > 1)
            <div style="display:flex; gap:0.5rem; margin-top:1.25rem; align-items:center;">
                <button onclick="prevReview()" style="background:none;border:1px solid #e2e8f0;border-radius:50%;width:32px;height:32px;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;color:#475569;">‹</button>
                @foreach($reviews['reviews'] as $di => $__)
                <span class="review-dot" data-idx="{{ $di }}" onclick="goReview({{ $di }})" style="width:8px;height:8px;border-radius:50%;background:{{ $di === 0 ? 'var(--primary-blue)' : '#cbd5e1' }};cursor:pointer;transition:background 0.2s;"></span>
                @endforeach
                <button onclick="nextReview()" style="background:none;border:1px solid #e2e8f0;border-radius:50%;width:32px;height:32px;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;color:#475569;">›</button>
            </div>
            @endif
        </div>
    </div>
</section>

<script>
(function(){
    var slides = document.querySelectorAll('.review-slide');
    var dots   = document.querySelectorAll('.review-dot');
    var cur = 0;
    function showSlide(n) {
        slides[cur].style.display = 'none';
        if(dots[cur]) dots[cur].style.background = '#cbd5e1';
        cur = (n + slides.length) % slides.length;
        slides[cur].style.display = 'block';
        if(dots[cur]) dots[cur].style.background = 'var(--primary-blue)';
    }
    window.nextReview = function(){ showSlide(cur + 1); };
    window.prevReview = function(){ showSlide(cur - 1); };
    window.goReview  = function(n){ showSlide(n); };
    // Auto-advance every 6 seconds
    if(slides.length > 1) setInterval(function(){ showSlide(cur + 1); }, 6000);
})();
</script>


<!-- FAQs Section (Booking.com style) -->
<section class="section-container" id="faqs" style="margin-top: 5rem; margin-bottom: 5rem;">
    <div class="section-header" style="text-align: center; display: block;">
        <h2 style="font-family: var(--font-heading); font-size: 2rem; color: #fff; margin-bottom: 0.5rem;">Frequently Asked Questions</h2>
        <p style="color: var(--text-muted); font-size: 0.95rem;">Have questions about renting a car with us? Here are some quick answers.</p>
    </div>
    
    <div style="max-width: 800px; margin: 3rem auto 0 auto; display: flex; flex-direction: column; gap: 1rem;">
        <div class="faq-item" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; overflow: hidden; transition: all 0.3s ease;">
            <button class="faq-trigger" onclick="toggleFaq(this)" style="width: 100%; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; background: none; border: none; text-align: left; color: #fff; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <span>What is required to rent a car in Morocco?</span>
                <span class="faq-icon" style="transition: transform 0.3s ease;">▼</span>
            </button>
            <div class="faq-content" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding: 0 1.5rem;">
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.25rem;">You need a valid passport, a national or international driver's license (held for at least 1 year), and you must be at least 21 years old. A credit card is generally not required for security deposit with our deposit-free options.</p>
            </div>
        </div>

        <div class="faq-item" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; overflow: hidden; transition: all 0.3s ease;">
            <button class="faq-trigger" onclick="toggleFaq(this)" style="width: 100%; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; background: none; border: none; text-align: left; color: #fff; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <span>Is insurance included?</span>
                <span class="faq-icon" style="transition: transform 0.3s ease;">▼</span>
            </button>
            <div class="faq-content" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding: 0 1.5rem;">
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.25rem;">Yes, basic third-party liability insurance is included in our daily rate. You can upgrade to Full Collision Damage Waiver (CDW) protection during booking for absolute peace of mind.</p>
            </div>
        </div>

        <div class="faq-item" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; overflow: hidden; transition: all 0.3s ease;">
            <button class="faq-trigger" onclick="toggleFaq(this)" style="width: 100%; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; background: none; border: none; text-align: left; color: #fff; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <span>What is the fuel policy?</span>
                <span class="faq-icon" style="transition: transform 0.3s ease;">▼</span>
            </button>
            <div class="faq-content" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding: 0 1.5rem;">
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.25rem;">Our standard policy is Full-to-Full. You will receive the vehicle with a full tank of fuel and should return it full. If the vehicle is returned with less than a full tank, refueling charges will apply.</p>
            </div>
        </div>

        <div class="faq-item" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; overflow: hidden; transition: all 0.3s ease;">
            <button class="faq-trigger" onclick="toggleFaq(this)" style="width: 100%; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; background: none; border: none; text-align: left; color: #fff; font-weight: 700; font-size: 1rem; cursor: pointer;">
                <span>Can I modify or cancel my reservation?</span>
                <span class="faq-icon" style="transition: transform 0.3s ease;">▼</span>
            </button>
            <div class="faq-content" style="max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding: 0 1.5rem;">
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.25rem;">Yes! You can cancel your reservation free of charge up to 48 hours before pickup. You can also modify details like pickup/return location or dates via the "My Booking" link in the header.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section-container" id="contact" style="margin-top: 5rem; margin-bottom: 5rem;">
    <div style="background: linear-gradient(135deg, #0f1d36 0%, #1e293b 100%); border: 1px solid rgba(197, 160, 89, 0.2); border-radius: 12px; padding: 3rem; max-width: 800px; margin: 0 auto; box-shadow: var(--shadow-lg);">
        <div class="section-header" style="text-align: center; display: block; margin-bottom: 2rem;">
            <h2 style="font-family: var(--font-heading); font-size: 2rem; color: #fff; margin-bottom: 0.5rem;">Contact Us</h2>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Have any questions or need custom arrangements? Drop us a message!</p>
        </div>

        @if(session('success'))
        <div style="background: rgba(40, 167, 69, 0.15); border: 1px solid #28a745; color: #28a745; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; font-weight: 600;">
            ✓ {{ session('success') }}
        </div>
        @endif

        <form action="/{{ $locale }}/contact" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <label style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 0.25rem;">Full Name</label>
                    <input type="text" name="name" required style="width: 100%; padding: 0.65rem; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff; border-radius: 6px; font-size: 0.88rem;">
                </div>
                <div>
                    <label style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 0.25rem;">Email Address</label>
                    <input type="email" name="email" required style="width: 100%; padding: 0.65rem; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff; border-radius: 6px; font-size: 0.88rem;">
                </div>
            </div>

            <div>
                <label style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 0.25rem;">Phone Number (WhatsApp preferred - Optional)</label>
                <input type="tel" name="phone" placeholder="+212..." style="width: 100%; padding: 0.65rem; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff; border-radius: 6px; font-size: 0.88rem;">
            </div>

            <div>
                <label style="font-size: 0.78rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 0.25rem;">Your Message</label>
                <textarea name="message" rows="5" required style="width: 100%; padding: 0.65rem; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff; border-radius: 6px; font-size: 0.88rem; resize: vertical;"></textarea>
            </div>

            <button type="submit" style="background: var(--accent-gold); color: white; border: none; padding: 0.85rem; width: 100%; border-radius: 6px; font-weight: 700; cursor: pointer; transition: background 0.2s; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">
                Send Message
            </button>
        </form>
    </div>
</section>

<!-- Simple Booking Overlay Modal (HTML only, controlled dynamically) -->
<div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000; justify-content: center; align-items: center; padding: 1.5rem;">
    <div style="background: white; padding: 2rem; border-radius: 12px; max-width: 500px; width: 100%; position: relative; box-shadow: var(--shadow-lg); color: #333;">

        <button onclick="closeBookingModal()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #666;">&times;</button>
        <h3 id="modalCarTitle" style="font-family: var(--font-heading); margin-bottom: 1rem; color: var(--primary-blue); font-size: 1.3rem;">Book Car</h3>
        
        <form id="bookingForm" method="POST" action="/{{ $locale }}/book">
            @csrf
            <input type="hidden" name="car_id" id="modalCarId">
            <input type="hidden" name="pickup_location_val">
            <input type="hidden" name="return_location_val">
            <input type="hidden" name="pickup_datetime_val">
            <input type="hidden" name="return_datetime_val">

            <!-- Accessories / Extras Section -->
            <div style="margin-bottom: 1.25rem; background: #f8fafc; padding: 0.85rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <h4 style="margin: 0 0 0.5rem 0; font-size: 0.85rem; font-weight: 700; color: #1e293b;">Optional Extras & Add-ons</h4>
                <div style="display: flex; flex-direction: column; gap: 0.4rem;" id="modalExtrasContainer">
                    @foreach($extras as $extra)
                    <label style="display: flex; justify-content: space-between; align-items: center; font-size: 0.78rem; font-weight: 600; cursor: pointer; color: #475569; margin: 0;">
                        <span>
                            @if($extra->slug == 'insurance') 🛡️ @elseif($extra->slug == 'gps') 🗺️ @elseif($extra->slug == 'child_seat') 👶 @else 👤 @endif
                            {{ $extra->name }} (+{{ round($extra->price) }} DH/{{ $extra->type == 'per_day' ? 'day' : 'flat' }})
                        </span>
                        <input type="checkbox" name="extras[]" value="{{ $extra->slug }}" id="extra_{{ $extra->slug }}" data-price="{{ $extra->price }}" data-type="{{ $extra->type }}" onchange="updateBookingModalPrice()" style="width: auto; cursor: pointer;">
                    </label>
                    @endforeach
                </div>
            </div>
            
            <div style="margin-bottom: 0.85rem;">
                <label style="font-size: 0.78rem; font-weight: 700; color: #475569; display: block; margin-bottom: 0.25rem;">Full Name</label>
                <input type="text" name="customer_name" required style="width: 100%; padding: 0.5rem 0.6rem; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.85rem;">
            </div>
            
            <div style="margin-bottom: 0.85rem;">
                <label style="font-size: 0.78rem; font-weight: 700; color: #475569; display: block; margin-bottom: 0.25rem;">Email Address</label>
                <input type="email" name="customer_email" required style="width: 100%; padding: 0.5rem 0.6rem; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.85rem;">
            </div>
            
            <div style="margin-bottom: 1.25rem;">
                <label style="font-size: 0.78rem; font-weight: 700; color: #475569; display: block; margin-bottom: 0.25rem;">Phone Number (WhatsApp preferred)</label>
                <input type="tel" name="customer_phone" placeholder="+212..." required style="width: 100%; padding: 0.5rem 0.6rem; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.85rem;">
            </div>

            <!-- Price Summary -->
            <div style="font-size: 0.95rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; text-align: right; border-top: 1px dashed #cbd5e1; padding-top: 0.75rem;" id="modalPriceSummary">
                Estimated Total: <span id="modalTotalPrice" class="price-val" data-base-mad="0" style="color: #c5a059; font-size: 1.15rem;">0</span> <span class="currency-label">DH</span>
            </div>
            
            <button type="submit" style="background: var(--primary-blue); color: white; border: none; padding: 0.8rem; width: 100%; border-radius: 6px; font-weight: 700; cursor: pointer; transition: background 0.2s;">
                Confirm Reservation Request
            </button>
        </form>
    </div>
</div>

<script>
let currentCarBasePrice = 0;
let currentRentalDays = 1;

function toggleReturnLocation(checkbox) {
    const container = document.getElementById('return_location_container');
    if (checkbox.checked) {
        container.style.display = 'block';
    } else {
        container.style.display = 'none';
    }
}

let activeFilters = {
    category: 'all',
    trans: 'all'
};

function setFilter(button) {
    const type = button.getAttribute('data-filter-type');
    const val = button.getAttribute('data-filter-val');
    
    // Set active state on button
    const siblings = button.parentNode.querySelectorAll('.filter-btn');
    siblings.forEach(sib => sib.classList.remove('active'));
    button.classList.add('active');
    
    activeFilters[type] = val;
    applyFilters();
}

function applyFilters() {
    const cards = document.querySelectorAll('.car-card');
    cards.forEach(card => {
        const category = card.getAttribute('data-category');
        const trans = card.getAttribute('data-trans');
        
        const catMatch = activeFilters.category === 'all' || category === activeFilters.category;
        const transMatch = activeFilters.trans === 'all' || trans === activeFilters.trans;
        
        if (catMatch && transMatch) {
            card.style.display = 'block';
            setTimeout(() => card.style.opacity = '1', 50);
        } else {
            card.style.opacity = '0';
            setTimeout(() => card.style.display = 'none', 300);
        }
    });
}

function toggleFaq(trigger) {
    const faqItem = trigger.parentNode;
    const content = faqItem.querySelector('.faq-content');
    const icon = faqItem.querySelector('.faq-icon');
    
    // Close all other FAQs
    document.querySelectorAll('.faq-item').forEach(item => {
        if (item !== faqItem) {
            item.querySelector('.faq-content').style.maxHeight = '0';
            item.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
        }
    });
    
    if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    } else {
        content.style.maxHeight = '0';
        icon.style.transform = 'rotate(0deg)';
    }
}

function openBookingModal(carId, carName, price) {
    document.getElementById('modalCarId').value = carId;
    document.getElementById('modalCarTitle').innerText = 'Book ' + carName;
    currentCarBasePrice = parseFloat(price);
    
    // Copy search params to form
    const pickupLoc = document.getElementById('pickup_location').value;
    const pickupDate = document.getElementById('pickup_date').value;
    const pickupTime = document.getElementById('pickup_time').value;
    const returnDate = document.getElementById('return_date').value;
    const returnTime = document.getElementById('return_time').value;
    
    document.querySelector('input[name="pickup_location_val"]').value = pickupLoc;
    
    const diffReturn = document.getElementById('different_return') && document.getElementById('different_return').checked;
    const returnLoc = diffReturn ? document.getElementById('return_location').value : pickupLoc;
    document.querySelector('input[name="return_location_val"]').value = returnLoc;
    
    document.querySelector('input[name="pickup_datetime_val"]').value = pickupDate + ' ' + pickupTime;
    document.querySelector('input[name="return_datetime_val"]').value = returnDate + ' ' + returnTime;
    
    // Calculate days
    try {
        const pickupDt = new Date(pickupDate + 'T' + pickupTime);
        const returnDt = new Date(returnDate + 'T' + returnTime);
        const diffTime = Math.abs(returnDt - pickupDt);
        currentRentalDays = Math.max(1, Math.ceil(diffTime / (1000 * 60 * 60 * 24)));
    } catch(e) {
        currentRentalDays = 1;
    }
    
    // Reset checkboxes
    document.querySelectorAll('#bookingForm input[type="checkbox"]').forEach(cb => cb.checked = false);
    
    updateBookingModalPrice();
    
    document.getElementById('bookingModal').style.display = 'flex';
}

function updateBookingModalPrice() {
    let extrasCost = 0;
    document.querySelectorAll('#modalExtrasContainer input[type="checkbox"]').forEach(cb => {
        if (cb.checked) {
            const price = parseFloat(cb.getAttribute('data-price'));
            const type = cb.getAttribute('data-type');
            if (type === 'per_day') {
                extrasCost += price * currentRentalDays;
            } else {
                extrasCost += price;
            }
        }
    });
    
    const vehicleCost = currentCarBasePrice * currentRentalDays;
    const total = vehicleCost + extrasCost;
    
    const mt = document.getElementById('modalTotalPrice');
    mt.setAttribute('data-base-mad', total);
    if (typeof window.applyCurrency === 'function') {
        window.applyCurrency(localStorage.getItem('selected_currency') || 'EUR');
    } else {
        mt.innerText = total;
    }
}

function closeBookingModal() {
    document.getElementById('bookingModal').style.display = 'none';
}
</script>

@endsection
