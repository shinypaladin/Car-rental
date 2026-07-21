@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')
<div style="max-width: 900px; margin: 2.5rem auto 5rem; padding: 0 1.5rem;">
    <!-- Breadcrumbs -->
    <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
        <a href="/{{ $locale }}" style="color: inherit; text-decoration: none;">Home</a> &nbsp;&rsaquo;&nbsp;
        <a href="/{{ $locale }}/blog" style="color: inherit; text-decoration: none;">Blog</a> &nbsp;&rsaquo;&nbsp;
        <span style="color: var(--text-dark); font-weight: 600;">{{ Str::limit($post->title, 40) }}</span>
    </div>

    <!-- Article Header -->
    <div style="margin-bottom: 2rem;">
        <span style="background: var(--primary-blue); color: var(--accent-gold); font-size: 0.78rem; font-weight: 700; padding: 0.3rem 0.75rem; border-radius: 4px; text-transform: uppercase; display: inline-block; margin-bottom: 1rem;">
            {{ $post->category }}
        </span>
        <h1 style="font-family: var(--font-heading); font-size: 2.25rem; font-weight: 800; line-height: 1.25; color: var(--text-dark); margin-bottom: 1rem;">
            {{ $post->title }}
        </h1>
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
            <div style="display: flex; gap: 1.5rem; font-size: 0.88rem; color: var(--text-muted);">
                <span>✍️ {{ $post->author }}</span>
                <span>⏱️ {{ $post->read_time_minutes }} min read</span>
                <span>📅 Published on {{ $post->created_at->format('F d, Y') }}</span>
            </div>
            
            @if(!empty($availableTranslations) && count($availableTranslations) > 1)
            <div style="display: flex; gap: 0.5rem; align-items: center; font-size: 0.82rem;">
                <span style="color: var(--text-muted); font-weight: 600;">Read in:</span>
                @foreach($availableTranslations as $langKey => $langSlug)
                    <a href="/{{ $langKey }}/blog/{{ $langSlug }}" style="padding: 0.2rem 0.55rem; border-radius: 4px; text-decoration: none; font-weight: 700; font-size: 0.78rem; {{ $langKey === $locale ? 'background: var(--accent-gold); color: var(--primary-blue);' : 'background: var(--bg-light); color: var(--text-dark); border: 1px solid var(--border-color);' }}">
                        {{ strtoupper($langKey) }}
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <!-- Featured Image -->
    @if($post->featured_image)
    <div style="border-radius: 12px; overflow: hidden; margin-bottom: 2.5rem; box-shadow: var(--shadow-md); max-height: 420px;">
        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    @endif

    <!-- Article Body Content -->
    <div class="blog-content" style="font-size: 1.05rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 3rem;">
        {!! $post->content !!}
    </div>

    <!-- Embedded Booking CTA Card -->
    <div style="background: linear-gradient(135deg, var(--primary-blue), #1b2f52); color: white; padding: 2.5rem; border-radius: 16px; box-shadow: var(--shadow-lg); text-align: center; margin: 3rem 0;">
        <h2 style="font-family: var(--font-heading); color: var(--accent-gold); font-size: 1.8rem; margin-bottom: 0.75rem;">Rent a Car Direct at Marrakech, Casablanca & Agadir Airports</h2>
        <p style="font-size: 1rem; opacity: 0.9; max-width: 600px; margin: 0 auto 1.5rem;">Free airport delivery, zero credit card deposit holds, and 24/7 dedicated customer service.</p>
        <a href="/{{ $locale }}#cars" style="background: var(--accent-gold); color: var(--primary-blue); padding: 0.85rem 2rem; text-decoration: none; font-weight: 800; border-radius: 8px; font-size: 1.05rem; display: inline-block; box-shadow: 0 4px 15px rgba(197,160,89,0.3);">
            🚀 View Available Vehicles & Prices
        </a>
    </div>

    <!-- Related Articles -->
    @if($relatedPosts->count() > 0)
    <div style="border-top: 2px solid var(--border-color); padding-top: 2.5rem; margin-top: 3rem;">
        <h3 style="font-family: var(--font-heading); font-size: 1.4rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--text-dark);">Related Articles</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.5rem;">
            @foreach($relatedPosts as $rel)
            <div style="background: var(--bg-white); border-radius: 8px; overflow: hidden; border: 1px solid var(--border-color); padding: 1.25rem;">
                <span style="font-size: 0.7rem; color: var(--accent-gold); font-weight: 700; text-transform: uppercase;">{{ $rel->category }}</span>
                <h4 style="font-size: 1rem; margin: 0.4rem 0 0.6rem; line-height: 1.3;">
                    <a href="/{{ $locale }}/blog/{{ $rel->slug }}" style="color: var(--text-dark); text-decoration: none; font-weight: 700;">{{ $rel->title }}</a>
                </h4>
                <a href="/{{ $locale }}/blog/{{ $rel->slug }}" style="font-size: 0.82rem; color: var(--accent-gold); font-weight: 700; text-decoration: none;">Read Article &rarr;</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
