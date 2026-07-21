<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display public blog index page with language fallback.
     */
    public function index(Request $request, $locale)
    {
        $category = $request->query('category');
        
        // Fetch posts for current locale or fallback to English if none exist
        $query = BlogPost::where('is_published', true);

        // Check if there are posts in the requested locale
        $countInLocale = BlogPost::where('is_published', true)
            ->where('locale', $locale)
            ->count();

        if ($countInLocale > 0) {
            $query->where('locale', $locale);
        } else {
            // Fallback to English articles so the blog is never empty
            $query->where(function($q) {
                $q->where('locale', 'en')->orWhereNull('locale');
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(9);
        $categories = BlogPost::select('category')->distinct()->pluck('category');

        return view('blog.index', compact('posts', 'categories', 'locale', 'category', 'countInLocale'));
    }

    /**
     * Display single blog post article with translation lookup.
     */
    public function show($locale, $slug)
    {
        // Try finding post by slug
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        // If post not found or in different locale, try matching by translation_group
        if (!$post) {
            $post = BlogPost::where('translation_group', $slug)
                ->where('is_published', true)
                ->where('locale', $locale)
                ->first();
        }

        if (!$post) {
            // Fallback to finding any post with matching slug regardless of locale
            $post = BlogPost::where('slug', $slug)->firstOrFail();
        }

        // Get alternate language versions of this post
        $availableTranslations = [];
        if ($post->translation_group) {
            $availableTranslations = BlogPost::where('translation_group', $post->translation_group)
                ->where('is_published', true)
                ->pluck('slug', 'locale')
                ->toArray();
        }

        // Get related posts in the same category
        $relatedPosts = BlogPost::where('id', '!=', $post->id)
            ->where('is_published', true)
            ->where('category', $post->category)
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'locale', 'availableTranslations'));
    }
}
