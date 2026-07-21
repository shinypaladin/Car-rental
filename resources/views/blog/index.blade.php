@extends('layouts.app')

@section('title', 'Car Rental & Travel Blog Morocco | Guides, Tips & Advice')
@section('meta_description', 'Discover essential travel advice, airport pickup guides, road safety tips, and hidden gems for renting a car in Marrakech, Casablanca, Agadir & Morocco.')

@section('content')
<!-- Hero Section -->
<div style="background: linear-gradient(rgba(15, 29, 54, 0.85), rgba(15, 29, 54, 0.95)), url('/images/marrakech_bg.jpg') center/cover; padding: 4rem 1.5rem 3rem; color: white; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
        <span style="color: var(--accent-gold); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem;">Travel & Car Rental Insights</span>
        <h1 style="font-family: var(--font-heading); font-size: 2.5rem; font-weight: 800; margin: 0.5rem 0 1rem; color: white;">Morocco Car Rental & Airport Travel Guide</h1>
        <p style="font-size: 1.05rem; opacity: 0.9; max-width: 650px; margin: 0 auto;">Expert guides, airport pickup advice, road rules, and driving itineraries to help you get the most out of your trip to Morocco.</p>
    </div>
</div>

<div class="section-container" style="margin-top: 3rem;">
    <!-- Category Filter Bar -->
    <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 2.5rem; justify-content: center;">
        <a href="/{{ $locale }}/blog" style="padding: 0.5rem 1.25rem; border-radius: 30px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; {{ !$category ? 'background: var(--primary-blue); color: white;' : 'background: #f1f5f9; color: var(--text-dark);' }}">
            All Articles
        </a>
        @foreach($categories as $cat)
        <a href="/{{ $locale }}/blog?category={{ urlencode($cat) }}" style="padding: 0.5rem 1.25rem; border-radius: 30px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.2s; {{ $category === $cat ? 'background: var(--primary-blue); color: white;' : 'background: #f1f5f9; color: var(--text-dark);' }}">
            {{ $cat }}
        </a>
        @endforeach
    </div>

    <!-- Blog Posts Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
        @foreach($posts as $post)
        <div style="background: var(--bg-white); border-radius: 12px; overflow: hidden; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; transition: transform 0.3s, box-shadow 0.3s;">
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
@endsection
