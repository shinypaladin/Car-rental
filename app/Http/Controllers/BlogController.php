<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display public blog index page.
     */
    public function index(Request $request, $locale)
    {
        $category = $request->query('category');
        
        $query = BlogPost::where('is_published', true)
            ->where(function($q) use ($locale) {
                $q->where('locale', $locale)->orWhereNull('locale');
            });

        if ($category) {
            $query->where('category', $category);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(9);
        $categories = BlogPost::select('category')->distinct()->pluck('category');

        return view('blog.index', compact('posts', 'categories', 'locale', 'category'));
    }

    /**
     * Display single blog post article.
     */
    public function show($locale, $slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Get related posts in the same category
        $relatedPosts = BlogPost::where('id', '!=', $post->id)
            ->where('is_published', true)
            ->where('category', $post->category)
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'locale'));
    }
}
