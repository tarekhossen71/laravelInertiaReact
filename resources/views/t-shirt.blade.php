<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE THREADS - Premium T-Shirt Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }
        .font-display { font-family: 'Playfair Display', serif; }
        .gold-text { color: #D4AF37; }
        .gold-gradient { background: linear-gradient(135deg, #D4AF37 0%, #FFD700 100%); }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        #particles-js { position: absolute; width: 100%; height: 100%; z-index: 1; }
        .tilt-card { transform-style: preserve-3d; }
        .hero-tshirt { transition: transform 0.6s ease; }
        .hero-tshirt:hover { transform: scale(1.05) rotate(3deg); }
        .glow-btn {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
            transition: all 0.3s ease;
        }
        .glow-btn:hover {
            box-shadow: 0 0 40px rgba(212, 175, 55, 0.7);
            transform: translateY(-2px);
        }
        .variant-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .variant-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 60px rgba(212, 175, 55, 0.3);
        }
        .floating { animation: float 3s ease-in-out infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .scroll-fade { opacity: 0.95; }
        header.scrolled {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.5);
        }
        .star-rating { color: #D4AF37; }
    </style>
</head>
<body class="bg-black text-white">

<!-- Header -->
<header class="fixed w-full top-0 z-50 transition-all duration-300 py-4">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="text-3xl font-display font-bold gold-text">LUXE THREADS</div>
        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="#home" class="hover:text-yellow-500 transition">Home</a>
            <a href="#shop" class="hover:text-yellow-500 transition">Shop</a>
            <a href="#collection" class="hover:text-yellow-500 transition">Collection</a>
            <a href="#about" class="hover:text-yellow-500 transition">About</a>
            <a href="#contact" class="hover:text-yellow-500 transition">Contact</a>
        </nav>
        <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold glow-btn">Buy Now</button>
    </div>
</header>

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div id="particles-js"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black z-10"></div>

    <div class="container mx-auto px-6 relative z-20 grid md:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right" data-aos-duration="1000">
            <div class="inline-block px-4 py-2 glass-effect rounded-full text-sm mb-6 floating">
                <span class="gold-text">✨</span> New Collection 2025
            </div>
            <h1 class="text-5xl md:text-7xl font-display font-bold mb-6 leading-tight">
                Luxury Redefined<br/>
                <span class="gold-text">The Ultimate T-Shirt</span><br/>
                Experience
            </h1>
            <p class="text-gray-400 text-lg mb-8 max-w-xl">
                Handcrafted from premium cotton. Designed for comfort, made for impact. Experience the perfect blend of style and sustainability.
            </p>
            <div class="flex flex-wrap gap-4">
                <button class="gold-gradient text-black px-8 py-4 rounded-full font-semibold glow-btn text-lg">
                    Explore Collection
                </button>
                <button class="glass-effect px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition text-lg">
                    Buy Now
                </button>
            </div>

            <div class="mt-12 flex gap-8 text-sm">
                <div class="floating" style="animation-delay: 0.2s">
                    <div class="gold-text font-bold text-2xl">100%</div>
                    <div class="text-gray-400">Organic Cotton</div>
                </div>
                <div class="floating" style="animation-delay: 0.4s">
                    <div class="gold-text font-bold text-2xl">5000+</div>
                    <div class="text-gray-400">Happy Customers</div>
                </div>
                <div class="floating" style="animation-delay: 0.6s">
                    <div class="gold-text font-bold text-2xl">★ 4.9</div>
                    <div class="text-gray-400">Average Rating</div>
                </div>
            </div>
        </div>

        <div class="relative" data-aos="fade-left" data-aos-duration="1000">
            <div class="hero-tshirt tilt-card">
                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=800&q=80"
                     alt="Premium Black T-Shirt"
                     class="w-full max-w-md mx-auto drop-shadow-2xl rounded-lg">
            </div>
            <div class="absolute top-10 -left-10 glass-effect px-4 py-2 rounded-full text-sm floating">
                <span class="gold-text">✓</span> Ultra Soft Fit
            </div>
            <div class="absolute bottom-20 -right-10 glass-effect px-4 py-2 rounded-full text-sm floating" style="animation-delay: 0.5s">
                <span class="gold-text">✓</span> 100% Organic
            </div>
        </div>
    </div>
</section>

<!-- Product Variants Slider -->
<section id="collection" class="py-24 bg-gradient-to-b from-black to-gray-900">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-display font-bold mb-4">
                Premium <span class="gold-text">Collection</span>
            </h2>
            <p class="text-gray-400 text-lg">Discover our range of luxury T-shirts crafted for perfection</p>
        </div>

        <div class="swiper variantsSwiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper pb-12">
                <!-- Variant Card 1 -->
                <div class="swiper-slide">
                    <div class="variant-card glass-effect rounded-2xl p-6 h-full">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&q=80"
                                 alt="Classic Black T-Shirt"
                                 class="w-full h-64 object-cover">
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Classic Black</h3>
                        <p class="text-gray-400 text-sm mb-4">Premium cotton blend, timeless design</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold gold-text">$89</span>
                            <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold text-sm hover:scale-105 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Variant Card 2 -->
                <div class="swiper-slide">
                    <div class="variant-card glass-effect rounded-2xl p-6 h-full">
                        <div class="bg-gradient-to-br from-gray-100 to-white rounded-xl mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=600&q=80"
                                 alt="Pure White T-Shirt"
                                 class="w-full h-64 object-cover">
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Pure White</h3>
                        <p class="text-gray-400 text-sm mb-4">Crisp white, perfect for any occasion</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold gold-text">$89</span>
                            <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold text-sm hover:scale-105 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Variant Card 3 -->
                <div class="swiper-slide">
                    <div class="variant-card glass-effect rounded-2xl p-6 h-full">
                        <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=600&q=80"
                                 alt="Navy Elite T-Shirt"
                                 class="w-full h-64 object-cover">
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Navy Elite</h3>
                        <p class="text-gray-400 text-sm mb-4">Deep navy, sophisticated charm</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold gold-text">$89</span>
                            <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold text-sm hover:scale-105 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Variant Card 4 -->
                <div class="swiper-slide">
                    <div class="variant-card glass-effect rounded-2xl p-6 h-full">
                        <div class="bg-gradient-to-br from-red-900 to-red-800 rounded-xl mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1562157873-818bc0726f68?w=600&q=80"
                                 alt="Maroon Luxe T-Shirt"
                                 class="w-full h-64 object-cover">
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Maroon Luxe</h3>
                        <p class="text-gray-400 text-sm mb-4">Rich maroon, bold statement</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold gold-text">$89</span>
                            <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold text-sm hover:scale-105 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Variant Card 5 -->
                <div class="swiper-slide">
                    <div class="variant-card glass-effect rounded-2xl p-6 h-full">
                        <div class="bg-gradient-to-br from-green-900 to-green-800 rounded-xl mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&q=80"
                                 alt="Olive Green T-Shirt"
                                 class="w-full h-64 object-cover">
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Olive Green</h3>
                        <p class="text-gray-400 text-sm mb-4">Earthy olive, natural elegance</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold gold-text">$89</span>
                            <button class="gold-gradient text-black px-6 py-2 rounded-full font-semibold text-sm hover:scale-105 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- 3D Showcase Section -->
<section class="py-24 bg-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-yellow-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-display font-bold mb-4">
                360° <span class="gold-text">Experience</span>
            </h2>
            <p class="text-gray-400 text-lg">Rotate and explore every detail</p>
        </div>

        <div class="max-w-2xl mx-auto" data-aos="zoom-in">
            <div class="glass-effect rounded-3xl p-12 text-center">
                <div id="tshirt3d" class="tilt-card mx-auto overflow-hidden rounded-2xl" style="width: 400px; height: 500px;">
                    <img id="tshirt3dImg" src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=800&q=80"
                         alt="3D Rotatable T-Shirt"
                         class="w-full h-full object-cover">
                </div>
                <p class="mt-8 text-gray-400">Drag to rotate • Hover to interact</p>
                <div class="mt-6 flex justify-center gap-4">
                    <button class="glass-effect px-6 py-3 rounded-full hover:bg-white/10 transition" onclick="changeColor('https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=800&q=80')">Dark</button>
                    <button class="glass-effect px-6 py-3 rounded-full hover:bg-white/10 transition" onclick="changeColor('https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=800&q=80')">Light</button>
                    <button class="glass-effect px-6 py-3 rounded-full hover:bg-white/10 transition" onclick="changeColor('https://images.unsplash.com/photo-1622445275463-afa2ab738c34?w=800&q=80')">Navy</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Luxury Highlights -->
<section class="py-24 bg-gradient-to-b from-black to-gray-900">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="w-20 h-20 mx-auto mb-6 glass-effect rounded-full flex items-center justify-center text-4xl">🌿</div>
                <h3 class="text-xl font-semibold mb-3 gold-text">100% Organic Cotton</h3>
                <p class="text-gray-400">Sustainably sourced, naturally soft</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 mx-auto mb-6 glass-effect rounded-full flex items-center justify-center text-4xl">✨</div>
                <h3 class="text-xl font-semibold mb-3 gold-text">Perfect Fit Technology</h3>
                <p class="text-gray-400">Engineered for comfort and style</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 mx-auto mb-6 glass-effect rounded-full flex items-center justify-center text-4xl">♻️</div>
                <h3 class="text-xl font-semibold mb-3 gold-text">Sustainable Production</h3>
                <p class="text-gray-400">Eco-friendly manufacturing process</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 mx-auto mb-6 glass-effect rounded-full flex items-center justify-center text-4xl">🚚</div>
                <h3 class="text-xl font-semibold mb-3 gold-text">Free Shipping</h3>
                <p class="text-gray-400">Worldwide delivery, no extra cost</p>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews -->
<section class="py-24 bg-black">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-display font-bold mb-4">
                What Our <span class="gold-text">Customers Say</span>
            </h2>
            <p class="text-gray-400 text-lg">Join thousands of satisfied customers</p>
        </div>

        <div class="swiper reviewsSwiper max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="glass-effect rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-yellow-600 to-yellow-800"></div>
                        <div class="star-rating mb-4 text-xl">★★★★★</div>
                        <p class="text-lg mb-4 italic">"Absolutely love this T-shirt! The quality is exceptional and the fit is perfect. Worth every penny!"</p>
                        <p class="font-semibold gold-text">Sarah Johnson</p>
                        <p class="text-gray-400 text-sm">New York, USA</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="glass-effect rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-blue-600 to-blue-800"></div>
                        <div class="star-rating mb-4 text-xl">★★★★★</div>
                        <p class="text-lg mb-4 italic">"The softest T-shirt I've ever owned. The luxury quality really shows through. Highly recommended!"</p>
                        <p class="font-semibold gold-text">Michael Chen</p>
                        <p class="text-gray-400 text-sm">London, UK</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="glass-effect rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-purple-600 to-purple-800"></div>
                        <div class="star-rating mb-4 text-xl">★★★★★</div>
                        <p class="text-lg mb-4 italic">"Premium quality meets sustainable fashion. I've bought three already. Can't get enough!"</p>
                        <p class="font-semibold gold-text">Emma Rodriguez</p>
                        <p class="text-gray-400 text-sm">Barcelona, Spain</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-gray-900 via-black to-gray-900 relative overflow-hidden">
    <div id="particles-cta" class="absolute inset-0"></div>
    <div class="container mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
        <h2 class="text-5xl md:text-6xl font-display font-bold mb-6">
            Join the Elite <span class="gold-text">Comfort Club</span>
        </h2>
        <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto">
            Subscribe to get exclusive offers, early access to new collections, and style tips
        </p>
        <div class="max-w-md mx-auto flex gap-4">
            <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 rounded-full glass-effect focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <button class="gold-gradient text-black px-8 py-4 rounded-full font-semibold glow-btn whitespace-nowrap">Subscribe</button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-black border-t border-yellow-900/30 py-12">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="text-3xl font-display font-bold gold-text mb-4">LUXE THREADS</div>
                <p class="text-gray-400 text-sm">Redefining luxury, one T-shirt at a time.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4 gold-text">Quick Links</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="#" class="hover:text-yellow-500 transition">About Us</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">Collections</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">Sustainability</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4 gold-text">Customer Care</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="#" class="hover:text-yellow-500 transition">Shipping Info</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">Returns</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">Size Guide</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4 gold-text">Follow Us</h4>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 glass-effect rounded-full flex items-center justify-center hover:bg-yellow-500/20 transition">
                        <span>📘</span>
                    </a>
                    <a href="#" class="w-10 h-10 glass-effect rounded-full flex items-center justify-center hover:bg-yellow-500/20 transition">
                        <span>📷</span>
                    </a>
                    <a href="#" class="w-10 h-10 glass-effect rounded-full flex items-center justify-center hover:bg-yellow-500/20 transition">
                        <span>🐦</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; 2025 LUXE THREADS. All rights reserved. Crafted with excellence.</p>
        </div>
    </div>
</footer>

<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Particles.js configuration for hero
    particlesJS('particles-js', {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: '#D4AF37' },
            shape: { type: 'circle' },
            opacity: { value: 0.3, random: true },
            size: { value: 3, random: true },
            line_linked: { enable: true, distance: 150, color: '#D4AF37', opacity: 0.2, width: 1 },
            move: { enable: true, speed: 2, direction: 'none', random: true, out_mode: 'out' }
        },
        interactivity: {
            detect_on: 'canvas',
            events: { onhover: { enable: true, mode: 'repulse' }, resize: true },
            modes: { repulse: { distance: 100, duration: 0.4 } }
        }
    });

    // Particles for CTA section
    particlesJS('particles-cta', {
        particles: {
            number: { value: 50, density: { enable: true, value_area: 800 } },
            color: { value: '#FFD700' },
            shape: { type: 'circle' },
            opacity: { value: 0.2, random: true },
            size: { value: 2, random: true },
            move: { enable: true, speed: 1, direction: 'top', out_mode: 'out' }
        }
    });

    // Header scroll effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
    });

    // Swiper for Product Variants
    const variantsSwiper = new Swiper('.variantsSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: { delay: 3000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 }
        }
    });

    // Swiper for Reviews
    const reviewsSwiper = new Swiper('.reviewsSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.reviewsSwiper .swiper-pagination', clickable: true },
        effect: 'fade',
        fadeEffect: { crossFade: true }
    });

    // Vanilla Tilt for 3D effect
    VanillaTilt.init(document.querySelectorAll('.tilt-card'), {
        max: 15,
        speed: 400,
        glare: true,
        'max-glare': 0.3
    });

    // GSAP Animations
    gsap.from('.hero-tshirt', {
        opacity: 0,
        scale: 0.8,
        rotation: -10,
        duration: 1.5,
        ease: 'elastic.out(1, 0.5)',
        delay: 0.5
    });

    // Smooth scroll for navigation
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({ scrollTop: target.offset().top - 80 }, 800);
        }
    });

    // 3D T-shirt color change function
    window.changeColor = function(imageUrl) {
        const img = document.getElementById('tshirt3dImg');

        gsap.to('#tshirt3d', {
            rotation: 360,
            duration: 1,
            ease: 'power2.inOut',
            onComplete: function() {
                img.src = imageUrl;
            }
        });
    };

    // Add to Cart animation
    $('.variant-card button').click(function() {
        const btn = $(this);
        const originalText = btn.text();

        gsap.to(btn, {
            scale: 0.95,
            duration: 0.1,
            onComplete: function() {
                btn.text('✓ Added!').addClass('bg-green-500');
                gsap.to(btn, { scale: 1, duration: 0.1 });

                setTimeout(() => {
                    btn.text(originalText).removeClass('bg-green-500');
                }, 2000);
            }
        });
    });

    // Parallax effect for floating badges
    $(window).scroll(function() {
        const scrolled = $(this).scrollTop();
        $('.floating').each(function() {
            const speed = $(this).data('speed') || 0.5;
            $(this).css('transform', `translateY(${scrolled * speed * 0.1}px)`);
        });
    });

    // Newsletter subscription
    $('footer form, section form').submit(function(e) {
        e.preventDefault();
        const email = $(this).find('input[type="email"]').val();
        const btn = $(this).find('button');
        const originalText = btn.text();

        btn.text('Subscribing...').prop('disabled', true);

        setTimeout(() => {
            btn.text('✓ Subscribed!').addClass('bg-green-500');
            $(this).find('input').val('');

            setTimeout(() => {
                btn.text(originalText).removeClass('bg-green-500').prop('disabled', false);
            }, 3000);
        }, 1500);
    });

    // Lazy load optimization
    document.addEventListener('DOMContentLoaded', function() {
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    });

    // Buy Now button actions
    $('.gold-gradient').click(function() {
        gsap.to(window, {
            scrollTo: '#collection',
            duration: 1,
            ease: 'power2.inOut'
        });
    });

    // Add entrance animation for variant cards
    gsap.from('.variant-card', {
        scrollTrigger: {
            trigger: '.variantsSwiper',
            start: 'top center'
        },
        y: 50,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1
    });

    // Mobile menu toggle (if needed)
    const mobileMenuBtn = `
        <button class="md:hidden text-2xl" id="mobileMenuBtn">☰</button>
    `;

    // Cursor glow effect
    $(document).mousemove(function(e) {
        $('.glow-btn').each(function() {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            if (x >= 0 && x <= rect.width && y >= 0 && y <= rect.height) {
                $(this).css('background-position', `${x}px ${y}px`);
            }
        });
    });

    // Console welcome message
    console.log('%c🌟 Welcome to LUXE THREADS 🌟', 'font-size: 20px; color: #D4AF37; font-weight: bold;');
    console.log('%cPremium T-Shirts | Luxury Redefined', 'font-size: 14px; color: #fff;');
</script>

</body>
</html>
