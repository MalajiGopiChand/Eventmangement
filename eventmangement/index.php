<?php include_once './includes/header.php'; ?>

<main class="container mx-auto px-4 py-8">
  <!-- Hero Section -->
  <section class="hero-section bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg p-8 mb-12 shadow-lg">
    <div class="grid md:grid-cols-2 gap-8 items-center">
      <div class="text-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Find Your Next Amazing Event</h1>
        <p class="text-xl mb-6">Discover and register for events happening near you</p>
        <a href="events.php" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-all">Browse Events</a>
      </div>
      <div class="hidden md:block">
        <img src="assets/images/hero-image.jpg" alt="Event crowd" class="rounded-lg shadow-lg">
      </div>
    </div>
  </section>

  <!-- Featured Events -->
  <section class="mb-12">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold">Featured Events</h2>
      <a href="events.php" class="text-blue-600 hover:text-blue-800">View all →</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php include './includes/featured-events.php'; ?>
    </div>
  </section>

  <!-- Categories -->
  <section class="mb-12">
    <h2 class="text-3xl font-bold mb-6">Browse by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <a href="events.php?category=music" class="category-card bg-gradient-to-r from-purple-500 to-purple-700 p-6 rounded-lg text-white text-center hover:shadow-lg transition-all">
        <h3 class="text-xl font-semibold">Music</h3>
      </a>
      <a href="events.php?category=business" class="category-card bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg text-white text-center hover:shadow-lg transition-all">
        <h3 class="text-xl font-semibold">Business</h3>
      </a>
      <a href="events.php?category=food" class="category-card bg-gradient-to-r from-green-500 to-green-700 p-6 rounded-lg text-white text-center hover:shadow-lg transition-all">
        <h3 class="text-xl font-semibold">Food & Drink</h3>
      </a>
      <a href="events.php?category=art" class="category-card bg-gradient-to-r from-red-500 to-red-700 p-6 rounded-lg text-white text-center hover:shadow-lg transition-all">
        <h3 class="text-xl font-semibold">Art & Culture</h3>
      </a>
    </div>
  </section>

  <!-- Upcoming Events -->
  <section class="mb-12">
    <h2 class="text-3xl font-bold mb-6">Upcoming Events</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php include './includes/upcoming-events.php'; ?>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="bg-gray-100 rounded-lg p-8">
    <div class="max-w-2xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
      <p class="text-gray-600 mb-6">Subscribe to our newsletter to receive updates on the latest events.</p>
      <form action="./includes/newsletter.php" method="POST" class="flex flex-col md:flex-row gap-4">
        <input type="email" name="email" placeholder="Your email address" required class="flex-grow px-4 py-3 rounded-lg">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all">Subscribe</button>
      </form>
    </div>
  </section>
</main>

<?php include_once './includes/footer.php'; ?>