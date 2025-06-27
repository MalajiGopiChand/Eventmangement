<?php include_once './includes/header.php'; ?>

<main class="container mx-auto px-4 py-8">
  <header class="mb-8">
    <h1 class="text-4xl font-bold mb-4">Events</h1>
    <div class="flex flex-col md:flex-row justify-between gap-4">
      <!-- Search -->
      <div class="w-full md:w-1/3">
        <form action="events.php" method="GET">
          <div class="relative">
            <input type="text" name="search" placeholder="Search events..." class="w-full px-4 py-2 rounded-lg border">
            <button type="submit" class="absolute right-2 top-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      
      <!-- Filters -->
      <div class="flex flex-wrap gap-4">
        <select name="category" id="category-filter" class="px-4 py-2 rounded-lg border">
          <option value="">All Categories</option>
          <option value="music">Music</option>
          <option value="business">Business</option>
          <option value="food">Food & Drink</option>
          <option value="art">Art & Culture</option>
        </select>
        
        <select name="date" id="date-filter" class="px-4 py-2 rounded-lg border">
          <option value="">Any Date</option>
          <option value="today">Today</option>
          <option value="tomorrow">Tomorrow</option>
          <option value="week">This Week</option>
          <option value="month">This Month</option>
        </select>
        
        <select name="location" id="location-filter" class="px-4 py-2 rounded-lg border">
          <option value="">Any Location</option>
          <option value="new-york">New York</option>
          <option value="los-angeles">Los Angeles</option>
          <option value="chicago">Chicago</option>
          <option value="miami">Miami</option>
        </select>
      </div>
    </div>
  </header>

  <!-- Events Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <?php include './includes/event-list.php'; ?>
  </div>

  <!-- Pagination -->
  <div class="flex justify-center mt-8">
    <nav class="inline-flex rounded-md shadow">
      <a href="#" class="px-4 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Previous</a>
      <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-blue-600 font-medium">1</a>
      <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
      <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
      <a href="#" class="px-4 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Next</a>
    </nav>
  </div>
</main>

<?php include_once './includes/footer.php'; ?>