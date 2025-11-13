<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Multicop Tech') }} - Your Premier Technology Partner</title>
    <meta name="description" content="Expert tech repairs, premium products, and dedicated support. Experience excellence with Multicop Tech.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|poppins:600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

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
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
        }

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #b91c1c;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="antialiased bg-white text-gray-900 font-[Inter]">
        <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 glass border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="text-3xl font-bold font-[Poppins] gradient-text">
                    Multicop Tech
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Dashboard</a>
                    <a href="#services" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Services</a>
                    <a href="#products" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Products</a>
                    <a href="#why-us" class="text-gray-700 hover:text-red-600 font-medium transition duration-300">Why Us</a>
                    <a href="#contact" class="bg-gradient-to-r from-red-600 to-orange-500 text-white px-6 py-2.5 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition duration-300">
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
            </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="container mx-auto px-6 py-4 space-y-3">
                <a href="#home" class="block text-gray-700 hover:text-red-600 font-medium py-2">Dashboard</a>
                <a href="#services" class="block text-gray-700 hover:text-red-600 font-medium py-2">Services</a>
                <a href="#products" class="block text-gray-700 hover:text-red-600 font-medium py-2">Products</a>
                <a href="#why-us" class="block text-gray-700 hover:text-red-600 font-medium py-2">Why Us</a>
                <a href="#contact" class="block bg-gradient-to-r from-red-600 to-orange-500 text-white px-6 py-3 rounded-full font-semibold text-center">
                    Get Started
                </a>
            </div>
        </div>
    </nav>

        <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 md:pt-40 md:pb-32 bg-gradient-to-br from-white via-gray-50 to-white overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-red-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"></div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-orange-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float delay-200"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-left space-y-6 opacity-0 animate-slideInLeft">
                    <div class="inline-block bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        🚀 #1 Tech Solutions Provider
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold font-[Poppins] leading-tight">
                        <span class="text-black">Your Trusted</span><br>
                        <span class="gradient-text">Technology Partner</span>
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        Experience premium tech repairs, cutting-edge products, and unmatched customer service. We transform your technology challenges into seamless solutions.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#services" class="bg-gradient-to-r from-red-600 to-orange-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl transform hover:scale-105 transition duration-300 text-center">
                            Explore Services
                        </a>
                        <a href="#contact" class="border-2 border-black text-black px-8 py-4 rounded-full text-lg font-semibold hover:bg-black hover:text-white transition duration-300 text-center">
                            Contact Us
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="flex items-center gap-8 pt-8">
                        <div>
                            <div class="text-3xl font-bold text-red-600">5000+</div>
                            <div class="text-sm text-gray-600">Happy Clients</div>
                        </div>
                        <div class="w-px h-12 bg-gray-300"></div>
                        <div>
                            <div class="text-3xl font-bold text-orange-500">10K+</div>
                            <div class="text-sm text-gray-600">Repairs Done</div>
                        </div>
                        <div class="w-px h-12 bg-gray-300"></div>
                        <div>
                            <div class="text-3xl font-bold text-black">98%</div>
                            <div class="text-sm text-gray-600">Satisfaction</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image/Illustration -->
                <div class="relative opacity-0 animate-slideInRight delay-200">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=1200&auto=format&fit=crop" alt="Tech Solutions" class="rounded-3xl shadow-2xl">
                        <!-- Floating Card 1 -->
                        <div class="absolute -top-6 -left-6 bg-white p-4 rounded-2xl shadow-xl animate-float">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center text-2xl">⚡</div>
                                <div>
                                    <div class="font-bold text-black">Fast Service</div>
                                    <div class="text-sm text-gray-600">Same Day Repair</div>
                                </div>
                            </div>
                        </div>
                        <!-- Floating Card 2 -->
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-xl animate-float delay-300">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-2xl">⭐</div>
                                <div>
                                    <div class="font-bold text-black">Top Quality</div>
                                    <div class="text-sm text-gray-600">Certified Experts</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-5xl font-extrabold font-[Poppins] mb-4">
                    <span class="gradient-text">Premium Services</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Comprehensive tech solutions tailored to your needs. Excellence is our standard.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white border-2 border-gray-100 rounded-3xl p-8 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center text-white text-3xl mb-6">
                        🔧
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">Expert Repairs</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        From screen replacements to motherboard repairs, our certified technicians handle it all with precision and care. Fast turnaround guaranteed.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center gap-2">
                            <span class="text-red-500">✓</span> Phone & Tablet Repair
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-red-500">✓</span> Laptop & PC Service
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-red-500">✓</span> Data Recovery
                        </li>
                    </ul>
                </div>

                <!-- Service 2 -->
                <div class="bg-gradient-to-br from-red-600 to-orange-500 rounded-3xl p-8 text-white hover-lift transform scale-105 shadow-2xl">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl mb-6">
                        📱
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Premium Products</h3>
                    <p class="text-white/90 mb-6 leading-relaxed">
                        Discover the latest technology from world-leading brands. Authentic products, competitive prices, and warranty included.
                    </p>
                    <ul class="space-y-2 text-white/90">
                        <li class="flex items-center gap-2">
                            <span class="text-white">✓</span> Latest Smartphones
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-white">✓</span> Laptops & Tablets
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-white">✓</span> Accessories & More
                        </li>
                    </ul>
                </div>

                <!-- Service 3 -->
                <div class="bg-white border-2 border-gray-100 rounded-3xl p-8 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center text-white text-3xl mb-6">
                        💬
                    </div>
                    <h3 class="text-2xl font-bold text-black mb-4">24/7 Support</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Our commitment doesn't end with purchase. Get round-the-clock technical support, consultations, and guidance from our experts.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center gap-2">
                            <span class="text-orange-500">✓</span> Technical Consultation
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-orange-500">✓</span> Setup & Configuration
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-orange-500">✓</span> Warranty Coverage
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
    <section id="products" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-5xl font-extrabold font-[Poppins] mb-4">
                    <span class="gradient-text">Featured Products</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Handpicked selection of the most popular tech products. Quality guaranteed.
                </p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-lift group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=800&auto=format&fit=crop" alt="Laptop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            HOT
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-black mb-2">Premium Laptop</h3>
                        <p class="text-gray-600 text-sm mb-4">High-performance computing for professionals</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">UGX 4,500,000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-600 transition duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-lift group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=800&auto=format&fit=crop" alt="Smartphone" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                            NEW
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-black mb-2">Flagship Phone</h3>
                        <p class="text-gray-600 text-sm mb-4">Latest model with stunning camera</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">UGX 3,400,000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-orange-500 transition duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-lift group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=800&auto=format&fit=crop" alt="Headphones" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-black mb-2">Pro Headphones</h3>
                        <p class="text-gray-600 text-sm mb-4">Premium sound with noise cancellation</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">UGX 1,300,000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-600 transition duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-lift group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?q=80&w=800&auto=format&fit=crop" alt="Smartwatch" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-black text-white px-3 py-1 rounded-full text-sm font-bold">
                            SALE
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-black mb-2">Smart Watch Pro</h3>
                        <p class="text-gray-600 text-sm mb-4">Track fitness & stay connected</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">UGX 1,100,000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-600 transition duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="#products" class="inline-block border-2 border-black text-black px-8 py-4 rounded-full text-lg font-semibold hover:bg-black hover:text-white transition duration-300">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-us" class="py-20 bg-black text-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-5xl font-extrabold font-[Poppins] mb-6">
                        Why Choose <span class="gradient-text">Multicop Tech</span>?
                    </h2>
                    <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                        We don't just fix devices or sell products. We build lasting relationships through trust, quality, and exceptional service.
                    </p>
                    
                    <div class="space-y-6">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center flex-shrink-0 text-2xl">
                                ⚡
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Lightning Fast Service</h3>
                                <p class="text-gray-400">Most repairs completed within 24 hours. We value your time as much as you do.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0 text-2xl">
                                💎
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Premium Quality Guarantee</h3>
                                <p class="text-gray-400">Only original parts and authentic products. Your satisfaction is our priority.</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center flex-shrink-0 text-2xl">
                                🏆
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Certified Experts</h3>
                                <p class="text-gray-400">Our technicians are industry-certified with years of hands-on experience.</p>
                            </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0 text-2xl">
                                💰
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2">Best Prices Guaranteed</h3>
                                <p class="text-gray-400">Competitive pricing without compromising on quality. Get the best value.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Stats -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-red-600 to-red-700 p-8 rounded-3xl text-center hover-lift">
                        <div class="text-5xl font-extrabold mb-2">5K+</div>
                        <div class="text-lg text-red-100">Happy Customers</div>
                    </div>
                    <div class="bg-white text-black p-8 rounded-3xl text-center hover-lift">
                        <div class="text-5xl font-extrabold mb-2 gradient-text">10K+</div>
                        <div class="text-lg text-gray-600">Repairs Done</div>
                    </div>
                    <div class="bg-white text-black p-8 rounded-3xl text-center hover-lift">
                        <div class="text-5xl font-extrabold mb-2 gradient-text">98%</div>
                        <div class="text-lg text-gray-600">Satisfaction Rate</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-8 rounded-3xl text-center hover-lift">
                        <div class="text-5xl font-extrabold mb-2">24/7</div>
                        <div class="text-lg text-orange-100">Support Available</div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-5xl font-extrabold font-[Poppins] mb-4">
                    <span class="gradient-text">What Our Clients Say</span>
                </h2>
                <p class="text-xl text-gray-600">
                    Real experiences from real people who trust us with their technology.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-3xl hover-lift">
                    <div class="flex items-center gap-1 mb-4">
                        <span class="text-red-600 text-2xl">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "Exceptional service! They fixed my laptop screen in just a few hours. Professional, fast, and affordable."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                            JD
                        </div>
                        <div>
                            <div class="font-bold text-black">John Doe</div>
                            <div class="text-sm text-gray-600">Business Owner</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-3xl hover-lift">
                    <div class="flex items-center gap-1 mb-4">
                        <span class="text-red-600 text-2xl">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "Best place to buy authentic tech products. Got my new iPhone here at a great price with warranty!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold">
                            SM
                        </div>
                        <div>
                            <div class="font-bold text-black">Sarah Miller</div>
                            <div class="text-sm text-gray-600">Content Creator</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-3xl hover-lift">
                    <div class="flex items-center gap-1 mb-4">
                        <span class="text-red-600 text-2xl">⭐⭐⭐⭐⭐</span>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        "Their customer support is outstanding! Always available to help and very knowledgeable. Highly recommended!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                            MJ
                        </div>
                        <div>
                            <div class="font-bold text-black">Michael Johnson</div>
                            <div class="text-sm text-gray-600">Software Engineer</div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-5xl font-extrabold font-[Poppins] mb-6">
                        <span class="gradient-text">Get In Touch</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Have a question or need assistance? We're here to help! Reach out to us and experience our exceptional customer service.
                    </p>
                    
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-2xl">
                                📧
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Email Us</div>
                                <div class="text-lg font-bold text-black">mulcorp@multicop.com</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-2xl">
                                📱
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Call Us</div>
                                <div class="text-lg font-bold text-black">0779225589</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-2xl">
                                ⏰
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Working Hours</div>
                                <div class="text-lg font-bold text-black">24/7 Available</div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="flex gap-4 mt-8">
                        <a href="#" class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Form -->
                <div class="bg-white p-8 md:p-12 rounded-3xl shadow-2xl border border-gray-100">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                            <input type="text" placeholder="John Doe" class="w-full px-4 py-4 rounded-2xl border-2 border-gray-200 focus:border-red-600 focus:outline-none transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" placeholder="john@example.com" class="w-full px-4 py-4 rounded-2xl border-2 border-gray-200 focus:border-red-600 focus:outline-none transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" placeholder="+1 (555) 000-0000" class="w-full px-4 py-4 rounded-2xl border-2 border-gray-200 focus:border-red-600 focus:outline-none transition duration-300">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Message</label>
                            <textarea rows="4" placeholder="Tell us how we can help you..." class="w-full px-4 py-4 rounded-2xl border-2 border-gray-200 focus:border-red-600 focus:outline-none transition duration-300 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-orange-500 text-white px-8 py-4 rounded-2xl text-lg font-semibold hover:shadow-2xl transform hover:scale-105 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
    <footer class="bg-black text-white py-12">
            <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold font-[Poppins] gradient-text mb-4">Multicop Tech</h3>
                    <p class="text-gray-400 mb-4 max-w-md">
                        Your trusted technology partner for premium repairs, authentic products, and exceptional service. Experience the difference.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#home" class="hover:text-white transition duration-300">Dashboard</a></li>
                        <li><a href="#services" class="hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#products" class="hover:text-white transition duration-300">Products</a></li>
                        <li><a href="#why-us" class="hover:text-white transition duration-300">Why Us</a></li>
                        <li><a href="#contact" class="hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📧 mulcorp@multicop.com</li>
                        <li>📱 0779225589</li>
                        <li>⏰ 24/7 Available</li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Multicop Tech. All Rights Reserved. Made with ❤️ for our customers.</p>
                </div>
            </div>
        </footer>

        <!-- Back to Top Button -->
    <button onclick="scrollToTop()" id="backToTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-red-600 to-orange-500 text-white rounded-full shadow-2xl hover:scale-110 transition duration-300 opacity-0 pointer-events-none z-50 flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>

    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Back to Top Button
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Show/Hide Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
                backToTop.classList.add('opacity-100');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
                backToTop.classList.remove('opacity-100');
            }
        });

        // Smooth Scroll for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobileMenu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>
</html>