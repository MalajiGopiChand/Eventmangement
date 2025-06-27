<?php include_once './includes/header.php'; ?>
<?php
// In a real application, you would fetch the event details from the database
// based on the event ID passed in the URL
$event_id = isset($_GET['id']) ? $_GET['id'] : 1;
?>

<main class="container mx-auto px-4 py-8">
  <!-- Event Header -->
  <section class="mb-8">
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg overflow-hidden">
      <div class="p-8 text-white">
        <div class="mb-4">
          <span class="inline-block bg-orange-500 text-white text-sm font-semibold px-3 py-1 rounded-full mb-2">Music</span>
          <h1 class="text-4xl md:text-5xl font-bold">Summer Music Festival 2025</h1>
        </div>
        <div class="flex flex-wrap gap-6 mb-6">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>June 15-17, 2025</span>
          </div>
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Central Park, New York</span>
          </div>
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>$99 - $299</span>
          </div>
        </div>
        <div class="flex gap-4">
          <a href="register.php?event_id=<?php echo $event_id; ?>" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-all">Register Now</a>
          <button class="inline-block bg-transparent border border-white text-white font-semibold py-3 px-6 rounded-lg hover:bg-white hover:text-blue-800 transition-all">Share Event</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Event Content -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Content -->
    <div class="lg:col-span-2">
      <!-- Event Description -->
      <section class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4">About This Event</h2>
        <div class="prose max-w-none">
          <p>Join us for the biggest music festival of the year featuring top artists from around the world. This three-day event will showcase diverse musical genres from rock to electronic, jazz to hip-hop.</p>
          
          <p>Experience amazing performances across 5 stages, delicious food from local vendors, art installations, and much more. Whether you're a die-hard music fan or just looking for a fun weekend, the Summer Music Festival has something for everyone.</p>
          
          <h3>Lineup Highlights:</h3>
          <ul>
            <li>The Resonant Waves</li>
            <li>Electric Pulse</li>
            <li>Harmony Junction</li>
            <li>Midnight Rhythm</li>
            <li>And many more...</li>
          </ul>
          
          <h3>What's Included:</h3>
          <ul>
            <li>Access to all 5 stages</li>
            <li>Free water stations</li>
            <li>Festival map and program</li>
            <li>Access to food and merchandise vendors</li>
          </ul>
          
          <p>Don't miss out on this unforgettable experience! Get your tickets now.</p>
        </div>
      </section>
      
      <!-- Event Gallery -->
      <section class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4">Event Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          <img src="assets/images/event1.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
          <img src="assets/images/event2.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
          <img src="assets/images/event3.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
          <img src="assets/images/event4.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
          <img src="assets/images/event5.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
          <img src="assets/images/event6.jpg" alt="Event Photo" class="rounded-lg hover:opacity-90 transition-all cursor-pointer">
        </div>
      </section>
    </div>
    
    <!-- Sidebar -->
    <div>
      <!-- Organizer Info -->
      <section class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold mb-4">Event Organizer</h2>
        <div class="flex items-center mb-4">
          <img src="assets/images/organizer.jpg" alt="Organizer" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h3 class="font-semibold">MusicEvents Inc.</h3>
            <p class="text-gray-600 text-sm">Event Management Company</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm mb-4">Organizing premium music events since 2010. Known for creating unforgettable experiences.</p>
        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">View Organizer Profile</a>
      </section>
      
      <!-- Location Map -->
      <section class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold mb-4">Location</h2>
        <div class="aspect-w-16 aspect-h-9 mb-4">
          <img src="assets/images/map.jpg" alt="Event Location Map" class="rounded-lg">
        </div>
        <address class="not-italic text-gray-700 mb-4">
          Central Park<br>
          New York, NY 10022<br>
          United States
        </address>
        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Get Directions</a>
      </section>
      
      <!-- Similar Events -->
      <section class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Similar Events</h2>
        <div class="space-y-4">
          <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 transition-all">
            <h3 class="font-semibold">Jazz Night Downtown</h3>
            <p class="text-sm text-gray-600">Aug 12, 2025 • New York</p>
          </a>
          <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 transition-all">
            <h3 class="font-semibold">Rock Festival 2025</h3>
            <p class="text-sm text-gray-600">Sep 5, 2025 • Boston</p>
          </a>
          <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 transition-all">
            <h3 class="font-semibold">Electronic Music Summit</h3>
            <p class="text-sm text-gray-600">Jul 22, 2025 • Miami</p>
          </a>
        </div>
      </section>
    </div>
  </div>
</main>

<?php include_once './includes/footer.php'; ?>