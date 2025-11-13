<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blog->title }} - {{ config('app.name', 'Multicop Tech') }}</title>
    <meta name="description" content="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}">
    @if($blog->featured_image)
        <meta property="og:image" content="{{ asset('storage/' . $blog->featured_image) }}">
    @endif
    
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

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Blog Content Styling */
        .blog-content {
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .blog-content h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1a1a1a;
        }

        .blog-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #1a1a1a;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content ul, .blog-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .blog-content li {
            margin-bottom: 0.5rem;
        }

        .blog-content a {
            color: #dc2626;
            text-decoration: underline;
        }

        .blog-content a:hover {
            color: #ea580c;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 2rem 0;
        }

        .blog-content blockquote {
            border-left: 4px solid #dc2626;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #4b5563;
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

    <!-- Blog Post Header -->
    <article class="pt-32 pb-12 bg-gradient-to-br from-white via-gray-50 to-white">
        <div class="container mx-auto px-6 max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-red-600">Home</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-red-600">Blog</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-900">{{ Str::limit($blog->title, 30) }}</span>
            </nav>

            <!-- Categories -->
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($blog->categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" 
                       class="px-4 py-1 bg-red-100 text-red-600 rounded-full text-sm font-semibold hover:bg-red-600 hover:text-white transition duration-300">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-extrabold font-[Poppins] mb-6 text-gray-900">
                {{ $blog->title }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-4 text-gray-600 mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-600 to-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($blog->author->name, 0, 2) }}
                    </div>
                    <span>{{ $blog->author->name }}</span>
                </div>
                <span>•</span>
                <span>{{ $blog->published_at->format('F j, Y') }}</span>
                <span>•</span>
                <span>{{ $blog->reading_time }} min read</span>
            </div>

            <!-- Featured Image -->
            @if($blog->featured_image)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                         alt="{{ $blog->title }}"
                         class="w-full h-auto">
                </div>
            @endif

            <!-- Excerpt -->
            @if($blog->excerpt)
                <div class="bg-red-50 border-l-4 border-red-600 p-6 rounded-r-lg mb-8">
                    <p class="text-lg text-gray-700 italic">{{ $blog->excerpt }}</p>
                </div>
            @endif

            <!-- Blog Content -->
            <div class="blog-content prose prose-lg max-w-none">
                {!! $blog->content !!}
            </div>

            <!-- Tags -->
            @if($blog->tags->count() > 0)
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($blog->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}" 
                               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-blue-600 hover:text-white transition duration-300">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this post:</h3>
                <div class="flex gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                       target="_blank"
                       class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" 
                       target="_blank"
                       class="w-12 h-12 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                       target="_blank"
                       class="w-12 h-12 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-6 max-w-6xl">
                <h2 class="text-3xl font-bold font-[Poppins] mb-8 text-center">
                    <span class="gradient-text">Related Posts</span>
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $relatedPost)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                            @if($relatedPost->featured_image)
                                <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                    <div class="relative overflow-hidden h-48">
                                        <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                                             alt="{{ $relatedPost->title }}"
                                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                                    </div>
                                </a>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-red-600 transition duration-300">
                                    <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                                </h3>
                                <p class="text-sm text-gray-500 mb-4">{{ $relatedPost->published_at->format('M j, Y') }}</p>
                                <a href="{{ route('blog.show', $relatedPost->slug) }}" 
                                   class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Footer -->
    <footer class="bg-black text-white py-12 mt-12">
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
