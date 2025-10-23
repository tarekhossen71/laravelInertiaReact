<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÉLÉGANCE by Maison Royale | Luxury Perfume</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cormorant Garamond', serif;
        }
        .gold-accent {
            color: #D4AF37;
        }
        .gold-bg {
            background-color: #D4AF37;
        }
        .gold-border {
            border-color: #D4AF37;
        }
    </style>
</head>
<body class="bg-[#fefefe] text-gray-800">
    <!-- Header / Navbar -->
    <header class="fixed w-full bg-white/90 backdrop-blur-sm z-50 shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold gold-accent">MAISON ROYALE</div>
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="hover:gold-accent transition-colors">Home</a>
                <a href="#notes" class="hover:gold-accent transition-colors">Notes</a>
                <a href="#features" class="hover:gold-accent transition-colors">Features</a>
                <a href="#reviews" class="hover:gold-accent transition-colors">Reviews</a>
                <a href="#purchase" class="gold-accent font-medium">Buy Now</a>
            </div>
            <button class="md:hidden text-xl">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="pt-24 pb-16 md:pt-32 md:pb-24 px-6">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">ÉLÉGANCE <span class="gold-accent">— An Ode to Timeless Luxury</span></h1>
                <p class="text-lg mb-8 max-w-lg">A sophisticated fragrance crafted with rare ingredients, embodying the essence of timeless elegance. Experience the perfect harmony of floral and woody notes that linger throughout the day.</p>
                <a href="#purchase" class="inline-block bg-[#D4AF37] text-white px-8 py-3 rounded-sm font-medium hover:bg-[#c19d2c] transition-colors">Discover Now</a>
            </div>
            <div class="md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-delay="200">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1590736969955-71a48df1a0a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                         alt="ÉLÉGANCE Perfume Bottle"
                         class="rounded-lg shadow-lg max-w-md w-full transform transition-transform duration-500 hover:scale-105">
                    <div class="absolute -bottom-4 -right-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-sm">Handcrafted in Grasse, France</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fragrance Notes Section -->
    <section id="notes" class="py-16 bg-[#fafafa] px-6">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">The Art of Scent</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Top Notes -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 rounded-full gold-bg flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-cloud text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Top Notes</h3>
                    <p class="mb-4">The first impression that lasts for 15-30 minutes</p>
                    <ul class="text-left space-y-2">
                        <li class="flex items-center"><i class="fas fa-leaf gold-accent mr-2"></i> Bergamot</li>
                        <li class="flex items-center"><i class="fas fa-lemon gold-accent mr-2"></i> Lemon Zest</li>
                        <li class="flex items-center"><i class="fas fa-seedling gold-accent mr-2"></i> Green Accord</li>
                    </ul>
                </div>

                <!-- Heart Notes -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 rounded-full gold-bg flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Heart Notes</h3>
                    <p class="mb-4">The core character that emerges after 30 minutes</p>
                    <ul class="text-left space-y-2">
                        <li class="flex items-center"><i class="fas fa-flower gold-accent mr-2"></i> Jasmine Grandiflorum</li>
                        <li class="flex items-center"><i class="fas fa-rose gold-accent mr-2"></i> Rose de Mai</li>
                        <li class="flex items-center"><i class="fas fa-spa gold-accent mr-2"></i> Orris Butter</li>
                    </ul>
                </div>

                <!-- Base Notes -->
                <div class="bg-white p-8 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 rounded-full gold-bg flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mountain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Base Notes</h3>
                    <p class="mb-4">The lasting impression that remains for hours</p>
                    <ul class="text-left space-y-2">
                        <li class="flex items-center"><i class="fas fa-tree gold-accent mr-2"></i> Sandalwood</li>
                        <li class="flex items-center"><i class="fas fa-gem gold-accent mr-2"></i> Amber</li>
                        <li class="flex items-center"><i class="fas fa-feather-alt gold-accent mr-2"></i> White Musk</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Features -->
    <section id="features" class="py-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Exquisite Craftsmanship</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-hand-sparkles text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Handcrafted Excellence</h3>
                    <p>Each bottle is meticulously crafted by master perfumers with decades of experience in Grasse, France.</p>
                </div>

                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-gem text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Rare Ingredients</h3>
                    <p>Sourced from the world's most exclusive suppliers, using only the finest natural essences and extracts.</p>
                </div>

                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Long-Lasting</h3>
                    <p>Our unique formulation ensures the scent remains vibrant and noticeable for 12+ hours after application.</p>
                </div>

                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-recycle text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Sustainable Sourcing</h3>
                    <p>Committed to ethical and environmentally responsible practices throughout our supply chain.</p>
                </div>

                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Award-Winning</h3>
                    <p>Recognized with prestigious industry awards for innovation and excellence in perfumery.</p>
                </div>

                <div class="flex flex-col items-center text-center p-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="w-14 h-14 rounded-full gold-bg flex items-center justify-center mb-4">
                        <i class="fas fa-gift text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Luxury Packaging</h3>
                    <p>Presented in an elegant, custom-designed box that reflects the sophistication within.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="reviews" class="py-16 bg-[#fafafa] px-6">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12" data-aos="fade-up">Testimonials</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                             alt="Sophia Laurent"
                             class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold">Sophia Laurent</h4>
                            <div class="gold-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="italic">"ÉLÉGANCE is simply breathtaking. The floral notes are sophisticated without being overpowering, and the longevity is impressive. I receive compliments every time I wear it."</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                             alt="Alexander Dubois"
                             class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold">Alexander Dubois</h4>
                            <div class="gold-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="italic">"As a collector of fine fragrances, I can confidently say ÉLÉGANCE stands apart. The complexity of notes and the way they evolve throughout the day is masterful. A true work of art."</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-sm" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                             alt="Isabelle Moreau"
                             class="w-12 h-12 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold">Isabelle Moreau</h4>
                            <div class="gold-accent">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="italic">"This perfume captures elegance in a bottle. The sandalwood and amber base notes create a warm, sophisticated aura that's perfect for evening events. Worth every penny."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action / Purchase -->
    <section id="purchase" class="py-16 px-6">
        <div class="container mx-auto">
            <div class="bg-gradient-to-r from-[#f9f5eb] to-[#fefefe] rounded-2xl p-8 md:p-12 shadow-sm">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0" data-aos="fade-right">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Experience Timeless Elegance</h2>
                        <p class="text-lg mb-6 max-w-lg">Indulge in the luxury of ÉLÉGANCE and transform your daily routine into an exquisite sensory experience.</p>
                        <div class="flex items-center mb-6">
                            <span class="text-3xl font-bold gold-accent mr-4">$189</span>
                            <span class="text-sm text-gray-500">100ml Eau de Parfum</span>
                        </div>
                        <a href="#" class="inline-block gold-bg text-white px-8 py-3 rounded-sm font-medium hover:bg-[#c19d2c] transition-colors mb-4">Buy Now</a>
                        <p class="text-sm text-gray-600">Free worldwide shipping • 30-day return policy</p>
                    </div>
                    <div class="md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-delay="200">
                        <img src="https://images.unsplash.com/photo-1615634376655-8613c81b0b68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                             alt="ÉLÉGANCE Perfume Bottle"
                             class="rounded-lg shadow-lg max-w-xs w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#f5f5f5] py-12 px-6">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="text-2xl font-bold gold-accent mb-4">MAISON ROYALE</div>
                    <p class="text-sm text-gray-600 max-w-md">Crafting exceptional fragrances since 1925. Each creation tells a story of elegance, sophistication, and timeless beauty.</p>
                </div>
                <div class="flex space-x-6 mb-6 md:mb-0">
                    <a href="#" class="text-gray-600 hover:gold-accent transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:gold-accent transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:gold-accent transition-colors">
                        <i class="fab fa-pinterest text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:gold-accent transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
                <div class="text-center md:text-right">
                    <div class="flex space-x-4 mb-4 justify-center md:justify-end">
                        <a href="#" class="text-sm text-gray-600 hover:gold-accent transition-colors">Privacy Policy</a>
                        <a href="#" class="text-sm text-gray-600 hover:gold-accent transition-colors">Terms of Service</a>
                        <a href="#" class="text-sm text-gray-600 hover:gold-accent transition-colors">Contact</a>
                    </div>
                    <p class="text-sm text-gray-600">© 2023 Maison Royale. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
