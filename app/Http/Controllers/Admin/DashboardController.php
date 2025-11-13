<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get dashboard statistics
        $stats = [
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::published()->count(),
            'draft_blogs' => Blog::draft()->count(),
            'total_categories' => Category::count(),
            'total_tags' => Tag::count(),
            'total_users' => User::count(),
            'total_admins' => User::admins()->count(),
        ];

        // Get recent blogs
        $recentBlogs = Blog::with('author')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get popular categories
        $popularCategories = Category::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBlogs', 'popularCategories'));
    }
}
