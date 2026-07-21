@extends('layouts.app')

@section('title', 'Car Rental & Travel Blog Morocco | Destination Guides & Advice')
@section('meta_description', 'Discover essential travel advice, airport pickup guides, self-drive itineraries, and hidden gems for renting a car in Marrakech, Casablanca & Agadir.')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(rgba(15, 29, 54, 0.85), rgba(15, 29, 54, 0.95)), url('/images/marrakech_bg.jpg') center/cover; padding: 4rem 1.5rem 3rem; color: white; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
        <span style="color: var(--accent-gold); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">Travel & Car Rental Insights</span>
        <h1 style="font-family: var(--font-heading); font-size: 2.5rem; font-weight: 800; margin: 0.5rem 0 1rem; color: white;">Morocco Car Rental & Destination Travel Guide</h1>
        <p style="font-size: 1.05rem; opacity: 0.9; max-width: 650px; margin: 0 auto;">In-depth driving guides, road rules, airport pickup advice, and self-drive itineraries across Morocco.</p>
    </div>
</div>

<div class="section-container" style="margin-top: 3rem;">
    <!-- Interactive Morocco City Map & Destination Filter -->
    <div style="background: linear-gradient(135deg, #0f1d36 0%, #1e293b 100%); border-radius: 16px; padding: 2rem; margin-bottom: 3rem; color: white; box-shadow: var(--shadow-lg);">
        <div style="text-align: center; max-width: 700px; margin: 0 auto 1.5rem;">
            <span style="color: var(--accent-gold); font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">Interactive Travel Map</span>
            <h2 style="font-family: var(--font-heading); font-size: 1.8rem; font-weight: 800; margin: 0.4rem 0; color: white;">Select Destination to Filter Blog Guides</h2>
            <p style="font-size: 0.9rem; color: #cbd5e1;">Click a city below to view all self-drive travel guides, road itineraries, and airport tips for that region.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem;">
            <!-- All Destinations -->
            <div class="blog-map-card active" onclick="filterBlogByCity('all', this)" style="background: rgba(255,255,255,0.12); border: 2px solid var(--accent-gold); border-radius: 12px; padding: 1.25rem; cursor: pointer; text-align: center; transition: all 0.3s;">
                <span style="font-size: 1.8rem; display: block; margin-bottom: 0.4rem;">🇲🇦</span>
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 0.2rem;">All Regions</h3>
                <p style="font-size: 0.78rem; color: #cbd5e1;">Browse all travel guides</p>
            </div>

            <!-- Marrakech -->
            <div class="blog-map-card" onclick="filterBlogByCity('marrakech', this)" style="background: rgba(255,255,255,0.05); border: 2px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1.25rem; cursor: pointer; text-align: center; transition: all 0.3s;">
                <span style="font-size: 1.8rem; display: block; margin-bottom: 0.4rem;">🕌</span>
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 0.2rem;">Marrakech</h3>
                <p style="font-size: 0.78rem; color: #cbd5e1;">Agafay, Atlas & Imlil Guides</p>
            </div>

            <!-- Casablanca -->
            <div class="blog-map-card" onclick="filterBlogByCity('casablanca', this)" style="background: rgba(255,255,255,0.05); border: 2px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1.25rem; cursor: pointer; text-align: center; transition: all 0.3s;">
                <span style="font-size: 1.8rem; display: block; margin-bottom: 0.4rem;">🏙️</span>
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 0.2rem;">Casablanca</h3>
                <p style="font-size: 0.78rem; color: #cbd5e1;">CMN Airport & Highway Tips</p>
            </div>

            <!-- Agadir -->
            <div class="blog-map-card" onclick="filterBlogByCity('agadir', this)" style="background: rgba(255,255,255,0.05); border: 2px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1.25rem; cursor: pointer; text-align: center; transition: all 0.3s;">
                <span style="font-size: 1.8rem; display: block; margin-bottom: 0.4rem;">🌊</span>
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700; color: white; margin-bottom: 0.2rem;">Agadir</h3>
                <p style="font-size: 0.78rem; color: #cbd5e1;">Taghazout & Surf Coast</p>
            </div>
        </div>
    </div>

    <!-- Category Filter Bar -->
    <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 2.5rem; justify-content: center;">
        <a href="/{{ $locale }}/blog" style="padding: 0.5rem 1.25rem; border-radius: 30px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; {{ !$category ? 'background: var(--primary-blue); color: white;' : 'background: #f1f5f9; color: var(--text-dark);' }}">
            All Categories
        </a>
        @foreach($categories as $cat)
        <a href="/{{ $locale }}/blog?category={{ urlencode($cat) }}" style="padding: 0.5rem 1.25rem; border-radius: 30px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; {{ $category === $cat ? 'background: var(--primary-blue); color: white;' : 'background: #f1f5f9; color: var(--text-dark);' }}">
            {{ $cat }}
        </a>
        @endforeach
    </div>

    <!-- Blog Posts Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;" id="blog-posts-grid">
        @foreach($posts as $post)
        @php
            $postCity = 'all';
            $titleLower = strtolower($post->title . ' ' . $post->excerpt . ' ' . $post->category);
            if (str_contains($titleLower, 'marrakech') || str_contains($titleLower, 'agafay') || str_contains($titleLower, 'imlil') || str_contains($titleLower, 'ourika')) {
                $postCity = 'marrakech';
            } elseif (str_contains($titleLower, 'casablanca')) {
                $postCity = 'casablanca';
            } elseif (str_contains($titleLower, 'agadir') || str_contains($titleLower, 'taghazout')) {
                $postCity = 'agadir';
            }
        @endphp
        <div class="blog-card-item" data-city="{{ $postCity }}" style="background: var(--bg-white); border-radius: 12px; overflow: hidden; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; transition: transform 0.3s, box-shadow 0.3s;">
            <div style="height: 190px; overflow: hidden; position: relative;">
                <img src="{{ $post->featured_image ?: '/images/marrakech_bg.jpg' }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;">
                <span style="position: absolute; top: 12px; left: 12px; background: rgba(15, 29, 54, 0.85); color: var(--accent-gold); font-size: 0.72rem; font-weight: 700; padding: 0.25rem 0.6rem; border-radius: 4px; text-transform: uppercase;">
                    {{ $post->category }}
                </span>
            </div>
            
            <div style="padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1;">
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem; display: flex; gap: 1rem;">
                    <span>⏱️ {{ $post->read_time_minutes }} min read</span>
                    <span>📅 {{ $post->created_at->format('M d, Y') }}</span>
                </div>
                
                <h2 style="font-family: var(--font-heading); font-size: 1.2rem; font-weight: 700; line-height: 1.35; margin-bottom: 0.75rem; color: var(--text-dark);">
                    <a href="/{{ $locale }}/blog/{{ $post->slug }}" style="color: inherit; text-decoration: none;">
                        {{ $post->title }}
                    </a>
                </h2>
                
                <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 1.25rem; flex-grow: 1;">
                    {{ Str::limit($post->excerpt, 120) }}
                </p>
                
                <a href="/{{ $locale }}/blog/{{ $post->slug }}" style="color: var(--accent-gold); font-weight: 700; text-decoration: none; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                    Read Full Guide &rarr;
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div style="margin-top: 3rem; display: flex; justify-content: center;">
        {{ $posts->links() }}
    </div>
</div>

<script>
function filterBlogByCity(city, cardElement) {
    // Highlight map card
    document.querySelectorAll('.blog-map-card').forEach(card => {
        card.style.background = 'rgba(255,255,255,0.05)';
        card.style.borderColor = 'rgba(255,255,255,0.15)';
    });
    if (cardElement) {
        cardElement.style.background = 'rgba(255,255,255,0.12)';
        cardElement.style.borderColor = 'var(--accent-gold)';
    }

    // Filter blog post items
    document.querySelectorAll('.blog-card-item').forEach(item => {
        const itemCity = item.getAttribute('data-city');
        if (city === 'all' || itemCity === city || itemCity === 'all') {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endsection
