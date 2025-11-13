<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - {{ config('app.name', 'Multicop Tech') }}</title>
    <meta name="description" content="Read our latest blog posts about technology, repairs, and tech tips from Multicop Tech.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|poppins:600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #dc2626 0%, #ea580c 50%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Custom Hover Effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.15);
        }

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="antialiased bg-white text-gray-900 font-[Inter]">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 glass border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-3xl font-bold font-[Poppins] gradient-text">
                    Multicop Tech
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Home</a>
                    <a href="{{ route('home') }}#services" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Services</a>
                    <a href="{{ route('home') }}#products" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Products</a>
                    <a href="{{ route('blog.index') }}" class="text-red-600 font-medium transition duration-300 border-b-2 border-red-600">Blog</a>
                    <a href="{{ route('home') }}#contact" class="bg-gradient-to-r from-red-600 to-orange-500 text-white px-6 py-2.5 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition duration-300">
                        Get Started
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200 mt-4">
                <div class="container mx-auto px-6 py-4 space-y-3">
                    <a href="{{ route('home') }}" class="block text-gray-700 hover:text-red-600 font-medium py-2">Home</a>
                    <a href="{{ route('home') }}#services" class="block text-gray-700 hover:text-red-600 font-medium py-2">Services</a>
                    <a href="{{ route('home') }}#products" class="block text-gray-700 hover:text-red-600 font-medium py-2">Products</a>
                    <a href="{{ route('blog.index') }}" class="block text-red-600 font-medium py-2 border-l-4 border-red-600 pl-2">Blog</a>
                    <a href="{{ route('home') }}#contact" class="block bg-gradient-to-r from-red-600 to-orange-500 text-white px-6 py-3 rounded-full font-semibold text-center">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Blog Header -->
    <section class="pt-32 pb-12 bg-gradient-to-br from-white via-gray-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-extrabold font-[Poppins] mb-4">
                    <span class="gradient-text">Our Blog</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Stay updated with the latest technology trends, repair tips, and insights from our expert team.
                </p>
                
                <!-- Search Bar -->
                <form method="GET" action="{{ route('blog.index') }}" class="max-w-2xl mx-auto">
                    <div class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search blog posts..." 
                               class="flex-1 px-6 py-4 rounded-full border-2 border-gray-200 focus:border-red-600 focus:outline-none transition duration-300">
                        <button type="submit" class="bg-gradient-to-r from-red-600 to-orange-500 text-white px-8 py-4 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition duration-300">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    @if($blogs->count() > 0)
                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach($blogs as $blog)
                                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover-lift group">
                                    @if($blog->featured_image)
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <div class="relative overflow-hidden h-64">
                                                <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                                     alt="{{ $blog->title }}"
                                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                            </div>
                                        </a>
                                    @endif
                                    <div class="p-6">
                                        <div class="flex flex-wrap gap-2 mb-3">
                                            @foreach($blog->categories->take(2) as $category)
                                                <a href="{{ route('blog.category', $category->slug) }}" 
                                                   class="text-xs font-semibold text-red-600 hover:text-red-800">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                        <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition duration-300">
                                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h2>
                                        @if($blog->excerpt)
                                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $blog->excerpt }}</p>
                                        @else
                                            <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                                        @endif
                                        <div class="flex items-center justify-between text-sm text-gray-500">
                                            <div class="flex items-center gap-4">
                                                <span>{{ $blog->author->name }}</span>
                                                <span>•</span>
                                                <span>{{ $blog->published_at->format('M j, Y') }}</span>
                                                <span>•</span>
                                                <span>{{ $blog->reading_time }} min read</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('blog.show', $blog->slug) }}" 
                                               class="inline-flex items-center text-red-600 hover:text-red-800 font-semibold">
                                                Read More →
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-12">
                            {{ $blogs->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">No blog posts found</h3>
                            <p class="text-gray-600">
                                @if(request('search'))
                                    Try adjusting your search terms.
                                @else
                                    Check back soon for new content!
                                @endif
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <!-- Categories -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.category', $category->slug) }}" 
                                       class="flex items-center justify-between text-gray-700 hover:text-red-600 transition duration-300 py-2">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-sm text-gray-500">({{ $category->blogs_count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Recent Posts</h3>
                        <ul class="space-y-4">
                            @foreach($recentPosts as $post)
                                <li>
                                    <a href="{{ route('blog.show', $post->slug) }}" 
                                       class="block group">
                                        <h4 class="font-semibold text-gray-900 group-hover:text-red-600 transition duration-300 mb-1 line-clamp-2">
                                            {{ $post->title }}
                                        </h4>
                                        <p class="text-sm text-gray-500">{{ $post->published_at->format('M j, Y') }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Popular Tags -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($popularTags as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}" 
                                   class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-red-600 hover:text-white transition duration-300">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12 mt-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold font-[Poppins] gradient-text mb-4">Multicop Tech</h3>
                    <p class="text-gray-400 mb-4 max-w-md">
                        Your trusted technology partner for premium repairs, authentic products, and exceptional service.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition duration-300">Home</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition duration-300">Blog</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-white transition duration-300">Services</a></li>
                        <li><a href="{{ route('home') }}#contact" class="hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📧 mulcorp@multicop.com</li>
                        <li>📱 0779225589</li>
                        <li>⏰ 24/7 Available</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Multicop Tech. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
