<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request)
    {
        $query = Blog::published()->with(['author', 'categories', 'tags']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.slug', $request->category);
            });
        }

        // Tag filter
        if ($request->has('tag') && !empty($request->tag)) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('tags.slug', $request->tag);
            });
        }

        $blogs = $query->orderBy('published_at', 'desc')->paginate(9);
        $categories = Category::withCount('blogs')->orderBy('name')->get();
        $recentPosts = Blog::published()->orderBy('published_at', 'desc')->limit(5)->get();
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog.index', compact('blogs', 'categories', 'recentPosts', 'popularTags'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->with(['author', 'categories', 'tags'])
            ->firstOrFail();

        // Get related posts (same categories)
        $relatedPosts = Blog::published()
            ->where('id', '!=', $blog->id)
            ->whereHas('categories', function($q) use ($blog) {
                $q->whereIn('categories.id', $blog->categories->pluck('id'));
            })
            ->limit(3)
            ->get();

        // Get recent posts if not enough related posts
        if ($relatedPosts->count() < 3) {
            $recentPosts = Blog::published()
                ->where('id', '!=', $blog->id)
                ->orderBy('published_at', 'desc')
                ->limit(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($recentPosts);
        }

        return view('blog.show', compact('blog', 'relatedPosts'));
    }

    /**
     * Display blogs by category.
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $blogs = Blog::published()
            ->whereHas('categories', function($q) use ($category) {
                $q->where('categories.id', $category->id);
            })
            ->with(['author', 'categories', 'tags'])
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = Category::withCount('blogs')->orderBy('name')->get();
        $recentPosts = Blog::published()->orderBy('published_at', 'desc')->limit(5)->get();
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog.category', compact('category', 'blogs', 'categories', 'recentPosts', 'popularTags'));
    }

    /**
     * Display blogs by tag.
     */
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        
        $blogs = Blog::published()
            ->whereHas('tags', function($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            })
            ->with(['author', 'categories', 'tags'])
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = Category::withCount('blogs')->orderBy('name')->get();
        $recentPosts = Blog::published()->orderBy('published_at', 'desc')->limit(5)->get();
        $popularTags = Tag::withCount('blogs')->orderBy('blogs_count', 'desc')->limit(10)->get();

        return view('blog.tag', compact('tag', 'blogs', 'categories', 'recentPosts', 'popularTags'));
    }
}
