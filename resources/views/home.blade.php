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
    
    <div class="cars-grid">
        @foreach($cars as $car)
        <div class="car-card">
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
                </div>
                
                <div class="car-price-row">
                    <div class="price-box">
                        <div class="price-amount">{{ round($car->display_price) }} {{ __('messages.dh') }} <span>/ {{ __('messages.day') }}</span></div>
                        @if(isset($car->total_price) && $car->days > 1)
                        <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Total: {{ round($car->total_price) }} DH ({{ $car->days }} days)</div>
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
                    <span>Google 4.9/5</span>
                    <span>Tripadvisor 4.8/5</span>
                </div>
            </div>
            <div class="rating-summary">
                <div class="rating-number">4.9</div>
                <div class="stars">★★★★★</div>
                <div style="font-size: 0.75rem; color: var(--text-muted);">{{ __('messages.based_on') }}</div>
            </div>
        </div>
        
        <div class="review-slider">
            <p class="review-text">"Excellent service! The car was clean, new and the team was very professional. Free delivery at the airport was super convenient."</p>
            <div class="reviewer-meta">
                <div class="reviewer-avatar">JD</div>
                <div class="reviewer-info">
                    <h4>John D.</h4>
                    <span>May 2026</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple Booking Overlay Modal (HTML only, controlled dynamically) -->
<div id="bookingModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000; justify-content: center; align-items: center; padding: 1.5rem;">
    <div style="background: white; padding: 2rem; border-radius: 12px; max-width: 500px; width: 100%; position: relative; box-shadow: var(--shadow-lg);">
        <button onclick="closeBookingModal()" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 1.5rem; cursor: pointer;">&times;</button>
        <h3 id="modalCarTitle" style="font-family: var(--font-heading); margin-bottom: 1rem; color: var(--primary-blue);">Book Car</h3>
        
        <form id="bookingForm" method="POST" action="/{{ $locale }}/book">
            @csrf
            <input type="hidden" name="car_id" id="modalCarId">
            <input type="hidden" name="pickup_location_val">
            <input type="hidden" name="pickup_datetime_val">
            <input type="hidden" name="return_datetime_val">
            
            <div style="margin-bottom: 1rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Full Name</label>
                <input type="text" name="customer_name" required style="width: 100%; padding: 0.6rem; border: 1px solid var(--border-color); border-radius: 6px;">
            </div>
            
            <div style="margin-bottom: 1rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Email Address</label>
                <input type="email" name="customer_email" required style="width: 100%; padding: 0.6rem; border: 1px solid var(--border-color); border-radius: 6px;">
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Phone Number (WhatsApp preferred)</label>
                <input type="tel" name="customer_phone" placeholder="+212..." required style="width: 100%; padding: 0.6rem; border: 1px solid var(--border-color); border-radius: 6px;">
            </div>
            
            <button type="submit" style="background: var(--primary-blue); color: white; border: none; padding: 0.8rem; width: 100%; border-radius: 6px; font-weight: 700; cursor: pointer;">
                Confirm Reservation Request
            </button>
        </form>
    </div>
</div>

<script>
function openBookingModal(carId, carName, price) {
    document.getElementById('modalCarId').value = carId;
    document.getElementById('modalCarTitle').innerText = 'Book ' + carName;
    
    // Copy search params to form
    const pickupLoc = document.getElementById('pickup_location').value;
    const pickupDate = document.getElementById('pickup_date').value;
    const pickupTime = document.getElementById('pickup_time').value;
    const returnDate = document.getElementById('return_date').value;
    const returnTime = document.getElementById('return_time').value;
    
    document.querySelector('input[name="pickup_location_val"]').value = pickupLoc;
    document.querySelector('input[name="pickup_datetime_val"]').value = pickupDate + ' ' + pickupTime;
    document.querySelector('input[name="return_datetime_val"]').value = returnDate + ' ' + returnTime;
    
    document.getElementById('bookingModal').style.display = 'flex';
}

function closeBookingModal() {
    document.getElementById('bookingModal').style.display = 'none';
}
</script>

@endsection
