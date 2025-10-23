<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉLÉGANCE by Maison Royale - Timeless Luxury Perfume</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#D4AF37',
                        cream: '#FAF9F6',
                        darkgold: '#B8941F'
                    },
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'serif'],
                        sans: ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #FAF9F6;
        }

        .hero-image {
            transition: transform 0.6s ease;
        }

        .hero-image:hover {
            transform: scale(1.05);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.2);
        }

        .btn-gold {
            background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.4);
        }

        .note-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .note-card:hover {
            border-color: #D4AF37;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.15);
        }

        .testimonial-card {
            background: white;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body class="bg-cream">

    <!-- Header / Navbar -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-serif font-bold text-gray-900">
                MAISON <span class="text-gold">ROYALE</span>
            </div>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="text-gray-700 hover:text-gold transition">Home</a>
                <a href="#notes" class="text-gray-700 hover:text-gold transition">Notes</a>
                <a href="#features" class="text-gray-700 hover:text-gold transition">Features</a>
                <a href="#reviews" class="text-gray-700 hover:text-gold transition">Reviews</a>
                <a href="#buy" class="btn-gold text-white px-6 py-2 rounded-full font-medium">Buy Now</a>
            </div>
            <button class="md:hidden text-gray-700">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-32 pb-20 px-4">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <p class="text-gold font-sans font-medium tracking-widest mb-4">SIGNATURE FRAGRANCE</p>
                    <h1 class="font-serif text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                        ÉLÉGANCE
                    </h1>
                    <h2 class="font-serif text-2xl md:text-3xl text-gray-600 mb-6">
                        An Ode to Timeless Luxury
                    </h2>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">
                        Experience the pinnacle of olfactory artistry. ÉLÉGANCE is a masterfully crafted symphony of rare ingredients, capturing the essence of sophistication and refinement. Each note unfolds like a precious memory, leaving an unforgettable trail of elegance.
                    </p>
                    <a href="#buy" class="btn-gold text-white px-8 py-4 rounded-full font-medium text-lg inline-block">
                        Discover Now <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" class="flex justify-center">
                    <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?w=800&q=80"
                         alt="ÉLÉGANCE Perfume Bottle"
                         class="hero-image w-full max-w-md rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Fragrance Notes Section -->
    <section id="notes" class="py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    The Art of Scent
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    A harmonious composition of the finest ingredients, carefully selected from around the world
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Top Notes -->
                <div class="note-card bg-cream p-8 rounded-lg text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-leaf text-gold text-3xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-4">Top Notes</h3>
                    <p class="text-gold font-medium mb-3">Bergamot • Pink Pepper • Mandarin</p>
                    <p class="text-gray-600">
                        A sparkling introduction of citrus freshness with a subtle spicy warmth, creating an immediate sense of vitality and sophistication.
                    </p>
                </div>

                <!-- Heart Notes -->
                <div class="note-card bg-cream p-8 rounded-lg text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-spa text-gold text-3xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-4">Heart Notes</h3>
                    <p class="text-gold font-medium mb-3">Turkish Rose • Jasmine • Iris</p>
                    <p class="text-gray-600">
                        The luminous heart reveals delicate floral elegance, where precious blooms intertwine to create an intoxicating bouquet of romance.
                    </p>
                </div>

                <!-- Base Notes -->
                <div class="note-card bg-cream p-8 rounded-lg text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-gem text-gold text-3xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-4">Base Notes</h3>
                    <p class="text-gold font-medium mb-3">Sandalwood • Amber • Vanilla</p>
                    <p class="text-gray-600">
                        A rich, sensual foundation of precious woods and warm amber, leaving a lasting impression of pure luxury and refinement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Features Section -->
    <section id="features" class="py-20 px-4 bg-cream">
        <div class="container mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Crafted to Perfection
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Every detail reflects our commitment to excellence and uncompromising quality
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-hand-sparkles text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Handcrafted</h3>
                    <p class="text-gray-600">
                        Meticulously created by master perfumers with decades of experience, each bottle represents true artisanal craftsmanship.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-crown text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Rare Ingredients</h3>
                    <p class="text-gray-600">
                        Sourced from the most exclusive suppliers worldwide, featuring precious essences found in only the finest fragrances.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Long-Lasting</h3>
                    <p class="text-gray-600">
                        Extraordinary longevity with 12+ hour wear time, ensuring your signature scent accompanies you throughout the day.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-award text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Award-Winning</h3>
                    <p class="text-gray-600">
                        Recognized by international fragrance experts and honored with prestigious industry accolades for excellence.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="500">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Sustainable</h3>
                    <p class="text-gray-600">
                        Ethically sourced ingredients and eco-conscious packaging, reflecting our commitment to environmental responsibility.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card bg-white p-8 rounded-lg shadow-lg" data-aos="zoom-in" data-aos-delay="600">
                    <div class="w-16 h-16 bg-gold/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-certificate text-gold text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-3">Authentic</h3>
                    <p class="text-gray-600">
                        Each bottle is numbered and certified, guaranteeing authenticity and exclusivity for discerning collectors.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="reviews" class="py-20 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    What Connoisseurs Say
                </h2>
                <p class="text-gray-600 text-lg">
                    Trusted by fragrance enthusiasts worldwide
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="testimonial-card p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80"
                             alt="Reviewer"
                             class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-bold text-gray-900">Sophie Laurent</h4>
                            <p class="text-sm text-gray-600">Fashion Editor</p>
                        </div>
                    </div>
                    <div class="text-gold mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic">
                        "Absolutely divine! ÉLÉGANCE has become my signature scent. The complexity and longevity are unmatched. I receive compliments everywhere I go."
                    </p>
                </div>

                <!-- Review 2 -->
                <div class="testimonial-card p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&q=80"
                             alt="Reviewer"
                             class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-bold text-gray-900">Marcus Chen</h4>
                            <p class="text-sm text-gray-600">Luxury Consultant</p>
                        </div>
                    </div>
                    <div class="text-gold mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic">
                        "A masterpiece in a bottle. The attention to detail is extraordinary. This is luxury perfumery at its finest—sophisticated yet timeless."
                    </p>
                </div>

                <!-- Review 3 -->
                <div class="testimonial-card p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&q=80"
                             alt="Reviewer"
                             class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-bold text-gray-900">Isabella Romano</h4>
                            <p class="text-sm text-gray-600">Perfume Blogger</p>
                        </div>
                    </div>
                    <div class="text-gold mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic">
                        "In my 15 years reviewing fragrances, ÉLÉGANCE stands out as truly exceptional. The sillage is perfect, and the dry down is simply stunning."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA / Purchase Section -->
    <section id="buy" class="py-20 px-4 bg-gradient-to-br from-gold/10 to-cream">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
                <h2 class="font-serif text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    Embrace Timeless Elegance
                </h2>
                <p class="text-gray-700 text-xl mb-8 leading-relaxed">
                    Join the select few who understand that true luxury is not just worn—it's experienced.
                    ÉLÉGANCE is more than a fragrance; it's a statement of refined taste.
                </p>

                <div class="bg-white rounded-2xl shadow-2xl p-10 inline-block mb-8">
                    <div class="flex items-center justify-center gap-8 flex-wrap">
                        <img src="https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=300&q=80"
                             alt="ÉLÉGANCE Bottle"
                             class="w-48 h-48 object-cover rounded-lg shadow-lg">
                        <div class="text-left">
                            <h3 class="font-serif text-3xl font-bold text-gray-900 mb-2">ÉLÉGANCE</h3>
                            <p class="text-gray-600 mb-4">Eau de Parfum • 100ml</p>
                            <p class="text-4xl font-bold text-gold mb-6">$295</p>
                            <a href="#" class="btn-gold text-white px-10 py-4 rounded-full font-medium text-lg inline-block">
                                <i class="fas fa-shopping-bag mr-2"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                </div>

                <p class="text-gray-600 text-sm">
                    <i class="fas fa-shipping-fast text-gold mr-2"></i> Free worldwide shipping on all orders
                    <span class="mx-3">•</span>
                    <i class="fas fa-shield-alt text-gold mr-2"></i> 30-day satisfaction guarantee
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-serif text-2xl font-bold mb-4">
                        MAISON <span class="text-gold">ROYALE</span>
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Crafting timeless fragrances since 1895. Where tradition meets luxury.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-gold transition">About Us</a></li>
                        <li><a href="#" class="hover:text-gold transition">Our Story</a></li>
                        <li><a href="#" class="hover:text-gold transition">Collections</a></li>
                        <li><a href="#" class="hover:text-gold transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Customer Care</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-gold transition">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-gold transition">Returns</a></li>
                        <li><a href="#" class="hover:text-gold transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-gold transition">Terms of Service</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 bg-gold/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gold/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gold/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    <p class="text-sm text-gray-400">
                        Newsletter: Stay updated with our latest releases
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 Maison Royale. All rights reserved. | Crafted with passion for perfection.</p>
            </div>
        </div>
    </footer>

    <!-- AOS Animation Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>

</body>
</html>
