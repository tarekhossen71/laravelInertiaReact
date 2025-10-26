<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeTee | Luxury T-Shirts</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Vanilla Tilt -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <style>
        :root {
            --gold: #D4AF37;
            --charcoal: #2D2D2D;
            --off-white: #F5F5F5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: var(--off-white);
            overflow-x: hidden;
        }

        .luxury-font {
            font-family: 'Playfair Display', serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        }

        .gold-gradient {
            background: linear-gradient(135deg, #D4AF37 0%, #F4D03F 100%);
        }

        .gold-text {
            color: var(--gold);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -15px); }
            100% { transform: translate(0, -0px); }
        }

        .particles-js-canvas-el {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 10;
        }

        .t-shirt-3d {
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }

        .t-shirt-3d:hover {
            transform: rotateY(10deg) rotateX(5deg);
        }

        .swiper-pagination-bullet {
            background: var(--off-white);
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            background: var(--gold);
            opacity: 1;
        }

        .swiper-button-next, .swiper-button-prev {
            color: var(--gold);
        }

        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
        }

        .glow-border {
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 -5px 20px rgba(212, 175, 55, 0.1);
        }
    </style>
</head>
<body class="gradient-bg">
    <!-- Header -->
    <header class="fixed w-full z-50 transition-all duration-500" id="header">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="luxury-font text-2xl font-bold gold-text">LuxeTee</div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-white hover:gold-text transition-colors duration-300">Home</a>
                    <a href="#" class="text-white hover:gold-text transition-colors duration-300">Shop</a>
                    <a href="#" class="text-white hover:gold-text transition-colors duration-300">Collection</a>
                    <a href="#" class="text-white hover:gold-text transition-colors duration-300">About</a>
                    <a href="#" class="text-white hover:gold-text transition-colors duration-300">Contact</a>
                </nav>

                <!-- Buy Now Button -->
                <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold hover:shadow-lg hover:shadow-yellow-500/30 transition-all duration-300">
                    Buy Now
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Particles Background -->
        <div id="particles-js" class="absolute inset-0"></div>

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/40"></div>

        <!-- Hero Content -->
        <div class="hero-content container mx-auto px-6 text-center z-10">
            <div class="max-w-4xl mx-auto">
                <h1 class="luxury-font text-5xl md:text-7xl font-bold mb-6" data-aos="fade-up">
                    Luxury <span class="gold-text">Redefined</span>
                </h1>
                <p class="text-xl md:text-2xl mb-10 text-gray-300" data-aos="fade-up" data-aos-delay="200">
                    Handcrafted from premium cotton. Designed for comfort, made for impact.
                </p>
                <div class="flex flex-col md:flex-row justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                    <button class="gold-gradient text-black px-8 py-3 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-yellow-500/30 transition-all duration-300">
                        Explore Collection
                    </button>
                    <button class="border-2 border-gold-500 text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-gold-500/10 transition-all duration-300">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Floating T-shirt -->
        <div class="absolute bottom-20 right-10 md:right-20 w-64 md:w-80" data-aos="fade-left" data-aos-delay="600">
            <div class="t-shirt-3d floating">
                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80"
                     alt="Luxury T-Shirt" class="rounded-lg shadow-2xl">
            </div>
        </div>

        <!-- Floating Tags -->
        <div class="absolute top-20 left-10 glass-effect px-4 py-2 rounded-full floating" data-aos="fade-right">
            <span class="gold-text font-medium">100% Organic Cotton</span>
        </div>
        <div class="absolute bottom-40 left-5 glass-effect px-4 py-2 rounded-full floating" data-aos="fade-right" data-aos-delay="200">
            <span class="gold-text font-medium">Ultra Soft Fit</span>
        </div>
    </section>

    <!-- Product Variants Slider -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="luxury-font text-4xl md:text-5xl font-bold mb-4">Our <span class="gold-text">Collection</span></h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Discover our premium T-shirt variants, crafted with attention to detail and luxurious comfort.</p>
            </div>

            <!-- Swiper Slider -->
            <div class="swiper mySwiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-900 rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gold-500/10">
                            <div class="h-80 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80"
                                     alt="Classic Black Tee" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Classic Black Tee</h3>
                                <p class="text-gray-400 mb-4">Premium cotton with a perfect fit for everyday luxury.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl gold-text font-bold">$49.99</span>
                                    <button class="bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-900 rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gold-500/10">
                            <div class="h-80 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                     alt="Navy Premium Tee" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Navy Premium Tee</h3>
                                <p class="text-gray-400 mb-4">Deep navy color with exceptional comfort and durability.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl gold-text font-bold">$54.99</span>
                                    <button class="bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-900 rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gold-500/10">
                            <div class="h-80 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1615&q=80"
                                     alt="White Luxury Tee" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">White Luxury Tee</h3>
                                <p class="text-gray-400 mb-4">Crisp white tee with superior fabric and elegant design.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl gold-text font-bold">$49.99</span>
                                    <button class="bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-900 rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gold-500/10">
                            <div class="h-80 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1586790170083-2f9ceadc732d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                     alt="Maroon Elegance Tee" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Maroon Elegance Tee</h3>
                                <p class="text-gray-400 mb-4">Rich maroon color with a soft, breathable fabric.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl gold-text font-bold">$52.99</span>
                                    <button class="bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-900 rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gold-500/10">
                            <div class="h-80 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                     alt="Olive Comfort Tee" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Olive Comfort Tee</h3>
                                <p class="text-gray-400 mb-4">Earth-toned olive with exceptional softness and fit.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl gold-text font-bold">$54.99</span>
                                    <button class="bg-white text-black px-4 py-2 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-10"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- 3D Showcase Section -->
    <section class="py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="luxury-font text-4xl md:text-5xl font-bold mb-4">360° <span class="gold-text">Experience</span></h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Rotate and explore our premium T-shirt from every angle.</p>
            </div>

            <div class="max-w-4xl mx-auto" data-aos="zoom-in">
                <div class="bg-gray-800 rounded-2xl p-8 md:p-12 relative overflow-hidden">
                    <!-- 3D T-shirt Container -->
                    <div class="flex justify-center items-center h-96">
                        <div class="t-shirt-3d" id="t-shirt-3d">
                            <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1480&q=80"
                                 alt="3D T-shirt View" class="rounded-lg shadow-2xl max-h-80">
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="flex justify-center mt-8 space-x-4">
                        <button class="glass-effect px-6 py-2 rounded-lg gold-text font-medium" id="rotate-left">
                            ← Rotate Left
                        </button>
                        <button class="glass-effect px-6 py-2 rounded-lg gold-text font-medium" id="reset-view">
                            Reset View
                        </button>
                        <button class="glass-effect px-6 py-2 rounded-lg gold-text font-medium" id="rotate-right">
                            Rotate Right →
                        </button>
                    </div>

                    <!-- Color Toggle -->
                    <div class="flex justify-center mt-6">
                        <div class="glass-effect px-4 py-2 rounded-lg flex space-x-4">
                            <button class="color-toggle bg-black w-8 h-8 rounded-full border border-gray-600" data-color="black"></button>
                            <button class="color-toggle bg-white w-8 h-8 rounded-full border border-gray-600" data-color="white"></button>
                            <button class="color-toggle bg-blue-900 w-8 h-8 rounded-full border border-gray-600" data-color="navy"></button>
                            <button class="color-toggle bg-red-900 w-8 h-8 rounded-full border border-gray-600" data-color="maroon"></button>
                            <button class="color-toggle bg-green-900 w-8 h-8 rounded-full border border-gray-600" data-color="olive"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Luxury Highlights Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="luxury-font text-4xl md:text-5xl font-bold mb-4">Why <span class="gold-text">Choose Us</span></h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Experience the difference of premium craftsmanship and attention to detail.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-gray-900 rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">100% Organic Cotton</h3>
                    <p class="text-gray-400">Our T-shirts are crafted from the finest organic cotton, ensuring comfort and sustainability.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-gray-900 rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Perfect Fit Technology</h3>
                    <p class="text-gray-400">Engineered with precision to provide the perfect fit for all body types and styles.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-gray-900 rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Sustainable Production</h3>
                    <p class="text-gray-400">We prioritize eco-friendly practices throughout our manufacturing process.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-gray-900 rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Free Worldwide Shipping</h3>
                    <p class="text-gray-400">Enjoy complimentary shipping on all orders, delivered right to your doorstep.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Carousel -->
    <section class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="luxury-font text-4xl md:text-5xl font-bold mb-4">What Our <span class="gold-text">Customers Say</span></h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Hear from those who have experienced the LuxeTee difference.</p>
            </div>

            <!-- Swiper Reviews -->
            <div class="swiper reviewSwiper max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    <!-- Review 1 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-800 rounded-2xl p-8 md:p-12 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex gold-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xl italic mb-8">"The comfort and quality of LuxeTee shirts are unmatched. I've never worn anything so soft and perfectly fitting. Worth every penny!"</p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                                         alt="Sarah Johnson" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">Sarah Johnson</h4>
                                    <p class="text-gray-400 text-sm">Fashion Blogger</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-800 rounded-2xl p-8 md:p-12 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex gold-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xl italic mb-8">"I've purchased from many premium brands, but LuxeTee stands out. The attention to detail and fabric quality is exceptional. My new go-to brand!"</p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                         alt="Michael Chen" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">Michael Chen</h4>
                                    <p class="text-gray-400 text-sm">Business Executive</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="swiper-slide">
                        <div class="bg-gray-800 rounded-2xl p-8 md:p-12 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex gold-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xl italic mb-8">"The sustainable approach combined with incredible comfort makes LuxeTee my favorite brand. I've recommended it to all my friends!"</p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                         alt="Emma Rodriguez" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold">Emma Rodriguez</h4>
                                    <p class="text-gray-400 text-sm">Sustainability Advocate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-10"></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative overflow-hidden">
        <!-- Particles Background -->
        <div id="particles-js-2" class="absolute inset-0"></div>

        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="luxury-font text-4xl md:text-5xl font-bold mb-6">Join the <span class="gold-text">Elite Comfort Club</span></h2>
                <p class="text-xl text-gray-300 mb-10">Subscribe to receive exclusive offers, early access to new collections, and style inspiration.</p>

                <div class="flex flex-col md:flex-row justify-center gap-4 max-w-2xl mx-auto">
                    <input type="email" placeholder="Your email address" class="bg-gray-800 text-white px-6 py-4 rounded-full flex-grow focus:outline-none focus:ring-2 focus:ring-gold-500">
                    <button class="gold-gradient text-black px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-yellow-500/30 transition-all duration-300">
                        Subscribe Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black pt-16 pb-8 glow-border">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Logo & Description -->
                <div>
                    <div class="luxury-font text-2xl font-bold gold-text mb-4">LuxeTee</div>
                    <p class="text-gray-400 mb-6">Redefining luxury in everyday wear with premium materials and exceptional craftsmanship.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shop</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Collection</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Customer Service</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Size Guide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>123 Luxury Avenue</li>
                        <li>New York, NY 10001</li>
                        <li>info@luxetee.com</li>
                        <li>+1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-800 text-center text-gray-500">
                <p>&copy; 2023 LuxeTee. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Initialize Swiper for product variants
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // Initialize Swiper for reviews
        const reviewSwiper = new Swiper('.reviewSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        // Initialize Vanilla Tilt for 3D effect
        if (document.querySelector('.t-shirt-3d')) {
            VanillaTilt.init(document.querySelectorAll('.t-shirt-3d'), {
                max: 15,
                speed: 400,
                glare: true,
                'max-glare': 0.2,
            });
        }

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('glass-effect', 'bg-black/80');
                header.classList.remove('bg-transparent');
            } else {
                header.classList.remove('glass-effect', 'bg-black/80');
                header.classList.add('bg-transparent');
            }
        });

        // 3D T-shirt rotation controls
        document.getElementById('rotate-left').addEventListener('click', function() {
            const tshirt = document.getElementById('t-shirt-3d');
            tshirt.style.transform = 'rotateY(-15deg) rotateX(5deg)';
        });

        document.getElementById('rotate-right').addEventListener('click', function() {
            const tshirt = document.getElementById('t-shirt-3d');
            tshirt.style.transform = 'rotateY(15deg) rotateX(5deg)';
        });

        document.getElementById('reset-view').addEventListener('click', function() {
            const tshirt = document.getElementById('t-shirt-3d');
            tshirt.style.transform = 'rotateY(0deg) rotateX(0deg)';
        });

        // Color toggle for 3D T-shirt
        document.querySelectorAll('.color-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const color = this.getAttribute('data-color');
                const tshirtImg = document.querySelector('#t-shirt-3d img');

                // In a real implementation, you would swap the image source based on color
                // For this demo, we'll just change the filter
                switch(color) {
                    case 'black':
                        tshirtImg.style.filter = 'brightness(0.7)';
                        break;
                    case 'white':
                        tshirtImg.style.filter = 'brightness(1.2) contrast(1.1)';
                        break;
                    case 'navy':
                        tshirtImg.style.filter = 'hue-rotate(200deg) brightness(0.8)';
                        break;
                    case 'maroon':
                        tshirtImg.style.filter = 'hue-rotate(300deg) brightness(0.8)';
                        break;
                    case 'olive':
                        tshirtImg.style.filter = 'hue-rotate(70deg) brightness(0.9)';
                        break;
                    default:
                        tshirtImg.style.filter = 'none';
                }
            });
        });

        // Initialize Particles.js for hero section
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#D4AF37"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    }
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#D4AF37",
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "grab"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.5
                        }
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            retina_detect: true
        });

        // Initialize Particles.js for CTA section
        particlesJS('particles-js-2', {
            particles: {
                number: {
                    value: 60,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#D4AF37"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: 0.3,
                    random: true
                },
                size: {
                    value: 4,
                    random: true
                },
                line_linked: {
                    enable: false
                },
                move: {
                    enable: true,
                    speed: 0.5,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "repulse"
                    },
                    resize: true
                }
            },
            retina_detect: true
        });

        // GSAP animations
        gsap.from('.luxury-font', {
            duration: 1.5,
            y: 100,
            opacity: 0,
            ease: 'power3.out',
            stagger: 0.2
        });
    </script>
</body>
</html>
