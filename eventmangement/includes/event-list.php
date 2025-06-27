<?php
// Get filter parameters
$category = isset($_GET['category']) ? sanitize($_GET['category']) : '';
$date = isset($_GET['date']) ? sanitize($_GET['date']) : '';
$location = isset($_GET['location']) ? sanitize($_GET['location']) : '';
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';

// In a real application, these filters would be applied to a database query
// For demo purposes, we'll use dummy data and simple filtering
$allEvents = array_merge(
    isset($featuredEvents) ? $featuredEvents : [],
    isset($upcomingEvents) ? $upcomingEvents : [],
    [
        [
            'id' => 7,
            'title' => 'Film Festival',
            'date' => 'October 10-15, 2025',
            'location' => 'Cinema Complex, Los Angeles',
            'category' => 'art',
            'image' => 'https://images.pexels.com/photos/7991579/pexels-photo-7991579.jpeg'
        ],
        [
            'id' => 8,
            'title' => 'Startup Pitch Competition',
            'date' => 'November 5, 2025',
            'location' => 'Innovation Hub, New York',
            'category' => 'business',
            'image' => 'https://images.pexels.com/photos/7688336/pexels-photo-7688336.jpeg'
        ],
        [
            'id' => 9,
            'title' => 'Winter Music Concert',
            'date' => 'December 20, 2025',
            'location' => 'Grand Hall, Chicago',
            'category' => 'music',
            'image' => 'https://images.pexels.com/photos/1763075/pexels-photo-1763075.jpeg'
        ]
    ]
);

// Apply filters (simplified)
$filteredEvents = $allEvents;

if (!empty($category)) {
    $filteredEvents = array_filter($filteredEvents, function($event) use ($category) {
        return $event['category'] === $category;
    });
}

if (!empty($search)) {
    $filteredEvents = array_filter($filteredEvents, function($event) use ($search) {
        return stripos($event['title'], $search) !== false || 
               stripos($event['location'], $search) !== false;
    });
}

// Apply location filter (simplified)
if (!empty($location)) {
    $cityMapping = [
        'new-york' => 'New York',
        'los-angeles' => 'Los Angeles',
        'chicago' => 'Chicago',
        'miami' => 'Miami'
    ];
    
    $locationName = isset($cityMapping[$location]) ? $cityMapping[$location] : '';
    
    if (!empty($locationName)) {
        $filteredEvents = array_filter($filteredEvents, function($event) use ($locationName) {
            return stripos($event['location'], $locationName) !== false;
        });
    }
}

// Display events or "no results" message
if (count($filteredEvents) > 0) {
    foreach ($filteredEvents as $event):
?>
<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all">
    <div class="relative h-48">
        <img src="<?php echo $event['image']; ?>" alt="<?php echo $event['title']; ?>" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4">
            <span class="inline-block bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full"><?php echo ucfirst($event['category']); ?></span>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-xl font-bold mb-2"><?php echo $event['title']; ?></h3>
        <div class="flex items-center text-sm text-gray-500 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span><?php echo $event['date']; ?></span>
        </div>
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span><?php echo $event['location']; ?></span>
        </div>
        <a href="event-details.php?id=<?php echo $event['id']; ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all">View Details</a>
    </div>
</div>
<?php 
    endforeach;
} else {
?>
<div class="col-span-3 py-12 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <h3 class="text-xl font-bold text-gray-500 mb-2">No events found</h3>
    <p class="text-gray-500 mb-4">Try adjusting your search or filter criteria</p>
    <a href="events.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all">Reset Filters</a>
</div>
<?php
}
?>